@extends('layouts.main')

@section('content')
<section class="flex items-center justify-center min-h-screen bg-gray-900">
    <div class="px-10 py-2 text-left">
        <h1 class="text-green-500 text-lg">Log into your account</h1>
<form action="/users/authenticate" method="POST">
    @csrf
    <div class="mt-2">
        <label for="email">Email</label>
        <input class="w-full px-4 py-2 mt-2 border rounded-sm text-black focus:outline-none focus:ring-1 focus:ring-blue-600" type="text" name="email" placeholder="Enter email address">
        <span class="text-red-800">@error('email') {{$message}}@enderror</span>
    </div>

    <div class="mt-4">
        <label for="password">Password</label>
        <input  class="w-full px-4 py-2 mt-2 border rounded-sm text-black focus:outline-none focus:ring-1 focus:ring-blue-600" type="password" name="password" placeholder="Enter password">
        <span class="text-red-800">@error('password') {{$message}}@enderror</span>
    </div>
    <br>

    <button class="flex items-center bg-gray-800 text-white rounded font-semibold px-5 py-3 hover:bg-orange-600" type="submit">Sign in</button>
    <br>
    <a class="hover:text-orange-500" href="/register">Create an account</a>

</form>

</div>

</section>

@endsection
