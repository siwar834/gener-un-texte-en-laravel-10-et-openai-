<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Response;

class ImagineController extends Controller
{
    
    public function saveFile(Request $request)
    {
        $validation = $request->validate([
            'file'  =>  'required|file|image|mimes:jpeg,png,gif,jpg|max:2048'
        ]);

        $file = $validation['file'];

        // Generate a file name with extension
        $fileName = 'profile-'.time().'.'.$file->getClientOriginalExtension();

        // Save the file
        $path = $file->storeAs('docs', $fileName);

        return redirect()->back()->with(['SuccessMessage'=>'Fichier ajouté avec succès.']);
    }

    public function getFile($rep,$filename)
    {
        $path = storage_path('app/'.$rep.'/'.$filename);
        
        if (!File::exists($path)) 
        {
            abort(404);
        }
        
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        
        return $response;
    }
}
