@extends('layouts.app')

@section('content')

<div id="index">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <div class="Welcome">
        <h1>Welcome to Void Forum</h1>
        <p>
            This is a forum where you can discuss anything you want.
        </p>
        <p>
            You can create a new post or view all the posts.
        </p>
    </div id="userpost">
        <div class="container blog-page grid">
            <div class="row clearfix">
        @foreach ($posts as $post)
        
        <div class="col-lg-4 col-md-12">
            <div class="card single_post">
                <div class="body">
                    <div>
                        <h3 class="m-t-0 m-b-5">{{$post->title}}</h3>
                        <div class="text-muted small">{{date('d/m/y H:i', strtotime($post->created_at))}}</div>
                    </div>
                    <ul class="meta">
                        <li><a href="javascript:void(0);"><i class="zmdi zmdi-account col-blue"></i>Posted By: {{$post->user->name}}</a></li>
                        <li><a href="javascript:void(0);"><i class="zmdi zmdi-label col-amber"></i>{{$post->tag}}</a></li>
                        <li><a href="javascript:void(0);"><i class="zmdi zmdi-comment-text col-blue"></i>Comments: {{$post->comments()->post_id()->get()->count()}}</a></li>
                    </ul>
                </div>
                <div class="body">
                    <div class="img-post m-b-15">
                        <img src="https://tophinhanhdep.com/wp-content/uploads/2021/10/Cute-Kitty-Wallpapers.jpg" alt="Awesome Image">
                        <div class="social_share">
                            <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-facebook"></i></button>
                            <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-twitter"></i></button>
                            <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-instagram"></i></button>
                        </div>
                    </div>
                    <p class="overflow-hidden" style="height:30px;">{{$post->body}}</p>
                    <a href="/viewpost/{{$post->id}}" title="read more" class="btn btn-round btn-info">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
        </div> 
</div>

@endsection