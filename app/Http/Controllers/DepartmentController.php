<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use DB;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //department list

    public function departmentList()
    {
        $departments=Department::all();
        return view('department-list',compact('departments'));
    }
    public function addDepartment()
    {
        return view('add-department');
    }
    public function store(Request $request)
    {
        $department=new Department();
        $department->department_name=$request->department_name;
        $department->description=$request->description;
        $department->save();
      //  return response()->json($department);
      return back()->with('department_added','Department inserted successfully');
    }
    public function updateStatus($id)
    {
       // $department=DB::table('departments')->select('status')->where('id',$id)->first();
        $department=Department::find($id);
        if($department->status=='1')
        {
            $status='0';
        }
        else
        {
            $status='1';
        }
       // $value=array('status'=>$status);
        $department->status=$status;
        $department->save();
        //DB::table('departments')->where('id',$id)->update($value);
        return back()->with('status_updated','Status updated successfully');

    }
    //edit department
    public function editDepartment($id)
    {
        $department=Department::find($id);
        return view('edit-department',compact('department'));
    }
    //update department 
    public function updateDepartment(Request $request)
    {
        $validatedData = $request->validate([
            'department_name' => 'required|max:255',
        ]);
        $department=Department::find($request->id);
        $department->department_name=$request->department_name;
        $department->description=$request->description;
        $department->save();
        //return response()->json($department);
      return back()->with('department_updated','Department updated successfully');
    }
    //delete department
    public function deleteDepartment($id)
    {
        $department=Department::find($id);
        $department->delete();
        //return response()->json($doctor);
        return back()->with('departmentt_deleted','Department information deleted successfully');

    }
}
