<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Department;
use App\Models\Appointment;
use App\Notifications\sendEmailToPatient;
use Notification;
use Noifiable;
use App\Models\User;
use Auth;
use DB;


class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //appointment list

    public function appointmentList()
    {
        return view('appointment-list');
    }
    //add addAppointment
    public function addAppointment()
    {
        $doctors=Doctor::all();
        $patients=Patient::where('status','=','1')->get();
        $departments=Department::where('status','=','1')->get();
        return view('add-appointment',compact('doctors','patients','departments'));
    }
    public function findPatientEmail(Request $request)
    {
        $patient=Patient::where('id',$request->id)->first();
        return response()->json($patient);
    }

    public function store(Request $request)
    {
        //$user =User::find(Auth::id());
        $patient=Patient::select('email')->where('id',$request->patient_id)->first();
        $app=new Appointment();
      
        $app->appointment_id=$request->appointment_id;
        $app->patient_id=$request->patient_id;
        $app->doctor_id=$request->doctor_id;
        $app->department_id=$request->department_id;
        $app->date=$request->date;
        $app->time=$request->time;
        $app->patient_email=$request->patient_email;
        $app->patient_phone=$request->patient_phone;
        $app->message=$request->message;
       // return response()->json($app);
        $app->save();
        $patient->notify(new sendEmailToPatient($patient));
        return back()->with('appointed_added','Appointement added successfully');

    }
}
