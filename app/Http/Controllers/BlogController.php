<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function newBlogView()
    {
        return view('UserDash.Blog.New_Blog');
    }
}
