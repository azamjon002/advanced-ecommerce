<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.product.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $product = Product::create([
           'title'=>$request->input('title'),
           'description'=>$request->input('description'),
           'quantity'=>$request->input('quantity'),
           'price'=>$request->input('price'),
           'discount_price'=>$request->input('discount_price'),
           'category_id'=>$request->input('category_id'),
        ]);

        $product->addMediaFromRequest('image')
            ->usingName($product->title)
            ->toMediaCollection();


        return to_route('product.index');
    }
}
