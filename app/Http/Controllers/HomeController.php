<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class HomeController extends Controller
{

    use WithPagination;
    public function index()
    {
        $products = Product::paginate(3);
        return view('home.userpage', compact('products'));
    }
    public function redirect()
    {
        if (Auth::user()->usertype == 1){
            return view('admin.index');
        }else{
            $products = Product::paginate(3);
            return view('home.userpage', compact('products'));
        }
    }

    public function product_details($id)
    {
        $products = Product::find($id);
        return view('home.product_details',compact('products'));
    }
}
