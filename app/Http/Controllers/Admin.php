<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class Admin extends Controller
{
    public function add()
    {
        return view('admin.Add');
    }

    public function add_car(Request $request)
    {
        $request->validate([
            'plateNumber'=>'required',
            'color'=>'required',
            'year'=>'required',
            'model'=>'required',
            'country'=>'required'
        ]);

        // $car = new Car;
        // $car->plateNumber = $request->plateNumber;
        // $car->color = $request->color;
        // $car->year = $request->year;
        // $car->model = $request->model;
        // $car->country = $request->country;
        // $res = $car->save();
        // if($res)
        // {
        //     return back()->with('success','You have added a car successfully');
        // }
        // else
        // {
        //     return back()->with('fail','Something went wrong');
        // }

    }
}
