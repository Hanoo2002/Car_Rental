<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\office;
use App\Models\Customer;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'p_number'=>'required',
            'card'=>'required',
            'email'=>'required|email|unique:customer',
            'password'=>'required|confirmed|min:6|max:12'
        ]);        
        
        try {
            $query = "INSERT INTO `customer` (SSN, fname, lname, phone_number , email , `password` , `card_number`) VALUES (?, ?, ?, ?, ?, ?,?)";
            $res = DB::insert($query, [
                $request->SSN,
                $request->f_name,
                $request->l_name,
                $request->p_number,
                $request->email,
                // bcrypt($request->password)
                $request->password,
                $request->card_number
            ]);
            if($res)
            {
                return back()->with('success','You have registered successfully');
            }
            else
            {
                return back()->with('fail','Something went wrong');
            }       
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return back()->with('fail', 'Failed to add customer. SSN exists.');
            }
           else {                
                return back()->with('fail', 'Failed to add admin. Error: ' . $e->getMessage());
            }
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
        $email = $request->email;
        $query = "SELECT *
            FROM admin
            INNER JOIN office ON admin.office_id = office.office_id
            WHERE admin.email = '$email'";

        $res = DB::select($query);
        $admin = count($res) > 0 ? $res[0] : null;        
        if($admin)
        {
            // if(Hash::check($request->password,$admin->password))
            if($request->password==$admin->password)
            {
                session(['adminAuth' => $admin]);  
                return $this->adminProfile($request);
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
        // $user = Customer::where('email','=',$request->email)->first();
        $email = $request->email;
        $query = "SELECT *
            FROM customer
            WHERE customer.email = '$email'";

        $res = DB::select($query);
        $customer = count($res) > 0 ? $res[0] : null;
        if($customer)
        {
            if(($request->password==$customer->password))
            // if(Hash::check($request->password,$user->password))
            {
                $user_data = $customer;
                session(['auth' => $customer]);
                
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

    public function adminProfile(Request $request){
        $admin = session('adminAuth');
        return view('admin.Profile',['adminAuth'=>$admin]);
    }


    public function userProfile(Request $request)
    {
        $user = session('auth');
        return view('customer.Profile', ['auth' => $user]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }


}
