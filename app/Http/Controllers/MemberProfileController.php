<?php

namespace App\Http\Controllers;

use App\Models\DPS;
use App\Models\FDR;
use App\Models\Fee;
use App\Models\Loan;
use App\Models\Member;
use App\Models\Transection;
use App\Http\Controllers\Controller;

class MemberProfileController extends Controller
{

    public function profile($id)
    {
        $data['fees'] = Fee::all();
        $data['member'] = Member::find($id);
        //loan find
        $data['loan'] = Loan::where('account_number', $id)->first();

        //deposit find
        $data['dps'] = DPS::where('status', '1')->where('account_number', $id)->first();

        //fdr  find
        $data['fdr'] = FDR::where('status', '1')->where('account_number', $id)->first();

        //Personal Account Find
        $data['Account'] = Member::where('status', '1')->where('id', $id)->first();

        //For showing Loan history
        $data['loanHistory'] = Transection::where('account_id', $data['member']->id)->where('account_type', '4')->get();

        //For showing DPS history
        $data['dpsHistory'] = Transection::where('status', '1')->where('account_id', $id)->where('account_type', '3')->get();

        //For showing FDR history
        $data['fdrHistory'] = Transection::where('status', '1')->where('account_id', $id)->where('account_type', '2')->get();

        //For showing Personal Account history
        $data['AccountHistory'] = Transection::where('status', '1')->where('account_id', $id)->where('account_type', '1')->get();

        return view('backend.layout.Member.profile', $data);
    }

    //This function is usig For Profile View Every Member
    public function profileView($id)
    {
        $data = Member::find($id);
        return view('backend.layout.Office.ViewProfile', compact('data'));
    }
}
