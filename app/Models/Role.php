<?php

namespace App\Models;

use Laratrust\Models\Role as RoleModel;

class Role extends RoleModel
{
    public $guarded = [];
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
