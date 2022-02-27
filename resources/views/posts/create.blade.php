@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Tạo bài viết mới</div>
                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="POST">
                        <div class="form-group">
                            @csrf
                            <label class="label">Title: </label>
                            <input type=text name=title class="form-control" value="{{old('title')}}" placeholder="Nhập tiêu đề" required/>
                        </div>
                         <div class="form-group">
                            <label class="label">Tag: </label>
                            <input name=tag class="form-control" value="{{old('tag')}}" placeholder="Tối đa 15 ký tự" required/>
                        </div>

                        <div class="form-group">
                            <label class="label">Body: </label>
                            <textarea name=body rows="10" cols="30" class="form-control" placeholder="Nhập nội dung bài đăng" required>{{ old('body') }}</textarea>
                        </div>
                        <div class="form-group dd">
                            <input type=submit class="btn btn-success" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection