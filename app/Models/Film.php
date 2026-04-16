<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Film
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $title
 * @property $release_year
 * @property $synopsis
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Film extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title', 'release_year', 'synopsis'];


}
