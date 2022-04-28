<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Library;
use Illuminate\Support\Facades\Auth;
use Hash;

class UserController extends Controller
{
    //
    public function authenticate(Request $request)
       {
        $credentials = $request->only('email', 'password');
         
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return view('dashboard');
        }
        else{
        return redirect()->back()->withErrors(['msg' =>'Oops! invalid login']);
        }
    }

    public function newuser()
    {
     $libraries = Library::all();
     return view('backend.users.add')->with(compact('libraries'));
    }

    public function saveuser(Request $request)
    {
         $this->validate($request,[
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name' => 'required|min:5|max:35',
                'email' => 'required|unique:users',
                'phone' => 'required|numeric',
                'branch' => 'required|min:4|max:200',
                'role' => 'required|min:1|max:200',
                'password' => 'required|min:4|max:200',

            ],[
                'name.required' => ' The name field is required.',
                'name.min' => ' The first name must be at least 5 characters.',
                'name.max' => ' The first name may not be greater than 100 characters.',        
            ]);

          $imageName = time().'.'.$request->photo->extension();  
          $photo = $request->photo->move(public_path('assets/images/profile'), $imageName);

     

                $user = new User;
                $user->photo = $imageName;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->branch = $request->branch;
                $user->barcode = $request->barcode;
                $user->role = $request->role;
                $user->password = Hash::make($request->password);
                $user->save();

                return redirect()->back()->withErrors(['msg' =>'User was added successfully']);
    }

    public function userlist()
    {
        $users = User::all();
        return view('backend.users.list')->with(compact('users'));
    }
}
