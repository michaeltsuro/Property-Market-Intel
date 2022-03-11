<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResearchArticles extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'articletitle',
        'summary',
        'fullarticle',
        'source',
        'featuredimage',
        'articleimages'
    ];

    //relationship with other models
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
