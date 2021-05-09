<?php

namespace App\Http\Controllers;

use App\BlogModel;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function newBlogView()
    {
        return view('UserDash.Blog.New_Blog');
    }

    public function saveBlogView(Request $request)
    {
        $blog = new BlogModel();
        $blog->title = $request->get('title');
        $blog->slug = $request->get('slug');
        $blog->category_id = $request->get('category_id');
        $blog->blog_body = base64_encode($request->get('blog_body'));
        $blog->save();

        return back();

        //to view
//        html_entity_decode($article_text);
//        $content = base64_decode($editor_content);
    }

}