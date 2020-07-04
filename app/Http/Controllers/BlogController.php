<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(5);
        $categories = Category::all();
        return view('blogs.list', compact('blogs', 'categories'));

    }

    public function create()
    {
        $categories = Category::all();
        return view('blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->desc;
        $blog->author = $request->author;
        $blog->cate_id = $request->cate_id;
        $blog->save();
        toastr()->success('Thêm bài viết thành công');
        return redirect()->route('blogs.index');
    }

    public function edit($id)
    {
        if (!$this->userCan('admin')) {
            abort(403);
        }
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        return view('blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->userCan('admin')) {
            abort(403);
        }
        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->content = $request->desc;
        $blog->author = $request->author;
        $blog->cate_id = $request->cate_id;
        $blog->save();
        toastr()->success('Chỉnh sửa bài viết thành công');
        return redirect()->route('blogs.index');
    }

    public function destroy($id)
    {
        if (!$this->userCan('admin')) {
            abort(403);
        }
        $blog = Blog::findOrFail($id);
        $blog->delete();
        toastr()->success('Xoá bài viết thành công');
        return redirect()->route('blogs.index');
    }

    public function search(Request $request)
    {
        $key = $request->search;
        $blogs = Blog::where('title', 'LIKE', "%$key%")->paginate(5);
        return view('blogs.list', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }
}
