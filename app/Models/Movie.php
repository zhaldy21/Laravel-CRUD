<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'title',
        'synopsis',
        'poster',
        'year',
        'available',
        'genre_id',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'movie_id', 'id');
    }

    public function casts()
    {
        return $this->belongsToMany(Cast::class, 'cast_movies', 'movie_id', 'cast_id');
    }
}
