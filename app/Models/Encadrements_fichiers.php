<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encadrements_fichiers extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
