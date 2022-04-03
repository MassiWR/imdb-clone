<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMDB CLONE</title>
    <link rel="stylesheet" href="/css/app.css">
</head>


<body class="font-sans text-white bg-gray-900">

    <!-- Start of navbar -->
    <nav class="border-b border-gray-900 bg-gray-800">
        <section class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">

            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a class="logo" href="{{route('movies.index')}}">MOVIE</a>
                </li>

                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="#" class="hover:text-gray-300">Movies</a>
                </li>

                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="#" class="hover:text-gray-300">Tv Shows</a>
                </li>

                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="#" class="hover:text-gray-300">Actors</a>
                </li>

                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="#" class="hover:text-gray-300">Genres</a>
                </li>

                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="#" class="hover:text-gray-300">Watchlist</a>
                </li>
            </ul>

            <!-- Search bar -->
            <ul class="flex flex-col md:flex-row mt-3 md:mt-0 items-center">
                <div class="relative mt-3 md:mt-0">
                    <input type="text" class="text-gray-900 bg-white-800 text-sm rounded-full w-100 pl-5 px-10 py-2" placeholder="Search">
                </div>
            </ul>



        </section>
    </nav>

    @yield('content')

    <footer class="text-center bg-gray-900 text-white">
        <div class="mb-0 text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright

        </div>
    </footer>


</body>

</html>