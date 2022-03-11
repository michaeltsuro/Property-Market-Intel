<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LandImage extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'land_id',
        'images'
    ];

    //relationship with Land model
    public function land()
    {
        return $this->belongsTo(Land::class);
    }
}
