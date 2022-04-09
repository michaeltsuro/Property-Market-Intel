<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Land extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lands';

    protected $fillable = [
        'user_id',
        'landname',
        'country',
        'province',
        'city',
        'landsize',
        'landoverview',
        'landbronchure',
        'images',
        'lowerlimitprice',
        'upperlimitprice',
        'usdequivalent',
        'is_sold'
    ];

    /**
     * Get the user that owns the land.
     *
     * @return string
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
