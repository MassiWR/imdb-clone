@extends('layouts.main')

@section('content')

<h3>My watchlist</h3>
    @unless(count($watchlist) == 0)
    @foreach ($watchlist as $item)
    <p>{{$item->title}}</p>
    @endforeach
    @else
    <p>No listings found</p>
    @endunless

@endsection
