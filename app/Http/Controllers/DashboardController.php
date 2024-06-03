<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
class DashboardController extends Controller
{
   
   public function index()
   {
       
      if (Auth::user()->actif=="non") 
         {
            Auth::guard('web')->logout();
             
            return redirect()->back()->with('ErrorMessage','Votre compte n\'est pas actif. Veuillez contactez l\'administrateur pour en savoir plus.');  
         }


      // Message admin aux utilisateurs
      $adminmessage=\App\Models\Adminmessage::where('etat','Diffusé')
                                       ->orderBy('datemessage','desc')
                                       ->whereDoesntHave('adminmessagesusers', function (Builder $query) {
                                                $query->where('user_id',\Auth::user()->id);
                                          })
                                       ->first();

     
      $notes=\App\Models\Note::where('visible','oui')->orderBy('date','desc')->get();
       //connaitre la laboratoire de user
      $user=\App\Models\Membre::where('user_id',Auth::user()->id)->first();
      Session::put('laboratoire_id',$user->laboratoire_id);

      $laboratoire=\App\Models\Laborataire::where('id',Session::get('laboratoire_id'))->first();
      if($laboratoire!=""){
         Session::put('nomlaboratoire',$laboratoire->nom);
         Session::put('logolaboratoire',$laboratoire->logo);
      }
    
      
      $contacts= \App\Models\Contact::where('laboratoire_id',Session::get('laboratoire_id'))->get();
      $projets= \App\Models\Projet::where('laboratoire_id',Session::get('laboratoire_id'))->get();;
      $encadrements= \App\Models\Encadrement::where('laboratoire_id',Session::get('laboratoire_id'))->get();;
      $users= \App\Models\User::all();
      $note= \App\Models\Note::all();
      $roles= \App\Models\Role::all();
      $equipements= \App\Models\Equipement::where('laboratoire_id',Session::get('laboratoire_id'))->get();;
      $publications= \App\Models\Publication::where('laboratoire_id',Session::get('laboratoire_id'))->get();;
    
     
      
        
    //technicien
         $contacttechniciens= \App\Models\Contact::where('type','probleme technique')->where('laboratoire_id',Session::get('laboratoire_id'))->get(); 
    
      
   
     
     $maintenances=\App\Models\Equipements_maintenance::where('laboratoire_id',Session::get('laboratoire_id'))->get();
      return view('dashbord',compact('adminmessage','encadrements','projets','publications',
      'roles','note','equipements','notes','contacts','maintenances','contacttechniciens','users'));
   }

   public function alerts($type)
   {
     
     $alerts=\App\Models\Alert::where('user_id',Auth::user()->id)
                                 ->where('typealert',$type)
                                 ->orderBy('date','desc')->get();

      return view('alerts.showAlerts',compact('alerts'));
   }

   public function goAlert($id)
   {
      $alert=\App\Models\Alert::where('id',$id)->where('user_id',Auth::user()->id)->first();
      $alert->etat="lu";
      $alert->save();

      if (($alert->typealert=="Contrats"))
         {
            if (\Auth::user()->hasRole(['access_Fiche_Subordonnes','rh','admin']))
               return redirect()->route($alert->alert_route,[$alert->element_id]);
            else
               return redirect()->route($alert->alert_route);
         }
      else
         return redirect()->route($alert->alert_route);
   
   }

   public function delete_alert($id)
   {
      $alert=\App\Models\Alert::where('id',$id)->where('user_id',\Auth::user()->id)->first();
      if (!isset($alert))
         return redirect()->back()->with('ErrorMessage',"Vous n'avez pas le droit de supprimer cette alerte !");

      $alert->delete();
      return redirect()->route('alerts',$alert->typealert);
   }


   public function profile()
   {
      $user=\Auth::user();
       return view('profile',compact('user'));
    }

  
   public function profilePost(Request $request)
   {
      
      $user=\Auth::user();
      
     if (\Hash::check($request->passwordActuel, $user->password) and $request->passwordNew1==$request->passwordNew2)
         {
                  $user->password=\Hash::make($request->passwordNew1);
                  $user->update();
                  return redirect()->route('dashboard')->with(['SuccessMessage'=>'Votre profile a été mis à jour.']);
         }
      else
      {
             return redirect()->route('profile')->with(['ErrorMessage'=>'Veuillez vérifier vos données !']);
      }
     
   }
  public function photoprofilePost (Request $request){
//supprimer le photo de profil a partir de bd s'il est existe 
   $photo=\App\Models\Gallerie::where('entite_id',Auth::user()->id)->where('type','photo profile')->first();
   if($photo){
      if (File::exists('photos/'.$photo->description))
        {
            File::delete('photos/'.$photo->description);
        }
   
      $photo->delete();
   }
   //ajouter un photo de profil
   $photo= new \App\Models\Gallerie();
    $photo->type='photo profile';
    $photo->laboratoire_id=Session::get('laboratoire_id');
    $photo->entite_id=Auth::user()->id;
   if ($request->hasfile('description'))
        {
            //enregistrer le nouveau fichier
            $file=$request->file('description');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('photos/', $filename);
            $photo->description=$filename;
        }
   
      $photo->save();

   return redirect()->route('dashboard')->with('SuccessMessage','Photo de profil est modifié avec succès ');
    
      }
}
