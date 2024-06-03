<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
class MessageController extends Controller
{
    //technicien
    public function technicienShowMessages(){
        $messages = \App\Models\Message::where(function($query) {
            $query->where('emetteur', Auth::user()->id)
                  ->orWhere('recepteur', Auth::user()->id);
        })->get();

       $users=[];
      
       foreach($messages as $message){
        $user=\App\Models\User::where('id',$message->emetteur)->orWhere('id',$message->recepteur)->get();
        
        if ($user) {
         
            $users[] = $user;
         }
       
       

       }
  
      return view('technicien.technicienShowMessages',compact('messages'));
    }
    public function technicienAddMessage(){
        $recepteurs=\App\Models\Membre::where('laboratoire_id',Session::get('laboratoire_id'))->with('user')->get();
        return view('technicien.technicienAddMessage',compact('recepteurs')); 
    }
    public function technicienAddMessagePost(Request $request){
        $message=new \App\Models\Message();
        $message->emetteur=Auth::user()->id;
        
        $message->message=$request->message;
        $message->recepteur=$request->recepteur;
        $message->etat="non lu";
        $message->date=$request->date;
        $message->save();
        return redirect()->route('technicienShowMessages')->with('SuccessMessage','Message est ajouté avec success ');
      
    }
//chercheur
    public function chercheurShowMessages(){
    return view('chercheur.chercheurShowMessages');
    }
    public function chercheurAddMessage(){
        $recepteurs=\App\Models\Membre::where('laboratoire_id',Session::get('laboratoire_id'))->with('user')->get();
       
        return view('chercheur.chercheurAddMessage',compact('recepteurs'));  
    }
    public function chercheurAddMessagePost(Request $request){
        $message=new \App\Models\Message();
        $message->emetteur=Auth::user()->id;
        
        $message->message=$request->message;
        $message->recepteur=$request->recepteur;
        $message->etat="non lu";
        $message->date=$request->date;
        $message->save();
        return redirect()->route('chercheurShowMessages')->with('SuccessMessage','Message est ajouté avec success ');
        
    }
//directeur
public function directeurShowMessages(){
   

  return view('directeur.directeurShowMessages');
}
}
