<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    //database table
    protected $table = 'projects';

    //form fillable
    protected $fillable = [
        'user_id',
        'projectname',
        'projectowner',
        'vendors',
        'projectoverview',
        'projectstatus',
        'address'
    ];

    //relationship with other models
}
