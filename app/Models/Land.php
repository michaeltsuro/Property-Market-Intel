<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Land extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'landname',
        'country',
        'province',
        'city',
        'landsize',
        'lowerlimitprice',
        'upperlimitprice',
        'usdequivalent',
        'is_sold'
    ];

    //relationship with other models
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function landimages()
    {
        return $this->hasMany(LandImage::class);
    }
}
