<?php

namespace App\Http\Controllers;

use App\CategoryMainModel;
use App\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    public function View_Category()
    {
        $category_data = CategoryModel::all();

        return view('UserDash.Category.View_Category', ['category_data' => $category_data]);
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

    public function EditCategoryView($enCategory_id)
    {
        $cat_id = Crypt::decrypt($enCategory_id);
        $category = CategoryModel::find($cat_id);

        return view('UserDash.Category.edit_category', ['category' => $category]);
    }

    public function EditCategory(Request $request)
    {
        $category = CategoryModel::find($request->get('id'));
        $category->cat_name = $request->get('cat_name');
        $category->cat_description = $request->get('cat_description');
        $category->save();

        return redirect('/Category');
    }

    public function EditCategoryStatus($enCategory_id,$status)
    {
        $cat_id = Crypt::decrypt($enCategory_id);
        $category = CategoryModel::find($cat_id);
        $category->status = $status;
        $category->save();

        return redirect('/Category');
    }



    //Main Category
    public function View_Main_Category()
    {
        $category_main_data = CategoryMainModel::all();

        return view('UserDash.Category_Main.View_Main_Category', ['category_main_data' => $category_main_data]);
    }

}
