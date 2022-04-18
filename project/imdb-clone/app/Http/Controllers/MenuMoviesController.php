<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MenuMoviesController extends Controller
{
    /*public function index()
    {


        $trendingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/trending/movie/day')
            ->json()['results'];

        
        return view('menuMovies', [
            'trendingMovies' => $trendingMovies,
            
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

        $genresArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];


        $genres = collect($genresArray)->mapWithKeys(function ($genre) 
        {
            return [$genre['id'] => $genre['name']];
        });
    
    }*/



    public function show(Request $id)
    {
        $trendingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/trending/movie/day' . $id . '?append_to_response=credits')
            ->json();


        return view('menuMovies', [
            'trendingMovies' => $trendingMovies,
        ]);
    

    
        $topRated = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/top_rated' . $id . '?append_to_response=credits')
            ->json();


        return view('menuMovies', [
            'topRated' => $topRated,
        ]);
    

    
        $upcoming = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/upcoming' . $id . '?append_to_response=credits')
            ->json();


        return view('menuMovies', [
            'upcoming' => $upcoming,
        ]);
    }
}