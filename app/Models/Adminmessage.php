<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminmessage extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function Adminmessagesusers()
    {
        return $this->hasMany(\App\Models\Adminmessagesuser::class);
    }
}
