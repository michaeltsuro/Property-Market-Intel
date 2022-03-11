<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResearchPapers extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'researchtitle',
        'summary',
        'source',
        'featuredimage',
        'researchfile'
    ];

    //relationship with other user model
    public function user(){
        return $this->belongsTo(User::class);
    }
}
