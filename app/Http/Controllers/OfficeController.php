<?php

namespace App\Http\Controllers;

use toastr;
use App\Models\Fee;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\InnerTransection;
use App\Models\Member;
use App\Models\Transection;
use Illuminate\Support\Facades\Hash;

class OfficeController extends Controller
{
    /**
     * This controller is used for Offical all Transection.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  
     * @param  int  $id
     */

    public function fees_create()
    {
        $fees = Fee::all();
        return view('backend/layout/Office/feesCreate', compact('fees'));
    }

    /**
     * This Function is used for Fees Create.
     * @param  \Illuminate\Http\Request  $request
     */
    public function fees_create_post(Request $request)
    {
        $fees = new Fee();
        $fees->name = $request->name;
        $fees->amount = $request->amount;
        $fees->save();

        toastr()->success('Fees Created Successfully');
        return back();
    }
    /**
     * This Function is used for Fees Delete.
     * @param  int  $id
     */
    public function fees_delete($id)
    {
        $edit = Fee::find($id)->delete();
        return back();
    }
    /**
     * This Function is used for Fees Edit.
     * @param  int  $id
     */
    public function fees_edit($id)
    {
        $edit = Fee::find($id);
        return to_route('fees.create', compact('edit'));
    }
    /**
     * This Function is used for Fees Update.
     * @param  int  $id
     */
    public function fees_edit_post(Request $request, $id)
    {
        $fees = Fee::find($id);
        $fees->name = $request->name;
        $fees->amount = $request->amount;
        $fees->save();
        toastr()->success('Fees update Successfully');
        return to_route('fees.create');
    }
    /**
     * This Function is used for Official Transection.
     */
    public function incomingTransection()
    {
        $data['income'] = Transection::where('transection_type', '1')->where('purpose', '!=', 'no')->get();
        $data['member'] = Member::where('status', '1')->get();

        return view('backend/layout/Office/incoming', $data);
    }
    /**
     * This Function is used for Official Transection.
     */
    public function outgoingTransection()
    {
        $data['staff'] = Staff::all();
        $data['expense'] = Transection::where('transection_type', '2')->where('purpose', '!=', 'no')->get();
        return view('backend/layout/Office/outgoing', $data);
    }
    /**
     * This Function is used for Official Transection.
     */
    public function incomeStore(Request $request)
    {
        $purpose = $request->purpose;
        $amount = Fee::where('name', $request->purpose)->first();
        $data = new Transection();
        $data->transection_type = 1;
        $data->purpose = $request->purpose;
        $data->account_id = $request->account_id;
        $data->transection_amount = $amount->amount;
        $data->save();
        toastr()->success('Data Store Successfully');

        return back();
    }
    /**
     * This Function is used for Official Transection.
     */
    public function expense_store(Request $request)
    {
        $data = new Transection();
        $data->transection_type = 2;
        $data->purpose = $request->purpose;
        $data->expense_by = $request->expense_by;
        $data->date = $request->date;
        $data->transection_amount = $request->amount;
        $data->save();
        return back();
    }
    /**
     * This Function is used for Official Income Edit.
     */
    public function income_edit($id)
    {
        $data['incomeEdit'] = Transection::find($id);
        return to_route('incoming.transection', $data);
    }
    /**
     * This Function is used for Official Expense Edit.
     */
    public function expense_edit($id)
    {
        $data['ExpenseEdit'] = Transection::find($id);
        return to_route('outgoing.transection', $data);
    }
}
