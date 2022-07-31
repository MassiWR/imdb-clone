<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

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
    public function show(Request $request, $id)
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

    // add to watchlist
    public function add(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'movie_id' => 'required',

        ]);
        $formFields['user_id'] = auth()->id();
        $movie_id = $request->movie_id;
        $user_id = auth()->id();
        if (Movie::where('movie_id', $movie_id)->where('user_id', $user_id)->exists()) {
            return back()->with('message', 'Already exists in your watchlist');
        }
        else {
            Auth::user()->movies()->create($formFields);
            return back()->with('message', $request->input('title') . ': Added to watchlist');
        }
    }

    // show watchlists
    public function watchlist(Request $request)
    {
        $watchlists = Auth::user()->movies()->get();
        return view('watchlist', [
            'watchlist' => $watchlists
        ]);
    }

    // Delete movie for watchlist
    public function destroy(Movie $movie)
    {
        // Make sure logged in user is owner
        $deleteMovie = Movie::find($movie)->first();
        if ($deleteMovie) {
            $deleteMovie->delete();
        }
        return back()->with('message', 'movie deleted successfully');
    }
}
