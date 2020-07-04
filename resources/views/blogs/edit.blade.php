@extends('core.home')
@section('title', 'Update blog')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Viết bài</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('blogs.update', $blog->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter title"
                               value="{{$blog->title}}">
                    </div>
                    <div class="form-group">
                        <label>content</label>
                        <input type="text" class="form-control" name="desc" placeholder="Enter content"
                               value="{{$blog->content}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">author</label>
                        <input type="text" class="form-control" name="author" placeholder="Enter author"
                               value="{{$blog->author}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Chuyên mục </label>
                        <select class="form-control" name="cate_id">
                            @foreach($categories as $category)
                                <option
                                    @if($blog->cate_id == $category->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{$category->id}}">{{$category->category}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection


