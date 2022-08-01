@extends('layouts.main')


@section('content')
<section class="container mx-auto px-4 pt-16">
    <!-- popular movies section -->
    <div class="popular-movies">
        <h2 class="text-4xl text-center uppercase tracking-wider text-green-700 font-semibold pb-4">Movies of the week</h2>

        <!-- Grid for all movies -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 lg:grid-8 gap-10">
            @foreach ($popularMovies as $movie)
             <x-movie-card :movie="$movie" :genres="$genres" />
            @endforeach
        </div>
    </div>

</section>
@endsection
