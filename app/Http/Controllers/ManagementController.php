<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManagementController extends Controller
{
    // from register for user role
    public function index(){
        $managers = User::where('role','manager','user')->get();
        return view('dashboard.manegement.auth.register',compact('managers'));
    }

    public function store_register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => 'required|in:manager,blogger,user',
        ]);

        if(!$request->role == ""){
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role,
            ]);
            return back()->with('register_complete' , "Registration Complete");
        }else{
            return back()->withErrors(['role' => "please , select role first"])->withInput();
        }



    }
    // data table status
    public function manager_down($id){
        $manager = User::where('id',$id)->first();

        if($manager->role == 'manager'){
            User::find($manager->id)->update([
                'role' => 'user',
                'updated_at' => now(),
            ]);
            return back()->with('register_complete' , "Manager Dimoted Successfully");

        }
    }
// role existing
public function role_index(){
    // user
    $users = User::where('role','user')->where('block',false)->get();
    // blogger
    $bloggers = User::where('role','blogger')->get();

    return view('dashboard.manegement.role.index',[
        'rodrigo' => $users,
            'bloggers' => $bloggers,
    ]);
}

    // role assign
    public function role_assign(Request $request){

        $request->validate([
            'role'=>'required|in:manager,blogger,user',
        ]);
        $user = User::where('id',$request->user_id)->first();
        User::find($user->id)->update([
            'role' =>$request->role,
            'updated_at'=> now(),
        ]);
        return back()->with('role_assign',"Role assign successfull");
    }

// blogger down

    public function blogger_down($id){

        $user = User::where('id', $id)->first();

        if($user->role == 'blogger'){
         User::find($user->id)->update([
            'role' =>'user',
            'updated_at'=> now(),
        ]);
         return back()->with('role_blogger_down',"Blogger down successfull");
        }
    }

    public function user_down($id){

        $user = User::where('id', $id)->first();

        if($user->role == 'user'){
         User::find($user->id)->update([
            'block' =>true,
            'updated_at'=> now(),
        ]);
         return back()->with('role_blogger_down',"Blogger down successfull");
        }
    }
}
