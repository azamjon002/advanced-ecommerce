<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        return view('home.userpage');
    }
    public function redirect()
    {
        if (Auth::user()->usertype == 1){
            return view('admin.index');
        }else{
            return view('home.userpage');
        }
    }
}
