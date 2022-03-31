<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class WatchlistController extends Controller
{
    public function index()
    {
        return Watchlist::all();
    }

    public function store(Request $request)
    {
        $movie = new Movies;
        $movie->title = $request->get('title');
        $movie->watchlist = $request->get('watchlist', false);
        $movie->save();

        return $movie;
    }

    public function watchlist($id, Request $request)
    {
        $movie = Movies::Where($id)->first();
        $movie->watchlist = ($request->get('watchlist') == 'true') ? true : false;
        $movie->save();

        return $movie;
    }

    public function destroy($id)
    {
        $movie = Movies::find($id);
        $movie->delete();

        return $movie;
    }



}