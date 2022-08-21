<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DashBoardController@homePage');
//Route::get('/', function () {
//    return view('home_page');
//});

Route::get('/services', function () {
    return view('services');
});
Route::get('/portfolio', function () {
    return view('portfolio');
});
Route::get('/pricing', function () {
    return view('pricing');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/team', function () {
    return view('team');
});
Route::get('/testimonials', function () {
    return view('testimonials');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/View_Blogs/{user_id}', 'BlogController@View_Blogs');
Route::get('/View_a_Blog/{enblog_id}', 'BlogController@View_a_Blog');
Route::get('/delete_blog/{enblog_id}', 'BlogController@deleteBlog');

Route::get('/Edit_Blog/{enblog_id}', 'BlogController@EditBlogView');
Route::post('/Edit_Blog', 'BlogController@EditBlog');

Route::get('/New_Blog', 'BlogController@newBlogView');
Route::post('/New_Blog', 'BlogController@saveBlogView');


//admin
Route::get('/Category', 'CategoryController@View_Category');
Route::get('/New_Category', 'CategoryController@New_Category');
Route::post('/New_Category', 'CategoryController@saveCategory');
Route::get('/Edit_Category/{enblog_id}', 'CategoryController@EditCategoryView');
Route::post('/Edit_Category', 'CategoryController@EditCategory');


Route::get('/blog', 'BlogController@View_Blog');
//Route::get('/blog', function () {
//    return view('Blog.blog');
//});
Route::get('/blogOld', function () {
    return view('Blog.blogold');
});


Auth::routes();

