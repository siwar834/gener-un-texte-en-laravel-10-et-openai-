<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallerie extends Model
{
    use HasFactory;
    protected $fillable = [
        'entite_id',
        'type',
        
        'description',
    
       'date'
    ];
    public $timestamps = false;
}
