@extends('layouts.main')

@section('content')

@php
    $var = 0;
@endphp

<h2 class="text-2xl text-center uppercase tracking-wider text-white font-semibold pb-4 mt-6">My watchlist</h2>
    <div class="border m-10">
    @unless(count($watchlist) == 0)
    @foreach ($watchlist as $movie)
        @php
            $var +=1;
        @endphp
        <div class="font-semibold m-4">
             <a href="{{ route('movies.show', $movie['movie_id']) }}" class="text-lg mt-2 hover:text-orange-500">{{$var}}: {{$movie['title']}}</a>

             <form method="POST" action="/movies/{{$movie->id}}">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-300 hover:text-red-500">Delete</button>
            </form>
        </div>
    @endforeach
    @else
    <p>No listings found</p>
    @endunless
    </div>

@endsection
