<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            // return redirect()->route('profile.index')->with('password_update',"password Update not updated");
        }
    }
    // image------------------------------------------------------------
    public function image_update(Request $request){
        $request->validate([
            'image' => 'required|image',
        ]);
        if($request->hasFile('image')){
            $newname = auth()-> id() . '.'. rand(1111 , 9999) .'-' .  $request->file('image')->getClientOriginalExtension() ;
            return $newname;
        }
    }
}

