<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projets_tache extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function projet()
    {
        return $this->belongsTo(\App\Models\Projet::class);
    }
}
