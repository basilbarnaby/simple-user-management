<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    protected $fillable = [
        'name', 'display_name', 'description',
    ];

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeGetRoles($query)
    {
        return $query->where('name', '!=', 'superadmin');
    }
}
