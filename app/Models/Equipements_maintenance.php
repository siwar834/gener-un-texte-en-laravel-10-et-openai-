<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipements_maintenance extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function equipement()
    {
        return $this->belongsTo(\App\Models\Equipement::class);
    }
}
