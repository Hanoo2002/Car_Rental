<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Hash;
use Session;
use App\Models\Car;

class Admin_controller extends Controller
{
    public function add()
    {
        return view('admin.Add');
    }

    public function update()
    {
        return view('admin.Update');
    }

    public function add_car(Request $request)
    {   
        $request->validate([
            // 'plateNumber'=>'required',
            'color'=>'required',
            'year'=>'required',
            'model'=>'required',
            'office_id'=>'required'
        ]);

        $car = new Car;
        // $car->plateNumber = $request->plateNumber;
        $car->color = $request->color;
        $car->year = $request->year;
        $car->model = $request->model;
        $car->office_id = $request->office_id;
        $res = $car->save();
        if($res)
        {
            return back()->with('success','You have added a car successfully');
        }
        else
        {
            return back()->with('fail','Something went wrong');
        }
    }

    public function register()
    {
        return view("admin.Register");
    }

    public function register_admin(Request $request)
    {
        
        $request->validate([
            'f_name'=>'required',
            'l_name'=>'required',
            'officeID'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|confirmed|min:6|max:12',
            'ssn'=>'required'
        ]);

        //Insert data into database
        $admin = new admin;
        $admin->fname = $request->f_name;
        $admin->lname = $request->l_name;
        $admin->office_id = $request->officeID;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->ssn = $request->ssn;
        $res = $admin->save();
        if($res)
        {
            return back()->with('success','You have registered successfully');
        }
        else
        {
            return back()->with('fail','Something went wrong');
        }        
    }
}
