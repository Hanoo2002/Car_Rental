<?php

namespace App\Http\Controllers;

use Carbon\PHPStan\AbstractMacro;
use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\Customer;
use Hash;
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
        $office = $request->query('office');
        $color = $request->query('color');
        $year = $request->query('year');
        $model = $request->query('model');

        $query = "Select * from cars join car_statuses on cars.car_id = car_statuses.car_id";
        $query .= " where car_statuses.status = 'available'";

        if ($model) {
            $query .= " and model LIKE :model";
        }

        if ($color) {
            $query .= " and color = :color";
        }

        if ($year) {
            $query .= " and year = :year";
        }

        if ($office) {
            $query .= " and office_id = :office";
        }

        $cars = DB::select($query, collect([
            "model" => $model . "%",
            "color" => $color,
            "year" => $year,
            "office" => $office,
        ])->filter()->all());

        dd($query, $cars);


        $cars = DB::table('cars')
            ->join('car_statuses', 'cars.car_id', '=', 'car_statuses.car_id')
            ->where('car_statuses.status', '=', 'available')
            ->where(function ($query) use ($color, $model, $year, $office) {
                $query
                    ->when(
                        $color,
                        fn($q) => $q->where('cars.color', '=', $color)
                    )
                    ->when(
                        $model,
                        fn($q) => $q->where('cars.model', '=', $model)
                    )
                    ->when(
                        $year,
                        fn($q) => $q->where('cars.year', '=', $year)
                    )
                    ->when(
                        $office,
                        fn($q) => $q->where('cars.office_id', '=', $office)
                    );
            })
            ->get();
        return view("customer.rent", compact('cars'));
    }

    public function search_car(Request $request)
    {

        //return view('customer.viewCars_cust', compact('results'));


    }

}


