@extends('layouts.main')

@section('content')
   <section class="container mx-auto px-4 pt-16">
    <!-- popular movies section -->
    <div class="popular-movies">
        <h2 class="text-lg text-center uppercase tracking-wider text-orange-500 font-semibold pb-4">Top 20 Popular Movies</h2>

        <!-- Grid for all movies -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-7 lg:grid-8 gap-10">
            @foreach ($popularMovies as $Movie)
            <!-- The image of the movie -->
            <div class="mt-4">
                <a href="#">
                    <img src="{{'https://image.tmdb.org/t/p/w185/'.$Movie['poster_path']}}" alt="Poster" class="hover:opacity-90">
                </a>
                <!-- Information about the movie -->
                <div class="mt-2">
                    <a href="#" class="text-lg mt-2 hover:text-gray:300">{{$Movie['title']}}</a>
                    <div class="flex items-center text-gray-400 text-sm mt-1">
                        <span>Rating: {{$Movie['vote_average']}}</span>
                    </div>
                    <div class="text-gray-400 text-sm">
                        <span>Release date: {{$Movie['release_date']}}</span>
                    </div>
                    <div class="text-gray-400 text-sm">
                        @foreach ($Movie['genre_ids'] as $genre)
                            {{$genres->get($genre)}}@if(!$loop->last),@endif 
                        @endforeach
                    </div>
                </div>
            </div> 
              
            @endforeach
        </div>
    </div>
    <!-- now playing section -->
    <div class="now-playing-movies py-24">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Now playing</h2>

        <!-- Grid for all movies -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 lg:grid-6 gap-8">
            <!-- The image of the movie -->
            <div class="mt-8"> 
                <a href="#">
                    <img src="/img/movie1.jpeg" alt="pulp fiction" class="hover:opacity-90">
                </a>
                <!-- Information about the movie -->
                <div class="mt-2">
                    <a href="#" class="text-lg mt-2 hover:text-gray:300">Pulp Fiction</a>
                    <div class="flex items-center text-gray-400 text-sm mt-1">
                        <span>star</span>
                        <span class="ml-1">85%</span>
                        <span class="mx-2">|</span>
                        <span>Feb 20, 1997</span>
                    </div>
                    <div class="text-gray-400 text-sm">
                        Action, Thriller, Comedy
                    </div>
                </div>
            </div> 
               <div class="mt-8">
                <a href="#">
                    <img src="/img/movie1.jpeg" alt="pulp fiction" class="hover:opacity-90">
                </a>
                <!-- Information about the movie -->
                <div class="mt-2">
                    <a href="#" class="text-lg mt-2 hover:text-gray:300">Pulp Fiction</a>
                    <div class="flex items-center text-gray-400 text-sm mt-1">
                        <span>star</span>
                        <span class="ml-1">85%</span>
                        <span class="mx-2">|</span>
                        <span>Feb 20, 1997</span>
                    </div>
                    <div class="text-gray-400 text-sm">
                        Action, Thriller, Comedy
                    </div>
                </div>
            </div> 
               <div class="mt-8">
                <a href="#">
                    <img src="/img/movie1.jpeg" alt="pulp fiction" class="hover:opacity-90">
                </a>
                <!-- Information about the movie -->
                <div class="mt-2">
                    <a href="#" class="text-lg mt-2 hover:text-gray:300">Pulp Fiction</a>
                    <div class="flex items-center text-gray-400 text-sm mt-1">
                        <span>star</span>
                        <span class="ml-1">85%</span>
                        <span class="mx-2">|</span>
                        <span>Feb 20, 1997</span>
                    </div>
                    <div class="text-gray-400 text-sm">
                        Action, Thriller, Comedy
                    </div>
                </div>
            </div> 
               <div class="mt-8">
                <a href="#">
                    <img src="/img/movie1.jpeg" alt="pulp fiction" class="hover:opacity-90">
                </a>
                <!-- Information about the movie -->
                <div class="mt-2">
                    <a href="#" class="text-lg mt-2 hover:text-gray:300">Pulp Fiction</a>
                    <div class="flex items-center text-gray-400 text-sm mt-1">
                        <span>star</span>
                        <span class="ml-1">85%</span>
                        <span class="mx-2">|</span>
                        <span>Feb 20, 1997</span>
                    </div>
                    <div class="text-gray-400 text-sm">
                        Action, Thriller, Comedy
                    </div>
                </div>
            </div> 
               <div class="mt-8">
                <a href="#">
                    <img src="/img/movie1.jpeg" alt="pulp fiction" class="hover:opacity-90">
                </a>
                <!-- Information about the movie -->
                <div class="mt-2">
                    <a href="#" class="text-lg mt-2 hover:text-gray:300">Pulp Fiction</a>
                    <div class="flex items-center text-gray-400 text-sm mt-1">
                        <span>star</span>
                        <span class="ml-1">85%</span>
                        <span class="mx-2">|</span>
                        <span>Feb 20, 1997</span>
                    </div>
                    <div class="text-gray-400 text-sm">
                        Action, Thriller, Comedy
                    </div>
                </div>
            </div> 
               <div class="mt-8">
                <a href="#">
                    <img src="/img/movie1.jpeg" alt="pulp fiction" class="hover:opacity-90">
                </a>
                <!-- Information about the movie -->
                <div class="mt-2">
                    <a href="#" class="text-lg mt-2 hover:text-gray:300">Pulp Fiction</a>
                    <div class="flex items-center text-gray-400 text-sm mt-1">
                        <span>star</span>
                        <span class="ml-1">85%</span>
                        <span class="mx-2">|</span>
                        <span>Feb 20, 1997</span>
                    </div>
                    <div class="text-gray-400 text-sm">
                        Action, Thriller, Comedy
                    </div>
                </div>
            </div>  
            
              

        </div>
    </div>


   </section>
@endsection

