<div class="mt-4">
    <a href="{{ route('movies.show', $movie['id']) }}">
        <img src="{{'https://image.tmdb.org/t/p/w185/'.$movie['poster_path']}}" alt="Poster" class="hover:opacity-90">
    </a>
                <!-- Information about the movie -->
    <div class="mt-2">
        <a href="{{ route('movies.show', $movie['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{$movie['title']}}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
            <span>Rating: {{$movie['vote_average']}}</span>
        </div>
        <div class="text-gray-400 text-sm">
            <span>Release date: {{$movie['release_date']}}</span>
        </div>
                   
        <div class="text-gray-400 text-sm">
            @foreach ($movie['genre_ids'] as $genre)
                {{$genres->get($genre)}}@if(!$loop->last),@endif 
            @endforeach
        </div>
    </div>
</div> 