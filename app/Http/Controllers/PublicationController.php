<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use OpenAI\Laravel\Facades\OpenAI;


class PublicationController extends Controller
{
   ///////////////// chercheur
    public function chercheurShowPublications(){
        $publications= \App\Models\Publication::where('auteur',Auth::user()->id)->get();
        $auteur_publications = array();
      foreach($publications as $publication) {
        $auteur_publication= \App\Models\Auteur_Publication::where('publication_id', $publication->id)->first();
       if($auteur_publication) {
         $auteur_publications[] = $auteur_publication;
        }
      }
     return view('chercheur.chercheurShowPublications',compact('publications','auteur_publications'));
    }
    public function chercheurShowPublication($id){  
    $publication= \App\Models\Publication::where('id',$id)->first();
    $auteur_publication= \App\Models\Auteur_Publication::where('publication_id', $publication->id)->first();
    $image=\App\Models\Gallerie::where('type','photo d\'une publication')->where('entite_id', $publication->id)->first();
    return view('chercheur.chercheurShowPublication',compact('publication','auteur_publication','image'));
    }
    public function chercheurAddPublication(){ 
     return view('chercheur.chercheurAddPublication');
    }
    public function generateImage(Request $request){
        $titre=$request->titre;
        $description=$request->description;
      $result = OpenAI::images()->create([
          'prompt' => $description,
          'size' => '1024x1024',
      ]);
     $image=$result->data[0]->url;

    
     return redirect()->route('chercheurAddPublication')->with([
     'image' => $image,
     'description' => $description,
      'titre' => $titre
  ]);
    }
    public function chercheurAddPublicationPost(Request $request){
        if($request->date_publication==""){
              $titre=$request->titre;
              $description=$request->description;
            $result = OpenAI::images()->create([
                'prompt' => $description,
                'size' => '1024x1024',
            ]);
           $image=$result->data[0]->url;

          
           return redirect()->route('chercheurAddPublication')->with([
           'image' => $image,
           'description' => $description,
            'titre' => $titre
        ]);
        }
        $publication= new \App\Models\Publication();
        $publication-> titre=$request->titre;
        $publication->description=$request->description;
        $publication->auteur=Auth::user()->id;
        $publication->laboratoire_id=Session::get('laboratoire_id');
        $publication->revue=$request->revue;
        $publication-> date_publication=$request->date_publication;
        $publication-> save();

        //ajouter un image d'un projet
        if($request->hasfile('image')){
        $photo= new \App\Models\Gallerie();
        $photo->type='photo d\'une publication';
        $photo->laboratoire_id=Session::get('laboratoire_id');
        $photo->entite_id=$publication->id;
        if ($request->hasfile('image'))
        {
           //enregistrer le nouveau fichier
           $file=$request->file('image');
           $ext=$file->getClientOriginalExtension();
           $filename=time().'.'.$ext;
           $file->move('photos publications/', $filename);
           $photo->description=$filename;
        }
  
        $photo->save();
    }
        $publications= \App\Models\Publication::where('auteur',Auth::user()->id)->get();
 
        $auteur_publication= new \App\Models\Auteur_Publication();
        $auteur_publication->publication_id=$publication->id;
        $auteur_publication->auteur_id=Auth::user()->id;
        $auteur_publication->laboratoire_id=Session::get('laboratoire_id');
        $auteur_publication->ordre=count($publications);
        $auteur_publication->affiliation=$request->affiliation;
        $auteur_publication-> save();
       
        return redirect()->route('chercheurShowPublications')->with('SuccessMessage','Publication ajouté avec succès');
       }
       public function chercheurDeletePublication( $id)
       {   
           $publication=\App\Models\Publication::where('id',$id)->first();
           $auteur_publication=\App\Models\Auteur_Publication::where('publication_id',$id)->first();
           return view('chercheur.chercheurDeletePublication',compact('publication','auteur_publication'));
       }
    
       public function chercheurDeletePublicationPost(Request $request)
       {   
           $publication=\App\Models\Publication::where('id',$request->id)->first();
           $publication->delete();
           $auteur_publication=\App\Models\Auteur_Publication::where('publication_id',$request->id)->first();
           $auteur_publication->delete();
            return redirect()->route('chercheurShowPublications')->with('SuccessMessage','Publication supprimé avec succès');
       }
       public function chercheurEditPublication($id)
    {   
        $publication=\App\Models\Publication::where('id',$id)->first();
        $auteur_publication=\App\Models\Auteur_Publication::where('publication_id',$id)->first();
        return view('chercheur.chercheurEditPublication',compact('publication','auteur_publication'));
    }
 
    public function chercheurEditPublicationPost(Request $request)
    {   
        $publication=\App\Models\Publication::where('id',$request->id)->first();
        $publication-> titre=$request->titre;
        $publication->description=$request->description;
        $publication->revue=$request->revue;
        $publication-> date_publication=$request->date_publication;
        $publication->update();

        $auteur_publication= \App\Models\Auteur_Publication::where('publication_id',$request->id)->first();
        $auteur_publication->affiliation=$request->affiliation;
        $auteur_publication-> update();

        return redirect()->route('chercheurShowPublications')->with('SuccessMessage','Publication modifié avec succès'); 
    }
    //////////////////////////////directeur

    public function directeurShowPublications(){
        
       
        $publications= \App\Models\Publication::where('laboratoire_id',Session::get('laboratoire_id'))->get();
        $auteur_publications = array();
        foreach($publications as $publication) {
            $auteur_publication= \App\Models\Auteur_Publication::where('publication_id', $publication->id)->first();
           if($auteur_publication) {
             $auteur_publications[] = $auteur_publication;
            }
        }
     return view('directeur.directeurShowPublications',compact('publications','auteur_publications'));
    }
     public function directeurShowPublication($id){
        $publication= \App\Models\Publication::where('id',$id)->first();
        $image=\App\Models\Gallerie::where('type','photo d\'une publication')->where('entite_id', $publication->id)->first();
       
        $auteur_publication= \App\Models\Auteur_Publication::where('publication_id', $publication->id)->first();
       
     return view('directeur.directeurShowPublication',compact('publication','auteur_publication','image'));
    }
    

}
