<?php

namespace App\Http\Controllers;

use App\Models\testimonial;
use App\Http\Requests\StoretestimonialRequest;
use App\Http\Requests\UpdatetestimonialRequest;
use PhpParser\Node\Stmt\Return_;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.testimonials.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretestimonialRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'occupation' => 'required|string',
            'stars' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetestimonialRequest $request, testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(testimonial $testimonial)
    {
        //
    }
}
