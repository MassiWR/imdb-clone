<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserList extends Controller
{
    protected function create($movieId) 
    {
        UserList::create([
            'user_id' => auth()->user()->id,
            'movies_id' => $movieId,
        ]);
        return redirect() -> back ();
    }
    protected function destroy($watchlistId)
    {
        $watchlistId = UserList::where('id', $watchlistId)->first();
        $watchlistId->delete();
        return redirect() -> back();
    }
}
