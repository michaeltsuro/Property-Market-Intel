<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResearchArticles extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'research_articles';

    protected $fillable = [
        'user_id',
        'articletitle',
        'summary',
        'fullarticle',
        'source',
        'featuredimage',
        'articleimages'
    ];

    /**
     * Set all image attributes.
     *
     * @param  string  $value
     * @return void
     */
    public function setArticleImagesAttribute($value)
    {
        $this->attributes['articleimages'] = json_encode($value);
    }

    /**
     * Get the user that owns the research article.
     *
     *
     * @return string
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
