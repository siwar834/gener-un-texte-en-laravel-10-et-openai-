<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use File;
use Auth;
class LaborataireController extends Controller
{
    public function adminShowLaborataires(){
        $laborataires= \App\Models\Laborataire::all();
        $directeurs=array();
        foreach($laborataires as $laborataire){
            $user= \App\Models\User::where('id',$laborataire->directeur_id)->first();
            if($user) {
                $directeurs[]=$user;
            }
        }

        return view('admin.adminShowLaborataires',compact('laborataires','directeurs'));
    }
    public function adminShowLaborataire($id){
       
        $laborataire= \App\Models\Laborataire::where('id',$id)->first();
        $membres= \App\Models\Membre::where('laboratoire_id',$id)->with('user')->get();
        Session::put('laborataire',$laborataire->id);
       
        return view('admin.adminShowLaborataire',compact('laborataire','membres'));
    }
    public function directeurShowLaborataire(){
       
      $laborataire= \App\Models\Laborataire::where('directeur_id',Auth::user()->id)->first();
      $membres= \App\Models\Membre::where('laboratoire_id',$laborataire->id)->with('user')->get();
      Session::put('laborataire',$laborataire->id);
     
      return view('directeur.directeurShowLaborataire',compact('laborataire','membres'));
  }
     public function directeurAddMembre(){
        $users=\App\Models\User::all();
        return view('directeur.directeurAddMembre',compact('users'));    
     }
     public function directeurAddMembrePost(Request $request){
        $membre= new \App\Models\Membre();
        $membre->laboratoire_id=Session::get('laborataire'); 
        $membre->user_id=$request->user_id;
        $membre->domainederecherche=$request->domainederecherche;
        $membre->fonction=$request->fonction;
        $membre->grade=$request->grade;
        $membre->biographique=$request->biographique;
        $membre->save(); 
        return redirect()->route('directeurShowLaborataire',Session::get('laborataire'))->with('SuccessMessage','Membre est ajouté avec success ');
   
     }
     public function directeurEditMembre($id){
        $users=\App\Models\User::all();
        $membre=\App\Models\Membre::where('id',$id)->first();
        return view('directeur.directeurEditMembre',compact('users','membre'));    
     }
     public function directeurEditMembrePost(Request $request ){
        
        $membre=\App\Models\Membre::where('id',$request->id)->first();
        $membre->laboratoire_id=Session::get('laborataire'); 
        $membre->user_id=$request->user_id;
        $membre->domainederecherche=$request->domainederecherche;
        $membre->fonction=$request->fonction;
        $membre->grade=$request->grade;
        $membre->biographique=$request->biographique;
        $membre->update(); 
        return redirect()->route('directeurShowlaborataire');    
     }
     public function directeurDeleteMembre($id){
       
        $membre=\App\Models\Membre::where('id',$id)->first();
        return view('directeur.directeurDeleteMembre',compact('membre'));    
     }
     public function directeurDeleteMembrePost(Request $request){
       
        $membre=\App\Models\Membre::where('id',$request->id)->first();
        $membre->delete();
        return redirect()->route('directeurShowlaborataire');    
       }
    public function adminAddLaborataire(){
        $directeurs = DB::table('users')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->where('roles.name', 'directeur')
        ->select('users.*')
        ->get();
        return view('admin.adminAddLaborataire',compact('directeurs'));
    }
    public function adminAddLaboratairePost(Request $request){
        $laborataire= new \App\Models\Laborataire();
        $laborataire->directeur_id=$request->directeur_id;
        $laborataire->nom=$request->nom;
        $laborataire->description=$request->description;
        if ($request->hasfile('logo'))
        {
            //enregistrer le nouveau fichier
          
           $file=$request->file('logo');
           $ext=$file->getClientOriginalExtension();
           $filename=time().'.'.$ext;
           $file->move('logos/', $filename);
           $laborataire->logo=$filename;
        }


        $laborataire->save();
       return redirect()->route('adminShowLaborataires')->with('SuccessMessage','Laborataire est ajouté avec success ');
    }
    public function directeurEditLaborataire($id){
        $directeurs = DB::table('users')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->where('roles.name', 'directeur')
        ->select('users.*')
        ->get();
        $laborataire= \App\Models\Laborataire::where('id',$id)->first();
        return view('directeur.directeurEditLaborataire',compact('laborataire','directeurs'));
    }

    public function directeurEditLaboratairePost(Request $request){
       
        $laborataire= \App\Models\Laborataire::where('id',$request->id)->first();  
        
    
        $laborataire->description=$request->description;

       
        if ($request->hasfile('logo'))
        {
           
                if (File::exists('logos/'.$laborataire->logo))
                  {
                      File::delete('logos/'.$laborataire->logo);
                  }
             
            

               
           
            //enregistrer le nouveau fichier
          
           $file=$request->file('logo');
           $ext=$file->getClientOriginalExtension();
           $filename=time().'.'.$ext;
           $file->move('logos/', $filename);
           $laborataire->logo=$filename;
               }
        


        $laborataire->save();
       return redirect()->route('directeurShowlaborataire')->with('SuccessMessage','Laborataire est modifié avec success ');
    


    }
    public function adminEditLaborataire($id){
        $directeurs = DB::table('users')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->where('roles.name', 'directeur')
        ->select('users.*')
        ->get();
        $laborataire= \App\Models\Laborataire::where('id',$id)->first();
        return view('admin.adminEditLaborataire',compact('laborataire','directeurs'));
    }

    public function adminEditLaboratairePost(Request $request){
       
        $laborataire= \App\Models\Laborataire::where('id',$request->id)->first();  
        
    
        $laborataire->description=$request->description;

       
        if ($request->hasfile('logo'))
        {
           
                if (File::exists('logos/'.$laborataire->logo))
                  {
                      File::delete('logos/'.$laborataire->logo);
                  }
             
            

               
           
            //enregistrer le nouveau fichier
          
           $file=$request->file('logo');
           $ext=$file->getClientOriginalExtension();
           $filename=time().'.'.$ext;
           $file->move('logos/', $filename);
           $laborataire->logo=$filename;
               }
        


        $laborataire->save();
       return redirect()->route('adminShowLaborataires')->with('SuccessMessage','Laborataire est modifié avec success ');
    


    }
}
