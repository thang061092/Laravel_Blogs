<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.list', compact('categories'));
    }

    public function create()
    {
        if (!$this->userCan('admin')) {
            abort(403);
        }
        return view('categories.create');
    }

    public function store(Request $request)
    {
        if (!$this->userCan('admin')) {
            abort(403);
        }
        $category= new Category();
        $category->category= $request->cate;
        $category->save();
        toastr()->success('Thêm mới thành công');
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        if (!$this->userCan('admin')) {
            abort(403);
        }
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        if (!$this->userCan('admin')) {
            abort(403);
        }
        $category = Category::findOrFail($id);
        $category->category= $request->cate;
        $category->save();
        toastr()->success('update thành công');
        return redirect()->route('categories.index');
    }
}
