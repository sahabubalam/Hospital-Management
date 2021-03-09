<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Holidaycontroller extends Controller
{
    //holiday list
    public function holidayList()
    {
        return view('holiday-list');
    }
}
