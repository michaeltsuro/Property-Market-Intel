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
    public function buildingspecification()
    {
        return $this->hasOne(BuildingSpecification::class);
    }

    public function propertyimages()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //how to add vendors relationship

}
