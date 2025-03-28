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
        $pricings = pricing::latest()->paginate(5);
        return view('dashboard.pricing.index',compact('pricings'));
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
            'title' => 'required|string',
            'price' => 'required|numeric',
            'features' => 'required|array',
            'is_popular' => 'nullable|boolean',
        ]);
        if($request->title){
            pricing::create([
                'user_id' => Auth::user()->id,
                "title" => $request->title,
                "price" => $request->price,
                'features' => json_encode($request->features),
                'is_popular' => $request->has('is_popular') ? true : false,
                'created_at' => now(),
            ]);
            return redirect()->route('pricing.index')->with('service_create_success','Price plan Created Successfull');

        }else{
            pricing::create([
                'user_id' => Auth::user()->id,
                "title" => $request->title,
                "price" => $request->price,
               'is_popular' => $request->has('is_popular') ? true : false,
                'features' => json_encode($request->features),
                'created_at' => now(),
            ]);
            return redirect()->route('pricing.index')->with('service_create_success','Price Plan Created Successfull');
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
    public function pricing_delete($id){
        $pricing = pricing::where('id',$id)->first();
        if($pricing->id == 'delete'){
            unlink($pricing);
        }
        pricing::find($pricing->id)->delete();
        return redirect()->route('pricing.index')->with('service_create_success','Price Plan deleted Successfull');
    }
    // status
    public function pricing_status($id){
        $pricing = pricing::where('id',$id)->first();
        if($pricing->status =='active'){

            pricing::find($pricing->id)->update([
                'status' => 'deactive',
                'updated_at'=> now(),
            ]);
            return redirect()->route('pricing.index')->with('service_create_success','Price Plan status deactive Successfull');

        }else{
            pricing::find($pricing->id)->update([
                'status' => 'active',
                'updated_at'=> now(),
            ]);
            return redirect()->route('pricing.index')->with('service_create_success','Price Plan status active Successfull');
            ;
        }
    }
}
