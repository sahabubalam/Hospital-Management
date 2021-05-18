<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffSalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //staff salary list

    public function staffSalaryList()
    {
        return view('staff-salary-list');
    }
}
