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
                <div class="flex-1 p-6 flex-col justify-between">
                    <div class="flex-1">
                        <div class="flex-1">
                            <a href="/viewpost/{{$post->id}}">
                                <h3 class="mt-2 text-x1 leading-7 font-semibold text-gray-900">{{$post->title}}</h3>
                            </a>
                            <p class="mt-3 text-base leading-6 text-gray-500">
                            @if (strlen($post->text) > 200)
                                {{ substr($post->text, 0, 200) }}...
                            @else
                                {{ $post->text }}
                            @endif
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div> 
</div>

@endsection