<?php

namespace App\Http\Controllers;

use App\Models\Slip;
use App\Models\Contract;
use App\Models\Employee;
use App\Models\Salary;
use App\Models\User;
//use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/employee/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_path = "";
        if ($request->image != "")
            $image_path = $request->image->store('images/employee', 'public');
        // Employee::create(array_merge(
        //     $request->except('image'),
        //     ['image' => $image_path]
        // ));

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->image = $image_path;
        $employee->joining_date = $request->joining_date;
        $employee->save();
        
        $salary = new Salary();
        $salary->employee_id = $employee->id;
        $salary->salary = $request->salary;
        $salary->designation = $request->designation;
        $salary->save();
        return redirect(route('employee.index'));

    
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        return view('admin/employee/show', compact('id'));
    }

    
    public function promote(Request $request){

        $salary = new Salary();
        $salary->employee_id = $request->emp_id;
        $salary->salary = $request->salary;
        $salary->designation = $request->designation;
        $salary->save();
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        
        return view('admin/employee/edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        if ($request->image != "") {
            $oldimage = "storage/" . $employee->image;
            if (File::exists($oldimage)) {
                File::delete($oldimage);
            }
            $newimage = $request->image->store('images/employee', 'public');
            $employee->update(array_merge(
                $request->except('image'),
                ['image' => $newimage]
            ));
        } else { 
            $employee->update($request->except('image'));
        }
        
        return redirect(route('employee.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        // $employee->slips()->delete();
        // $employee->expenses()->delete();
        // if ($employee->image != "") {
        //     $image_path = "storage/" . $employee->image;
        //     if (File::exists($image_path)) {
        //         File::delete($image_path);
        //     }
        // }
        // $employee->delete();

        // return redirect(route('employee.index'));
    }

    public function payForm(Employee $employee){
    return view('admin\employee\payForm2',compact('employee'));
    }

    public function pay(Request $request)
{
    Slip::create($request->all());
    // $slip = new Slip();
    // $slip->employee_id = $request->employee_id;
    // $slip->payment = $request->payment;
    // $slip->payment_date = $request->payment_date;
    //  $slip->save();
 
    return redirect()->back();
}
}
