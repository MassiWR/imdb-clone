<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class WatchlistController extends Controller
{
    public function store(Request $request, Movie $movie)
    {
        if (Watchlist::where('movie_id', $request->movie_id)->exists()) {
            return back()->with([
                'success' => 'The movie is already in your Watchlist!'
            ]);
        } else {
            $attributes = request()->validate([
                'movie_id' => 'required',
            ]);
            Watchlist::create($attributes);
            return back()->with([
                'success' => 'The movie is added to your Watchlist!'
            ]);
        }
    }

    public function show()
    {
        $watchlists = Watchlist::orderBy('created_at')
            ->paginate(10);

        return view('movies.watchlist', [
            'watchlists' => $watchlists
        ]);
    }

    public function destroy()
    {
        $movieId = request('movie_id');
        $id = request('id');

        if (isset($id)) {
            Watchlist::find($id)->delete();
            return back()->with([
                'success' => 'The movie was deleted from your watchlist.',
            ]);
        } else {
            Watchlist::where('movie_id', $movieId)->delete();
            return back()->with([
                'success' => 'The movie was deleted from your watchlist.',
            ]);
        }
    }
}
