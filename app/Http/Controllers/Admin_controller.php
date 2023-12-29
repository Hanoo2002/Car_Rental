<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\Customer;
use Hash;
use Session;
use App\Models\Car;
use App\Models\car_status;

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

    public function update_car(Request $request){
        $request->validate([
            'plateNumber' => 'required',
            'status' => 'required'
        ]);
    
        // $car = Car::where('plate_number', $request->input('plateNumber'))->first();
        $car = Car::where('car_id', $request->input('plateNumber'))->first();
    
        if ($car) {
            $carStatus = car_status::updateOrCreate(
                ['car_id' => $car->car_id],
                ['status' => $request->input('status')],
                ['updated_at' => now()]
            );
    
            if ($carStatus) {
                $msg = "*Status updated successfully for car with plate number: " . $request->input('plateNumber');
                return back()->with('success', $msg);
            } else {
                return back()->with('fail', $msg);
                $msg = "*Failed to update status.";
            }
        } else {
            $msg = "*Car with plate number " . $request->input('plateNumber') . " not found.";
            return back()->with('fail', $msg);
        }
    }

    public function delete_car(Request $request){
        $request->validate([
            'plateNumber' => 'required'
        ]);
    
        // $car = Car::where('plate_number', $request->input('plateNumber'))->first();
        $car = Car::where('car_id', $request->input('plateNumber'))->first();
    
        if ($car) {
            $car->delete(); // Delete the car record
    
            $msg = "*Car with plate number: " . $request->input('plateNumber') . " deleted successfully.";
            return back()->with('success', $msg);
        } else {
            $msg = "*Car with plate number " . $request->input('plateNumber') . " not found.";
            return back()->with('fail', $msg);
        }
    }
    

    public function users()
    {
        $users = Customer::all();
        return view('admin.Users',['users'=>$users]);
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

    public function view_tab()
    {
        return view("admin.View");
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

    public function originalPage(Request $request)
    {
        return $this->users();
    }

    public function search(Request $request){
    $searchQuery = $request->input('search');

    $query = Customer::query();

    if ($searchQuery) {
        $query->where(function ($subQuery) use ($searchQuery) {
            $subQuery->where('fname', 'LIKE', "%$searchQuery%")
                ->orWhere('lname', 'LIKE', "%$searchQuery%")
                ->orWhere('email', 'LIKE', "%$searchQuery%")
                ->orWhere('phone_number', 'LIKE', "%$searchQuery%")
                ->orWhere('district', 'LIKE', "%$searchQuery%")
                ->orWhere('city', 'LIKE', "%$searchQuery%")
                ->orWhere('country', 'LIKE', "%$searchQuery%");
        });
    }
    
    $users = $query->get();

    return view('admin.Users', compact('users'));
    }

    public function search_car_admin(Request $request){
        $conditions = [];

        $office = $request->query('office');
        if (!empty($office)) {
            $conditions['office_id'] = $office;
        }

        $color = $request->query('color');
        if (!empty($color)) {
            $conditions['color'] = $color;
        }

        $year = $request->query('year');
        if (!empty($year)) {
            $conditions['year'] = $year;
        }

        $model = $request->query('model');
        if (!empty($model)) {
            $conditions['model'] = $model;
        }

        // $time = $request->query('time');
        // if (!empty($time)) {
        //     $conditions['time'] = $time;
        // }

        // $type = $request->query('type');
        // if (!empty($type)) {
        //     $conditions['type'] = $type;
        // }

        // $plate = $request->query('plate');
        // if (!empty($plate)) {
        //     $conditions['plate'] = $plate;
        // }

        
        $results = Car::where($conditions)->get();
        return view('admin.ViewCars_advancedSearch', compact('results'));
    }

    public function originalPage_car(Request $request)
    {
        return view("admin.View");
    }
    
}


