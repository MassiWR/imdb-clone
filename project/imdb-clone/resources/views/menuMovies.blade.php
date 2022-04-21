@extends('layouts.main')
@section('content')

<section class="container mx-auto px-4 pt-16 flex justify-evenly">

    <!--Grid for trending movies -->
    <div class="trendingMovies">
        <h2 class="text-4xl text-center uppercase tracking-wider text-orange-300 font-semibold pb-4">Trending Movies</h2>
        <div class="container mx-auto px-4 py-10 flex flex-col md:flex-row gap-10 ">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 lg:grid-8 gap-10">
                @foreach ($trendingMovies as $movie)
                @if ($loop->index < 5) <a href="{{ route('movies.show', $movie['id']) }}">
                    {{$movie['title']}}
                    <img src="{{'https://image.tmdb.org/t/p/w185/'.$movie['poster_path']}}" alt="Poster" class="hover:opacity-90">
                    </a>
                    @endif
                    @endforeach

            </div>
        </div>

        <!--Grid for top rated movies -->
        <h2 class="text-4xl text-center uppercase tracking-wider text-orange-300 font-semibold pb-4">Top Rated</h2>
        <div class="container mx-auto px-4 py-10 flex flex-col md:flex-row gap-10 ">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 lg:grid-8 gap-10">
                @foreach ($topRated as $movie)
                @if ($loop->index < 5) <a href="{{ route('movies.show', $movie['id']) }}">
                    {{$movie['title']}}</h2>
                    <img src="{{'https://image.tmdb.org/t/p/w185/'.$movie['poster_path']}}" alt="Poster" class="hover:opacity-90">
                    </a>
                    @endif
                    @endforeach

            </div>
        </div>


</section>


@endsection