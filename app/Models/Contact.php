<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'user_id',
        'demande',
        'reponse',
        'dateheure_demande',
        'dateheure_reponse',
        'type',
        'etat'
       
    ];
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
