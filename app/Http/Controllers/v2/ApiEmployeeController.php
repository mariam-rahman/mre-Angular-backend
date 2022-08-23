<?php

namespace App\Http\Controllers\v2;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ApiEmployeeController extends Controller
{
    function list()
    {
        return Employee::latest()->get();
    }

    function add(Request $request) 
    {
        // Log::info("request:",$request->all());

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:employees'
        ]);

        if ($validator->fails()) {
          return array(
              'unique_val'=>true
            );
        }

        if ($request->avatar != "") {
            $image_path = $request->avatar->store('images/employee', 'public');
            $emp = new Employee();
            $emp->name = $request->name;
            $emp->email = $request->email;
            $emp->phone = $request->phone;
            $emp->address = $request->address;
            $emp->image = $image_path;
            $emp->joining_date = $request->joining_date;
            $emp->save();

            $salary = new Salary();
            $salary->employee_id = $emp->id;
            $salary->salary = $request->salary;
            $salary->designation = $request->designation;
            $salary->save();
            return response()->json(true);
        } else {
            $emp = new Employee();
            $emp->name = $request->name;
            $emp->email = $request->email;
            $emp->phone = $request->phone;
            $emp->address = $request->address;
            $emp->joining_date = $request->joining_date;
            $emp->save();

            $salary = new Salary();
            $salary->employee_id = $emp->id;
            $salary->salary = $request->salary;
            $salary->designation = $request->designation;
            $salary->save();
            return response()->json(true);
        }
    }

    function deleteEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        // $employee->slips()->delete();
        // $employee->expenses()->delete();
        $employee->salaries()->delete();
        if ($employee->image != "") {
            $image_path = "storage/" . $employee->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        $employee->delete();
        $employee->salaries()->delete();
        return response()->json(true);
    }



    function showEmp($id)
    {
        return Employee::findOrFail($id);
    }

    //code for promotion of employee//
    function promotion($id)
    {
        return Salary::where('employee_id', $id)->orderBy('id', 'desc')->get();
    }


    function addPromotion(Request $request)
    {
        $promote = new Salary();
        $promote->employee_id = $request->employee_id;
        $promote->salary = $request->salary;
        $promote->designation = $request->designation;
        $promote->save();
        return response()->json(true);
    }

    function editPromotion($id)
    {
        return Salary::findOrFail($id);
    }

    function updatePromotion(Request $request)
    {
        $promote = Salary::findOrFail($request->salary_id);
        $promote->salary = $request->salary;
        $promote->designation = $request->designation;
        $promote->update();
        return response()->json(true);
    }

    function editEmployee($id)
    {
        return Employee::findOrFail($id);
    }



    function employeeUpdate(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        if ($request->avatar != null && $request->avatar != 'undefined') {
            $image_path = $request->avatar->store('images/employee', 'public');
            $oldimage = "storage/" . $employee->image;
            if (File::exists($oldimage)) {
                File::delete($oldimage);
            }
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->address = $request->address;
            $employee->joining_date = $request->joining_date;
            $employee->image = $image_path;
        } else {
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->address = $request->address;
            $employee->joining_date = $request->joining_date;
        }
        $employee->update();
        return response()->json(true);
    }

    //Salary portion
    function getSalary($id)
    {
        return Salary::Where('employee_id', $id)->orderBy('id', 'desc')->get();
    }

    function EmpDetailsForSalary($id)
    {
        return Salary::where('employee_id', $id)->latest()->first();
    }

    function addSalary(Request $request)
    {
        Log::info($request->all());
        $designation = Salary::where('employee_id', $request->employee_id)->latest()->first();

        $salary = new Salary();
        $salary->employee_id = $request->employee_id;
        $salary->salary = $request->salary;
        $salary->designation = $designation->designation;
        $salary->save();
        return response()->json(true);
    }
}
