<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [
        'name',
        'display_name',
        'description'
    ];


}
