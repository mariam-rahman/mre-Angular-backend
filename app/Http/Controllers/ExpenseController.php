<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index(){
        $employees = Employee::all();
        $expenses = Expense::all();
        return view('admin/expense/index',compact('expenses','employees'));
    }

    public function create(){

    }

    public function store(Request $request){
        Expense::create($request->all());
        return redirect(route('expense.index'));
    }


    public function show(){
        
    }

    public function edit(Expense $expense){
        $employees = Employee::all();
        return view('admin/expense/edit',compact('expense','employees'));
    }


    public function update(Request $request, Expense $expense){
        
        $expense->update($request->all());
        return redirect(route('expense.index'));
    }



    public function destroy(Expense $expense){
        $expense->delete();
        return redirect(route('expense.index'));

    }

}
