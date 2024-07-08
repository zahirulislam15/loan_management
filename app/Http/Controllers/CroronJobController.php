<?php

namespace App\Http\Controllers;

use App\Models\FDR;
use App\Models\Loan;
use Illuminate\Http\Request;

class CroronJobController extends Controller
{

    /**
     * Cron job Controller For Mantain interest add in every month in Fdr table
     * 
     */
    public function fdr_interest_increment()
    {
        $fdrAccounts = FDR::where('status', '1')->get();
        foreach ($fdrAccounts as $account) {
            $interest = ($account->amount * $account->interest) / 100;
            $interestAmount = $account->interest_amount + $interest;
            $newData = FDR::find($account->id);
            $newData->interest_amount = $interestAmount;
            $newData->save();
            toastr()->success('FDR interest updated Successfully');
            return back();
        }
    }
    /**
     * This function For Mantain interest add in every month in loan table
     * 
     */
    public function loan_interest_increment()
    {
        $fdrAccounts = Loan::where('status', '1')->get();
        foreach ($fdrAccounts as $account) {
            $interest = ($account->total_amount * $account->interest) / 100;
            $interestAmount = $account->interest_amount + $interest;
            $newData = Loan::find($account->id);
            $newData->interest_amount = $interestAmount;
            $newData->save();
            toastr()->success('Loan update Successfully');
            return back();
        }
    }
}
