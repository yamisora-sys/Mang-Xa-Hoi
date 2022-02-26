@extends('layouts.app')

@section('content')

<div id="index">
    <div class="Welcome">
        <h1>Welcome to Void Forum</h1>
        <p>
            This is a forum where you can discuss anything you want.
        </p>
        <p>
            You can create a new post or view all the posts.
        </p>
    </div>
        <div id="userpost" class="mt-12 grid max-w-lg mx-auto lg:grid-cols-3 lg:max-w-none">
        @foreach ($posts as $post)
            <div class="flex-1 flex-col rounded-lg shadow-lg overflow-hidden">
                <a href="/viewposts/{{$post->id}}">
                    <h2>{{$post->title}}</h2>
            </div>
        @endforeach
        </div> 
</div>

@endsection