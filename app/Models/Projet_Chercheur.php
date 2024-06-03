<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet_Chercheur extends Model
{
    use HasFactory;
    protected $fillable = [
        'projet_id',
        'chercheur_id',
        'description',
        'titre',
    'fonction',
    'etat',
    'date_debut',
    'date_fin'
       
    ];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    public function projet()
    {
        return $this->belongsTo(\App\Models\Projet::class);
    }
}
