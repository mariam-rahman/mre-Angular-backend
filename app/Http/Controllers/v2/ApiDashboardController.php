<?php

namespace App\Http\Controllers\v2;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Expeneses_detail;
use App\Models\Sale_detail;
use Illuminate\Foundation\Auth\User;

class ApiDashboardController extends Controller
{
    function getCounts(){
        $totalSells = Sale_detail::sum('sell_price');
        $expenses = Expeneses_detail::sum('amount');
        return array(
            "totalEmp"=>Employee::count(),
            "totalUser"=>User::count(),
            "totalSells"=>$totalSells,
            "totalExpenses" => $expenses
        );
    }

   function saleChart($yr)
   {
    $month1= 0;
    $month2= 0;
    $month3= 0;
    $month4= 0;
    $month5= 0;
    $month6= 0;
    $month7= 0;
    $month8= 0;
    $month9= 0;
    $month10= 0;
    $month11= 0;
    $month12= 0;

      $sale_details = Sale_detail::selectRaw('SUM(sell_price) as sell_price')
      ->selectRaw('SUM(qty) as qty')
      ->selectRaw('month(created_at) as m')
      ->groupBy('m')
      ->where('created_at', 'like', '%'.$yr.'%')
      ->get();
      foreach($sale_details as $sell)
      {
          $total_sell = ($sell->sell_price)*($sell->qty);
          switch ($sell->m) {
              case '1':
                  $month1 += $total_sell;
                  break;
              case '2':
                  $month2 += $total_sell;
                  break;
              case '3':
                  $month3 += $total_sell;
                  break;
              case '4':
                  $month4 += $total_sell;
                  break;
              case '5':
                  $month5 += $total_sell;
                  break;
              case '6':
                  $month6 += $total_sell;
                  break;
              case '7':
                  $month7 += $total_sell;
                  break;
              case '8':
                  $month8 += $total_sell;
                  break;
              case '9':
                  $month9 += $total_sell;
                  break;
              case '10':
                  $month10 += $total_sell;
                  break;
              case '11':
                  $month11 += $total_sell;
                  break;
              case '12':
                  $month12 += $total_sell;
                  break;
              default:

                  break;
          }
        }
     return array($month1,$month2,$month3,$month4,$month5,$month6,$month7,$month8,$month9,$month10,$month11,$month12);
   }



}
