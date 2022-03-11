<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        //all property Image properties
        'project_id',
        'images'
    ];

    //relationship with other models
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
