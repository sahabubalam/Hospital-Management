<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employeeleave;
use App\Models\Employee;
use App\Notifications\sendEmailToEmployee;
use Notification;
use DB;

class EmployeeLeaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //employeeLeaveList

    public function  employeeLeaveList()
    {
        $leaveemp=DB::table('employeeleaves')
        ->join('employees','employeeleaves.employee_id','employees.id')
        ->select('employeeleaves.*','employees.first_name','employees.photo','employees.role')
        ->get();
        return view('employee-leave-list',compact('leaveemp'));
    }
    //addEmployeeLeaveList
    public function addEmployeeLeaveList()
    {
        $employees=Employee::all();
        return view('add-employee-leave',compact('employees'));
    }
    //store leave

    public function store(Request $request)
    {
        $leave=new Employeeleave();
        $leave->leave_type=$request->leave_type;
        $leave->employee_id=$request->employee_id;
        $leave->from=$request->from;
        $leave->to=$request->to;
        $leave->no_of_days=$request->no_of_days;
        $leave->leave_reason=$request->leave_reason;
       // return response()->json($leave);
       $leave->save();
        return back()->with('employee_leave','Employee application inserted successfully');
    }
    public function approved($id)
    {
        $approved=Employeeleave::find($id);
        $emp=$approved->employee_id;
        $msg=Employee::find($emp);
        if($approved->status=='0')
        {
            $status='1';
            $approved->status=$status;
            $approved->save();
            $msg->notify(new sendEmailToEmployee($msg));
            return back()->with('status_updated','Status updated successfully');
        }
        else
        {
            $status='0';
        }
    }
    //edit leave
    public function editLeave($id)
    {
        
        $employees=Employee::all();
        $empLeave=Employeeleave::find($id);
        return view('edit-employee-leave',compact('employees','empLeave'));
    }
    public function updateEmployeeLeave(Request $request)
    {
        $validatedData = $request->validate([
            'leave_type' => 'required|max:255',
            'employee_id' => 'required',
            'from' => 'required',
            'to' => 'required',
            'no_of_days' => 'required', 
          
        ]);
        $leave=Employeeleave::find($request->id);
        $leave->leave_type=$request->leave_type;
        $leave->employee_id=$request->employee_id;
        $leave->from=$request->from;
        $leave->to=$request->to;
        $leave->no_of_days=$request->no_of_days;
        $leave->leave_reason=$request->leave_reason;
       // return response()->json($leave);
       $leave->save();
        return back()->with('employee_leave','Employee application updated successfully');  
    }
    //delete leave
    public function deleteLeave($id)
    {
        $leave=Employeeleave::find($id);
        $leave->delete();
        //return response()->json($doctor);
        return back()->with('leave_deleted','Employee leave information deleted successfully');
    } 
}
