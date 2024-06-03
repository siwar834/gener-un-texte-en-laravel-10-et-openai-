<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class EquipementController extends Controller
{
    //--------------------------------------directeur------------------------------------------------------
    public function directeurShowEquipements(){
        //afficher tout les equipement
       $equipements= \App\Models\Equipement::where('laboratoire_id',Session::get('laboratoire_id'))->get();
       return view('directeur.directeurShowEquipements')->with('equipements', $equipements);
      }
      public function directeurShowEquipement($id){
          //afficher les details d'un équipement
          $equipement=\App\Models\Equipement::where('id',$id)->first();
          //affiche la liste de maintenance pour cet equipement
          $maintenances=\App\Models\Equipements_maintenance::where('equipement_id',$id)->get();
          return view('directeur.directeurShowEquipement',compact('equipement','maintenances'));
      }
      public function directeurAddEquipement(){
        return view('directeur.directeurAddEquipement');
       }
       public function directeurAddEquipementPost(Request $request){
        $Equipement= \App\Models\Equipement::where('nom',$request->nom)->where('laboratoire_id',Session::get('laboratoire_id'))->first();
        if($Equipement){
            return redirect()->route('directeurShowEquipements')->with('InfoMessage','Equipement est déja existe');  
           
        }
           else{

           
        //ajouter un nouveau équipement
           $equipement= new \App\Models\Equipement();
           $equipement->laboratoire_id=Session::get('laboratoire_id');
           $equipement->nom=$request->nom;
           $equipement->description=$request->description;
           $equipement->disponibilite=$request->disponibilite;
           $equipement->date_achat=$request->date_achat;
          
           $equipement->save();
           return redirect()->route('directeurShowEquipements')->with('SuccessMessage','Equipement ajouté avec succès ');  
           }
        }
        public function directeurEditEquipement($id){
            $equipement=\App\Models\Equipement::where('id',$id)->first();
        
           return view('directeur.directeurEditEquipement',compact('equipement'));
            
        }
    
    
        public function directeurDeleteEquipement($id){
            $equipement=\App\Models\Equipement::where('id',$id)->first();
        
            return view('directeur.directeurDeleteEquipement',compact('equipement'));
              
        }
        public function directeurEditEquipementPost(Request $request){
            $equipement=\App\Models\Equipement::where('id',$request->id)->first();
            $equipement->nom=$request->nom;
            $equipement->description=$request->description;
            $equipement->disponibilite=$request->disponibilite;
            $equipement->date_achat=$request->date_achat;
            $equipement->update();
    
    
            return redirect()->route('directeurShowEquipements')->with('SuccessMessage','Equipement modifié avec succès ');
            
    
        }
    
        
        public function directeurDeleteEquipementPost(Request $request){
            $equipement=\App\Models\Equipement::where('id',$request->id)->first();
            $equipement->delete();
    
            return redirect()->route('directeurShowEquipements')->with('SuccessMessage','Equipement supprimé avec succès ');
            
        }
      //-----------------------------technicien----------------------------------------------------------
    public function technicienShowEquipements(){
      //afficher tout les equipement
      $equipements= \App\Models\Equipement::where('laboratoire_id',Session::get('laboratoire_id'))->get();
    return view('technicien.technicienShowEquipements')->with('equipements', $equipements);
    }
    public function technicienShowEquipement($id){
        //afficher les details d'un équipement
        $equipement=\App\Models\Equipement::where('id',$id)->first();
        //affiche la liste de maintenance pour cet equipement
        $maintenances=\App\Models\Equipements_maintenance::where('equipement_id',$id)->get();
        return view('technicien.technicienShowEquipement',compact('equipement','maintenances'));
    }
    public function technicienAddEquipement(){
     return view('technicien.technicienAddEquipement');
    }
    public function technicienAddEquipementPost(Request $request){
        $equipement=\App\Models\Equipement::where('nom',$request->nom)->where('laboratoire_id',Session::get('laboratoire_id'))->first();
       if($equipement){
        return redirect()->route('technicienShowEquipements')->with('SuccessMessage','Equipement est déja existe');  
        
       }else{

       
        //ajouter un nouveau équipement
        $equipement= new \App\Models\Equipement();
        $equipement->nom=$request->nom;
        $equipement->laboratoire_id=Session::get('laboratoire_id');
        $equipement->description=$request->description;
        $equipement->disponibilite=$request->disponibilite;
        $equipement->date_achat=$request->date_achat;
    
        $equipement->save();
        return redirect()->route('technicienShowEquipements')->with('SuccessMessage','Equipement ajouté avec succès ');  
         }
}
    public function technicienEditEquipement($id){
        $equipement=\App\Models\Equipement::where('id',$id)->first();
    
       return view('technicien.technicienEditEquipement',compact('equipement'));
        
    }
    public function technicienEditEquipementPost(Request $request){
        $equipement=\App\Models\Equipement::where('id',$request->id)->first();
        $equipement->nom=$request->nom;
        $equipement->description=$request->description;
        $equipement->disponibilite=$request->disponibilite;
        $equipement->date_achat=$request->date_achat;
        $equipement->update();


        return redirect()->route('technicienShowEquipements')->with('SuccessMessage','Equipement modifié avec succès ');
        

    }

    public function technicienDeleteEquipement($id){
        $equipement=\App\Models\Equipement::where('id',$id)->first();
    
        return view('technicien.technicienDeleteEquipement',compact('equipement'));
          
    }
   

    
    public function technicienDeleteEquipementPost(Request $request){
        $equipement=\App\Models\Equipement::where('id',$request->id)->first();
        $equipement->delete();
        $maintenances=\App\Models\Equipements_maintenance::where('equipement_id',$request->id)->get();
        foreach($maintenances as $maintenance){
            $maintenance=\App\Models\Equipements_maintenance::where('equipement_id',$request->id)->first();
            $maintenance->delete();
        }
        
        return redirect()->route('technicienShowEquipements')->with('SuccessMessage','Equipement supprimé avec succès ');
        
    }
}
