<?php

namespace App\Http\Controllers;

use App\Models\DPS;
use App\Models\FDR;
use App\Models\Loan;
use App\Models\Member;
use App\Models\Transection;
use Illuminate\Http\Request;


class TransectionController extends Controller
{
    /**
     *transection crud.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function transection(Request $request, $id)
    {
        $transection_type = $request->get('transection_type');
        $account_type = $request->account_type;
        $account_id = $request->account_id;
        $transection_amount  = $request->transection_amount;

        $MemberFind = Member::where('id', $id)->where('status', '1')->first();
        $fdrfind = FDR::where('account_number', $id)->where('status', '1')->first();
        $dpsfind = DPS::where('account_number', $id)->where('status', '1')->first();
        $loanfind = Loan::where('account_number', $id)->where('status', '1')->first();

        //member,dps,loan,fdr count
        $Member = Member::where('id', $id)->where('status', '1')->count();
        $fdr = FDR::where('account_number', $id)->where('status', '1')->count();
        $dps = DPS::where('account_number', $id)->where('status', '1')->count();
        $loan = Loan::where('account_number', $id)->where('status', '1')->count();

        //dps transection query
        $dpswithdraw = DPS::where('account_number', $id)->where('status', '1')->sum('amount');
        $dpswithdrawinterest = DPS::where('account_number', $id)->where('status', '1')->sum('interest_amount');
        $total_dps =  $dpswithdraw + $dpswithdrawinterest;

        //fdr transection query
        $fdrwithdraw = FDR::where('account_number', $id)->where('status', '1')->sum('amount');
        $fdrwithdrawinterest = FDR::where('account_number', $id)->where('status', '1')->sum('interest_amount');
        $total_fdr = $fdrwithdraw + $fdrwithdrawinterest;

        //loan transection query
        $loanDeposit = Loan::where('account_number', $id)->where('status', '1')->sum('loan_amount');
        $loanDepositInterest = Loan::where('account_number', $id)->where('status', '1')->sum('interest_amount');
        $total_loan =  $loanDeposit + $loanDepositInterest;

        //transection 
        $transection = new Transection();
        $transection->account_type = $account_type;
        $transection->account_id =  $account_id;
        $transection->transection_type = $transection_type;
        $transection->transection_amount = $transection_amount;

        // Account Type==1(Personal Account) ,Transection Type==1(deposit)
        if ($account_type == 1 && $transection_type == 1) {
            $MemberFind->personal_amount += $transection_amount;
            $MemberFind->save();
            $transection->save();
            //Toaster is used for Alert message
            toastr()->success('Personal Deposit Successfull');
        }
        // Account Type==2(FDR Account) ,Transection Type==1(deposit)
        elseif ($account_type == 2 && $transection_type == 1) {
            if ($fdr) {
                $fdrfind->amount += $transection_amount;
                $fdrfind->interest_amount += ($transection_amount * $fdrfind->interest) / 100;
                $fdrfind->save();
                $transection->save();

                //Toaster is used for Alert message
                toastr()->success('FDR Deposit Successfull');
            } else {
                toastr()->error('You Dont habe FDR account');
            }
        }
        // Account Type==3(DPS Account) ,Transection Type==1(deposit)
        elseif ($account_type == 3 && $transection_type == 1) {
            if ($dps) {
                $dpsfind->amount += $transection_amount;
                $dpsfind->interest_amount += ($transection_amount * $dpsfind->interest) / 100;
                $dpsfind->save();
                $transection->save();
                toastr()->success('DPS Deposit Successfull');
            } else {
                toastr()->error('You Dont habe DPS account');
            }
        }
        // Account Type==4(Loan Account) ,Transection Type==1(deposit)
        elseif ($account_type == 4 && $transection_type == 1) {
            if ($loan) {
                if ($total_loan >= $transection_amount) {
                    $loanfind->loan_amount -= $transection_amount;
                    $loanfind->save();
                    $transection->save();
                    toastr()->success('Loan submit successfull');
                }
            } else {
                toastr()->error('You Dont habe Loan account');
            }
        }
        // Account Type==1(Personal Account) ,Transection Type==1(Withdraw)
        elseif ($account_type == 1 && $transection_type == 2) {
            if ($MemberFind->personal_amount >= $transection_amount) {
                $MemberFind->personal_amount -= $transection_amount;
                $MemberFind->save();
                $transection->save();
                toastr()->success('Personal withdraw Successfull');
            } else {
                toastr()->error('You Have unsufficient Balancee');
            }
        }
        // Account Type==2(FDR Account) ,Transection Type==2(Withdraw)
        elseif ($account_type == 2 && $transection_type == 2) {
            if ($fdr) {
                if ($total_fdr >= $transection_amount) {
                    $fdrfind->amount -= $transection_amount;
                    $fdrfind->save();
                    $transection->save();
                    toastr()->success('FDR withdraw Successfull');
                } else {
                    toastr()->error('You Have unsufficient Balancee');
                }
            } else {
                toastr()->error('You Dont have any FDR account');
            }
        }
        // Account Type==3(DPS Account) ,Transection Type==2(Withdraw)
        elseif ($account_type == 3 && $transection_type == 2) {
            if ($dps) {
                if ($total_dps >= $transection_amount) {
                    $dpsfind->amount -= $transection_amount;
                    $dpsfind->save();
                    $transection->save();
                    toastr()->success('DPS Withdraw Successfull');
                } else {
                    toastr()->error('You Have unsufficient Balance in DPS');
                }
            } else {
                toastr()->error('You dont  Have any Dps Account!');
            }
        }

        // Account Type==4(Loan Account) ,Transection Type==1(Withdraw)
        elseif ($account_type == 4 && $transection_type == 2) {
            toastr()->error('SORRY! You cant Withdraw From Loan');
        } else {
            toastr()->error('SORRY! You Dont Have Any Account');
        }
        return back();
    }
    /**
     *transection History All.
     *
     */
    public function transection_history()
    {
        $history = Transection::where('transection_amount', '!=', '0')->where('transection_amount', '!=', 'null')->get();
        return view('backend.layout.Transection.list', compact('history'));
    }

    /**
     *Single transection History
     *
     * @param  int  $id
     */
    public function single_transection_history($id)
    {
        $history = Transection::where('account_id', $id)->get();
        $data = Member::find($id);
        return view('backend/layout/Transection/View', compact('history', 'data'));
    }
}
