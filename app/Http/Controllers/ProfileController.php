<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }
    // username------------------------------------------------------------------------------
    public function name_update(Request $request){
        $request->validate([

            "name" => 'required |alpha',

        ]);

        User::find(Auth::user()->id)->update([
            "name"=>$request->name,
            "updated_at"=> now(),
        ]);
        return redirect()->route('profile.index')->with('name_update',"Name Update Successful");
    }
    // email----------------------------------------------------------------------------------
    public function email_update(Request $request){
        $request->validate([
            "email" => "required | email",
        ]);
        User::find(Auth::user()->id)->update([
            "email"=> $request->email,
            "updated_at"=> now(),
        ]);
        return redirect()->route('profile.index')->with('email_update',"Email Update Successfully");
    }
    // password-------------------------------------------------------------------------------

    public function password_update(Request $request){
        $request->validate([
            'c_password'=>'required',
            'password'=>'required|confirmed|min:8',
        ]);
        if(Hash::check($request->c_password, Auth::user()->password)){
            user::find(Auth::user()->id)->update([
                'password'=> '$request->password',
                "updated_at"=> now(),
            ]);
            return redirect()->route('profile.index')->with('password_update',"password Update Successfully");
        }else{
            return  back()->withErrors(['c_password'=> "New password Doesn't match"])->withInput();

        }
    }
    // image------------------------------------------------------------
    public function image_update(Request $request){
        $manager = new ImageManager(new Driver());

        $request->validate([
            'image' => 'required|image',
        ]);


        if($request->hasFile('image')){
            $newname = auth()->id() . '-' . rand(1111,9999) . '.' . $request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image->toPng()->save(base_path('public/uploads/profile/'.$newname));

            User::find(auth()->id())->update([
                'image' => $newname,
                'updated_at' => now(),
            ]);
        return redirect()->route('profile.index')->with('image_update',"Image Update Successful");
        }

    }
}

