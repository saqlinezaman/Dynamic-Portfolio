<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::where('status','active')->latest()->get();
        $blogs = Blog::where('status','active')->latest()->get();
        return view('Fronennd.welcome',[
            'categories' => $categories,
            'blogs'=> $blogs,
        ]);
    }
}
