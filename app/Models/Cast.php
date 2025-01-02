<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;

    protected $table = 'casts';
    protected $keyType = 'string'; // UUID
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'age',
        'biodata',
        'avatar',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'cast_movies', 'cast_id', 'movie_id');
    }
}
