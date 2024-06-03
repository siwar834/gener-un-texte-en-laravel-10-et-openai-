<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $fillable = [
      
        'chercheurprincipal',
        'description',
        'titre',
   
    'statut',
    'date_debut',
    'date_fin'  
    
       
    ];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    public function projet_chercheur()
    {
        return $this->belongsTo(\App\Models\Projet_Chercheur::class);
    }
    public function Tache()
    {
        return $this->belongsTo(\App\Models\Tache::class);
    }
    public function laboratoire()
    {
        return $this->belongsTo(\App\Models\Laborataire::class);
    }
}
