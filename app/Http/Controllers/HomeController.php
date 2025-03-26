<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Service;
use App\Models\portfolio;
use App\Models\testimonial;

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
        $services = Service::where('status','active')->latest()->get();
        $portfolios = portfolio::where('status','active')->latest()->get();
        $testimonials = testimonial::where('status','active')->latest()->get();


        return view('Frontend.welcome',[
            'categories' => $categories,
            'blogs'=> $blogs,
           'services' => $services,
           'portfolios' => $portfolios,
           'testimonials' => $testimonials,
        ]);
    }
    public function see_index($slug){
        $blog = Blog::where('slug',$slug)->first();
        return view("Frontend.blog",compact('blog'));
    }
    public function deshboard_index(){
        return view('dashboard.home.index');
    }

}
