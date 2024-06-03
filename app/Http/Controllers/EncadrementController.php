<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Storage;
class EncadrementController extends Controller
{
   //etudiant de recherche 
   public function etudiantShowEncadrement(){
    $encadrement= \App\Models\Encadrement::where('etudiante_id',Auth::user()->id)->first();
    $encadrements_rendezvouss=\App\Models\Encadrements_rendezvous::where('encadrement_id',$encadrement->id)->get();
    $encadrements_fichiers=\App\Models\Encadrements_fichiers::where('encadrement_id',$encadrement->id)->get();
    $encadrements_taches=\App\Models\Encadrements_taches::where('encadrement_id',$encadrement->id)->get();
    
    $encadreur=\App\Models\User::where('id',$encadrement->chercheur_id)->first();

    Session::put('encadrement_id',  $encadrement->id);
    Session::put( 'etudiante_id', $encadrement->etudiante_id);
    return view('etudiant.etudiantShowEncadrement',compact('encadrement','encadrements_fichiers','encadrements_rendezvouss','encadrements_taches','encadreur'));
    
   }
   
   //Encadrements rendez-vous
   

   public function  etudiantEditEncadrementrendezvous($id){
    $encadrements_rendezvous=\App\Models\Encadrements_rendezvous::where('id',$id)->first();
   
   return view('etudiant.etudiantEditEncadrementrendezvous',compact('encadrements_rendezvous'));
     
   }
   public function  etudiantEditEncadrementrendezvousPost(Request $request){
    $encadrements_rendezvous=\App\Models\Encadrements_rendezvous::where('id',$request->id)->first();
 
    
    $encadrements_rendezvous->discussion=date('Y-m-d H:i:s')." : ".\Auth::user()->nom.":".$request->discussion.".<br/>".$encadrements_rendezvous->discussion;
    $encadrements_rendezvous->update();
    

  
    return redirect()->route('etudiantShowEncadrement');

}


public function etudiantEditEncadrementtache($id){
  $encadrements_tache=\App\Models\Encadrements_taches::where('id',$id)->first();
  return view('etudiant.etudiantEditEncadrementtache',compact('encadrements_tache'));

}
public function etudiantEditEncadrementtachePost(Request $request){
 
  $encadrements_tache=\App\Models\Encadrements_taches::where('id',$request->id)->first();
 
 
  $encadrements_tache->discussion= date('Y-m-d H:i:s')." : ".\Auth::user()->nom.":". $request->discussion."<br/>".$encadrements_tache->discussion;

  $encadrements_tache->tache= $request->tache;
  $encadrements_tache->update();
  return redirect()->route('etudiantShowEncadrement');

}


public function etudiantAddEncadrementfichier(){
  return view('etudiant.etudiantAddEncadrementfichier');

}
public function etudiantAddEncadrementfichierPost(Request $request){
   $encadrements_fichier=new \App\Models\Encadrements_fichiers();
  $encadrements_fichier->titre= $request->titre;
  $encadrements_fichier->user_id=Auth::user()->id;
  $encadrements_fichier->laboratoire_id=Session::get('laboratoire_id');
  $encadrements_fichier->encadrement_id= Session::get('encadrement_id');

   $encadrements_fichier->discussion=date('Y-m-d H:i:s')." : ".\Auth::user()->nom." : ". $request->discussion;
  if ($request->hasfile('fichier'))
  {
      //enregistrer le nouveau fichier
  

      $file = $request['fichier'];
      $fileName =time().'.'.$file->getClientOriginalExtension();
      $path = $file->storeAs('fichiersencadrements', $fileName);
      $encadrements_fichier->fichier=$fileName;
  }

  
 
  $encadrements_fichier->save();
  return redirect()->route('etudiantShowEncadrement');


}
public function etudiantEditEncadrementfichier($id){
  $encadrements_fichier=\App\Models\Encadrements_fichiers::where('id',$id)->first();
  
  return view('etudiant.etudiantEditEncadrementfichier',compact('encadrements_fichier'));

}
public function etudiantEditEncadrementfichierPost(Request $request){

  $encadrements_fichier= \App\Models\Encadrements_fichiers::where('id',$request->id)->first();
  $encadrements_fichier->titre= $request->titre;

   
   //$encadrements_fichier->discussion=date('Y-m-d H:i:s')." : ".\Auth::user()->nom.":".$request->discussion.$encadrements_fichier->discussion;
  $encadrements_fichier->datetime= $request->datetime;
  if ($request->hasfile('fichier'))
  {
    if(Storage::exists('fichiersencadrements/'.$encadrements_fichier->fichier))
    {
       Storage::delete('fichiersencadrements/'.$encadrements_fichier->fichier);
    }
   
    $file = $request['fichier'];
    $fileName =time().'.'.$file->getClientOriginalExtension();
    $path = $file->storeAs('fichiersencadrements', $fileName);
    $encadrements_fichier->fichier=$fileName;
  }

 
  $encadrements_fichier->update();
  return redirect()->route('etudiantShowEncadrement');


}
public function etudiantDeleteEncadrementfichier($id){
  $encadrements_fichier=\App\Models\Encadrements_fichiers::where('id',$id)->first();
  
  return view('etudiant.etudiantDeleteEncadrementfichier',compact('encadrements_fichier'));

}
public function etudiantDeleteEncadrementfichierPost(Request $request){
  $encadrements_fichier=\App\Models\Encadrements_fichiers::where('id',$request->id)->first();
  if(Storage::exists('fichiersencadrements/'.$encadrements_fichier->fichier))
  {
     Storage::delete('fichiersencadrements/'.$encadrements_fichier->fichier);
  }
  
  $encadrements_fichier->delete();
  return redirect()->route('etudiantShowEncadrement');

}
   
    //directeur
    public function directeurShowEncadrements(){
        
        $encadrements= \App\Models\Encadrement::where('laboratoire_id',Session::get('laboratoire_id'))->get();
        
        
     
     return view('directeur.directeurShowEncadrements',compact('encadrements'));
    }
    public function directeurShowEncadrement($id) {
        $encadrement= \App\Models\Encadrement::where('id',$id)->first();
        $encadrements_rendezvouss=\App\Models\Encadrements_rendezvous::where('encadrement_id',$encadrement->id)->get();
        $encadrements_fichiers=\App\Models\Encadrements_fichiers::where('encadrement_id',$encadrement->id)->get();
        $encadrements_taches=\App\Models\Encadrements_taches::where('encadrement_id',$encadrement->id)->get();
     return view('directeur.directeurShowEncadrement',compact('encadrement','encadrements_taches','encadrements_fichiers','encadrements_rendezvouss'));
    
    }
    ///////////////////chercheur
    public function chercheurShowEncadrements(){
        
       $encadrements= \App\Models\Encadrement::where('chercheur_id',Auth::user()->id)->get();
     return view('chercheur.chercheurShowEncadrements',compact('encadrements'));
    }
    public function chercheurShowEncadrement($id){
        
        $encadrement= \App\Models\Encadrement::where('id',$id)->First();
        $encadrements_rendezvouss=\App\Models\Encadrements_rendezvous::where('encadrement_id',$id)->get();
        $encadrements_fichiers=\App\Models\Encadrements_fichiers::where('encadrement_id',$id)->with('user')->get();
        $encadrements_taches=\App\Models\Encadrements_taches::where('encadrement_id',$id)->get();
        
       $etudiant=\App\Models\User::where('id',$encadrement->etudiante_id)->first();
        Session::put('encadrement_id',  $encadrement->id);
        Session::put( 'etudiante_id', $encadrement->etudiante_id);

    return view('chercheur.chercheurShowEncadrement',compact('encadrements_rendezvouss','etudiant','encadrements_fichiers','encadrements_taches','encadrement'));
    }
    public function chercheurDeleteEncadrement($id){
        
        $encadrement= \App\Models\Encadrement::where('id',$id)->First();
     
        
     
     return view('chercheur.chercheurDeleteEncadrement',compact('encadrement'));
    }
    public function chercheurDeleteEncadrementPost(Request $request){
      //supprimer l'encadrement
        $encadrement=\App\Models\Encadrement::where('id',$request->id)->first();
        $encadrement->delete();
        //supprimer la cahier des charges
        if(Storage::exists('cahiers des charges/'.$encadrement->cahier_charge))
              {
                 Storage::delete('cahiers des charges/'.$encadrement->cahier_charge);
              }
        //supprimer les rendez-vous d'un encadrement
        $encadrements_rendezvouss=\App\Models\Encadrements_rendezvous::where('encadrement_id',$request->id)->get();
        foreach($encadrements_rendezvouss as $encadrements_rendezvous){
          $encadrements_rendezvous->delete();
        }
       //supprimer les fichiers d'un encadrement
        $encadrements_fichiers=\App\Models\Encadrements_fichiers::where('encadrement_id',$request->id)->with('user')->get();
        foreach($encadrements_fichiers as $encadrements_fichier){
          $encadrements_fichier->delete();
        }
       //supprimer les taches d'un encadrement
        $encadrements_taches=\App\Models\Encadrements_taches::where('encadrement_id',$request->id)->get();
        foreach($encadrements_taches as $encadrements_tache){
          $encadrements_tache->delete();
        }
      

        return redirect()->route('chercheurShowEncadrements')->with('SuccessMessage','Encadrement Supprimé avec succès ');
        
    }
    public function chercheurAddEncadrement(){
        
       //afficher la liste d'utilisteur qui ont le role Chef de projet
       $users = DB::table('users')
       ->join('role_user', 'users.id', '=', 'role_user.user_id')
       ->join('roles', 'role_user.role_id', '=', 'roles.id')
       ->where('roles.name', 'Etudiante de recherche')
       ->select('users.*')
       ->get();

         return view('chercheur.chercheurAddEncadrement',compact('users'));
        } 
        
    
        public function chercheurAddEncadrementPost(Request $request)
        {  
           
           $Encadrement=new \App\Models\Encadrement();

           $Encadrement->type=$request->type;
             $Encadrement->etudiante_id=$request->etudiante_id;
             $Encadrement->chercheur_id=Auth::user()->id;
             $Encadrement->sujet=$request->sujet;
             $Encadrement->avancement=$request->avancement;
             $Encadrement->etat=$request->etat;
             $Encadrement->laboratoire_id=Session::get('laboratoire_id');
             if ($request->hasfile('cahier_charge'))
             {
                 //enregistrer le nouveau fichier
             
           
                 $file = $request['cahier_charge'];
                 $fileName =time().'.'.$file->getClientOriginalExtension();
                 $path = $file->storeAs('cahiers', $fileName);
                 $Encadrement->cahier_charge=$fileName;
             }
          
            
          
            $Encadrement->lien_meet=$request->lien_meet;
           $Encadrement->save();
          
            return redirect()->route('chercheurShowEncadrements')->with('SuccessMessage','Encadrement ajouté avec succès ');
        }

        public function chercheurEditEncadrement($id){
            $encadrement=\App\Models\Encadrement::where('id',$id)->first();
        
           //afficher la liste d'utilisteur qui ont le role Chef de projet
          $users = DB::table('users')
          ->join('role_user', 'users.id', '=', 'role_user.user_id')
          ->join('roles', 'role_user.role_id', '=', 'roles.id')
           ->where('roles.name', 'Etudiante de recherche')
          ->select('users.*')
          ->get();
    
             return view('chercheur.chercheurEditEncadrement',compact('users','encadrement'));
            } 
            
        
            public function chercheurEditEncadrementPost(Request $request)
            {  
               
               $Encadrement=\App\Models\Encadrement::where('id',$request->id)->first();
    
               $Encadrement->type=$request->type;
                 $Encadrement->etudiante_id=$request->etudiante_id;
                
               $Encadrement->sujet=$request->sujet;
               $Encadrement->avancement=$request->avancement;
             $Encadrement->etat=$request->etat;
             if ($request->hasfile('cahier_charge'))
             {

              if(Storage::exists('cahiers/'.$Encadrement->cahier_charge))
              {
                 Storage::delete('cahiers/'.$Encadrement->cahier_charge);
              }
              $file = $request['cahier_charge'];
              $fileName =time().'.'.$file->getClientOriginalExtension();
              $path = $file->storeAs('cahiers', $fileName);
              $Encadrement->cahier_charge=$fileName;
           }

           
             $Encadrement->lien_meet=$request->lien_meet;
               $Encadrement->update();
                return redirect()->route('chercheurShowEncadrements')->with('SuccessMessage','Encadrement modifié avec succès ');
            }
    //Encadrements rendez-vous
         public function  chercheurAddEncadrementrendezvous(){
        
          return view('chercheur.chercheurAddEncadrementrendezvous');
           
         }
         public function  chercheurAddEncadrementrendezvousPost(Request $request){
          $encadrements_rendezvous=new \App\Models\Encadrements_rendezvous();
          $encadrements_rendezvous->laboratoire_id=Session::get('laboratoire_id');
          $encadrements_rendezvous->encadrement_id= Session::get('encadrement_id');
          $encadrements_rendezvous->etat= $request->etat;
          $encadrements_rendezvous->discussion=date('Y-m-d H:i:s')." : ".\Auth::user()->nom.":". $request->discussion;
          $encadrements_rendezvous->datetime= $request->datetime;
          $encadrements_rendezvous->save();
          return redirect()->route('chercheurShowEncadrement',$encadrements_rendezvous->encadrement_id);
     
         }

         public function  chercheurEditEncadrementrendezvous($id){
          $encadrements_rendezvous=\App\Models\Encadrements_rendezvous::where('id',$id)->first();

         return view('chercheur.chercheurEditEncadrementrendezvous',compact('encadrements_rendezvous'));
           
         }
         public function  chercheurEditEncadrementrendezvousPost(Request $request){
          $encadrements_rendezvous=\App\Models\Encadrements_rendezvous::where('id',$request->id)->first();
          $encadrements_rendezvous->etat= $request->etat;
          $encadrements_rendezvous->discussion=date('Y-m-d H:i:s')." : ".\Auth::user()->nom.":". $request->discussion."<br/>".$encadrements_rendezvous->discussion;
          $encadrements_rendezvous->datetime= $request->datetime;
          $encadrements_rendezvous->update();
          

        
          return redirect()->route('chercheurShowEncadrement',$encadrements_rendezvous->encadrement_id);
      
      }
      public function chercheurDeleteEncadrementrendezvous($id){
        $encadrements_rendezvous=\App\Models\Encadrements_rendezvous::where('id',$id)->first();

        return view('chercheur.chercheurDeleteEncadrementrendezvous',compact('encadrements_rendezvous'));
      
      }
      public function chercheurDeleteEncadrementrendezvousPost(Request $request){
        $encadrements_rendezvous=\App\Models\Encadrements_rendezvous::where('id',$request->id)->first();
        $encadrements_rendezvous->delete();

        return redirect()->route('chercheurShowEncadrement',$encadrements_rendezvous->encadrement_id);
     
      }
//encadrements taches
      public function chercheurAddEncadrementtache(){
        return view('chercheur.chercheurAddEncadrementtache');
      
      }
      public function chercheurAddEncadrementtachePost(Request $request){
       
        $encadrements_taches=new \App\Models\Encadrements_taches();
        $encadrements_taches->etat= $request->etat;
        $encadrements_taches->encadrement_id= Session::get('encadrement_id');
        $encadrements_taches->laboratoire_id=Session::get('laboratoire_id');
        $encadrements_taches->discussion= date('Y-m-d H:i:s')." : ".\Auth::user()->nom.":".$request->discussion;
        $encadrements_taches->date_debut= $request->date_debut;
        $encadrements_taches->date_fin= $request->date_fin;
        $encadrements_taches->tache= $request->tache;
        $encadrements_taches->save();
        return redirect()->route('chercheurShowEncadrement',Session::get('encadrement_id'));
      
      }
      public function chercheurEditEncadrementtache($id){
        $encadrements_tache=\App\Models\Encadrements_taches::where('id',$id)->first();
        return view('chercheur.chercheurEditEncadrementtache',compact('encadrements_tache'));
      
      }
      public function chercheurEditEncadrementtachePost(Request $request){
       
        $encadrements_tache=\App\Models\Encadrements_taches::where('id',$request->id)->first();
        $encadrements_tache->etat= $request->etat;
       
        $encadrements_tache->discussion= date('Y-m-d H:i:s')." : ".\Auth::user()->nom.":". $request->discussion."<br/>".$encadrements_tache->discussion;
        $encadrements_tache->date_debut= $request->date_debut;
        $encadrements_tache->date_fin= $request->date_fin;
        $encadrements_tache->tache= $request->tache;
        $encadrements_tache->update();
        return redirect()->route('chercheurShowEncadrement',Session::get('encadrement_id'));
      
      }
      public function chercheurDeleteEncadrementtache($id){
        $encadrements_tache=\App\Models\Encadrements_taches::where('id',$id)->first();
        return view('chercheur.chercheurDeleteEncadrementtache',compact('encadrements_tache'));
      
      }
      public function chercheurDeleteEncadrementtachePost(Request $request){
       
        $encadrements_taches=\App\Models\Encadrements_taches::where('id',$request->id)->first();
       
        $encadrements_taches->delete();
        return redirect()->route('chercheurShowEncadrement',Session::get('encadrement_id'));
      
      }
///Encadrements fichiers
      public function chercheurAddEncadrementfichier(){
        return view('chercheur.chercheurAddEncadrementfichier');
     
      }
      public function chercheurAddEncadrementfichierPost(Request $request){
         $encadrements_fichier=new \App\Models\Encadrements_fichiers();
        $encadrements_fichier->titre= $request->titre;
        $encadrements_fichier->user_id=Auth::user()->id;
        $encadrements_fichier->laboratoire_id=Session::get('laboratoire_id');
        $encadrements_fichier->encadrement_id= Session::get('encadrement_id');
        $encadrements_fichier->discussion= date('Y-m-d H:i:s')." : ".\Auth::user()->nom.":".$request->discussion;
        $encadrements_fichier->datetime= $request->datetime;
        if ($request->hasfile('fichier'))
        {
            //enregistrer le nouveau fichier
        

            $file = $request['fichier'];
            $fileName =time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('fichiersencadrements', $fileName);
            $encadrements_fichier->fichier=$fileName;
        }
   
        
       
        $encadrements_fichier->save();
        return redirect()->route('chercheurShowEncadrement',Session::get('encadrement_id'));
     
      
      }
      public function chercheurEditEncadrementfichier($id){
        $encadrements_fichier=\App\Models\Encadrements_fichiers::where('id',$id)->first();
        
        return view('chercheur.chercheurEditEncadrementfichier',compact('encadrements_fichier'));
     
      }
      public function chercheurEditEncadrementfichierPost(Request $request){
        $encadrement=\App\Models\Encadrement::where('id', Session::get('encadrement_id'))->first();
        $encadrements_fichier= \App\Models\Encadrements_fichiers::where('id',$request->id)->first();
        $encadrements_fichier->titre= $request->titre;
     
        $encadrements_fichier->discussion= date('Y-m-d H:i:s')." : ".\Auth::user()->nom.":".$request->discussion."<br/>".$encadrements_fichier->discussion;
        $encadrements_fichier->datetime= $request->datetime;
        if ($request->hasfile('fichier'))
        {
          if(Storage::exists('fichiersencadrements/'.$encadrements_fichier->fichier))
          {
             Storage::delete('fichiersencadrements/'.$encadrements_fichier->fichier);
          }
         
          $file = $request['fichier'];
          $fileName =time().'.'.$file->getClientOriginalExtension();
          $path = $file->storeAs('fichiersencadrements', $fileName);
          $encadrements_fichier->fichier=$fileName;
        }
   
       
        $encadrements_fichier->update();
        return redirect()->route('chercheurShowEncadrement',Session::get('encadrement_id'));
     
      
      }
      public function chercheurDeleteEncadrementfichier($id){
        $encadrements_fichier=\App\Models\Encadrements_fichiers::where('id',$id)->first();
        
        return view('chercheur.chercheurDeleteEncadrementfichier',compact('encadrements_fichier'));
     
      }
      public function chercheurDeleteEncadrementfichierPost(Request $request){
        $encadrements_fichier=\App\Models\Encadrements_fichiers::where('id',$request->id)->first();
        if(Storage::exists('fichiersencadrements/'.$encadrements_fichier->fichier))
        {
           Storage::delete('fichiersencadrements/'.$encadrements_fichier->fichier);
        }
        
        $encadrements_fichier->delete();
        return redirect()->route('chercheurShowEncadrement',$encadrements_fichier->encadrement_id);
     
      }
      }
