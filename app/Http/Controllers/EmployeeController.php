<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use DB;
use Noifiable;
use App\Notifications\sendEmailToEmployee;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // employee list

    public function employeeList()
    {
        $employees=Employee::all();
        return view('employee-list',compact('employees'));
    }
    //add employee view

    public function addEmployee()
    {
        return view('add-employee');
    }
    //store employee
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required',
            'email' => 'required',
            'date' => 'required',
            'role' => 'required', 
           // 'photo' => 'required', 
            
            
        ]);
        $employee=new Employee();
        $employee->first_name=$request->first_name;
        $employee->last_name=$request->last_name;
        $employee->email=$request->email;
        $employee->employee_id=$request->employee_id;
        $employee->date=$request->date;
        $employee->phone=$request->phone;
        $employee->role=$request->role;
        $image=$request->file('file');
        if($image)
        {
            $imagename=time().'.'.$image->extension();
            $image->move(public_path('employees'),$imagename);
            $employee->photo=$imagename;
            $employee->save();
            //return response()->json($employee);
           return back()->with('employee_added','Employee information inserted successfully');
        }
        $employee->save();
        //return response()->json($employee);
        return back()->with('employee_added','Employee information inserted successfully');
        
    }
    //edit employee
    public function editEmployee($id)
    {
        $employee=Employee::find($id);
        return view('edit-employee',compact('employee'));
    }
    //update employee 
    public function updateEmployee(Request $request)
    {
        $employee=Employee::find($request->id);
        $employee->first_name=$request->first_name;
        $employee->last_name=$request->last_name;
        $employee->email=$request->email;
        $employee->employee_id=$request->employee_id;
        $employee->date=$request->date;
        $employee->phone=$request->phone;
        $employee->role=$request->role;
        $image=$request->file('file');
        if($image)
        {
            $imagename=time().'.'.$image->extension();
            $image->move(public_path('employees'),$imagename);
            $employee->photo=$imagename;
            $employee->save();
           // return response()->json($employee);
           return back()->with('employee_updated','Employee information inserted successfully');
        }
           $employee->save();
           // return response()->json($employee);
           return back()->with('employee_updated','Employee information inserted successfully');


    }
    //delete employee
    public function deleteEmployee($id)
    {
        $employee=Employee::find($id);
        $image=$employee->photo;
        if($image)
        {
            unlink(public_path('employees').'/'.$employee->photo);
        
            $employee->delete();
            return back()->with('employee_deleted','Employee information deleted successfully');
        }
        $employee->delete();
        return back()->with('employee_deleted','Employee information deleted successfully');
    }
}
