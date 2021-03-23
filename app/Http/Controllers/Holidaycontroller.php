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
        $holiday=Holiday::all();
        return view('holiday-list',compact('holiday'));
    }
    //addHoliday
    public function addHoliday()
    {
        return view('add-holiday');
    }
    //store 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'holiday_date' => 'required',
            'day' => 'required',
        ]);
        $holiday=new Holiday();
        $holiday->title=$request->title;
        $holiday->holiday_date=$request->holiday_date;
        $holiday->day=$request->day;
        //return response()->json($holiady);
        $holiday->save();
        return back()->with('holiday_added','Holiday information inserted successfully');

    }
    //edit holiday
    public function editHoliday($id)
    {
        $holiday=Holiday::find($id);
        return view('edit-holiday',compact('holiday'));
    }
    //update holiday
    public function updateHoliday(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'holiday_date' => 'required',
            'day' => 'required',
        ]);
        $holiday=Holiday::find($request->id);
        $holiday->title=$request->title;
        $holiday->holiday_date=$request->holiday_date;
        $holiday->day=$request->day;
       // return response()->json($holiday);
        $holiday->save();
        return back()->with('holiday_update','Holiday information updated successfully');
    }
}
