<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\Admin;


class AuthController extends Controller
{

    function login()
    {

        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];

        return view('login', [
            'popularMovies' => $popularMovies,
        ]);
    }

    function register()
    {
        return view('register');
    }

    function save(Request $request)
    {

        //validate the requests
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:5|max:20',
        ]);

        // insert data into database
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $save = $admin->save();

        if ($save) {
            return back()->with('success', 'New user has been created and added to database');
        }
        else {
            return back()->with('fail', 'Something went wrong, try again later');
        }

    }


}