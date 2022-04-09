<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'projects';

    protected $fillable = [
        'user_id',
        'project_sector_id',
        'projectname',
        'projectowner',
        'vendors',
        'projectoverview',
        'propertybrochure',
        'images',
        'province',
        'city',
        'projectstatus',
        'address'
    ];

    /**
     * Set Image Attributes.
     *
     * @param string $value
     * @return void
     */
    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }

    /**
     * Get all buildings that belongs to the project.
     *
     * @return collection
     */
    public function buildingspecification()
    {
        return $this->hasOne(BuildingSpecification::class);
    }

    /**
     * Get user that owns the project.
     *
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get project sector that owns the project.
     *
     * @return collection
     */
    public function projectsector()
    {
        return $this->belongsTo(ProjectSector::class);
    }
}
