<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\Customer;
use Hash;
use Session;
use App\Models\Car;
use App\Models\car_status;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                $msg = "*Failed to update status.";
                return back()->with('fail', $msg);
                
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
            'plateNumber'=>'required',
            'color'=>'required',
            'year'=>'required',
            'model'=>'required',
            'office_id'=>'required',
            'price'=>'required',
            'current_status'=>'required'
        ]);


        DB::beginTransaction();
    
        try {
            $query_car = "INSERT INTO car (plate_number, year, model, color, office_id, price, current_status) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
    
            $query_car_status = "INSERT INTO car_status (plate_number, `date`, `status`) 
                VALUES (?, ?, ?)";
    
            $res = DB::insert($query_car, [
                $request->plateNumber,
                $request->year,
                $request->model,
                $request->color,
                $request->office_id,
                $request->price,
                $request->current_status
            ]);
    
            $res2 = DB::insert($query_car_status, [
                $request->plateNumber,
                Carbon::today(),
                $request->current_status
            ]);
    
            if ($res && $res2) {
                DB::commit();
                return back()->with('success', 'You have added a car successfully');
            } else {
                DB::rollBack();
                return back()->with('fail', 'Something went wrong');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('fail', 'Something went wrong: ' . $e->getMessage());
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
        $conditions = "";

        $office = $request->query('office');
        if (!empty($office)) {
            // $conditions['office_id'] = $office;
            $conditions .= "office_id = $office";
        }

        $color = $request->query('color');
        if (!empty($color)) {
            // $conditions['color'] = $color;
            if (!empty($conditions)) {
                $conditions .= " AND ";
            }
            $conditions .= "color = '$color'";

        }

        $year = $request->query('year');
        if (!empty($year)) {
            // $conditions['year'] = $year;
            if (!empty($conditions)) {
                $conditions .= " AND ";
            }
            $conditions .= "year = $year";
        }

        $model = $request->query('model');
        if (!empty($model)) {
            // $conditions['model'] = $model;
            if (!empty($conditions)) {
                $conditions .= " AND ";
            }
            $conditions .= "model = '$model'";
        }

        $price = $request->query('price');
        if (!empty($price)) {
            // $conditions['price'] = $price;
            if (!empty($conditions)) {
                $conditions .= " AND ";
            }
            $conditions .= "price = $price";
        }

        $current_status = $request->query('current_status');
        if (!empty($current_status)) {
            // $conditions['current_status'] = $current_status;
            if (!empty($conditions)) {
                $conditions .= " AND ";
            }
            $conditions .= "current_status = '$current_status'";
        }
        
        $query = "SELECT * FROM car";
        if (!empty($conditions)) {
            $query .= " WHERE $conditions";
        }

        $results = DB::select($query);
        // dd($results);
        return view('admin.ViewCars_advancedSearch', compact('results'));
    }

    public function originalPage_car(Request $request)
    {
        return view("admin.View");
    }
    
}


