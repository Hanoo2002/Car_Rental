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

    public function rentCar($car)
    {
        dd(auth()->id());

        // TODO query to rent car

        $updateQuery = "UPDATE car
        SET status = 'busy'
        WHERE car.plate_number = :id";

        DB::update($updateQuery, array_filter([

            "id" => $car,
        ]));

        // Build the SQL query string
        $sql = "INSERT INTO car_status (plate_number, status ,date) VALUES (?, ?, ?)";

        // Perform the insert
        DB::insert($sql, [ $car, 'busy' ,Carbon::now()]);

        session()->flash("success", "Car rented successfully");

        return back();
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


        // if ($office) {
        //     $query .= " and office_id LIKE :office";
        // }

        $cars = DB::select($query, array_filter([
            "model" => ($model) ? ($model . "%") : null,
            "color" => ($color) ? ($color . "%") : null,
            "year" => $year,
            "district" => ($district) ? ($district . "%") : null,
            "country" => ($country) ? ($country . "%") : null,
            "city" => ($city) ? ($city . "%") : null,
            //"office" => $office,
        ]));


        return view("customer.rent", compact('cars'));
    }

    //    public function search_car(Request $request)
//    {
//
//        //return view('customer.viewCars_cust', compact('results'));
//
//
//    }

}


