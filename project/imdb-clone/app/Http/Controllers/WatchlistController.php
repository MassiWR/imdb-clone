<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MoviesController;

class Watchlist extends Controller
{
    public function store(Request $request, MoviesController $movie)
    {
        if ($movie->addedBy($request->user())){
            return response(null, 409);
        }

        $movie->Watchlist()->create([
            'user_id' => $request->user()->id,
            'movies_id' => $movie->id,
        ]);
        session()->flash('add-message', "The movie was added to your watchlist");

        return back();
    }
    protected function destroy(MoviesController $movie, Request $request)
    {
        $request->user()->addedMovies()->where('movie_id', $movie->id)->delete();
        session()->flash('delete-message', "The movie has been removed");
        return back();
    }
}
    

