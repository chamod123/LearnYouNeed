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
        $blog_likes = BlogModel::where('user_id','=',auth()->user()->id)->sum('likes');
        $recent_posts = BlogModel::orderBy('created_at', 'desc')->take(14)->get();


//        return $blog_likes;
        return view('UserDash.Home',
            [
                'recent_posts' => $recent_posts,
                'blog_count' => $blog_count,
                'blog_likes' => $blog_likes,
            ]
        );
    }


}
