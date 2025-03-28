<?php

namespace App\Http\Controllers;

use App\Models\pricing;
use App\Http\Requests\StorepricingRequest;
use App\Http\Requests\UpdatepricingRequest;
use Illuminate\Support\Facades\Auth;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pricing.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pricing.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepricingRequest $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'features' => 'required|array',
            'is_popular' => 'boolean',
        ]);
        if($request->title){
            pricing::create([
                'user_id' => Auth::user()->id,
                "title" => $request->title,
                "price" => $request->price,
                'features' => json_encode($request->features),
                'is_popular' => $request->has('is_popular'),
                'created_at' => now(),
            ]);
            return redirect()->route('pricing.index');
        }else{
            pricing::create([
                'user_id' => Auth::user()->id,
                "title" => $request->title,
                "price" => $request->price,
                'features' => $request->features,
                'features' => json_encode($request->features),
                'created_at' => now(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(pricing $pricing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pricing $pricing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepricingRequest $request, pricing $pricing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pricing $pricing)
    {
        //
    }
}
