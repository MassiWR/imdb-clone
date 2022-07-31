> The aim of the project was to create a simplified version of IMDb by using Laravel and mysql database.
> Live demo [_here_]().

## Table of Contents

- [General info](#general-information)
- [Tech stack used](#tech-stack-used)
- [Features](#features)
- [Setup](#setup)

## General Information

- A fullstack web application using Laravel 8, mysql, Docker, tailwindcss. With MVC architecture, relational databases and containerization with the help of Docker.

## Features

- Register, login, logout
- Retrieve a list of popular, highly rated movies from tmdb movie database using tmdb movie api
- Add/remove movies to a logged in users watchlist

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
DB_DATABASE= imdb
DB_USERNAME=root
DB_PASSWORD=example
```

4. Start the server:

```
php artisan serve --host 0.0.0.0 --port 8000
```
