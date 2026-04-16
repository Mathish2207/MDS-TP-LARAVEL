<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Location
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $name
 * @property $city
 * @property $country
 * @property $description
 * @property $upvotes_count
 * @property $film_id
 * @property $user_id
 *
 * @property User $user
 * @property Film $film
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Location extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'city', 'country', 'description', 'upvotes_count', 'film_id', 'user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function film()
    {
        return $this->belongsTo(\App\Models\Film::class, 'film_id', 'id');
    }
    
}
