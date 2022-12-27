<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
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

    public function store(CreateProductRequest $request)
    {

        $request->validated();

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

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(CreateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        if ($request->hasFile('image')){
            $product->clearMediaCollection();
            $product->addMediaFromRequest('image')
                ->usingName($product->title)
                ->toMediaCollection();
        }

        return to_route('product.index')->with('message', 'Product Updated Successfully');
    }

    public function show(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.show', compact('product', 'categories'));
    }
    public function destroy($id)
    {
        $product =Product::findOrFail($id);
        $product->delete();
        return to_route('product.index')->with('message', 'Product Deleted Successfully');
    }
}
