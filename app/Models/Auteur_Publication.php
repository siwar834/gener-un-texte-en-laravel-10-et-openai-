<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auteur_Publication extends Model
{
    use HasFactory;
    protected $fillable = [
        'publication_id','auteur_id', 'ordre','affiliation'];
    public $timestamps = false;
}
