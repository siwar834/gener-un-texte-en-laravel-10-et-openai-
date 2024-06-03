<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Log;
class FrontController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    
    public function publications()
    {
        

         $publications = \App\Models\Publication::with('auteur')->get();
       
          $auteurs = [];
          foreach ($publications as $publication) {
           $auteur=\App\Models\User::where('id',$publication->auteur)->first();
            // Check if the auteur of the publication is already in the auteurs array
          if (!array_key_exists($auteur->id, $auteurs)) {
           $auteurs[$auteur->id] = $auteur;
           }
          }
          
        


         $photos = [];
         foreach ($publications as $publication) {
          $photo=\App\Models\Gallerie::where('entite_id',$publication->id)->where('type','photo d\'une publication')->first();
           // Check if the auteur of the publication is already in the auteurs array
         if ($photo) {
          $photos[] = $photo;
          }
         }

         $photoprofiles = [];
         foreach ($publications as $publication) {
          $photoprofile=\App\Models\Gallerie::where('entite_id',$publication->auteur)->where('type','photo profile')->first();
         
         
        
          if (!array_key_exists($photoprofile->id, $photoprofiles)) {
         
            $photoprofiles[$photoprofile->id] = $photoprofile;
            }
         }
       
        
  
       return view('publications',compact('publications','auteurs','photos','photoprofiles'));
    }
    
  
    public function projets(){
        $projets=\App\Models\Projet::with('laboratoire')->get();
         $photos = [];
         foreach ($projets as $projet) {
          $photo=\App\Models\Gallerie::where('entite_id',$projet->id)->where('type','photo d\'un projet')->first();
           // Check if the auteur of the publication is already in the auteurs array
         if ($photo) {
          $photos[] = $photo;
          }
         }
        return view('projets',compact('projets','photos'));
    }
    public function laboratoires(){
        $laboratoires=\App\Models\laborataire::all();
        $membres=\App\Models\Membre::all();
        $photos=\App\Models\Gallerie::where('type','photo profile')->get();
        return view('laboratoires',compact('laboratoires','membres','photos'));
    }
}
