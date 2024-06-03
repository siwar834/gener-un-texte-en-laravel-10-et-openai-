<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminmessagesuser extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function Adminmessage()
    {
        return $this->belongsTo(\App\Models\directeurmessagemessage::class,'id','adminmessage_id');
    }
}
