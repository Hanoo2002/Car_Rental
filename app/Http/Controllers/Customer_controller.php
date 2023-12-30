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

        $updateQuery = "UPDATE car_statuses
        SET status = 'Booked'
        WHERE car_statuses.car_id = :id";

        DB::update($updateQuery, array_filter([

            "id" => $car,
        ]));

        $column1Value = 'value1';
        $column2Value = 'value2';
        $column3Value = 'value3';
        $column4Value = 'value4';

        // Build the SQL query string
        $sql = "INSERT INTO procedures (cust_id, car_id ,date, procedure) VALUES (?, ?, ?, ?)";

        // Perform the insert
        DB::insert($sql, [auth()->cust_id(), $car, Carbon::now(), "Rent"]);

        session()->flash("success", "Car rented successfully");

        return back();
    }

    public function rent(Request $request)
    {
        $office = $request->query('office');
        $color = $request->query('color');
        $year = $request->query('year');
        $model = $request->query('model');
        $district = $request->query('district');

        $query = "Select * from cars join car_statuses on cars.car_id = car_statuses.car_id ";
        $query .= " where car_statuses.status = 'available'";

        if ($model) {
            $query .= " and model LIKE :model";
        }

        if ($color) {
            $query .= " and color LIKE :color";
        }

        if ($year) {
            $query .= " and year = :year";
        }

        if ($office) {
            $query .= " and office_id LIKE :office";
        }

        $cars = DB::select($query, array_filter([
            "model" => ($model) ? ($model . "%") : null,
            "color" => ($color) ? ($color . "%") : null,
            "year" => $year,
            "office" => $office,
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


