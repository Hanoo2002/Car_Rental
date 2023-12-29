<?php

namespace App\Http\Controllers;

use Carbon\PHPStan\AbstractMacro;
use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\Customer;
use Hash;
use Session;
use App\Models\Car;

class Customer_controller extends Controller
{


    public function view_tab()
    {
        return view("customer.View");
    }

    public function rent()
    {
        return view("customer.rent");
    }

    public function search_car(Request $request){
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

        $results = DB::table('cars')
            ->join('cars_statuses', 'cars.id', '=', 'cars_status.car_id')
            ->where('cars_statuses.status', '=', 'available')
            ->where(function ($query) use ($color, $model, $year, $office) {
                $query->where('cars.color', '=', $color)
                    ->where('cars.model', '=', $model)
                    ->where('cars.year', '=', $year)
                    ->where('cars.office_id', '=', $office);
            })
            ->get();
        return view('customer.viewCars_cust', compact('results'));


    }

}


