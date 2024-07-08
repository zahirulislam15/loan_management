<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transection;
use Illuminate\Http\Request;

class CashbookController extends Controller
{
    public function cashbook()
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $data['today'] = Carbon::today();
        $data['IncomeList'] = Transection::whereDate('created_at', $data['today'])->where('transection_type', '1')->get();
        $data['ExpenseList'] = Transection::whereDate('created_at', $data['today'])->where('transection_type', '2')->get();

        //Cashbook Data For Today
        $data['dayIncome'] = Transection::whereDate('created_at', $data['today'])->where('transection_type', '1')->sum('transection_amount');
        $data['dayExpense'] = Transection::whereDate('created_at', $data['today'])->where('transection_type', '2')->sum('transection_amount');
        $data['DayDrawer'] =  $data['dayIncome'] - $data['dayExpense'];

        //Cashbook Data For Running Month
        $data['monthDeposit'] = Transection::whereDate('created_at', $data['today'])->where('transection_type', '1')->whereBetween('created_at', [$startDate, $endDate])->sum('transection_amount');
        $data['monthWithraw'] = Transection::whereDate('created_at', $data['today'])->where('transection_type', '2')->whereBetween('created_at', [$startDate, $endDate])->sum('transection_amount');
        $data['MonthDrawer'] =  $data['monthDeposit'] - $data['monthWithraw'];

        return view('backend/layout/Cashbook/book', $data);
    }
}
