<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Cache\Events\RetrievingKey;
use Illuminate\Http\Request;
 use Illuminate\Support\Str;
 use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use function PHPUnit\Framework\fileExists;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('dashboard.category.index',compact('categories'));
    }


    public function store(Request $request){

        $manager = new ImageManager(new Driver());

       $request->validate([
        'title' => 'required',
        'image' => 'required|image',
       ]);
       if($request ->hasfile('image')){

        $newname = auth()->id().'-'.str::random(6).'.'.$request->file('image')->getClientOriginalExtension();
        $image = $manager->read($request->file('image'));
        $image->toPng()->save(base_path('public/uploads/category/'.$newname));

        if($request->slug){

            Category::insert([

                'title' =>Str::ucfirst($request->title),
                'slug' =>Str::slug($request->slug,'-'),
                'image' =>$newname,
                'created_at' => now(),

            ]);
            return back()->with('cat_success' , "Category created successfully");

        }else{
            Category::insert([

                'title' =>Str::ucfirst($request->title),
                'slug' =>Str::slug($request->title,'-'),
                'image' =>$newname,
                'created_at' => now(),

            ]);

        }

       }else{
        return back()->withErrors(['image'=>"Image field is require"])->withInput();
       }

    }
    // edit-----------------------------------------------------------------------------------
    public function edit($slug){
        $category = Category::where('slug',$slug)->first();
        return view('dashboard.category.edit',[
            'realmadrid' => $category,
        ]);
    }

    // edit update-----------------------------------------------------------------------------
    public function update( Request $request , $slug){
        $category = Category::where('slug',$slug)->first();
        $manager = new ImageManager(new Driver());
        $request->validate([
            'title' => 'required',
        ]);
        if($request->hasFile('image')){

            // delete old image
            if($category->image){
                $oldpath = base_path('public/uploads/category/'.$category->image);
                if(file_exists($oldpath)){
                    unlink($oldpath);
                }
            }

            $newname = auth()->id().'-'.str::random(6).'.'.$request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image->toPng()->save(base_path('public/uploads/category/'.$newname));
        // update query
        if($request->slug){

            Category::find($category->id)->update([

                'title' =>Str::ucfirst($request->title),
                'slug' =>Str::slug($request->slug,'-'),
                'image' =>$newname,
                'updated_at' => now(),

            ]);
            return back()->with('cat_success' , "Category updated successfully");

        }else{
            Category::find($category->id)->update([

                'title' =>Str::ucfirst($request->title),
                'slug' =>Str::slug($request->title,'-'),
                'image' =>$newname,
                'updated_at' => now(),

            ]);
            return redirect()->route('category.index')->with('cat_success' , "Category updated successfully");
        }
        }else{
            if($request->slug){

                Category::find($category->id)->update([

                    'title' =>Str::ucfirst($request->title),
                    'slug' =>Str::slug($request->slug,'-'),
                    'updated_at' => now(),

                ]);
                return redirect()->route('category.index')->with('cat_success' , "Category updated successfully");

            }else{
                Category::find($category->id)->update([

                    'title' =>Str::ucfirst($request->title),
                    'slug' =>Str::slug($request->title,'-'),
                    'updated_at' => now(),

                ]);
                return redirect()->route('category.index')->with('cat_success' , "Category updated successfully");
            }
        }
    }
    public function destroy($slug){
        $category = Category::where('slug',$slug)->first();

        if($category->image){

            $oldpath = base_path('public/uploads/category/'.$category->image);

            if(file_exists($oldpath)){
                unlink($oldpath);

            }
        }
        Category::find($category->id)->delete();
        return redirect()->route('category.index')->with('cat_success' , "Category delete successfully");
    }
    // status
    public function status($id){
        $category = Category::where('id',$id)->first();
        if($category->status == 'active'){
            Category::find($category->id)->update([
                'status' =>'deactive',
                'updated_at' => now(),
            ]);
            return redirect()->route('category.index')->with('cat_success' , "Category status changed successfully");
        }else{
            Category::find($category->id)->update([
                'status' =>'active',
                'updated_at' => now(),
            ]);
            return redirect()->route('category.index')->with('cat_success' , "Category status changed successfully");
        }
    }
}
