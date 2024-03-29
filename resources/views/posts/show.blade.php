@extends('layouts.app')

@section('content')
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"> -->
        <link rel="stylesheet" href="{{asset('js/bootstrap.bundle.min.js')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> -->
        <link rel="stylesheet" href="{{asset('css/show.css')}}"> 
        

    </head>
<body>
    <div class="container mt-5 mb-5" id="testlike">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="d-flex justify-content-between p-2 px-3">
                    <div class="d-flex flex-row align-items-center"> <img src="https://play-lh.googleusercontent.com/ObdbSatQvNUymufVs3vL5YmhGdvs3w5vvTciaGLFQOZoREVAEIIueioFOrWk9je_fqxR" width="50" class="rounded-circle">
                        <div class="d-flex flex-column ml-2"> <span class="font-weight-bold">{{$post->user->name}}</span> <small class="text-primary">{{$post->title}}</small> </div>
                    </div>
                    <div class="d-flex flex-row mt-1 ellipsis">
                        <small class="mr-2">{{date('d/m/y H:i', strtotime($post->created_at))}}</small>
                        <!-- bookmark -->
                        @guest
                        @else
                        <form method="POST" action="{{route('bookmark')}}">
                            @csrf
                            <input type="hidden" name=post_id value="{{$post->id}}">
                            <button type="submit" class="btn btn-link text-primary">
                            
                                <i @if($post->bookmark()==true) class= "fas fa-bookmark" @else class= "far fa-bookmark" @endif></i>
                            </button>
                        </form>
                        @endguest
                </div>
                </div> <img src="{{$post->image}}" class="img-fluid">
                <div class="p-2">
                    <p class="cormonrant-garamond">{{$post->body}}</p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-row icons d-flex align-items-center">
                            <like-component :post="{{ $post->id }}"></like-component>
                            <dislike-component :post="{{ $post->id}}"></dislike-component>
                        </div>
                        <div class="d-flex flex-row muted-color"> <span>{{$post->allcmt()->get()->count()}} Comments</span> <span class="ml-2">Share</span> </div>
                    </div>
                    <hr>
                    <!-- commentPost & commentDisplay -->
                    <div class="comments">
                        @guest
                            <div class="alert alert-danger">
                                <strong>You must be logged in to comment!</strong>
                            </div>
                        @else
                        @include('posts.commentDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
                        <form method="POST" action="{{ route('comment.store') }}">
                            @csrf
                            <div class="form-group">
                                <div class="comment-input"> 
                                    <input type="text" class="form-control" name=body placeholder="Add your comment. Enter to post comment">
                                    <input type=hidden name=post_id value="{{ $post->id }}" />
                                    <div class="fonts"> <i class="fa fa-paper-plane" aria-hidden="true" type=submit></i> </div>
                                </div>
                            </div>
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>

@endsection