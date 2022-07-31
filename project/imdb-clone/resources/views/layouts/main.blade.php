<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMDB CLONE</title>
    <link rel="stylesheet" href="/css/app.css">
    <script>
    tailwind.config = {
        theme: {
          extend: {
            colors: {
              laravel: '#e23b2d',
            },
          },
        },
      }
  </script>
</head>


<body class="font-sans text-white bg-gray-900">

    <!-- Start of navbar -->
    <nav class="border-b border-gray-900 bg-gray-800">
        <section class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">

            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a class="logo" href="{{route('movies.index')}}">IMDB</a>
                </li>

                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{ route('menuMovies.showMenu')}}" class="hover:text-gray-300">Movies</a>
                </li>
                @auth
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="/watchlist" class="hover:text-gray-300">Watchlist</a>
                </li>
                @endauth
            </ul>


            <ul class="flex flex-col md:flex-row mt-3 md:mt-0 items-center">
                @auth
                 <div class="relative mt-3 mr-4 md:mt-0 hover:text-gray-300">
                    <span class="font-bold uppercase">
                        Welcome {{auth()->user()->name}}
                    </span>
                </div>
                <div>
                    <form class="inline" method="POST" action="/logout">
                    @csrf
                        <button type="submit">
                            <i class="hover:text-red-600"></i> Logout
                        </button>
                    </form>
                </div>
                @else
                <div class="relative mt-3 mr-4 md:mt-0 hover:text-gray-300">
                    <a class="hover:text-orange-500" href="/login">Login</a>
                </div>

                <div class="relative mt-3 md:mt-0 hover:text-gray-300">
                    <a class="hover:text-orange-500 fa-solid fa-user-plus" href="/register">Register</a>
                </div>
                @endauth
            </ul>
        </section>
    </nav>
    @yield('content')
<x-flash-message />
<footer>
    <p class="ml-2 mt-4">Copyright &copy; 2022</p>
  </footer>
</body>
</html>
