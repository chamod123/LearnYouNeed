<?php

namespace App\Http\Controllers;

use App\BlogModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blog_count = BlogModel::where('user_id','=',auth()->user()->id)->count();
        $blog_likes = BlogModel::where('user_id','=',auth()->user()->id)->sum('likes');;

//        return $blog_likes;
        return view('UserDash.Home',
            [
                'blog_count' => $blog_count,
                'blog_likes' => $blog_likes,
            ]
        );
    }
}
