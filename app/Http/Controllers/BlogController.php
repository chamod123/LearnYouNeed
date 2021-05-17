<?php

namespace App\Http\Controllers;

use App\BlogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function newBlogView()
    {
        return view('UserDash.Blog.New_Blog');
    }
    public function View_Blogs($user_id)
    {
        $blogs_data = BlogModel::where('user_id','=',$user_id)->get();

//return $blogs_data;
        return view('UserDash.Blog.View_Blogs',['blogs_data'=>$blogs_data]);
    }

    public function saveBlogView(Request $request)
    {
        $blog = new BlogModel();
        $blog->title = $request->get('title');
        $blog->slug = $request->get('slug');
        $blog->category_id = $request->get('category_id');
        $blog->blog_body = base64_encode($request->get('blog_body'));
        $blog->user_id = Auth::user()->id;
        $blog->save();

        return back();

        //to view
//        html_entity_decode($article_text);
//        $content = base64_decode($editor_content);
    }


    public function View_a_Blog($blog_id)
    {
        $blog = BlogModel::find($blog_id);
        return view('UserDash.Blog.View_Blog', [
            'blog' => $blog
        ]);
    }

}