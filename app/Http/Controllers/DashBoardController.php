<?php

namespace App\Http\Controllers;

use App\BlogModel;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function homePage()
    {


        $recent_posts = BlogModel::orderBy('created_at', 'desc')->take(14)->get();
//        return $recent_posts;

//        return $blog_likes;
        return view('home_page',
            [
                'recent_posts' => $recent_posts,
            ]
        );
    }
}
