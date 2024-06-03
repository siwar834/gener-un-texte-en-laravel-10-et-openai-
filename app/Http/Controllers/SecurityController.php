<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;



class SecurityController extends Controller
{
    

    public function test()
    {
        
        
        
        dd('-- End of test --');
    }

 public function adminEditSecurite($id)
    {
        $securite=\App\Models\Securite::where('id',$id)->first();
        return view('admin.adminEditSecurite',compact('securite'));
    }

    public function adminEditSecuritePost(Request $request)
    {
        $securite=\App\Models\Securite::where('id',$request->id)->first();
        $securite->commentaire=\Carbon\Carbon::now()." :<b> ".\Auth::user()->name." </b>: ".$request->commentaire."<br/>".$securite->commentaire;
        $securite->etat=$request->etat;
        $securite->update();

        return redirect()->route('adminShowSecurites');
    }

    

    public function adminShowSecurites(Request $request)
    {
        $securites=\App\Models\Securite::all();
        return view('admin.adminShowSecurites',compact('securites'));
    }

    
 public function directeurEditSecurite($id)
 {
     $securite=\App\Models\Securite::where('id',$id)->first();
     return view('directeur.directeurEditSecurite',compact('securite'));
 }

 public function directeurEditSecuritePost(Request $request)
 {
     $securite=\App\Models\Securite::where('id',$request->id)->first();
     $securite->commentaire=\Carbon\Carbon::now()." :<b> ".\Auth::user()->name." </b>: ".$request->commentaire."<br/>".$securite->commentaire;
     $securite->etat=$request->etat;
     $securite->update();

     return redirect()->route('directeurShowSecurites');
 }

 

 public function directeurShowSecurites(Request $request)
 {
     $securites=\App\Models\Securite::all();
     return view('directeur.directeurShowSecurites',compact('securites'));
 }

}
