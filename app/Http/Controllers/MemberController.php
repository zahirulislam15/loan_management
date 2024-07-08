<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Member;
use App\Models\Transection;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Facades\File;
use Illuminate\Auth\Events\Validated;

class MemberController extends Controller
{
    //This function is used for Show Data in List
    public function list()
    {
        $data = Member::where('type', '1')->orderBy('id', 'desc')->get();
        return view('backend/layout/Member/list', compact('data'));
    }
    public function delete($id)
    {
        Member::find($id)->delete();
        return back();
    }
    //This function is used for Create form Show 
    public function  createShow()
    {
        return view('backend/layout/Member/create');
    }
    //This function is used for Edit form Show 
    public function edit($id)
    {
        $edit = Member::find($id);
        return view('backend/layout/Member/edit', compact('edit'));
    }

    //This function is used for Create a New Member
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'present_address' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'mobile' => 'required',

        ]);

        //For Generate Automatic Account Number
        $lastAccount = Member::orderBy('account_number', 'desc')->first();
        if ($lastAccount) {
            $accountNumber = $lastAccount->account_number + 1;
        } else {
            $accountNumber = 1000;
        }

        //Member image add in Storage
        $image = null;
        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->file('image')->getclientOriginalExtension();
            $request->file('image')->move(public_path('/uploads/image'), $image);
        }
        //Nominee image add in Storage
        $nominee_image = null;
        if ($request->hasFile('nominee_image')) {
            $nominee_image = time() . '.' . $request->file('nominee_image')->getclientOriginalExtension();
            $request->file('nominee_image')->move(public_path('/uploads/image'), $nominee_image);
        }
        //Member Signature image add in Storage
        $signature = null;
        if ($request->hasFile('signature')) {
            $signature = time() . '.' . $request->file('signature')->getclientOriginalExtension();
            $request->file('signature')->move(public_path('/uploads/image'), $signature);
        }
        //Nominee Signature add in Storage
        $nominee_signature = null;
        if ($request->hasFile('nominee_signature')) {
            $nominee_signature = time() . '.' . $request->file('nominee_signature')->getclientOriginalExtension();
            $request->file('nominee_signature')->move(public_path('/uploads/image'), $nominee_signature);
        }
        //Member Nid image add in Storage
        $nid_image = null;
        if ($request->hasFile('nid_image')) {
            $nid_image = time() . '.' . $request->file('nid_image')->getclientOriginalExtension();
            $request->file('nid_image')->move(public_path('/uploads/image'), $nid_image);
        }
        //Added Funcition
        $member = new Member();
        $member->type = '1';
        $member->account_number = $accountNumber;
        $member->id_number = $request->get('id_number');
        $member->status = '1';
        $member->name = $request->get('name');
        $member->personal_amount = $request->get('personal_amount');
        $member->name_bn = $request->get('name_bn');
        $member->father_name = $request->get('father_name');
        $member->mother_name = $request->get('mother_name');
        $member->present_address = $request->get('present_address');
        $member->parmanent_address = $request->get('parmanent_address');
        $member->dob = $request->get('dob');
        $member->birth_id = $request->get('birth_id');
        $member->nid = $request->get('nid');
        $member->mobile = $request->get('mobile');
        $member->image = $image;
        $member->nid_image = $nid_image;
        $member->nominee_signature = $nominee_signature;
        $member->signature = $signature;
        $member->nominee_name = $request->get('nominee_name');
        $member->nominee_relation = $request->get('nominee_relation');
        $member->nominee_father_name = $request->get('nominee_father_name');
        $member->nominee_mother_name = $request->get('nominee_mother_name');
        $member->nominee_nid = $request->get('nominee_nid');
        $member->nominee_birth_id = $request->get('nominee_birth_id');
        $member->nominee_dob = $request->get('nominee_dob');
        $member->nominee_present_address = $request->get('nominee_present_address');
        $member->nominee_profession = $request->get('nominee_profession');
        $member->nominee_image = $nominee_image;
        $member->save();
        toastr()->addSuccess('Member Created Successfully');

        //Add Amount in Transection Table
        $transaction = new Transection();
        $transaction->account_id = $member->id;
        $transaction->account_type = '1';
        $transaction->transection_type = '1';
        $transaction->transection_amount = $request->get('personal_amount');
        $transaction->save();
        return to_route('member.list');
    }

    //This function is used for Update a Existing Member
    public function update(Request $request, $id)
    {
        $editMember = Member::find($id);

        //Member image Remove from Storage
        $image = $editMember->image;
        if ($request->hasFile('image')) {
            $removeFile = public_path() . '/uploads/image' . $image;
            File::delete($removeFile);
            $image = time() . '.' . $request->file('image')->getclientOriginalExtension();
            $request->file('image')->move(public_path('/uploads/image'), $image);
        }

        //Nominee image Remove from Storage
        $nominee_image =  $editMember->nominee_image;
        if ($request->hasFile('nominee_image')) {
            $removeFile = public_path() . '/uploads/image' . $image;
            File::delete($removeFile);
            $nominee_image = time() . '.' . $request->file('nominee_image')->getclientOriginalExtension();
            $request->file('nominee_image')->move(public_path('/uploads/image'), $nominee_image);
        }

        //Member Signature Remove from Storage
        $signature =   $editMember->signature;
        if ($request->hasFile('signature')) {
            $removeFile = public_path() . '/uploads/image' . $image;
            File::delete($removeFile);
            $signature = time() . '.' . $request->file('signature')->getclientOriginalExtension();
            $request->file('signature')->move(public_path('/uploads/image'), $signature);
        }

        //Member Signature image Remove from Storage
        $nominee_signature =   $editMember->nominee_signature;
        if ($request->hasFile('nominee_signature')) {
            $removeFile = public_path() . '/uploads/image' . $image;
            File::delete($removeFile);
            $nominee_signature = time() . '.' . $request->file('nominee_signature')->getclientOriginalExtension();
            $request->file('nominee_signature')->move(public_path('/uploads/image'), $nominee_signature);
        }

        //Member Nid image Remove from Storage
        $nid_image =   $editMember->nid_image;
        if ($request->hasFile('nid_image')) {
            $removeFile = public_path() . '/uploads/image' . $image;
            File::delete($removeFile);
            $nid_image = time() . '.' . $request->file('nid_image')->getclientOriginalExtension();
            $request->file('nid_image')->move(public_path('/uploads/image'), $nid_image);
        }
        //Update Function
        $editMember->update([
            'name' =>  $request->get('name'),
            'name_bn' => $request->get('name_bn'),
            'father_name' => $request->get('father_name'),
            'mother_name' => $request->get('mother_name'),
            'present_address' => $request->get('present_address'),
            'parmanent_address' => $request->get('parmanent_address'),
            'dob' => $request->get('dob'),
            'birth_id' => $request->get('birth_id'),
            'nid' => $request->get('nid'),
            'mobile' => $request->get('mobile'),
            'image' => $image,
            'nid_image' => $nid_image,
            'nominee_signature' => $nominee_signature,
            'signature' => $signature,
            'nominee_name' => $request->get('nominee_name'),
            'nominee_relation' => $request->get('nominee_relation'),
            'nominee_father_name' => $request->get('nominee_father_name'),
            'nominee_mother_name' => $request->get('nominee_mother_name'),
            'nominee_nid' => $request->get('nominee_nid'),
            'nominee_birth_id' => $request->get('nominee_birth_id'),
            'nominee_dob' => $request->get('nominee_dob'),
            'nominee_present_address' => $request->get('nominee_present_address'),
            'nominee_profession' => $request->get('nominee_profession'),
            'nominee_image' => $nominee_image,
        ]);

        toastr()->success('Member Updated Successfully');
        return to_route('member.list');
    }
}
