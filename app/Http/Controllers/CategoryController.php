<?php

namespace App\Http\Controllers;

use App\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function View_Category()
    {
        $category_data = CategoryModel::all();

        return view('UserDash.Category.View_Category',['category_data'=>$category_data]);
    }

    public function New_Category()
    {
        return view('UserDash.Category.New_Category', [
        ]);
    }

    public function saveCategory(Request $request)
    {
        $category_data = new CategoryModel();
        $category_data->cat_name = $request->get('cat_name');
        $category_data->cat_description = $request->get('cat_description');
        $category_data->save();

        return redirect('/Category');
    }

}
