<?php

namespace App\Http\Controllers;

use App\BlogModel;
use App\CategoryMainModel;
use App\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class BlogController extends Controller
{
    public function newBlogView()
    {
        $category = CategoryModel::all();
        $main_category = CategoryMainModel::all();
        return view('UserDash.Blog.New_Blog',
            ['categories' => $category,
                'main_categories' => $main_category]
        );
    }

    public function View_Blogs($user_id)
    {
        $blogs_data = BlogModel::where('user_id', '=', $user_id)->orderBy('created_at', 'DESC')->get();
        return view('UserDash.Blog.View_Blogs', ['blogs_data' => $blogs_data]);
    }


    public function saveBlog(Request $request)
    {
        $blog = new BlogModel();
        $blog->title = $request->get('title');
        $blog->slug = $request->get('slug');
        $blog->category_id = $request->get('category_id');
        $blog->main_cat_id = $request->get('main_category_id');
        $blog->blog_body = base64_encode($request->get('blog_body'));
        $blog->user_id = Auth::user()->id;
        $blog->save();

        $categoty = CategoryModel::find($request->get('category_id'));
        $categoty->post_count = $categoty->post_count + 1;
        $categoty->save();


        $main_categoty = CategoryMainModel::find($categoty->main_cat_id);
        $main_categoty->post_count = $main_categoty->post_count + 1;
        $main_categoty->save();

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


    //view a blog by admin home
    public function View_a_Blog($blog_id)
    {
        $blog_id = Crypt::decrypt($blog_id);
        $blog = BlogModel::find($blog_id);
        return view('UserDash.Blog.View_Blog', [
            'blog' => $blog
        ]);
    }


    //view blogs in blogs nav tab - All blogs
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

    //view blogs by category
    public function View_Blog_By_Category($enCategoryId)
    {
        $category_id = Crypt::decrypt($enCategoryId);
        $selected_category = CategoryModel::find($category_id);
        $blogs = BlogModel::where('category_id','=',$category_id)->get();
        $category = CategoryModel::orderBy('post_count', 'desc')->take(6)->get();
        $recent_posts = BlogModel::orderBy('created_at', 'desc')->take(4)->get();
//        return $selected_category;
        return view('Blog.blog', [
            'selected_category' => $selected_category,
            'blogs' => $blogs,
            'categories' => $category,
            'recent_posts' => $recent_posts,
        ]);
    }

    //blog view from home
    public function View_a_Blog_more($blog_id)
    {
        $blog_id = Crypt::decrypt($blog_id);
        $blog = BlogModel::find($blog_id);

        $category = CategoryModel::orderBy('post_count', 'desc')->take(6)->get();
        $recent_posts = BlogModel::orderBy('created_at', 'desc')->take(4)->get();
        return view('Blog.View_Blog', [
            'blog' => $blog,
            'categories' => $category,
            'recent_posts' => $recent_posts,
        ]);
    }


    // no need delete
//    public function deleteBlog($blog_id)
//    {
//        $blog_id = Crypt::decrypt($blog_id);
//
//        $blog = BlogModel::find($blog_id);
//        if (empty($blog)) {
//            $errors = ["Cant Delete"];
//        }
//        if (!empty($errors)) {
//            return response()->json([
//                'msg' => 'Unable to delete. ',
//                'errors' => $errors
//            ], 200);
//        } else {
//
//
//            $category = CategoryModel::where('id','=',$blog->category_id)->first();
//            $category->post_count = $category->post_count - 1;
//            $category->save();
//            $blog->delete();
//
//            return back();
//        }
//    }

    public function EditBlogView($blog_id)
    {
        $blog_id = Crypt::decrypt($blog_id);
        $blog = BlogModel::find($blog_id);
        $categories = CategoryModel::all();

        return view('UserDash.Blog.edit_Blog', ['blog' => $blog,
            'categories' => $categories]);
    }


    public function EditBlog(Request $request)
    {
        $blog = BlogModel::find($request->get('blog_id'));
        $blog->title = $request->get('title');
        $blog->slug = $request->get('slug');
        $blog->category_id = $request->get('category_id');
        $blog->blog_body = base64_encode($request->get('blog_body'));
        $blog->user_id = Auth::user()->id;
        $blog->save();

//        $categoty = CategoryModel::find($request->get('category_id'));
//        $categoty->post_count = $categoty->post_count + 1;
//        $categoty->save();

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

    public function EditBlogStatus($enBlog_id, $status)
    {
        $blog_id = Crypt::decrypt($enBlog_id);
        $blog = BlogModel::find($blog_id);
        $blog->status = $status;
        $blog->save();

        return back();
    }

}