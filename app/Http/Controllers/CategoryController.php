<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'category_name'=>'required'
        ]);

         $test = Category::create([
            'category_name'=>$request->category_name,
        ]);

         if ($test){
             return redirect()->route('category.index')->with('message', 'Category Created Successfully');
         }else{
             return back()->with('message', 'Something Wrong');
         }
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $request->validate([
            'category_name'=>'required'
        ]);

        $category->update([
           'category_name'=>$request->category_name
        ]);
        return redirect()->route('category.index')->with('message', 'Category Updated Successfully');

    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('message', 'Category Deleted Successfully');

    }

}
