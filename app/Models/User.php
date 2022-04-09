<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all projects that belongs to the user.
     *
     * @return collection
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get all the research articles that belongs to the user.
     *
     *
     * @return collection
     */
    public function researcharticles()
    {
        return $this->hasMany(ResearchArticles::class);
    }

    /**
     * Get all the research papers that belongs to the user.
     *
     *
     * @return collection
     */
    public function researchpapers()
    {
        return $this->hasMany(ResearchPapers::class);
    }

    /**
     * Get all the land that belongs to the user.
     *
     *
     * @return collection
     */
    public function lands()
    {
        return $this->hasMany(Land::class);
    }
}
