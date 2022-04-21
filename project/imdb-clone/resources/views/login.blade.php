@extends('layouts.main')
@section('content')

<section class="flex min-h-screen bg-gray-900">

    <div class="px-12 py-6 mt-0 text-left">
        <form action="{{route('auth.check')}}" method="post">
            @if (Session::get('fail'))

            <div class="text-red-800">
                {{Session::get('fail')}}
            </div>

            @endif
            @csrf
            <div class="mt-2">
                <label class="text-white">Email</label>
                <input class="w-full px-4 py-2 mt-2 border rounded-sm text-black focus:outline-none focus:ring-1 focus:ring-blue-600" type="text" name="email" placeholder="Enter email address">
                <span class="text-red-800">@error('email') {{$message}} @enderror</span>
            </div>

            <div class="mt-4">
                <label class="text-white">Password</label>
                <input class="w-full px-4 py-2 mt-2 border rounded-sm text-black focus:outline-none focus:ring-1 focus:ring-blue-600" type="password" name="password" placeholder="Enter password">
                <span class="text-red-800">@error('password') {{$message}} @enderror</span>
            </div>
            <br>
            <button class="flex items-center bg-gray-800 text-white rounded-sm font-semibold px-6 py-3 hover:bg-orange-600" type="submit">Sign in</button>
            <br>
            <a class="hover:text-orange-500" href="{{ route('auth.register')}}">Create an account</a>

        </form>
    </div>

    <section class="container mx-auto px-4 pt-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 sm:grid-2 gap-5">

            @foreach ($popularMovies as $movie)

            @if ($loop->index < 20) <img src="{{'https://image.tmdb.org/t/p/w342/'.$movie['poster_path']}}" alt="pulp fiction">
                @endif
                @endforeach

        </div>
    </section>

</section>
@endsection