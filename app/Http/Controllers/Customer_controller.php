<?php

namespace App\Http\Controllers;

use Carbon\PHPStan\AbstractMacro;
use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\Customer;
use Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Car;

class Customer_controller extends Controller
{


    public function view_tab()
    {

        return view("customer.View");
    }



    public function rent(Request $request)
    {

        //$office = $request->query('office');
        $color = $request->query('color');
        $year = $request->query('year');
        $model = $request->query('model');
        $district = $request->query('district');
        $city = $request->query('city');
        $country = $request->query('country');
        $start_date = $request->query('start_date');
        $end_date = $request->query('end_date');

        $query = "Select * from car join office on car.office_id = office.office_id";
        $query .= " where current_status = 'available'";








        if ($model) {
            $query .= " and model LIKE :model";
        }

        if ($color) {
            $query .= " and color LIKE :color";
        }

        if ($year) {
            $query .= " and year = :year";
        }
        if ($district) {
            $query .= " and district LIKE :district";
        }
        if ($country) {
            $query .= " and country LIKE :country";
        }
        if ($city) {
            $query .= " and city LIKE :city";
        }

        $query2 = " EXCEPT (SELECT car.* , office.* FROM car join office on car.office_id = office.office_id join rent 
        on car.plate_number = rent.plate_number WHERE rent.start_date <= :start_date AND rent.end_date >= :end_date) ;";
        // if ($office) {
        //     $query .= " and office_id LIKE :office";
        // }
        $query = $query . $query2;
        //dd($query2);
        // $cars = DB::select($query, array_filter([
        //     "model" => ($model) ? ($model . "%") : null,
        //     "color" => ($color) ? ($color . "%") : null,
        //     "year" => $year,
        //     "district" => ($district) ? ($district . "%") : null,
        //     "country" => ($country) ? ($country . "%") : null,
        //     "city" => ($city) ? ($city . "%") : null,
        //     //"office" => $office,
        // ]));

        $cars = DB::select($query, array_merge(array_filter([
            "model" => ($model) ? ($model . "%") : null,
            "color" => ($color) ? ($color . "%") : null,
            "year" => $year,
            "district" => ($district) ? ($district . "%") : null,
            "country" => ($country) ? ($country . "%") : null,
            "city" => ($city) ? ($city . "%") : null,
        ]), [
            "start_date" => $start_date,
            "end_date" => $end_date,
        ]));
        //dd($query);
        session(['s_date' => $start_date]);
        session(['e_date' => $end_date]);
        // $this->s_rent_date =  $start_date;
        // $this->e_rent_date = $end_date;

        return view("customer.rent", compact('cars'));
    }

    public function rentCar(Request $request, $car)
    {
        $custSSN = session()->get('auth')-> SSN;
        
        $start_date = session('s_date'); 
        $end_date = session('e_date');

        if($start_date==null || $end_date == null ){
            return redirect()->back()->withErrors(['date' => 'Please enter a valid date.']);
        }
        else{
       // dd($start_date);
        // Build the SQL query string
        $sql = "INSERT INTO rent (SSN, plate_number, start_date ,end_date, amount_paid) VALUES (?, ?, ?, ?, ?)";
        $query2 = "SELECT price from car where plate_number = :plate_number ";


        $price = DB::select($query2, array_filter([
                "plate_number" => $car
            ]));
        //dd($price[0]-> price );
        $price = (int)$price[0]-> price;
        //dd($price);
        // Perform the insert
        $date1 = Carbon::parse($start_date);
        $date2 = Carbon::parse($end_date);

        $money = ($date1->diffInDays($date2)) * $price;
        //dd($money);
        DB::insert($sql, [ $custSSN, $car, $start_date ,$end_date, $money]);

        session()->flash("success", "Car rented successfully");
        // TODO redirect to pay trips

        $user = session('auth');
        //return view('customer.Profile', ['auth' => $user]);
        return redirect('/user_profile');}
    }
    //    public function search_car(Request $request)
//    {
//
//        //return view('customer.viewCars_cust', compact('results'));
//
//
//    }
    public function view_trips()
    {

        $custSSN = session()->get('auth')-> SSN;
        $query = "SELECT * FROM car JOIN rent on car.plate_number = rent.plate_number
        JOIN office on office.office_id = car.office_id where rent.SSN = '$custSSN' ;";
        
        $results = DB::select($query);
        //dd($results);
        return view("customer.view_trips" ,["results"=>$results]);
    }

}


