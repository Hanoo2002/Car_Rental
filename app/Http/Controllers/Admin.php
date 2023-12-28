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
}
