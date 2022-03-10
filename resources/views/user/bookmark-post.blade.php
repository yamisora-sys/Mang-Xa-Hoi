@extends('layouts.app')

@section('content')
<html>
    <head>
        <link rel="stylesheet" href="{{asset('css/bookmark.css')}}">
    </head>

    <body>
      <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">Your Bookmark</h5>
        </div>
        </div>
    <div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="people-nearby">
              <div class="nearby-user">
              @foreach($bookmarks as $bookmark)
                <div class="row">
                <div class="col-md-2 col-sm-2">
                    <img src="https://png.pngtree.com/png-vector/20190423/ourmid/pngtree-bookmark-icon-vector-illustration-in-filled-style-for-any-purpose-png-image_975443.jpg" alt="user" class="profile-photo-lg">
                  </div>
                  <div class="col-md-7 col-sm-7">
                    <h5><a href="/viewpost/{{$bookmark->post_id}}" class="profile-link">{{$bookmark->post->title}}</a></h5>
                    <p>Author: {{$bookmark->user->name}}</p>
                    <p class="text-muted">{{date('d/m/y H:i', strtotime($bookmark->post->created_at))}}</p>
                  </div>
                    <form method="POST" action="{{route('deleteBookmark')}}">
                    @csrf
                    <input type="hidden" name=post_id value="{{$bookmark->post_id}}">
                    <div class="col-md-3 col-sm-3">
                      <button class="btn btn-primary pull-right"><i class="fas fa-trash"></i></button>
                    </div>
                    </form>
                </div>
              </div>
              @endforeach
            </div>
    	</div>
	</div>
</div>
    </body>
</html>

@endsection