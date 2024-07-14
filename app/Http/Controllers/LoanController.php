<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Loan;
use App\Models\Member;
use App\Models\Transection;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * This Controller is using For Loan Management
     */

    //Loan List
    public function loan_list()
    {
        $loan = Loan::where('status', '1')->get();
        return view('backend.layout.Loan.list', compact('loan'));
    }

    //Close Loan List
    public function loan_list_close()
    {

        $loan = Loan::where('status', '0')->get();
        return view('backend.layout.Loan.list_all', compact('loan'));
    }

    //Loan Create
    public function loan_create()
    {
        $account = Member::where('status', '1')->get();
        return view('backend.layout.Loan.create', compact('account'));
    }

    //Loan Edit
    public function loan_edit($id)
    {
        $data['account'] = Member::where('status', '1')->latest()->get();
        $data['edit'] = Loan::find($id);
        return $data;
        return view('backend.layout.Loan.edit', $data);
    }

    /**
     * This Function is using For Loan Create in loan Table and transection Table also
     */
    public function loan_create_post(Request $request)
    {
        // return $request;
        $currentDate = Carbon::now();
        $data = new Loan();
        $data->account_number = $request->account_number;
        $data->loan_amount = $request->amount;
        $data->total_amount = $request->amount;
        $data->interest = $request->interest;
        $data->month = $request->month;
        $data->loan_purpose = $request->loan_purpose;
        $data->close_date = $currentDate->addMonths($request->month);
        $data->interest_amount = ($request->get('amount') * $request->get('interest') / 100);
        $data->status = '1';
        $data->start_date = $request->start_date;
        $data->frequency = $request->frequency;
        $data->save();

        // return $date;
        //loan Create in transection table
        $transaction = new Transection();
        $transaction->account_id = $request->get('account_number');
        $transaction->account_type = '4';
        $transaction->transection_type = '2';
        $transaction->transection_amount = $request->get('amount');

        $transaction->save();
        toastr()->Success('Loan create Successfully');


        return to_route('loan.list');
    }
    //loan edit function
    public function loan_edit_post(Request $request, $id)
    {
        $currentDate = Carbon::now();

        $data = Loan::find($id);
        $data->account_number = $request->account_number;
        $data->interest = $request->interest;
        $data->month = $request->month;
        $data->loan_purpose = $request->loan_purpose;
        $data->close_date = $currentDate->addMonths($request->month);

        $data->status = '1';
        $data->save();

        toastr()->Success('Loan Update Successfully');
        return to_route('loan.list');
    }

    //loan status update
    public function loan_status($id)
    {
        $data = Loan::find($id);
        if ($data->status == 0) {
            $data->update([
                'status' => '1',
            ]);
        } else {
            $data->update([
                'status' => '0',
            ]);
        }
        toastr()->Success('Status update Successfully');

        return back();
    }
}
