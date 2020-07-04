@extends('core.home')
@section('title', 'Danh Sách Blog ')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12"><h1>Danh Sách Blog</h1></div>
            <table class="table table-hover">
                <thead class="badge-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên Blog</th>
                    <th scope="col">Tác giả</th>
                    <th scope="col">Thời gian</th>
                    <th scope="col">Chuyên mục</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($blogs) == 0)
                    <tr>
                        <td colspan="6">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($blogs as $key => $blog)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>
                                <a href="{{route('blogs.show',$blog->id)}}"> {{ $blog->title }}</a>
                            </td>
                            <td>{{ $blog->author }}</td>
                            <td>{{ $blog->created_at }}</td>
                            <td>
                                @if($blog->category)
                                    {{$blog->category->category}}
                                @endif
                            </td>
                            <td>@can('admin')
                                    <a href="{{route('blogs.delete',$blog->id)}}" class="btn btn-danger"
                                       onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</a>
                                @endcan
                            </td>
                            <td>@can('admin')
                                    <a href="{{route('blogs.edit',$blog->id)}}" class="btn btn-primary">Edit</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{ $blogs->appends(request()->query())}}
        </div>
    </div>
@endsection
