<?php

namespace App\Http\Controllers;

use App\BlogModel;
use App\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class BlogController extends Controller
{
    public function newBlogView()
    {
        $category = CategoryModel::all();
        return view('UserDash.Blog.New_Blog',
            ['categories' => $category]
        );
    }

    public function View_Blogs($user_id)
    {
        $blogs_data = BlogModel::where('user_id', '=', $user_id)->get();
        return view('UserDash.Blog.View_Blogs', ['blogs_data' => $blogs_data]);
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

        $categoty = CategoryModel::find($request->get('category_id'));
        $categoty->post_count = $categoty->post_count + 1;
        $categoty->save();

//        $categoty = CategoryModel::where('id', $request->get('category_id'))
//            ->update([
//                'post_count' => $categoty->post_count + 1
//            ]);
//        post_count

        return redirect('/View_Blogs/' . auth()->user()->id);

        //to view
//        html_entity_decode($article_text);
//        $content = base64_decode($editor_content);
    }


    public function View_a_Blog($blog_id)
    {
        $blog_id = Crypt::decrypt($blog_id);
        $blog = BlogModel::find($blog_id);
        return view('UserDash.Blog.View_Blog', [
            'blog' => $blog
        ]);
    }

    public function View_Blog()
    {
        $blogs = BlogModel::all();
        $category = CategoryModel::orderBy('post_count', 'desc')->take(6)->get();
        $recent_posts = BlogModel::orderBy('created_at', 'desc')->take(4)->get();
        return view('Blog.blog', [
            'blogs' => $blogs,
            'categories' => $category,
            'recent_posts' => $recent_posts,
        ]);
    }


    public function deleteBlog($blog_id)
    {
        $blog_id = Crypt::decrypt($blog_id);

        $blog = BlogModel::find($blog_id);
        if (empty($blog)) {
            $errors = ["Cant Delete"];
        }
        if (!empty($errors)) {
            return response()->json([
                'msg' => 'Unable to delete. ',
                'errors' => $errors
            ], 200);
        } else {
            $blog->delete();
            return back();
        }
    }

}