@extends('core.home')
@section('title', 'Thêm danh mục mới')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>title</label>
                        <input type="text" class="form-control" name="cate" placeholder="Enter category">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection


