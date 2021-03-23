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
        $expenses=Expense::all();
        return view('expense-list',compact('expenses'));
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
        $validatedData = $request->validate([
            'item_name' => 'required|max:255',
            'purchase_from' => 'required',
            'purchase_date' => 'required',
            'purchase_by' => 'required',
            'amount' => 'required', 
            'paid_by' => 'required', 
          
        ]);
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
    //edit expense 
    public function editExpense($id)
    {
        $emps=Employee::all();
        $expense=Expense::find($id);
        return view('edit-expense',compact('expense','emps'));
    }
    //update expense 
    public function updateExpense(Request $request)
    {
        $validatedData = $request->validate([
            'item_name' => 'required|max:255',
            'purchase_from' => 'required',
            'purchase_date' => 'required',
            'purchase_by' => 'required',
            'amount' => 'required', 
            'paid_by' => 'required', 
          
        ]);
        $expense=Expense::find($request->id);
        $expense->item_name=$request->item_name;
        $expense->purchase_from=$request->purchase_from;
        $expense->purchase_date=$request->purchase_date;
        $expense->purchase_by=$request->purchase_by;
        $expense->amount=$request->amount;
        $expense->paid_by=$request->paid_by;
       // return response()->json($expense);
        $expense->save();
        return back()->with('expense_updated','Expense updated successfully');
    }
    //delete expense 
    public function deleteExpense($id)
    {
        $expense=Expense::find($id);
        $expense->delete();
        //return response()->json($doctor);
        return back()->with('expense_deleted','Expenses information deleted successfully');
    }
}
