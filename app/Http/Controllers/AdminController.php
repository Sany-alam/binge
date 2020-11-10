<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function add_user(Request $request)
    {

      $this->validation($request);
      $request['password']=Hash::make($request->password);
      user::create($request->except('password_confirmation'));
      return redirect()->back()->with('success',"User Added Successfully");
    }

    public function validation(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_name'=>'required|unique:users',
            'password' => 'required|confirmed',
            'phone_number' => 'required',
            'user_role'=>'required'

        ]);
    }

    public function update_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_name'=>'required|unique:users',
            'phone_number' => 'required',
            'user_role'=>'required'

        ]);
        user::where('id',$request->user_id)->update(['name'=>$request->name,'user_name'=>$request->user_name,'phone_number'=>$request->phone_number,'user_role'=>$request->user_role]);
        return redirect()->route('show_all_user')->with('success','Password Update Successfully');;
    }

    public function show_all_user()
    {
        $users = User::get();
        return view('admin.user_creation',['users'=>$users]);
    }
    public function update_password(Request $request)
    {
        $user_id = $request->id;
        return view('admin.update_password',['user_id'=>$user_id]);
    }

    public function update_user_password(Request $request)
    {
        $request->validate([

            'password' => 'required|confirmed',

        ]);
        $user_id = $request->id;
        $password = Hash::make($request->password);
        user::where('id',$user_id)->update(['password'=>$password]);
        return redirect()->route('show_all_user')->with('success','Password Update Successfully');
    }
    public function order_generate()
    {
        return view('admin.order_generate');
    }
    public function edit_user(Request $request)
    {
        $user_id = $request->id;
       // file_put_contents('test.txt',$user_id);
        $user = User::where('id',$user_id)->first();
        return view('admin.edit_user',['user'=>$user]);
    }
}
