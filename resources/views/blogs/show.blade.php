@extends('core.home')
@section('title', 'Blog')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h3> {{$blog->title}}</h3>
            </div>
            <div class="col-12">
                @csrf
                <div class="form-group">
                    <h4>Nội dung:</h4>
                    <textarea class="form-control" name="desc">{{$blog->content}}</textarea>
                </div>
                <div class="form-group">
                    <h4>Tác Giả:</h4>
                    <p>{{$blog->author}}</p>
                </div>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </div>
        </div>
    </div>
@endsection



