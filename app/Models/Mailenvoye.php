<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mailenvoye extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function sender()
    {
        return $this->belongsTo(\App\Models\User::class,'id','sender_id');
    }
}
