
@extends('layouts.main')
@section('content')

<section class="container mx-auto pt-16">

<!--Grid for trending movies -->
<div class="trendingMovies">
<h2 class="text-4xl text-left uppercase tracking-wider text-orange-300 font-semibold pb-4">Trending Movies</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 lg:grid-8 gap-10">
            @foreach ($trendingMovies as $movie)
            @if ($loop->index < 5)
                {{$movie['title']}}
            <div class="mt-4"> <!--fix position of poster/name !-->
    <a href="{{ route('movies.show', $movie['id']) }}">
        <img src="{{'https://image.tmdb.org/t/p/w185/'.$movie['poster_path']}}" alt="Poster" class="hover:opacity-90">
    </a>
            @endif
            @endforeach
            
        </div>
</div>


<!--Grid for top rated movies -->
<div class="topRated">
<h2 class="text-4xl text-left uppercase tracking-wider text-orange-300 font-semibold pb-4">Top Rated</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 lg:grid-8 gap-10">
            @foreach ($topRated as $movie)
            @if ($loop->index < 5)
                {{$movie['title']}}
                <div class="mt-4"> <!--fix position of poster/name !-->
    <a href="{{ route('movies.show', $movie['id']) }}">
        <img src="{{'https://image.tmdb.org/t/p/w185/'.$movie['poster_path']}}" alt="Poster" class="hover:opacity-90">
    </a>
            @endif
            @endforeach
        </div>
</div>


</section>

    
@endsection