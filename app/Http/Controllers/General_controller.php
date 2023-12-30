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

class General_controller extends Controller
{
    public function get_colors(){
        $query = "SELECT DISTINCT color FROM car;";
        $ress = DB::select($query);
        return view('admin.View', ['res' => $ress]);
    }
    
}


