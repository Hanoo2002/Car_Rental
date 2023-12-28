<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function register()
    {
        return view("auth.register");
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:6|max:12'
        ]);

        // //Insert data into database
        $usr = new User;
        $usr->name = $request->name;
        $usr->email = $request->email;
        $usr->password = bcrypt($request->password);
        $res = $usr->save();
        if($res)
        {
            return back()->with('success','You have registered successfully');
        }
        else
        {
            return back()->with('fail','Something went wrong');
        }        
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:12'
        ]);
        $selected_user = $request->input('user');
        if($selected_user == 'Admin')
        {
            return $this->adminLogin($request);
        }
        else
        {
            return $this->userLogin($request);
        }
    }

    public function adminLogin(Request $request)
    {
        $user = User::where('email','=',$request->email)->first();
        if($user)
        {
            if(Hash::check($request->password,$user->password))
            {
                $request->session()->put('LoggedUser',$user->id);
                return redirect('admin_profile');
            }
            else
            {
                return back()->with('fail','Invalid password');
            }
        }
        else
        {
            return back()->with('fail','No account found for this email');
        }
    }

    public function userLogin(Request $request)
    {
        $user = User::where('email','=',$request->email)->first();
        if($user)
        {
            if(Hash::check($request->password,$user->password))
            {
                $request->session()->put('LoggedUser',$user->id);
                return redirect('user_profile');
            }
            else
            {
                return back()->with('fail','Invalid password');
            }
        }
        else
        {
            return back()->with('fail','No account found for this email');
        }
    }

    public function adminProfile()
    {
        return view('admin_page.mainWindow');
        // return "admin profile page";
    }

    public function userProfile()
    {
        return "user profile page";
    }
}
