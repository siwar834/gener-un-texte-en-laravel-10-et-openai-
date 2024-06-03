<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Projet;
use \App\Models\Tache_chercheur;
use OpenAI\Laravel\Facades\OpenAI;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class ProjetController extends Controller
{
    //-----------------------------------------------directeur------------------------
     //afficher tout les projets
    public function directeurShowProjets(){
     $projets= \App\Models\Projet::where('laboratoire_id',Session::get('laboratoire_id'))->get();
     return view('directeur.directeurShowProjets',compact('projets'));
    }
            //afficher un projet
    public function directeurShowProjet($id){
     //afficher le projet
     $projet= \App\Models\Projet::where('id',$id)->first();
     //image d'un projet
     $image=\App\Models\Gallerie::where('type','photo d\'un projet')->where('entite_id', $projet->id)->first();
     //afficher le chef de projet
     $chefprojet=\App\Models\User::where('id',$projet->chefprojet_id)->first();
     //afficher tout les taches de projet
     $taches= \App\Models\Projets_tache::where('projet_id',$id)->get();
      //afficher les chercheurs responsible des  tache_chercheurs 
     $tache_chercheurs = array();
      foreach($taches as $tache) {
         $tache_chercheur = \App\Models\Projets_taches_chercheur::where('tache_id', $tache->id)->first();
       if($tache_chercheur) {
         $tache_chercheurs[] = $tache_chercheur;
       }
      }
      //afficher les membres de projet
     $projetchercheurs= \App\Models\Projet_Chercheur::where('projet_id',$id)->get();
     //creer un tableau vide 
     $membres = array();
      foreach($projetchercheurs as $projetchercheur) {
        $membre = \App\Models\User::where('id', $projetchercheur->chercheur_id)->first();
        if($membre) {
         $membres[] = $membre;
        }
      }
      return view('directeur.directeurShowProjet',compact('projet', 'taches','membres','chefprojet','tache_chercheurs','image'));
    }
      //afficher la formulaire d'ajout un projet
    public function directeurAddProjet(){
    
        $membres=\App\Models\Membre::where('fonction','chef de projet')->where('laboratoire_id',Session::get('laboratoire_id'))->get();
          $users=array();
        foreach($membres as $membre){
            $user=\App\Models\User::where('id',$membre->user_id)->first();
        
            if($user){
             $users[]=$user;
            }

          }
        
        $membreschercheurs=\App\Models\Membre::where('fonction','chercheur')->where('laboratoire_id',Session::get('laboratoire_id'))->get();
        $chercheurs=array();
        foreach($membreschercheurs as $membrechercheur){
            $user=\App\Models\User::where('id',$membrechercheur->user_id)->first();
        
            if($user){
             $chercheurs[]=$user;
            }

          }
        $membresetudiants=\App\Models\Membre::where('fonction','etudiant chercheur')->where('laboratoire_id',Session::get('laboratoire_id'))->get();
        $etudiants=array();
        foreach($membresetudiants as $membreetudiant){
            $user=\App\Models\User::where('id',$membreetudiant->user_id)->first();
        
            if($user){
             $etudiants[]=$user;
            }

          }
        return view('directeur.directeurAddProjet',compact('users','chercheurs','etudiants'));
    } 
    //methode d'enregistre le projet


    
    public function generateDescription(Request $request)
    {  
      
        $titre=$request->titre;
        $mot=$request->mot;
        $result = OpenAI::chat()->create([
          'model' => 'gpt-3.5-turbo',
          'messages' => [
              ['role' => 'user', 'content' => 'créer une paragraphe à partir  de ce mot:'.$request->input('mot').'en relation avec '.$request->input('titre')],
         ],
         
          'max_tokens' => 100,
      ]);
       $description=$result->choices[0]->message->content;
      
       
       
       return redirect()->route('directeurAddProjet')->with([
        'mot' => $mot,
        'description' => $description,
        'titre' => $titre
    ]);
      
    }
    public function directeurAddProjetPost(Request $request){
      if($request->description==""){
        $titre=$request->titre;
        $mot=$request->mot;
        $result = OpenAI::chat()->create([
          'model' => 'gpt-3.5-turbo',
          'messages' => [
              ['role' => 'user', 'content' => 'créer une paragraphe à partir  de ce mot:'.$request->input('mot').'en relation avec '.$request->input('titre')],
          ],
         
       'max_tokens' => 100,
      ]);
       $description=$result->choices[0]->message->content;
       
       return redirect()->route('directeurAddProjet')->with([
        'mot' => $mot,
        'description' => $description,
        'titre' => $titre
    ]);
    
      }
        $projet=new \App\Models\Projet();
         $projet->titre=$request->titre;
         $projet->laboratoire_id=Session::get('laboratoire_id');
         $projet->description=$request->description;
         $projet->chefprojet_id=$request->chefprojet_id;
         $projet->statut=$request->statut;
         $projet->date_debut=$request->date_debut;
         $projet->date_fin=$request->date_fin;
         $projet->save();
         //ajouter un image d'un projet
         if($request->hasfile('image')){

         
         $photo= new \App\Models\Gallerie();
         $photo->type='photo d\'un projet';
         $photo->laboratoire_id=Session::get('laboratoire_id');
         $photo->entite_id=$projet->id;
         if ($request->hasfile('image'))
         {
            //enregistrer le nouveau fichier
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('photos projets/', $filename);
            $photo->description=$filename;
         }
   
         $photo->save();
        }
         //ajouter projet_chercheur de chef de projet
         
         $projetchefs=\App\Models\Projet_Chercheur::where('chercheur_id',$request->chefprojet_id)->get();
            
         $projet_chercheur=new \App\Models\Projet_Chercheur();
             $projet_chercheur->titre=$request->titre;
             $projet_chercheur->projet_id=$projet->id;
             $projet_chercheur->description=$request->description;
             $projet_chercheur->chercheur_id=$request->chefprojet_id;
             $projet_chercheur->ordre=count($projetchefs)+1;
             $projet_chercheur->fonction='chef de projet ';
             $projet_chercheur->laboratoire_id=Session::get('laboratoire_id');
             $projet_chercheur->statut=$request->statut;
             $projet_chercheur->date_debut=$request->date_debut;
             $projet_chercheur->date_fin=$request->date_fin;
             $projet_chercheur->save();
         //afficher la liste des chercheurs de ce projet
         $chercheurs=\App\models\User::whereIn('id', $request->employes)->get();
 
         foreach ($chercheurs as $chercheur)
         {
             //afficher les projet de chercheur
             $projets=\App\Models\Projet_Chercheur::where('chercheur_id',$chercheur->id)->where('fonction','chercheur')->get();
              //ajouter un projet_chercheur
             $projet_chercheur=new \App\Models\Projet_Chercheur();
             $projet_chercheur->titre=$request->titre;
             $projet_chercheur->projet_id=$projet->id;
             $projet_chercheur->description=$request->description;
             $projet_chercheur->chercheur_id=$chercheur->id;
             $projet_chercheur->ordre=count($projets)+1;
             $projet_chercheur->fonction='chercheur';
             $projet_chercheur->laboratoire_id=Session::get('laboratoire_id');
             $projet_chercheur->statut=$request->statut;
             $projet_chercheur->date_debut=$request->date_debut;
             $projet_chercheur->date_fin=$request->date_fin;
             $projet_chercheur->save();

          }
         //afficher la liste des etudiants de recherches de ce projet
       
       if($request->etudiants!=""){
        $etudiants=\App\models\User::whereIn('id', $request->etudiants)->get();
 
         foreach ($etudiants as $etudiant)
         {
             //afficher les projet de etudiant de recherche 
             $projetetudiants=\App\Models\Projet_Chercheur::where('chercheur_id',$etudiant->id)->get();
              //ajouter un projet_chercheur
             $projet_chercheur=new \App\Models\Projet_Chercheur();
             $projet_chercheur->titre=$request->titre;
             $projet_chercheur->projet_id=$projet->id;
             $projet_chercheur->description=$request->description;
             $projet_chercheur->chercheur_id=$etudiant->id;
             $projet_chercheur->ordre=count($projetetudiants)+1;
             $projet_chercheur->fonction='etudiante de recherche ';
             $projet_chercheur->statut=$request->statut;
             $projet_chercheur->laboratoire_id=Session::get('laboratoire_id');
             $projet_chercheur->date_debut=$request->date_debut;
             $projet_chercheur->date_fin=$request->date_fin;
             $projet_chercheur->save();
          }
        }
         return redirect()->route('directeurShowProjets')->with('SuccessMessage','Projet est ajouté avec success ');
      
 
    }
    public function directeurEditProjet($id)
    {   
          
        $membres=\App\Models\Membre::where('fonction','chef de projet')->where('laboratoire_id',Session::get('laboratoire_id'))->get();
        $users=array();
      foreach($membres as $membre){
          $user=\App\Models\User::where('id',$membre->user_id)->first();
      
          if($user){
           $users[]=$user;
          }

        }
      
      $membreschercheurs=\App\Models\Membre::where('fonction','chercheur')->where('laboratoire_id',Session::get('laboratoire_id'))->get();
      $chercheurs=array();
      foreach($membreschercheurs as $membrechercheur){
          $user=\App\Models\User::where('id',$membrechercheur->user_id)->first();
      
          if($user){
           $chercheurs[]=$user;
          }

        }
      $membresetudiants=\App\Models\Membre::where('fonction','etudiant chercheur')->where('laboratoire_id',Session::get('laboratoire_id'))->get();
      $etudiants=array();
      foreach($membresetudiants as $membreetudiant){
          $user=\App\Models\User::where('id',$membreetudiant->user_id)->first();
      
          if($user){
           $etudiants[]=$user;
          }

        }
          //afficher le projet
        $projet=\App\Models\Projet::where('id',$id)->first();
        //afficher image d'un projet
        $image=\App\Models\Gallerie::where('type','photo d\'un projet')->where('entite_id', $projet->id)->first();
        //afficher les projet_chercheur pour connaitre les chercheurs de projet
        $projet_chercheurs=\App\Models\Projet_Chercheur::where('projet_id',$projet->id)->get();
            
        return view('directeur.directeurEditProjet',compact('projet','users','chercheurs','projet_chercheurs','etudiants','image'));
    }
 
    public function directeurEditProjetPost(Request $request)
    {   
        //modifier le projet
        $projet=\App\Models\Projet::where('id',$request->id)->first();
        $projet->titre=$request->titre;
        $projet->description=$request->description;
        $projet->chefprojet_id=$request->chefprojet_id;
        $projet->statut=$request->statut;
        $projet->date_debut=$request->date_debut;
        $projet->date_fin=$request->date_fin;
        $projet->update();

       
       
         
        //la liste des chercheurs choisir
        $chercheurs=\App\models\User::whereIn('id', $request->employes)->get();
       
        //afficher la liste des projet_chercheurs de ce projet
        $projet_chercheurs= \App\Models\Projet_Chercheur::where('projet_id',$projet->id)->get();
           
        
        foreach ($chercheurs as $chercheur)
        {
             //affiche le projet_chercheur de projet
            $projet_chercheur= \App\Models\Projet_Chercheur::where('chercheur_id',$chercheur->id)->where('projet_id',$projet->id)->first();
            if($projet_chercheur){
                $projet_chercheur->titre=$request->titre;
                $projet_chercheur->projet_id=$projet->id;
                $projet_chercheur->description=$request->description;
                $projet_chercheur->chercheur_id=$chercheur->id;
                $projet_chercheur->statut=$request->statut;
                $projet_chercheur->date_debut=$request->date_debut;
                $projet_chercheur->date_fin=$request->date_fin;
                $projet_chercheur->update();
            }
            else{
              $projets=\App\Models\Projet_Chercheur::where('chercheur_id',$chercheur->id)->get();   
              $projet_chercheur=new \App\Models\Projet_Chercheur();
              $projet_chercheur->titre=$projet->titre;
              $projet_chercheur->projet_id=$projet->id;
              $projet_chercheur->description=$projet->description;
              $projet_chercheur->chercheur_id=$chercheur->id;
              $projet_chercheur->laboratoire_id=Session::get('laboratoire_id');
              $projet_chercheur->fonction='chercheur';
              $projet_chercheur->ordre=count($projets);
              $projet_chercheur->statut=$projet->statut;
              $projet_chercheur->date_debut=$projet->date_debut;
              $projet_chercheur->date_fin=$projet->date_fin;
              $projet_chercheur->save();
           }
           }
       
        

         //afficher la liste des etudiants de recherches de ce projet
         if($request->etudiants){

         
         $etudiants=\App\models\User::whereIn('id', $request->etudiants)->get();

         foreach ($etudiants as $etudiant)
         {
              //affiche le projet_chercheur de projet
              $projet_chercheur= \App\Models\Projet_Chercheur::where('chercheur_id',$etudiant->id)->where('projet_id',$projet->id)->first();
              if($projet_chercheur){
                  $projet_chercheur->titre=$request->titre;
                  $projet_chercheur->projet_id=$projet->id;
                  $projet_chercheur->description=$request->description;
                  $projet_chercheur->chercheur_id=$chercheur->id;
                  $projet_chercheur->statut=$request->statut;
                 
                  $projet_chercheur->date_debut=$request->date_debut;
                  $projet_chercheur->date_fin=$request->date_fin;
                  $projet_chercheur->update();
              }
              else{
                $projetetudiants=\App\Models\Projet_Chercheur::where('chercheur_id',$etudiant->id)->get();   
                $projet_chercheur=new \App\Models\Projet_Chercheur();
                $projet_chercheur->titre=$projet->titre;
                $projet_chercheur->projet_id=$projet->id;
                $projet_chercheur->description=$projet->description;
                $projet_chercheur->chercheur_id=$chercheur->id;
                $projet_chercheur->ordre=count($projetetudiants);
                $projet_chercheur->laboratoire_id=Session::get('laboratoire_id');
                $projet_chercheur->fonction='etudiante de recherche ';
                $projet_chercheur->statut=$projet->statut;
                $projet_chercheur->date_debut=$projet->date_debut;
                $projet_chercheur->date_fin=$projet->date_fin;
                $projet_chercheur->save();
             }
            }
          }
    return redirect()->route('directeurShowProjets')->with('SuccessMessage','Projet est modifié avec success '); 
    }
 
    public function directeurDeleteProjet( $id)
    {   
        $projet=\App\Models\Projet::where('id',$id)->first();
        return view('directeur.directeurDeleteProjet',compact('projet'));
    }
 
    public function directeurDeleteProjetPost(Request $request)
    {   
        $projet=\App\Models\Projet::where('id',$request->id)->first();
        $projet->delete();
        $projet_chercheurs = \App\Models\Projet_Chercheur::where('projet_id', $request->id)->get();

        $projet_chercheurs->each(function ($projet_chercheur) {
            $projet_chercheur->delete();
        });
        return redirect()->route('directeurShowProjets')->with('SuccessMessage','Projet est supprimé avec success ');
    }
    
    //---------------------------------chercheur------------------------------

    public function chercheurShowProjets(){
        //afficher les projets a partir  projet_chercheur 
        $projet_chercheurs= \App\Models\Projet_Chercheur::where('chercheur_id',Auth::user()->id)->where('fonction','chercheur')->get();

        $projets = array();
       foreach($projet_chercheurs as $projet_chercheur) {
        $projet = \App\Models\Projet::where('id', $projet_chercheur->projet_id)->first();
       if($projet) {
        $projets[] = $projet;
        }
    }
    

    return view('chercheur.chercheurShowProjets',compact('projets'));
    }

    
    public function chercheurShowProjet($id){
        //afficher le projet de id=$id
       
    $projet= \App\Models\Projet::where('id',$id)->first();
    //afficher de chef de projet
    $chefprojet=\App\Models\User::where('id',$projet->chefprojet_id)->first();
       //image d'un projet
     $image=\App\Models\Gallerie::where('type','photo d\'un projet')->where('entite_id', $projet->id)->first();
     //afficher les taches de  projet
    $taches= \App\Models\Projets_tache::where('projet_id',$id)->get();
    //creer un tableau vide
    $tache_chercheurs = array();
    //affiche le tache_chercheur pour afficher le bouton modifier 
    foreach($taches as $tache) {
        $tache_chercheur = \App\Models\Projets_taches_chercheur::where('tache_id', $tache->id)->first();
       if($tache_chercheur) {
         $tache_chercheurs[] = $tache_chercheur;
        }
   }
   //afficher les membres a partir de tableau projet_chercheur
   $projetchercheurs= \App\Models\Projet_Chercheur::where('projet_id',$id)->get();
    //creer un tableau vide pour les membres de projet
   $membres = array();
    foreach($projetchercheurs as $projetchercheur) {
        $membre = \App\Models\User::where('id', $projetchercheur->chercheur_id)->first();
       if($membre) {
         $membres[] = $membre;
        }
   }
 
   
    return view('chercheur.chercheurShowProjet',compact('projet','taches','membres','chefprojet','tache_chercheurs','image'));
    }
 ////////////////// --------------------chef de projet--------------

   public function chefprojetShowProjets(){
    $projets= \App\Models\Projet::where('chefprojet_id',Auth::user()->id)->get();
       
     return view('chefprojet.chefprojetShowProjets',compact('projets'));
  }
   public function chefprojetShowProjet($id){
        
   

    $projet= \App\Models\Projet::where('id',$id)->first();
       //image d'un projet
       $image=\App\Models\Gallerie::where('type','photo d\'un projet')->where('entite_id', $projet->id)->first();
    $taches= \App\Models\Projets_tache::where('projet_id',$id)->get();
    $tache_chercheurs = array();
    foreach($taches as $tache) {
     $tache_chercheur = \App\Models\Projets_taches_chercheur::where('tache_id', $tache->id)->first();
     if($tache_chercheur) {
     $tache_chercheurs[] = $tache_chercheur;
     }
    }
    $projetchercheurs= \App\Models\Projet_Chercheur::where('projet_id',$id)->get();
    $membres = array();
     foreach($projetchercheurs as $projetchercheur) {
     $membre = \App\Models\User::where('id', $projetchercheur->chercheur_id)->first();
     if($membre) {
      $membres[] = $membre;
    }
}


 

  
 return view('chefprojet.chefprojetShowProjet',compact('projet', 'taches','membres','tache_chercheurs','image'));
}
   
  ///------------------------------- etudiante de recherche-------------------------------
  public function etudiantShowProjets(){
 //afficher les projets a partir  projet_chercheur 
 $projet_chercheurs= \App\Models\Projet_Chercheur::where('chercheur_id',Auth::user()->id)->get();

 $projets = array();
foreach($projet_chercheurs as $projet_chercheur) {
 $projet = \App\Models\Projet::where('id', $projet_chercheur->projet_id)->first();
if($projet) {
 $projets[] = $projet;
 }
}


return view('etudiant.etudiantShowProjets',compact('projets'));
  }
  public function etudiantShowProjet($id) {
     //afficher le projet de id=$id
       
     $projet= \App\Models\Projet::where('id',$id)->first();
     //image d'un projet
     $image=\App\Models\Gallerie::where('type','photo d\'un projet')->where('entite_id', $projet->id)->first();
     //afficher de chef de projet
     $chefprojet=\App\Models\User::where('id',$projet->chefprojet_id)->first();
        
      //afficher les taches de  projet
     $taches= \App\Models\Projets_tache::where('projet_id',$id)->get();
     //creer un tableau vide
     $tache_chercheurs = array();
     //affiche le tache_chercheur pour afficher le bouton modifier 
     foreach($taches as $tache) {
         $tache_chercheur = \App\Models\Projets_taches_chercheur::where('tache_id', $tache->id)->first();
        if($tache_chercheur) {
          $tache_chercheurs[] = $tache_chercheur;
         }
    }
    //afficher les membres a partir de tableau projet_chercheur
    $projetchercheurs= \App\Models\Projet_Chercheur::where('projet_id',$id)->get();
     //creer un tableau vide pour les membres de projet
    $membres = array();
     foreach($projetchercheurs as $projetchercheur) {
         $membre = \App\Models\User::where('id', $projetchercheur->chercheur_id)->first();
        if($membre) {
          $membres[] = $membre;
         }
    }
  
        
       
     return view('etudiant.etudiantShowProjet',compact('projet','chefprojet' ,'taches','membres','tache_chercheurs','image'));
    
  }  
       
}
