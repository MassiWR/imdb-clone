<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MenuMoviesController extends Controller
{
    public function show(Request $request)
    {


        $trendingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/trending/movie/day')
            ->json()['results'];

        
        return view('menuMovies', [
            'trending' => $trendingMovies,
            
        ]);

   
        $topRated = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/top_rated')
            ->json()['results'];

        
        return view('menuMovies', [
            'topRated' => $topRated,
            
        ]);

   
        $upcoming = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/upcoming')
            ->json()['results'];

        
        return view('menuMovies', [
            'upcoming' => $upcoming,
            
        ]);

    }
}