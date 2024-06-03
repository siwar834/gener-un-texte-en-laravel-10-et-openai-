<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class FondController extends Controller
{
    public function directeurShowFonds(){
     $fonds= \App\Models\Fond::where('laboratoire_id',Session::get('laboratoire_id'))->get();
     return view('directeur.directeurShowFonds')->with('fonds',$fonds);
    }
    public function directeurShowFond($id){
    $Fond= \App\Models\Fond::where('id',$id)->first();
    $depensefonds= \App\Models\Fonds_depense::where('fond_id',$id)->get();
     Session::put('fond_id',$Fond->id);
     return view('directeur.directeurShowFond',compact('Fond', 'depensefonds'));
    }
    public function directeurAddFond(){  
     return view('directeur.directeurAddFond');
    } 
    public function directeurAddFondPost(Request $request){  
        $fond=\App\Models\Fond::where('nom',$request->nom)->first();
        if($fond){
            return redirect()->route('directeurShowFonds')->with('InfoMessage','Fond est déja  existe ');
        }
        else{
        $Fond= new \App\Models\Fond();
        $Fond-> nom=$request->nom;
        $Fond-> laboratoire_id=Session::get('laboratoire_id');
        $Fond->description=$request->description;
        $Fond->reste=$request->montant_debut;
        $Fond-> montant_debut=$request->montant_debut;
        $Fond-> statut=$request->statut;
        $Fond-> save();
        
         }
         return redirect()->route('directeurShowFonds')->with('SuccessMessage','Fond est ajouté avec success ');
       
    }

    public function directeurEditFond($id){   
        $Fond=\App\Models\Fond::where('id',$id)->first();
        return view('directeur.directeurEditFond',compact('Fond'));
    }
    public function directeurEditFondPost(Request $request){   
        $Fond=\App\Models\Fond::where('id',$request->id)->first();
        $Fond-> nom=$request->nom;
        $Fond->description=$request->description;
       
        $Fond-> montant_debut=$request->montant_debut;
        $Fond-> statut=$request->statut;
        $Fond->update();
        return redirect()->route('directeurShowFonds')->with('SuccessMessage','Fond est modifié avec success '); 
    }
    public function directeurDeleteFond( $id){   
        $Fond=\App\Models\Fond::where('id',$id)->first();
        return view('directeur.directeurDeleteFond',compact('Fond'));
    }
    public function directeurDeleteFondPost(Request $request) {   
        $Fond=\App\Models\Fond::where('id',$request->id)->first();
        $Fond->delete();
        return redirect()->route('directeurShowFonds')->with('SuccessMessage','Fond est supprimé avec success ');
    }

    //depensefond
    public function directeurAddDepenseFond(){
       return view('directeur.directeurAddDepenseFond');

    }
    public function directeurAddDepenseFondPost(Request $request){
      $depensefond= new \App\Models\Fonds_depense();  
        $depensefond-> nom=$request->nom;
        $depensefond->laboratoire_id=Session::get('laboratoire_id');
        $depensefond->fond_id=Session::get('fond_id');
        $depensefond->description=$request->description;
        $depensefond->montant=$request->montant;
        $depensefond-> save();


        $Fond=\App\Models\Fond::where('id',Session::get('fond_id'))->first();
         $Fond->reste=($Fond->montant_debut-$request->montant);
         $Fond->update();
        return redirect()->route('directeurShowFond',Session::get('fond_id'))->with('SuccessMessage','Depense fond est ajouté avec success ');
   

    }
    public function directeurEditDepenseFond($id){
        $depensefond=\App\Models\Fonds_depense::where('id',$id)->first();
        return view('directeur.directeurEditDepenseFond',compact('depensefond'));
 
     }
     public function directeurEditDepenseFondPost(Request $request){
        $depensefond=\App\Models\Fonds_depense::where('id',$request->id)->first();
       
        $depensefond-> nom=$request->nom;
    
        $depensefond->description=$request->description;
        $depensefond->montant=$request->montant;
        $depensefond->update();

        $Fond=\App\Models\Fond::where('id',Session::get('fond_id'))->first();
        $Fond->reste=($Fond->montant_debut-$request->montant);
        $Fond->update();
        return redirect()->route('directeurShowFond',Session::get('fond_id'))->with('SuccessMessage','Depense fond est modifié avec success ');
   
     }
     
    public function directeurDeleteDepenseFond($id){
        $depensefond=\App\Models\Fonds_depense::where('id',$id)->first();
        return view('directeur.directeurDeleteDepenseFond',compact('depensefond'));
    }
    public function directeurDeleteDepenseFondPost(Request $request){
        $depensefond=\App\Models\Fonds_depense::where('id',$request->id)->first();
        $depensefond->delete();
        return redirect()->route('directeurShowFond',Session::get('fond_id'))->with('SuccessMessage','Depense fond est supprimé avec success ');
    }
}
