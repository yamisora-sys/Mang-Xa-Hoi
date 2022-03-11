@extends('layouts.app')

@section('content')
<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('css/admin/tag.css')}}" rel="stylesheet">
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->
    </head>
    <body>
       <!-- create tag -->
       <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Thêm tag mới</div>
                <div class="card-body">
                    <form action="{{ route('tag.add') }}" method="POST">
                        <div class="form-group">
                            @csrf
                            <label class="label">Name: </label>
                            <input type=text name=name class="form-control" value="{{old('name')}}" placeholder="Nhập tên" required/>
                        </div>
                         <div class="form-group">
                            <label class="label">Description: </label>
                            <input type=text name=description class="form-control" value="{{old('description')}}" placeholder="nhập mô tả"/>
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
<!-- end create tag -->
<!-- list tag -->


<div class="container">
    <div class="row custyle">
    <table class="table table-striped custab">
    <thead>
    <a href="#" class="btn btn-primary btn-xs pull-right"><b>+</b> Danh sách</a>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    @foreach($tags as $tag)
            <tr>
                <td>{{$tag->id}}</td>
                <td>{{$tag->name}}</td>
                <td>{{$tag->description}}</td>
                <td class="text-center">
                    <a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                    <form action="{{route('tag.delete')}}" method="post">
                        @csrf
                        <input type="hidden" name="tag_id" value="{{$tag->id}}">
                        <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</button>
                    </form>
                    

                </td>
            </tr>
    @endforeach
    </table>
    </div>
</div>

</body>
</html>

@endsection