<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encadrement extends Model
{
    use HasFactory;
    protected $fillable = [
        'eudiante_id',
        'chercheur_id',
        'encadrement_id',
        'cahier_charge',
        'lien_meet','etat','avancement',
        'sujet',
    
       
    ];
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    public $timestamps = false;
}
