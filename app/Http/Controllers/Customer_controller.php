<?php

namespace App\Http\Controllers;

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

}


