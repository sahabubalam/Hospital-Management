<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // patient list
    public function patientList()
    {
        $patients=Patient::all();
        return view('patient-list',compact('patients'));
    }
    // add patient view

    public function addPatient()
    {
        return view('add-patient');
    }
    //store patient

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'age' => 'required',
            'email' => 'required|unique:patients|max:255',
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required', 
            'state' => 'required',
            'phone' => 'required',
         
        ]);
        $patient =new Patient();
        $patient->name=$request->name;
        $patient->username=$request->username;
        $patient->age=$request->age;
        $patient->email=$request->email;
        $patient->dob=$request->dob;
        $patient->gender=$request->gender;
        $patient->address=$request->address;
        $patient->country=$request->country;
        $patient->city=$request->city;
        $patient->state=$request->state;
        $patient->phone=$request->phone;
        $patient->postal_code=$request->postal_code;
        $patient->save();
       // return response()->json($patient);
       return back()->with('patient_added','Patient inserted successfully');
        
    }
    //patient edit
    public function editPatient($id)
    {
        $patient=Patient::find($id);
        return view('edit-patient',compact('patient'));
    }
    //update 
    public function updatePatient(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'age' => 'required',
            'email' => 'required|max:255',
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required', 
            'state' => 'required',
            'phone' => 'required',
         
        ]);
        $patient=Patient::find($request->id);
        $patient->name=$request->name;
        $patient->username=$request->username;
        $patient->age=$request->age;
        $patient->email=$request->email;
        $patient->dob=$request->dob;
        $patient->gender=$request->gender;
        $patient->address=$request->address;
        $patient->country=$request->country;
        $patient->city=$request->city;
        $patient->state=$request->state;
        $patient->phone=$request->phone;
        $patient->postal_code=$request->postal_code;
        $patient->save();
       // return response()->json($patient);
       return back()->with('patient_updated','Patient inserted successfully');
    }
    //delete patient
    public function deletePatient($id)
    {
        $patient=Patient::find($id);
        $patient->delete();
        //return response()->json($doctor);
        return back()->with('patient_deleted','Patient information deleted successfully');

    }
    
}
