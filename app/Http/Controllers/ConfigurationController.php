<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;



class ConfigurationController extends Controller
{
    
//admin
public function adminShowNotes(){
    $notes=\App\Models\Note::all();
return view('admin.adminShowNotes',compact('notes'));
}
public function adminAddNote(){
 
return view('admin.adminAddNote');
}
public function adminAddNotePost(Request $request)
{
  
$note= new \App\Models\Note();
        $note->date=$request['date'];
        $note->note=$request['note'];
        $note->visible=$request['visible'];
        
        if ($request->hasfile('lien'))
        {
            //enregistrer le nouveau fichier
            $file = $request['lien'];
            $fileName = 'note-'.time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('notes', $fileName);
            $note->lien=$fileName;
        }

        $note->save();

        return redirect()->route('adminShowNotes');
    }
    public function adminEditNote($id)
    {
        $selectednote=\App\Models\Note::where('id',$id)->first();
        return view('admin.adminEditNote',compact('selectednote'));
    }

    public function adminEditNotePost(Request $request)
    {
        
        $note=\App\Models\Note::where('id',$request->id)->first();
        $note->date=$request['date'];
        $note->note=$request['note'];
        $note->visible=$request['visible'];
        
        //Fichier
        if ($request->hasFile('lien')) 
        {        
            if(Storage::exists('notes/'.$note->lien))
            {
               Storage::delete('notes/'.$note->lien);
            }

            //enregistrer le nouveau fichier
            $file = $request['lien'];
            $fileName = 'note-'.time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('notes', $fileName);
            $note->lien=$fileName;
        }

        $note->update();

        return redirect()->route('adminShowNotes');
    }

    public function adminDeleteNote($id)
    {
        $note=\App\Models\Note::find($id);
        return view('admin.adminDeleteNote',compact('note'));
    }

    public function adminDeleteNotePost(Request $request)
    {
        
        $note=\App\Models\Note::where('id',$request->id)->first();
        
        if(Storage::exists('notes/'.$note->lien))
            {
               Storage::delete('notes/'.$note->lien);
            }

        $note->delete();

        return redirect()->route('adminShowNotes');
    }
//-------- Note -------- admin ------------------------------------------##########################################

    public function directeurShowNotes()
    {
        $notes=\App\Models\Note::all();
        return view('directeur.directeurShowNotes',compact('notes'));
    }

    public function directeurAddNote()
    {
        return view('directeur.directeurAddNote');
    }

    public function directeurAddNotePost(Request $request)
    {
        $note= new \App\Models\Note();
        $note->date=$request['date'];
        $note->note=$request['note'];
        $note->visible=$request['visible'];
        
        if ($request->hasfile('lien'))
        {
            //enregistrer le nouveau fichier
            $file = $request['lien'];
            $fileName = 'note-'.time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('notes', $fileName);
            $note->lien=$fileName;
        }

        $note->save();

        return redirect()->route('directeurShowNotes');
    }

    public function directeurEditNote($id)
    {
        $selectednote=\App\Models\Note::where('id',$id)->first();
        return view('directeur.directeurEditNote',compact('selectednote'));
    }

    public function directeurEditNotePost(Request $request)
    {
        
        $note=\App\Models\Note::where('id',$request->id)->first();
        $note->date=$request['date'];
        $note->note=$request['note'];
        $note->visible=$request['visible'];
        
        //Fichier
        if ($request->hasFile('lien')) 
        {        
            if(Storage::exists('notes/'.$note->lien))
            {
               Storage::delete('notes/'.$note->lien);
            }

            //enregistrer le nouveau fichier
            $file = $request['lien'];
            $fileName = 'note-'.time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('notes', $fileName);
            $note->lien=$fileName;
        }

        $note->update();

        return redirect()->route('directeurShowNotes');
    }

    public function directeurDeleteNote($id)
    {
        $note=\App\Models\Note::find($id);
        return view('directeur.directeurDeleteNote',compact('note'));
    }

    public function directeurDeleteNotePost(Request $request)
    {
        
        $note=\App\Models\Note::where('id',$request->id)->first();
        
        if(Storage::exists('notes/'.$note->lien))
            {
               Storage::delete('notes/'.$note->lien);
            }

        $note->delete();

        return redirect()->route('directeurShowNotes');
    }

  

}

