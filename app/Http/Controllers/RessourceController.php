<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class RessourceController extends Controller
{
    public function directeurShowRessources(){
    $ressources= \App\Models\Ressource::where('laboratoire_id',Session::get('laboratoire_id'))->get();
     return view('directeur.directeurShowRessources')->with('ressources', $ressources);
    }
    public function directeurShowRessource($id){
     $ressource=\App\Models\Ressource::where('id',$id)->first();
     return view('directeur.directeurShowRessource',compact('ressource'));
    }
    public function directeurAddRessource(){
     return view('directeur.directeurAddRessource');
    }
    public function directeurAddRessourcePost(Request $request){
     $Ressource=\App\Models\Ressource::where('nom',$request->nom)->where('laboratoire_id',Session::get('laboratoire_id'))->first();
        if($Ressource){
            return redirect()->route('directeurShowRessources')->with('InfoMessage','Ressource est déja existe ');
        }
        else{
        $ressource= new \App\Models\Ressource();
        $ressource->nom=$request->nom;
        $ressource->laboratoire_id=Session::get('laboratoire_id');
        $ressource->description=$request->description;
        $ressource->disponibilite=$request->disponibilite;
        $ressource->type=$request->type;
        $ressource->save();
        return redirect()->route('directeurShowRessources')->with('SuccessMessage','Ressource est ajouté avec succès '); 
        }
    }
    public function directeurEditRessource($id){
        $ressource=\App\Models\Ressource::where('id',$id)->first();
        return view('directeur.directeurEditRessource',compact('ressource'));
    }
    public function directeurEditRessourcePost(Request $request){
        $ressource=\App\Models\Ressource::where('id',$request->id)->first();
        $ressource->nom=$request->nom;
        $ressource->description=$request->description;
        $ressource->disponibilite=$request->disponibilite;
        $ressource->type=$request->type;
        $ressource->update();
        return redirect()->route('directeurShowRessources')->with('SuccessMessage','Ressource est modifié avec succès ');
    }
    public function directeurDeleteRessource($id){
        $ressource=\App\Models\Ressource::where('id',$id)->first();
        return view('directeur.directeurDeleteRessource',compact('ressource'));
    }
   
     public function directeurDeleteRessourcePost(Request $request){
        $ressource=\App\Models\Ressource::where('id',$request->id)->first();
        $ressource->delete();
        return redirect()->route('directeurShowRessources')->with('SuccessMessage','Ressource est supprimé avec succès ');
    }

}
