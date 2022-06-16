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
            'email' => 'required|email',
            'password' => 'required|min:5|max:20',
        ]);

        // insert data into database
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if ($save) {
            return back()->with('success', 'Your account has been created successfully');
        }
        else {
            return back()->with('fail', 'Something went wrong, try again');
        }

    }

    function check(Request $request)
    {
        //validate requests
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:20',
        ]);

        //query to fetch user with request email from admins table
        $userInfo = User::where('email', '=', $request->email)->first();

        if (!$userInfo) {
            return back()->with('fail', "No account found with given email address");
        }
        else {
            // check password if it matches with the database password
            if (Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('profile');
            }
            else {
                return back()->with('fail', 'Incorrect password, try again');
            }
        }
    }

    function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');

            return redirect('login');
        }
    }

    //delete user
    /* function delete()
    {
        $id = isset($_POST['id'])?intval($_POST['id']):0;
        if ($id>0) {
            $query = "DELETE FROM users WHERE id = '$id'";
        }
    } */

    // profile for logged in users
    function profile()
    {
        $data = ['LoggedUser' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('profile', $data);
    }


}
