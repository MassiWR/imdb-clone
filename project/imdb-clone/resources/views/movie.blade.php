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
                    @if($current_user && !$movieIsAdded)
                    <form action="{{route('add_to_watchlist', $movie->id)}}" method="POST" class="">
                        @csrf                                            
                    <button class="flex items-center bg-gray-500 text-white rounded-sm font-semibold px-6 py-3 hover:bg-orange-600" onclick="timeout()" type="submit">
                        Add to Watchlist
                    </button>
                    </form>
                    @elseif($current_user && $movieIsAdded)
                    <button class="flex items-center bg-gray-500 text-white rounded-sm font-semibold px-6 py-3 hover:bg-orange-600" onclick="timeout()" type="submit">
                        Already in your Watchlist                        
                    </button>
                    @endif
                </div>


            </div>
        </div>
    </section> <!-- end of movie info -->
@endsection