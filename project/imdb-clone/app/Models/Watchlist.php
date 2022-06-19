<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    use HasFactory;
    protected $fillable = [    
    'user_id',
    'movies_id',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public static function addMovie($userId, $movieId)
    {
        $addMovie = Watchlist::where([
            ['user_id, $userId'],
            ['movie_id, $movieId']])->first();

            return $addMovie;
    }

}
