@extends('layouts.main')


@section('content')
    <!-- info about a specific movie -->
    <section class="movie-info">
        <div class="movie-info border-b border-gray-800">

            <!--<div class="container max-auto px-10 py-16 flex flex-col md:flex-row">
                <img src="{{'https://image.tmdb.org/t/p/w342/'.$movie['poster_path']}}" alt="pulp fiction" class="max-w-full h-auto">!-->

            <div class="container max-auto px-4 py-16 flex flex-col md:flex-row">
                <img src="{{'https://image.tmdb.org/t/p/w342/'.$movie['poster_path']}}" alt="movie poster" class="w-64 md:w-96">

                <div class="md:ml-24">
                    <h2 class="text-4xl font-semibold mt-4">{{$movie['title']}}</h2>

                    <div class="flex items-center text-gray-400 text-sm">
                        <span>{{$movie['release_date']}}</span>
                        <span class="ml-2">|</span>
                        <span class="ml-2">
                            @foreach ($movie['genres'] as $genre)
                                {{$genre['name']}}@if(!$loop->last),@endif
                            @endforeach
                        </span>
                    </div>
                    <p class="text-gray-300 mt-8"> {{$movie['overview']}}
                    </p>


                    <div class="mt-10">
                        <h4 class="text-white text-semibold text-lg">CAST</h4>
                        <div class="flex mt-1">
                        @foreach ($movie['credits']['cast'] as $cast)
                           @if ($loop->index < 3)
                            <div class="mr-8">
                                <div class="text-orange-300 text-lg">{{$cast['name']}}</div>
                                <div class="text-gray-300 text-sm">as {{$cast['character']}}</div>
                            </div>
                           @endif
                        @endforeach
                        </div>

                    </div>


@auth
<form action="/addmovie" method="POST">
        @csrf
                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6 sm:col-span-3">
                        <input type="hidden" id="movie_id" name="movie_id" value="{{$movie['id']}}">
                        <input type="hidden" name="title" id="title" value="{{$movie['title']}}" autocomplete="" placeholder="Enter name of watchlist" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded">
                    </div>
                </div>
            <div class="flex flex-wrap justify-end">
                <button type="submit" class=" bg-green-500 hover:bg-green-700 text-white mt-1 mx-1 py-1  px-2 rounded">Add to watchlist</button>
            </div>
            <br />
    </form>
@endauth
@guest
    <div class="mt-4">
        <h2>Sign in to add movies</h2>
    </div>
@endguest

<br />
            </div>
        </div>
    </section> <!-- end of movie info -->
@endsection
