<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //expense list
    public function expenseList()
    {
        return view('expense-list');
    }
    //ad expense
    public function addExpense()
    {
        $emps=Employee::where('role','Accountant')->get();
        return view('add-expense',compact('emps'));
    }
    //store 
    public function store(Request $request)
    {
        $expense=new Expense();
        $expense->item_name=$request->item_name;
        $expense->purchase_from=$request->purchase_from;
        $expense->purchase_date=$request->purchase_date;
        $expense->purchase_by=$request->purchase_by;
        $expense->amount=$request->amount;
        $expense->paid_by=$request->paid_by;
        //return response()->json($expense);
        $expense->save();
        return back()->with('expense_added','Expense inserted successfully');
    }
}
