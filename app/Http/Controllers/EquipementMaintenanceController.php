<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
class EquipementMaintenanceController extends Controller
{
    //afficher des toutes les maintenances
    public function technicienShowMaintenances(){
     $maintenances= \App\Models\Equipements_maintenance::with('equipement')->where('laboratoire_id',Session::get('laboratoire_id'))->get();
     return view('technicien.technicienShowMaintenances')->with('maintenances', $maintenances);
     }
     //affiche un maintenance
    public function technicienShowMaintenance($id){
     $maintenance=\App\Models\Equipements_maintenance::where('id',$id)->with('equipement')->first();
     return view('technicien.technicienShowMaintenance',compact('maintenance'));
    }
    //afficher la formulaire d'ajouter une maintenance
    public function technicienAddMaintenance(){
     $equipements= \App\Models\Equipement::where('laboratoire_id',Session::get('laboratoire_id'))->get();
     return view('technicien.technicienAddMaintenance',compact('equipements'));
    }
    //enregistre une maintenance
    public function technicienAddMaintenancePost(Request $request){
        //ajouter une maintenance
        $maintenance= new \App\Models\Equipements_maintenance();
        $maintenance->equipement_id=$request->equipement_id;
        $maintenance->laboratoire_id=Session::get('laboratoire_id');
        $maintenance->technicien_id=Auth::user()->id;
        $maintenance->description=$request->description;
        $maintenance->montant=$request->montant;
        $maintenance->date=$request->date;
        $maintenance->save();
        return redirect()->route('technicienShowMaintenances')->with('SuccessMessage','Maintenance ajouté avec succès ');
    }
     //afficher la formulaire de modifier une maintenance
    public function technicienEditMaintenance($id){
        $equipements= \App\Models\Equipement::where('laboratoire_id',Session::get('laboratoire_id'))->get();
        $maintenance=\App\Models\Equipements_maintenance::where('id',$id)->first();
     return view('technicien.technicienEditMaintenance',compact('maintenance','equipements'));
    }
    //enregistre les modifications d'une maintenance
    public function technicienEditMaintenancePost(Request $request){
        $maintenance=\App\Models\Equipements_maintenance::where('id',$request->id)->first();
        $maintenance->equipement_id=$request->equipement_id;
        $maintenance->description=$request->description;
        $maintenance->montant=$request->montant;
        $maintenance->date=$request->date;
        $maintenance->update();
     return redirect()->route('technicienShowMaintenances')->with('SuccessMessage','Maintenance modifié avec succès ');
    }
    // //afficher la formulaire de supprimer une maintenance
    public function technicienDeleteMaintenance($id){
        $maintenance=\App\Models\Equipements_maintenance::where('id',$id)->first();
        return view('technicien.technicienDeleteMaintenance',compact('maintenance'));
    }
//supprimer une maintenance
    public function technicienDeleteMaintenancePost(Request $request){
        $maintenance=\App\Models\Equipements_maintenance::where('id',$request->id)->first();
        $maintenance->delete();
      return redirect()->route('technicienShowMaintenances')->with('SuccessMessage','Maintenance supprimé avec succès ');
    }
}
