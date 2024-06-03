<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $fillable = [
        'auteur',
        'titre',
        'date_publication',
        'revue',
       
       
    ];
    public $timestamps = false;

    public function auteur()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

}
