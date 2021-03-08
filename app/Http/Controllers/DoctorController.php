<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use DB;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //doctor list

    public function doctor_list()
    {
        $doctors=Doctor::all();
        return view('doctor_list',compact('doctors'));
    }
    //doctor add
    public function doctor_add()
    {
        return view('doctor_add');
    }
    //store doctor

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required',
            'username' => 'required',
            'address' => 'required',
            'email' => 'required|unique:doctors|max:255',
            'dob' => 'required',
            'gender' => 'required', 
            'country' => 'required',
            'city' => 'required', 
            'state' => 'required',
            'phone' => 'required',
            'short_biography' => 'required',
        ]);
        if($request->gender=="male")
        {
            $doctor=new Doctor();
            $doctor->first_name=$request->first_name;
            $doctor->last_name=$request->last_name;
            $doctor->username=$request->username;
            $doctor->title=$request->title;
            $doctor->address=$request->address;
            $doctor->email=$request->email;
            $doctor->dob=$request->dob;
            $doctor->gender=$request->gender;
            $doctor->country=$request->country;
            $doctor->city=$request->city;
            $doctor->state=$request->state;
            $doctor->postal_code=$request->postal_code;
            $doctor->phone=$request->phone;
            $doctor->short_biography=$request->short_biography;
            $image=$request->file('file');
            $imagename=time().'.'.$image->extension();
            $image->move(public_path('doctors'),$imagename);
            $doctor->photo=$imagename;
            $doctor->save();
            return back()->with('doctor_added','doctor information inserted successfully');
            //return response()->json($doctor);
        }
        if($request->gender=="female")
        {
            $doctor=new Doctor();
            $doctor->first_name=$request->first_name;
            $doctor->last_name=$request->last_name;
            $doctor->username=$request->username;
            $doctor->title=$request->title;
            $doctor->address=$request->address;
            $doctor->email=$request->email;
            $doctor->dob=$request->dob;
            $doctor->gender=$request->gender;
            $doctor->country=$request->country;
            $doctor->city=$request->city;
            $doctor->state=$request->state;
            $doctor->postal_code=$request->postal_code;
            $doctor->phone=$request->phone;
            $doctor->short_biography=$request->short_biography;
            $image=$request->file('file');
            $imagename=time().'.'.$image->extension();
            $image->move(public_path('doctors'),$imagename);
            $doctor->photo=$imagename;
            $doctor->save();
            return back()->with('doctor_added','doctor information inserted successfully');
        }
        
    }
    public function editDoctor($id)
    {
        $doctor=Doctor::find($id);
        return view('edit-doctor',compact('doctor'));
    }
    public function updateDoctor(Request $request)
    {
       
        if($request->gender=="male")
        {
            $doctor=Doctor::find($request->id);
            $doctor->first_name=$request->first_name;
            $doctor->last_name=$request->last_name;
            $doctor->username=$request->username;
            $doctor->title=$request->title;
            $doctor->address=$request->address;
            $doctor->email=$request->email;
            $doctor->dob=$request->dob;
            $doctor->gender=$request->gender;
            $doctor->country=$request->country;
            $doctor->city=$request->city;
            $doctor->state=$request->state;
            $doctor->postal_code=$request->postal_code;
            $doctor->phone=$request->phone;
            $doctor->short_biography=$request->short_biography;
            $image=$request->file('file');
            $imagename=time().'.'.$image->extension();
            $image->move(public_path('doctors'),$imagename);
            $doctor->photo=$imagename;
            $doctor->save();
            return back()->with('doctor_updated','doctor information updated successfully');
        }
        if($request->gender=="female")
        {
            $doctor=Doctor::find($request->id);
            $doctor->first_name=$request->first_name;
            $doctor->last_name=$request->last_name;
            $doctor->username=$request->username;
            $doctor->title=$request->title;
            $doctor->address=$request->address;
            $doctor->email=$request->email;
            $doctor->dob=$request->dob;
            $doctor->gender=$request->gender;
            $doctor->country=$request->country;
            $doctor->city=$request->city;
            $doctor->state=$request->state;
            $doctor->postal_code=$request->postal_code;
            $doctor->phone=$request->phone;
            $doctor->short_biography=$request->short_biography;
            $image=$request->file('file');
            $imagename=time().'.'.$image->extension();
            $image->move(public_path('doctors'),$imagename);
            $doctor->photo=$imagename;
            $doctor->save();
            return back()->with('doctor_updated','doctor information updated successfully');
        }

    }
    public function deleteDoctor($id)
    {
        $doctor=Doctor::find($id);
        unlink(public_path('doctors').'/'.$doctor->photo);
        
        $doctor->delete();
        //return response()->json($doctor);
        return back()->with('doctor_deleted','doctor information deleted successfully');

    }
  
}
