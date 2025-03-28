<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(5);
        return view('dashboard.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status','active')->latest()->get();
        return view('dashboard.blog.create',compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $request->validate([
            "category_id" => 'required',
            "title" => 'required',
            "thumbnail" => 'required',
            "short_description" => 'required',
            "description" => 'required',
        ]);

        if($request->hasFile('thumbnail')){
            $manager = new ImageManager(new Driver());
            $newname = Auth::user()->id.'-'.Str::random(4) .".".$request->file('thumbnail')->getClientOriginalExtension();
            $image = $manager->read($request->file('thumbnail'));
            $image->toPng()->save(base_path('public/uploads/blog/'.$newname));

            if($request->slug){
                Blog::create([
                    'user_id' => Auth::user()->id,
                    "category_id" => $request->category_id,
                    "title" => $request->title,
                    "slug" => Str::slug($request->slug,'-'),
                    "thumbnail" => $newname,
                    "short_description" => $request->short_description,
                    "description" => $request->description,
                    'created_at' => now(),
                ]);
                return redirect()->route('blog.index')->with('success','Blog Insert Successfull');
            }else{
                Blog::create([
                    'user_id' => Auth::user()->id,
                    "category_id" => $request->category_id,
                    "title" => $request->title,
                    "slug" => Str::slug($request->title,'-'),
                    "thumbnail" => $newname,
                    "short_description" => $request->short_description,
                    "description" => $request->description,
                    'created_at' => now(),
                ]);
                return redirect()->route('blog.index')->with('success','Blog Insert Successfull');
            }



        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories =Category::where('status','active')->latest()->get();
        return view('dashboard.blog.edit',compact('blog',"categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $request->validate([
            "category_id" => 'required',
            "title" => 'required',
            "short_description" => 'required|',
            "description" => 'required',
        ]);

        if($request->hasFile('thumbnail')){
            $manager = new ImageManager(new Driver());
            $newname = Auth::user()->id.'-'.Str::random(4) .".".$request->file('thumbnail')->getClientOriginalExtension();
            $image = $manager->read($request->file('thumbnail'));
            $image->toPng()->save(base_path('public/uploads/blog/'.$newname));

            if($request->slug){
                Blog::find($blog->id)->update([
                    'user_id' => Auth::user()->id,
                    "category_id" => $request->category_id,
                    "title" => $request->title,
                    "slug" => Str::slug($request->slug,'-'),
                    "thumbnail" => $newname,
                    "short_description" => $request->short_description,
                    "description" => $request->description,
                    'updated_at' => now(),
                ]);
                return redirect()->route('blog.index')->with('success','Blog update Successfull');
            }else{
                Blog::find($blog->id)->update([
                    'user_id' => Auth::user()->id,
                    "category_id" => $request->category_id,
                    "title" => $request->title,
                    "slug" => Str::slug($request->title,'-'),
                    "thumbnail" => $newname,
                    "short_description" => $request->short_description,
                    "description" => $request->description,
                    'updated_at' => now(),
                ]);
                return redirect()->route('blog.index')->with('success','Blog update Successfull');
            }

        }else{

            if($request->slug){
                Blog::find($blog->id)->update([
                    'user_id' => Auth::user()->id,
                    "category_id" => $request->category_id,
                    "title" => $request->title,
                    "slug" => Str::slug($request->slug,'-'),
                    "short_description" => $request->short_description,
                    "description" => $request->description,
                    'updated_at' => now(),
                ]);
                return redirect()->route('blog.index')->with('success','Blog update Successfull');
            }else{
                Blog::find($blog->id)->update([
                    'user_id' => Auth::user()->id,
                    "category_id" => $request->category_id,
                    "title" => $request->title,
                    "slug" => Str::slug($request->title,'-'),
                    "short_description" => $request->short_description,
                    "description" => $request->description,
                    'updated_at' => now(),
                ]);
                return redirect()->route('blog.index')->with('success','Blog update Successfull');
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog )
    {
        //
    }
    public function blog_delete($id){
        $blog = Blog::where('id',$id)->first();
        if($blog->thumbnail){
            $oldpath = base_path('public/uploads/blog/'.$blog->thumbnail);

            if(file_exists($oldpath)){
                unlink($oldpath);
            }
        }
        // if($blog->id == 'delete'){
        //     unlink($blog);
        // }
        Blog::find($blog->id)->delete();
        return back();
    }
    // status
    public function blog_status($id){
        $blog = Blog::where('id',$id)->first();
        if($blog->status =='active'){

            Blog::find($blog->id)->update([
                'status' => 'deactive',
                'updated_at'=> now(),
            ]);
         return redirect()->route('blog.index')->with('success','Blog status deactive Successfull');
        }else{
            Blog::find($blog->id)->update([
                'status' => 'active',
                'updated_at'=> now(),
            ]);
        return redirect()->route('blog.index')->with('success','Blog status active Successfull');

        }
    }
}
