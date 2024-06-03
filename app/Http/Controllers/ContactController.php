<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
class ContactController extends Controller
{
   ///directeur
   public function directeurShowContacts(){
    $contacts= \App\Models\Contact::where('laboratoire_id',Session::get('laboratoire_id'))->get();
      return view('directeur.directeurShowContacts',compact('contacts'));
   }
   public function directeurShowContact($id){
      $contact= \App\Models\Contact::where('id',$id)->first();
        return view('directeur.directeurShowContact',compact('contact'));
     } 
   public function directeurEditContact($id){
      $contact= \App\Models\Contact::where('id',$id)->first();

      return view('directeur.directeurEditContact',compact('contact'));
   } 
   public function directeurEditContactPost(Request $request){
      $contact= \App\Models\Contact::where('id',$request->id)->first();

      $contact->type=$request->type;
     
      $contact->dateheure_demande=$request->dateheure_demande;
      $contact->dateheure_reponse=$request->dateheure_reponse;
      $contact->type=$request->type;
      $contact->etat=$request->etat;
      $contact->demande=$request->demande;
      $contact->reponse=$request->reponse;
        $contact->user_id=Auth::user()->id;
      $contact->update();
       return redirect()->route('directeurShowContacts');
   
   } 
   public function directeurDeleteContact($id){
      $contact= \App\Models\Contact::where('id',$id)->first();

      return view('directeur.directeurDeleteContact',compact('contact'));
   } 
   public function directeurDeleteContactPost(Request $request){
      $contact= \App\Models\Contact::where('id',$request->id)->first();
      $contact->delete();
      return redirect()->route('directeurShowContacts');
   } 
   ////////////////chercheur
   public function chercheurShowContacts(){
      $contacts= \App\Models\Contact::where('user_id',Auth::user()->id)->get();
      return view('chercheur.chercheurShowContacts',compact('contacts')); 
   }
   public function chercheurShowContact($id){
      $contact= \App\Models\Contact::where('id',$id)->first();
      return view('chercheur.chercheurShowContact',compact('contact')); 
   }
   public function chercheurEditContact($id){
      $contact= \App\Models\Contact::where('id',$id)->first();

      return view('chercheur.chercheurEditContact',compact('contact'));
   } 
   public function chercheurEditContactPost(Request $request){
      $contact= \App\Models\Contact::where('id',$request->id)->first();

      $contact->type=$request->type;
      
      

      $contact->demande=$request->demande;
 
      $contact->user_id=Auth::user()->id;
      $contact->update();
       return redirect()->route('chercheurShowContacts')->with('SuccessMessage','Contact modifié avec succès ');
   
   } 
   public function chercheurDeleteContact($id){
      $contact= \App\Models\Contact::where('id',$id)->first();

      return view('chercheur.chercheurDeleteContact',compact('contact'));
   } 
   public function chercheurDeleteContactPost(Request $request){
      $contact= \App\Models\Contact::where('id',$request->id)->first();
      $contact->delete();
      return redirect()->route('chercheurShowContacts')->with('SuccessMessage','Contact supprimé avec succès ');
   } 
   public function chercheurAddContact(){
     
      return view('chercheur.chercheurAddContact');
   } 
   public function chercheurAddContactPost(Request $request){
    $contact=new \App\Models\Contact();

    $contact->type=$request->type;
 
    
   
  
    $contact->demande=$request->demande;
   
    $contact->laboratoire_id=Session::get('laboratoire_id');
      $contact->user_id=Auth::user()->id;
    $contact->save();
    return redirect()->route('chercheurShowContacts')->with('SuccessMessage','Contact ajouté avec succès ');
 
 } 
   ///////////////////technicien
   public function technicienShowContacts(){

      
      $contacts= \App\Models\Contact::where('type','probleme technique')->with('user')->where('laboratoire_id',Session::get('laboratoire_id'))->get();
        return view('technicien.technicienShowContacts',compact('contacts'));
     }
    
     public function technicienShowContact($id){
      $contact= \App\Models\Contact::where('id',$id)->with('user')->first();
        return view('technicien.technicienShowContact',compact('contact'));
     } 
     public function technicienShowMesContacts(){

      
      $contacts= \App\Models\Contact::where('user_id',Auth::user()->id)->where('laboratoire_id',Session::get('laboratoire_id'))->get();
        return view('technicien.technicienShowMesContacts',compact('contacts'));
     }
     public function technicienAddContact(){
     
        return view('technicien.technicienAddContact');
     } 
     public function technicienAddContactPost(Request $request){
      $contact=new \App\Models\Contact();

      $contact->type=$request->type;
     
      $contact->laboratoire_id=Session::get('laboratoire_id');
     
      $contact->demande=$request->demande;
     
        $contact->user_id=Auth::user()->id;
      $contact->save();
      return redirect()->route('technicienShowMesContacts')->with('SuccessMessage','Contact envoyé avec succès ');
   
   } 
   public function technicienEditContact($id){
      $contact= \App\Models\Contact::where('id',$id)->first();

      return view('technicien.technicienEditContact',compact('contact'));
   } 
   public function technicienEditMesContact($id){
      $contact= \App\Models\Contact::where('id',$id)->first();

      return view('technicien.technicienEditMesContact',compact('contact'));
   } 
   public function technicienEditContactPost(Request $request){
      $contact= \App\Models\Contact::where('id',$request->id)->first();

      
      
     
      $contact->dateheure_reponse=$request->dateheure_reponse;

      $contact->etat=$request->etat;
      $contact->reponse=$request->reponse;
  
        $contact->user_id=Auth::user()->id;
      $contact->update();
       return redirect()->route('technicienShowContacts')->with('SuccessMessage','Contact modifié avec succès ');
   
   } 
   public function technicienEditMesContactPost(Request $request){
      $contact= \App\Models\Contact::where('id',$request->id)->first();

      
      
     
      $contact->type=$request->type;

      $contact->demande=$request->demande;
     
  
      $contact->update();
       return redirect()->route('technicienShowMesContacts')->with('SuccessMessage','Contact modifié avec succès ');
   
   } 
   public function technicienDeleteContact($id){
      $contact= \App\Models\Contact::where('id',$id)->first();

      return view('technicien.technicienDeleteContact',compact('contact'));
   } 
   public function technicienDeleteContactPost(Request $request){
      $contact= \App\Models\Contact::where('id',$request->id)->first();
      $contact->delete();
      return redirect()->route('technicienShowContacts')->with('SuccessMessage','Contact supprimé avec succès ');
   } 
   public function technicienDeleteMesContact($id){
      $contact= \App\Models\Contact::where('id',$id)->first();

      return view('technicien.technicienDeleteMesContact',compact('contact'));
   } 
   public function technicienDeleteMesContactPost(Request $request){
      $contact= \App\Models\Contact::where('id',$request->id)->first();
      $contact->delete();
      return redirect()->route('technicienShowMesContacts')->with('SuccessMessage','Contact supprimé avec succès ');
   } 
   ///etudiant de recherche
   public function etudiantShowContacts(){
      $contacts= \App\Models\Contact::where('user_id',Auth::user()->id)->get();
        return view('etudiant.etudiantShowContacts',compact('contacts'));
     }
     public function etudiantShowContact($id){
      $contact= \App\Models\Contact::where('id',$id)->first();
        return view('etudiant.etudiantShowContact',compact('contact'));
     }

   public function etudiantAddContact(){

return view('etudiant.etudiantAddContact');
   }
   public function etudiantAddContactPost(Request $request){
      $contact=new \App\Models\Contact();

      $contact->type=$request->type;
     
     
     
      $contact->demande=$request->demande;
     
        $contact->user_id=Auth::user()->id;
      $contact->save();
      return redirect()->route('etudiantShowContacts')->with('SuccessMessage','Contact envoyé avec succès ');
    
   }
   public function etudiantEditContact($id){
      $contact= \App\Models\Contact::where('id',$id)->first();
      
      return view('etudiant.etudiantEditContact',compact('contact'));
    
   }
   public function etudiantEditContactPost(Request $request){
      $contact=\App\Models\Contact::where('id',$request->id)->first();

      $contact->type=$request->type;
     
     
     
      $contact->demande=$request->demande;
     
       
      $contact->update();
      return redirect()->route('etudiantShowContacts')->with('SuccessMessage','Contact modifié avec succès ');
    
   }
   public function etudiantDeleteContact($id){
      $contact= \App\Models\Contact::where('id',$id)->first();
      
      return view('etudiant.etudiantDeleteContact',compact('contact'));
    
   }
   public function etudiantDeleteContactPost(Request $request){
      $contact= \App\Models\Contact::where('id',$request->id)->first();
      $contact->delete();
      return redirect()->route('etudiantShowContacts')->with('SuccessMessage','Contact supprimé avec succès ');
    
   }
   

}
