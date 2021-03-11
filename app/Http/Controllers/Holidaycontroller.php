<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;

class Holidaycontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //holiday list
    public function holidayList()
    {
        return view('holiday-list');
    }
    //addHoliday
    public function addHoliday()
    {
        return view('add-holiday');
    }
    //store 
    public function store(Request $request)
    {
        $holiday=new Holiday();
        $holiday->title=$request->title;
        $holiday->holiday_date=$request->holiday_date;
        $holiday->day=$request->day;
        //return response()->json($holiady);
        $holiday->save();
        return back()->with('holiday_added','Holiday information inserted successfully');

    }
}
