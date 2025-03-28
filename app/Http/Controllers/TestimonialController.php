<?php

namespace App\Http\Controllers;

use App\Models\testimonial;
use App\Http\Requests\StoretestimonialRequest;
use App\Http\Requests\UpdatetestimonialRequest;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = testimonial::latest()->paginate(5);
        return view('dashboard.testimonials.index',compact('testimonials'));
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
            "thumbnail" => 'required',
        ]);
        if($request->hasFile('thumbnail')){
            $manager = new ImageManager(new Driver());
            $newname = Auth::user()->id.'-'.Str::random(4) .".".$request->file('thumbnail')->getClientOriginalExtension();
            $image = $manager->read($request->file('thumbnail'));
            $image->toPng()->save(base_path('public/uploads/testimonial/'.$newname));
         }
             if($request->name){
                testimonial::create([
                    'user_id' => Auth::user()->id,
                    "name" => $request->name,
                    "occupation" => $request->occupation,
                    'stars' => $request->stars,
                    "thumbnail" => $newname,
                    "description" => $request->description,
                    'created_at' => now(),
                ]);
                return redirect()->route('testimonial.index')->with('success','Testimonial created successfull');
            }else{
                testimonial::create([
                    'user_id' => Auth::user()->id,
                    "name" => $request->name,
                    "occupation" => $request->occupation,
                    'stars' => $request->stars,
                    "thumbnail" => $newname,
                    "description" => $request->description,
                    'created_at' => now(),
                ]);
                return redirect()->route('testimonial.index')->with('success','Testimonial created successfull');
            }
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
        return view('dashboard.testimonials.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetestimonialRequest $request, testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'occupation' => 'required|string',
            'stars' => 'required|integer|min:1|max:5',
        ]);
        if($request->hasFile('thumbnail')){
            $manager = new ImageManager(new Driver());
            $newname = Auth::user()->id.'-'.Str::random(4) .".".$request->file('thumbnail')->getClientOriginalExtension();
            $image = $manager->read($request->file('thumbnail'));
            $image->toPng()->save(base_path('public/uploads/testimonial/'.$newname));
             if($request->name){
                testimonial::find($testimonial->id)->update([
                    'user_id' => Auth::user()->id,
                    "name" => $request->name,
                    "occupation" => $request->occupation,
                    'stars' => $request->stars,
                    "thumbnail" => $newname,
                    "description" => $request->description,
                    'created_at' => now(),
                ]);
                return redirect()->route('testimonial.index')->with('success','Testimonial update successfull');
            }else{
                testimonial::find($testimonial->id)->update([
                    'user_id' => Auth::user()->id,
                    "name" => $request->name,
                    "occupation" => $request->occupation,
                    'stars' => $request->stars,
                    "thumbnail" => $newname,
                    "description" => $request->description,
                    'updated_at' => now(),
                ]);
                return redirect()->route('testimonial.index')->with('success','Testimonial update successfull');
            }

         }else{

            if($request->name){
                testimonial::find($testimonial->id)->update([
                    'user_id' => Auth::user()->id,
                    "name" => $request->name,
                    "occupation" => $request->occupation,
                    'stars' => $request->stars,
                    "description" => $request->description,
                    'created_at' => now(),
                ]);
                return redirect()->route('testimonial.index')->with('success','Testimonial update successfull');
            }else{
                testimonial::find($testimonial->id)->update([
                    'user_id' => Auth::user()->id,
                    "name" => $request->name,
                    "occupation" => $request->occupation,
                    'stars' => $request->stars,
                    "description" => $request->description,
                    'updated_at' => now(),
                ]);
                return redirect()->route('testimonial.index')->with('success','Testimonial update successfull');
            }

          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(testimonial $testimonial)
    {
        //
    }
    public function testimonial_delete($id){
        $testimonial = testimonial::where('id',$id)->first();
        if($testimonial->thumbnail){
            $oldpath = base_path('public/uploads/testimonial/'.$testimonial->thumbnail);

            if(file_exists($oldpath)){
                unlink($oldpath);
            }
        }
        testimonial::find($testimonial->id)->delete();
        return redirect()->route('testimonial.index')->with('success','Testimonial delete successfull');
    }
    // status
    public function testimonial_status($id){
        $testimonial = testimonial::where('id',$id)->first();
        if($testimonial->status =='active'){

            testimonial::find($testimonial->id)->update([
                'status' => 'deactive',
                'updated_at'=> now(),
            ]);
            return redirect()->route('testimonial.index')->with('success','Testimonial status deactive successfull');

        }else{
            testimonial::find($testimonial->id)->update([
                'status' => 'active',
                'updated_at'=> now(),
            ]);
            return redirect()->route('testimonial.index')->with('success','Testimonial status deactive successfull');
            ;
        }
    }
}
