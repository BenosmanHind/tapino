<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::orderBy('created_at',"desc")->get();

        return view('admin.categories',compact('categories'));
    }
    public function store(Request $request){
        $category = new Category();
        $category->designation = $request->designation;
        $category->save();
        return redirect()->back();
    }

    public function edit($id){
        $category = Category::find($id);
        $categories = Category::orderBy('created_at',"desc")->get();
        return view('admin.edit-category',compact('category','categories'));
    }
    public function update(Request $request , $id){
        $category = Category::find($id);
        $category->designation = $request->designation;
        $category->save();
        return redirect('admin/categories');
    }

    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }
}
