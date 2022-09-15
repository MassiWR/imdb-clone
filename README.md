## Table of Contents

- [General info](#general-information)
- [Features](#features)
- [Setup](#setup)

## General Information

- A fullstack web application using Laravel 8, mysql, Docker, tailwindcss. With MVC architecture, relational databases and containerization with the help of Docker.
- > Live demo [_here_](http://imdb-clone-grupp5.herokuapp.com).

## Features

- Register, login, logout
- Retrieve a list of popular, highly rated movies from tmdb movie database using tmdb movie api
- Add/remove movies to a logged in users watchlist
- Review Movies

## Setup

Requirements:

- Docker
- Composer & Laravel

1. Mount the docker container with:

```
docker compose up
```

2. Attach shell and install laravel dependencies with:

```
composer install
```

3. Create an .env file with the following variables inside:

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=imdb
DB_USERNAME=root
DB_PASSWORD=example
```

4. Start the server:

```
php artisan serve --host 0.0.0.0 --port 8000
```
