@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center text-success">ItSolutionStuff.com</h3>
                    <br/>
                    <h2>{{ $post->title }}</h2>
                    <p>
                        {{ $post->body }}
                    </p>
                    <hr />
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection