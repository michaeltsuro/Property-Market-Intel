<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectSector extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'project_sectors';

    protected $fillable = [
        'sectorname',
        'description'
    ];

    /**
     * Get all the projects that belongs to different sectors.
     *
     * @return collection
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
