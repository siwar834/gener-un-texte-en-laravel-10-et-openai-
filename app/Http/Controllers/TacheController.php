<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class TacheController extends Controller
{
    //-----------------directeur-------------------------------------------
    
    public function directeurShowTache($id){
        
        $tache= \App\Models\Projets_tache::where('id',$id)->with('projet')->first();
        $tache_chercheur= \App\Models\Projets_taches_chercheur::where('tache_id',$id)->first();
     return view('directeur.directeurShowTache',compact('tache','tache_chercheur'));
    }
      
    public function directeurAddTache($id){
        $membreschercheurs=\App\Models\Membre::where('fonction','chercheur')->where('directeur_id',Session::get('directeur_id'))->get();
        $users=array();
        foreach($membreschercheurs as $membrechercheur){
            $user=\App\Models\User::where('id',$membrechercheur->user_id)->first();
        
            if($user){
             $users[]=$user;
            }

          }
        $membresetudiants=\App\Models\Membre::where('fonction','etudiant chercheur')->where('directeur_id',Session::get('directeur_id'))->get();
        $etudiants=array();
        foreach($membresetudiants as $membreetudiant){
            $user=\App\Models\User::where('id',$membreetudiant->user_id)->first();
        
            if($user){
             $etudiants[]=$user;
            }

          }
        $projet= \App\Models\Projet::where('id',$id)->first();  
        $projetchercheurs= \App\Models\Projet_Chercheur::where('projet_id',$id)->get();
       
     return view('directeur.directeurAddTache',compact('projet','etudiants','users','projetchercheurs'));
    } 
    

    public function directeurAddTachePost(Request $request)
    {  
       //ajouter un tache
        $tache= new \App\Models\Projets_tache();
        $tache-> titre=$request->titre;
        $tache-> directeur_id=Session::get('directeur_id');
        $tache->description=$request->description;
        $tache->projet_id=$request->projet_id;
         $tache->etat=$request->etat;
        $tache->date_debut=$request->date_debut;
        $tache->date_fin=$request->date_fin;
        $tache->save();
        //ajouter un tache_chercheur de tache 
        if($request->chercheur_id!=""){
            $tache_chercheur= new \App\Models\Projets_taches_chercheur();
        $tache_chercheur->description=$request->description;
        $tache_chercheur->tache_id=$tache->id;
        $tache_chercheur-> directeur_id=Session::get('directeur_id');
        $tache_chercheur->membre_id=$request->chercheur_id;
        $tache_chercheur->save();  
        }
        if($request->etudiant_id!=""){
            $tache_chercheur= new \App\Models\Projets_taches_chercheur();
            $tache_chercheur->description=$request->description;
            $tache_chercheur->tache_id=$tache->id;
            $tache_chercheur-> directeur_id=Session::get('directeur_id');
            $tache_chercheur->membre_id=$request->etudiant_id;
            $tache_chercheur->save();
        }
       
        return redirect()->route('directeurShowProjet',$tache->projet_id); 
    }
    public function directeurEditTache($id)
    {   
        $membreschercheurs=\App\Models\Membre::where('fonction','chercheur')->where('directeur_id',Session::get('directeur_id'))->get();
        $users=array();
        foreach($membreschercheurs as $membrechercheur){
            $user=\App\Models\User::where('id',$membrechercheur->user_id)->first();
        
            if($user){
             $users[]=$user;
            }

          }
        $membresetudiants=\App\Models\Membre::where('fonction','etudiant chercheur')->where('directeur_id',Session::get('directeur_id'))->get();
        $etudiants=array();
        foreach($membresetudiants as $membreetudiant){
            $user=\App\Models\User::where('id',$membreetudiant->user_id)->first();
        
            if($user){
             $etudiants[]=$user;
            }

          }   
        $tache=\App\Models\Projets_tache::where('id',$id)->first();
        $chercheur=\App\Models\Projets_taches_chercheur::where('tache_id',$id)->first();
       
        return view('directeur.directeurEditTache',compact('tache','etudiants','users','chercheur'));
    }
 
    public function directeurEditTachePost(Request $request)
    {   
        $tache=\App\Models\Projets_tache::where('id',$request->id)->first();
        $tache->titre=$request->titre;
        $tache->description=$request->description;
        $tache->projet_id=$request->projet_id;
        $tache->etat=$request->etat;
        $tache->date_debut=$request->date_debut;
        $tache->date_fin=$request->date_fin;
        $tache->update();

        if($request->chercheur_id!=""){
            $tache_chercheur= \App\Models\Projets_taches_chercheur::where('tache_id',$tache->id)->first();
            $tache_chercheur->description=$request->description;
           $tache_chercheur->membre_id=$request->chercheur_id;
            $tache_chercheur->update();  
        }
        if($request->etudiant_id!=""){
            $tache_chercheur= \App\Models\Projets_taches_chercheur::where('tache_id',$tache->id)->first();
            $tache_chercheur->description=$request->description;
           $tache_chercheur->membre_id=$request->etudiant_id;
            $tache_chercheur->update();
        }
       
        return redirect()->route('directeurShowProjet',$tache->projet_id); 
    }
 
    public function directeurDeleteTache( $id)
    {   
        $tache=\App\Models\Projets_tache::where('id',$id)->first();
      
        return view('directeur.directeurDeleteTache',compact('tache'));
    }
 
    public function directeurDeleteTachePost(Request $request)
    {   
        $tache=\App\Models\Projets_tache::where('id',$request->id)->first();
        $tache->delete();
        $tache_chercheur=\App\Models\Projets_taches_chercheur::where('tache_id',$request->id)->first();
        $tache_chercheur->delete();
        return redirect()->route('directeurShowProjet',$tache->projet_id);
    }
    
    ///-----------------------chef de projet----------------------
   
   
    public function chefprojetAddTache($id){
        $membreschercheurs=\App\Models\Membre::where('fonction','chercheur')->where('directeur_id',Session::get('directeur_id'))->get();
        $users=array();
        foreach($membreschercheurs as $membrechercheur){
            $user=\App\Models\User::where('id',$membrechercheur->user_id)->first();
        
            if($user){
             $users[]=$user;
            }

          }
        $membresetudiants=\App\Models\Membre::where('fonction','etudiant chercheur')->where('directeur_id',Session::get('directeur_id'))->get();
        $etudiants=array();
        foreach($membresetudiants as $membreetudiant){
            $user=\App\Models\User::where('id',$membreetudiant->user_id)->first();
        
            if($user){
             $etudiants[]=$user;
            }

          } 
        $projet= \App\Models\Projet::where('id',$id)->first();  
      return view('chefprojet.chefprojetAddTache',compact('projet','etudiants','users'));
     } 
    public function chefprojetAddTachePost(Request $request){  
       //creer une tache
        $tache= new \App\Models\Projets_tache();
        $tache-> titre=$request->titre;
        $tache-> directeur_id=Session::get('directeur_id');
        $tache->description=$request->description;
        $tache->projet_id=$request->projet_id;
         $tache->etat=$request->etat;
        $tache->date_debut=$request->date_debut;
        $tache->date_fin=$request->date_fin;
        $tache->save();
        //ajouter un tache_chercheur de tache 
        if($request->chercheur_id!=""){
            $tache_chercheur= new \App\Models\Projets_taches_chercheur();
            $tache_chercheur-> directeur_id=Session::get('directeur_id');
        $tache_chercheur->description=$request->description;
        $tache_chercheur->tache_id=$tache->id;
        $tache_chercheur->membre_id=$request->chercheur_id;
        $tache_chercheur->save();  
        }
        if($request->etudiant_id!=""){
            $tache_chercheur= new \App\Models\Projets_taches_chercheur();
            $tache_chercheur-> directeur_id=Session::get('directeur_id');
            $tache_chercheur->description=$request->description;
            $tache_chercheur->tache_id=$tache->id;
            $tache_chercheur->membre_id=$request->etudiant_id;
            $tache_chercheur->save();
        }

        return redirect()->route('chefprojetShowProjet',$tache->projet_id);
    }
    public function chefprojetEditTache($id)
    {   
        $tache=\App\Models\Projets_tache::where('id',$id)->first();
        $chercheur=\App\Models\Projets_taches_chercheur::where('tache_id',$id)->first();
        $membreschercheurs=\App\Models\Membre::where('fonction','chercheur')->where('directeur_id',Session::get('directeur_id'))->get();
        $users=array();
        foreach($membreschercheurs as $membrechercheur){
            $user=\App\Models\User::where('id',$membrechercheur->user_id)->first();
        
            if($user){
             $users[]=$user;
            }

          }
        $membresetudiants=\App\Models\Membre::where('fonction','etudiant chercheur')->where('directeur_id',Session::get('directeur_id'))->get();
        $etudiants=array();
        foreach($membresetudiants as $membreetudiant){
            $user=\App\Models\User::where('id',$membreetudiant->user_id)->first();
        
            if($user){
             $etudiants[]=$user;
            }

          }  
        return view('chefprojet.chefprojetEditTache',compact('tache','etudiants','chercheur','users'));
    }
 
    public function chefprojetEditTachePost(Request $request)
    {   //modifier une tache
        $tache=\App\Models\Projets_tache::where('id',$request->id)->first();
        $tache->titre=$request->titre;
        $tache->description=$request->description;
        $tache->etat=$request->etat;
        $tache->date_debut=$request->date_debut;
        $tache->date_fin=$request->date_fin;
        $tache->update();
      //modifier un tache_chercheur
      if($request->chercheur_id!=""){
        $tache_chercheur= \App\Models\Projets_taches_chercheur::where('tache_id',$tache->id)->first();
        $tache_chercheur-> directeur_id=Session::get('directeur_id');
        $tache_chercheur->description=$request->description;
       $tache_chercheur->membre_id=$request->chercheur_id;
        $tache_chercheur->update();  
    }
    if($request->etudiant_id!=""){
        $tache_chercheur= \App\Models\Projets_taches_chercheur::where('tache_id',$tache->id)->first();
        $tache_chercheur->description=$request->description;
        $tache_chercheur-> directeur_id=Session::get('directeur_id');
       $tache_chercheur->membre_id=$request->etudiant_id;
        $tache_chercheur->update();
    }

        return redirect()->route('chefprojetShowProjet',$tache->projet_id); 
    }
    public function chefprojetDeleteTache($id)
    {   
        $tache=\App\Models\Projets_tache::where('id',$id)->first();
       
        return view('chefprojet.chefprojetDeleteTache',compact('tache'));
    }
    public function chefprojetDeleteTachePost(Request $request)
    {   
        //supprimer la  tache
        $tache=\App\Models\Projets_tache::where('id',$request->id)->first();
        $tache->delete();
        //supprimer la tache_chercheur de tache 
        $tache_chercheur=\App\Models\Projets_taches_chercheur::where('tache_id',$request->id)->first();
         $tache_chercheur->delete();
         return redirect()->route('chefprojetShowProjet',$tache->projet_id); 
   
       
        }
    ///-----------------------chercheur-----------------------------
    public function chercheurEditTache($id){
        $tache= \App\Models\Projets_tache::where('id',$id)->first();
     return view('chercheur.chercheurEditTache',compact('tache'));
    }
    public function chercheurEditTachePost(Request $request)
    {   
        $tache=\App\Models\Projets_tache::where('id',$request->id)->first();
        $tache->titre=$request->titre;
        $tache->description=$request->description;
        $tache->etat=$request->etat;
        $tache->date_debut=$request->date_debut;
        $tache->date_fin=$request->date_fin;
        $tache->update();

        $tache_chercheur= \App\Models\Projets_taches_chercheur::where('tache_id',$tache->id)->first();
        $tache_chercheur->description=$request->description;
        
        $tache_chercheur->update();
      
        return redirect()->route('chercheurShowProjet',$tache->projet_id); }
        ///-----------------------etudiant-----------------------------
    public function etudiantEditTache($id){
        $tache= \App\Models\Projets_tache::where('id',$id)->first();
     return view('etudiant.etudiantEditTache',compact('tache'));
    }
    public function etudiantEditTachePost(Request $request)
    {   
        $tache=\App\Models\Projets_tache::where('id',$request->id)->first();
        $tache->titre=$request->titre;
        $tache->description=$request->description;
        $tache->etat=$request->etat;
        $tache->date_debut=$request->date_debut;
        $tache->date_fin=$request->date_fin;
        $tache->update();

        $tache_chercheur= \App\Models\Projets_taches_chercheur::where('tache_id',$tache->id)->first();
        $tache_chercheur->description=$request->description;
        
        $tache_chercheur->update();
      
        return redirect()->route('etudiantShowProjet',$tache->projet_id); }
}
