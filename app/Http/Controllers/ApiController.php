<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
       $blogs= Blog::all();
       $data =[
           'status'=>'thanh cong',
           'blogs'=>$blogs
       ];
       return response()->json($data);
    }
}
