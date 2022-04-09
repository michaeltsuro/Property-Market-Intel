<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuildingSpecification extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'building_specifications';

    protected $fillable = [
        'project_id',
        'grossLeasableArea',
        'numberofUnits',
        'floortoceilingheight',
        'numberoffloors',
        'estimatedvalue'
    ];

    /**
     * Get the project that owns the building specification.
     *
     * @return collection
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
