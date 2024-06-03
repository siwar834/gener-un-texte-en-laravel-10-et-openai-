<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class TextGeneratorController extends Controller
{
    public function text(){
        return view('text');
    }
    public function generateText(Request $request)
    {
        
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => 'c est  quoi la description de ce mot:'.$request->input('mot')],
            ],
           
            'max_tokens' => 100,
        ]);
    dd($result->choices[0]->message->content);
        //return response()->json([
         //   'text' => $result->choices[0]->text,
        //]);
    }
}
