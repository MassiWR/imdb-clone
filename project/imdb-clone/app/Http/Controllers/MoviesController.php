<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class MoviesController extends Controller
{


    public function __construct()
    {

        // get popular movies
        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];

        $this->movies = collect($popularMovies);
        // get genres
        $genresArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        $this->genres = collect($genresArray);

    }

    /**
     * Display a listing of the resource/movies.
     *
     */
    public function index()
    {

        $genres = collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        return view('index', [
            'popularMovies' => $this->movies,
            'genres' => $genres
        ]);
    }

    /**
     * Display the specified resource/movie.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits')
            ->json();


        return view('movie', [
            'movie' => $movie,
        ]);
    }

    public function showMenu()
    {
        $trendingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/trending/movie/day')
            ->json()['results'];

        $topRated = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/top_rated')
            ->json()['results'];



        return view('menuMovies', [
            'trendingMovies' => $trendingMovies,
            'topRated' => $topRated,
        ]);
    }
}
