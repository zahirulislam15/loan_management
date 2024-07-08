<?php

namespace App\Http\Controllers;

use alert;
use Carbon\Carbon;
use App\Models\FDR;
use App\Models\Member;
use App\Models\Transection;
use Illuminate\Http\Request;

/**
 * This Controller is using For Fdr Management
 */
class FDRController extends Controller
{
    public function fdr_list()
    {
        $fdr = FDR::where('status', '0')->get();
        return view('backend.layout.FDR.fdr_list_close', compact('fdr'));
    }
    public function fdr_list_all()
    {
        $fdr = FDR::where('status', '1')->get();
        return view('backend.layout.FDR.fdr_list_all', compact('fdr'));
    }

    public function  fdr_create()
    {
        $account = Member::where('status', '1')->get();
        return view('backend.layout.FDR.fdr_create', compact('account'));
    }
    public function fdr_edit($id)
    {
        $data['edit'] = FDR::find($id);
        $data['account'] = Member::where('status', '1')->get();
        return view('backend.layout.FDR.fdr_edit', $data);
    }
    public function fdr_status_post($id)
    {
        $data = FDR::find($id);
        $data1 = Transection::where('account_id', $data->account_number)->where('account_type', '2')->get();

        if ($data->status == 0) {
            $data->update([
                'status' => '1',
            ]);
            foreach ($data1 as $data2) {
                $data2->status = 1;
                $data2->save();
            }
        } else {
            $data->update([
                'status' => '0',
            ]);
            foreach ($data1 as $data2) {
                $data2->status = 0;
                $data2->save();
            }
        }
        toastr()->success('Status Update Successfully');
        return back();
    }

    /**
     * This Function is using For Fdr Create in FDR Table Also Transection Table
     */
    public function fdr_create_post(Request $request)
    {
        $currentDate = Carbon::now();

        $fdr = new FDR();
        $fdr->account_number =  $request->get('account_number');
        $fdr->amount =  $request->get('amount');
        $fdr->interest =  $request->get('interest');
        $fdr->month = $request->get('month');
        $fdr->interest_amount = ($request->get('amount') * $request->get('interest') / 100);
        $fdr->close_date = $currentDate->addMonths($request->month);
        $fdr->save();

        //For saving in Transection Table
        $transaction = new Transection();
        $transaction->account_id = $request->get('account_number');
        $transaction->account_type = '2';
        $transaction->transection_type = '1';
        $transaction->transection_amount = $request->get('amount');

        $transaction->save();
        toastr()->success('FDR Create Successfully');

        return to_route('fdr.list.all');
    }
    
    public function fdr_edit_post(Request $request, $id)
    {
        $currentDate = Carbon::now();
        $fdr = FDR::find($id);
        $fdr->account_number =  $request->get('account_number');
        $fdr->interest =  $request->get('interest');
        $fdr->month = $request->get('month');
        $fdr->close_date = $currentDate->addMonths($request->month);
        $fdr->save();

        toastr()->success('FDR update Successfully');
        return to_route('fdr.list.all');
    }
}
