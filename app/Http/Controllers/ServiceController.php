<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
Use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->paginate(2);
        return view('dashboard.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $request->validate([

            "title" => 'required',
            "description" => 'required',
        ]);
        if($request->title){
            Service::create([
                'user_id' => Auth::user()->id,
                "title" => $request->title,
                "description" => $request->description,
                'created_at' => now(),
            ]);
            return redirect()->route('service.index')->with('service_create_success','Service Created Successfull');
        }else{
        Service::create([
            'user_id' => Auth::user()->id,
            "title" => $request->title,
            "description" => $request->description,
            'created_at' => now(),
        ]);
        return back();
    }
    }
    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('dashboard.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $request->validate([

            "title" => 'required',
            "description" => 'required',
        ]);
        if($request->title){
            Service::find($service->id)->update([
                'user_id' => Auth::user()->id,
                "title" => $request->title,
                "description" => $request->description,
                'updated_at' => now(),
            ]);
            return redirect()->route('service.index')->with('service_create_success','Service update Successfull');
        }else{
        Service::find($service->id)->update([
            'user_id' => Auth::user()->id,
            "title" => $request->title,
            "description" => $request->description,
            'updated_at' => now(),
        ]);
        return redirect()->route('service.index')->with('service_create_success','Service update Successfull');
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
    public function service_delete($id){
        $service = Service::where('id',$id)->first();
        if($service->id == 'delete'){
            unlink($service);
        }
        Service::find($service->id)->delete();
        return back();
    }
}
