@extends('layouts.main')

@section('content')
<section class="container mx-auto px-4 pt-16">
    <!-- popular movies section -->
    <div class="popular-movies">
        <h2 class="text-lg text-center uppercase tracking-wider text-yellow-300 font-semibold pb-4">12 Popular Movies</h2>

        <!-- Grid for all movies -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 lg:grid-8 gap-10">
            @foreach ($popularMovies as $movie)
            @if ($loop->index
            < 12) <x-movie-card :movie="$movie" :genres="$genres" />
            @endif
            @endforeach
        </div>
    </div>
    
</section>

@endsection