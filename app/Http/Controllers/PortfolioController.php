<?php

namespace App\Http\Controllers;

use App\Models\portfolio;
use App\Models\Category;
use App\Http\Requests\StoreportfolioRequest;
use App\Http\Requests\UpdateportfolioRequest;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
Use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.portfolio.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status','active')->latest()->get();
        return view('dashboard.portfolio.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreportfolioRequest $request)
    {
        $request->validate([
            "category_id" => 'required',
            "title" => 'required',
            "thumbnail" => 'required',
        ]);

        if($request->hasFile('thumbnail')){
            $manager = new ImageManager(new Driver());
            $newname = Auth::user()->id.'-'.Str::random(4).".".$request->file('thumbnail')->getClientOriginalExtension();
            $image = $manager->read($request->file('thumbnail'));
            $image->toPng()->save(base_path('public/uploads/portfolio/'.$newname));

            if($request->slug){
                portfolio::create([
                    'user_id' => Auth::user()->id,
                    "category_id" => $request->category_id,
                    "title" => $request->title,
                    "thumbnail" => $newname,
                    'created_at' => now(),
                ]);
                return redirect()->route('portfolio.index')->with('success','Portfolio Insert Successfull');
            }else{
                portfolio::create([
                    'user_id' => Auth::user()->id,
                    "category_id" => $request->category_id,
                    "title" => $request->title,
                    "thumbnail" => $newname,
                    'created_at' => now(),
                ]);
                return redirect()->route('portfolio.index')->with('success','Portfolio Insert Successfull');
            }



        }

    }

    /**
     * Display the specified resource.
     */
    public function show(portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateportfolioRequest $request, portfolio $portfolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(portfolio $portfolio)
    {
        //
    }
}
