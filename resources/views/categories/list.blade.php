@extends('core.home')
@section('title', 'Category List ')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12"><h1>Category List</h1></div>
            <table class="table table-hover">
                <thead class="badge-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên Danh Mục</th>
                    <th scope="col">Số lượng blog</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($categories) == 0)
                    <tr>
                        <td colspan="6">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($categories as $key => $category)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $category->category }}</td>
                            <td>@if($category->blogs)
                                    {{ count($category->blogs) }}
                                @endif
                            </td>
                            <td>@can('admin')
                                    <a href="" class="btn btn-danger"
                                       onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</a>
                                    <a href="{{route('categories.edit',$category->id)}}"
                                       class="btn btn-primary">Edit</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

