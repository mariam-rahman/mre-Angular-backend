<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Models\Expeneses_detail;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApiExpenseController extends Controller
{
    function list()
    {
        return Expense::all();
    }

    function create(Request $request)
    {
        $expen = new Expense();
        $expen->name = $request->name;
        $expen->discription = $request->discription;
        $expen->save();
        return response()->json(true);
    }

    function update(Request $request, $id)
    {
        $expen = Expense::find($id);
        $expen->name = $request->name;
        $expen->discription = $request->discription;
        if ($expen->update()) return response()->json(true);
        else return response()->json(false);
    }

    function delete($id)
    {
        if (Expense::destroy($id)) return response()->json(true);
        else return response()->json(false);
    }
    function childList(Request $request, $id)
    {
        $query = Expeneses_detail::query();
        $expenses = null;
        $count = 0;
        $data = json_encode($request->data);
        $d = json_decode($data);
        $start = $d->start;
        $length = $d->length;
        $query->select('e.id', 'e.amount', 'e.event', 'e.date','e.description', 'u.name as employee_name')
            ->from('expeneses_details as e')
            ->join('users as u', 'u.id', '=', 'e.employee_id')
            ->where('e.expense_id', '=', $id)
            ->orderBy('id', 'desc')
            ->skip($start)
            ->take($length);
        if ($request->filters != null) {
            $filter = json_encode($request->filters);
            $f = json_decode($filter);
            $expenses = $query->where('emp.name', 'like', '%' . $f->employee ?? '' . '%')
                ->get();
            $count = count($expenses);
        } else {
            $expenses = $query->get();
            $count = Expeneses_detail::where('expense_id',$id)->count();
        }
        return array(
            'data' => $expenses,
            'count' => $count
        );
    }

    function childCreate(Request $request)
    {
        $exp = new Expeneses_detail();
        $exp->expense_id = $request->expense_id;
        $exp->amount = $request->amount;
        $exp->event = $request->event;
        $exp->description = $request->description;
        $exp->date = $request->date;
        $exp->employee_id = Auth::user()->id;
       if($exp->save()) return response()->json(true);
       else return response()->json(false);
    }

    function childUpdate(Request $request,$id)
    {
        $exp = Expeneses_detail::find($id);
        $exp->amount = $request->amount;
        $exp->event = $request->event;
        $exp->description = $request->description;
        $exp->date = $request->date;
        $exp->employee_id = Auth::user()->id;
       if($exp->update()) return response()->json(true);
       else return response()->json(false);
    }

    function childDelete($id)
    {
        if (Expeneses_detail::destroy($id)) return response()->json(true);
        else return response()->json(false);
    }
}
