
@extends('layouts.main')
@section('content')

<section class="container mx-auto pt-16">

<!--Grid for trending movies -->
<div class="trendingMovies">
<h2 class="text-4xl text-left uppercase tracking-wider text-orange-300 font-semibold pb-4">Trending Movies</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 lg:grid-8 gap-10">
            @foreach ($trendingMovies as $movie)
           {{$movie['title']}}
            @endforeach
        </div>
</div>






</section>

    
@endsection