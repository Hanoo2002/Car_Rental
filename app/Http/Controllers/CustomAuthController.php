<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customer;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

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
            'f_name'=>'required',
            'l_name'=>'required',
            'country'=>'required',
            'City'=>'required',
            'district'=>'required',
            'p_number'=>'required',
            'card'=>'required',
            'email'=>'required|email|unique:customers',
            'password'=>'required|confirmed|min:6|max:12'
        ]);

        //Insert data into database
        $usr = new Customer;

        $usr->fname = $request->f_name;
        $usr->lname = $request->l_name;
        $usr->city = $request->City;
        $usr->country = $request->country;
        $usr->district = $request->district;
        $usr->phone_number = $request->p_number;
        $usr->email = $request->email;
        $usr->password = bcrypt($request->password);
        $usr->card_number = $request->card;

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

    public function adminLogin(Request $request){
        $admin = Admin::where('email','=',$request->email)->first();
        if($admin)
        {
            // if(Hash::check($request->password,$admin->password))
            if($request->password==$admin->password)
            {
                $request->session()->put('LoggedAdmin',$admin->ssn);
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
        $admin = Admin::where('email','=',$request->email)->first();
        if($admin)
        {
            if(($request->password==$admin->password))
            // if(Hash::check($request->password,$admin->password))
            {
                return $this->userProfile($request);
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
    return view('admin.Profile');
    }


    public function userProfile(Request $request)
    {
        $user = Admin::where('email', '=', $request->email)->first();
        return view('customer.Profile', ['auth' => $user]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
