<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\DoctorSchedule;
use DB;

class DoctorScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //doctorScheduleList 

    public function doctorScheduleList()
    {
       // $schedules=DoctorSchedule::all();

        $schedules=DB::table('doctor_schedules')
        ->join('doctors','doctor_schedules.doctor_id','doctors.id')
        ->join('departments','doctor_schedules.department_id','departments.id')
        ->select('doctor_schedules.*','doctors.first_name','doctors.photo','departments.department_name')
        ->get();

        return view('doctor-schedulelist',compact('schedules'));
    }
   // addDoctorSchedule
   public function addDoctorSchedule()
   {
       $doctors=Doctor::where('status','1')->get();
       $departments=Department::where('status','1')->get();
       return view('add-doctorSchedule',compact('doctors','departments'));
   }
   public function store(Request $request)
   {
       $schedule=new DoctorSchedule();
       $schedule->department_id=$request->department_id;
       $schedule->doctor_id=$request->doctor_id;
       $schedule->available_days=$request->available_days;
       $schedule->available_time=$request->available_time;
       $schedule->message=$request->message;
       //return response()->json($schedule);
       $schedule->save();
       return back()->with('doctorschedule_added','Doctore schedule inserted successfully');

   }
   //update status
   public function updateStatus($id)
   {
    $schedule=DoctorSchedule::find($id);
    if($schedule->status=='1')
    {
        $status='0';
    }
    else
    {
        $status='1';
    }
   // $value=array('status'=>$status);
    $schedule->status=$status;
    $schedule->save();
    //DB::table('departments')->where('id',$id)->update($value);
    return back()->with('status_updated','Status updated successfully');
   }
}
