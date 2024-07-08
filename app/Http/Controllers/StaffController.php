<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffMembers = staff::all();
        return view('backend/layout/staff/list', compact('staffMembers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/layout/staff/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return request();
        $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',

        ]);
        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getclientOriginalExtension();
            $request->file('image')->move(public_path('/uploads/staff/'), $fileName);
            $fileName = "/uploads/staff/" . $fileName;
        }

        $staff = new Staff();
        $staff->name = $request->name;
        $staff->name_bangla = $request->name_bn;
        $staff->permanent_address = $request->parmanent_address;
        $request->has('same') ? $staff->present_address = $request->parmanent_address : $staff->present_address = $request->present_address;
        $staff->phone = $request->phone;
        $staff->nid = $request->nid;
        $staff->dob = $request->dob;
        $staff->salary = $request->salary;
        $staff->blood_group = $request->blood_group;
        $staff->father_name = $request->father_name;
        $staff->mother_name = $request->mother_name;
        $staff->image = $fileName;
        $staff->save();
        toastr()->success('Staff Create Successfull');
        return to_route('staff.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return request();
        $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',

        ]);
        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getclientOriginalExtension();
            $request->file('image')->move(public_path('/uploads/staff/'), $fileName);
            $fileName = "/uploads/staff/" . $fileName;
        }

        $staff =  Staff::find($id);
        $staff->name = $request->name;
        $staff->name_bangla = $request->name_bn;
        $staff->permanent_address = $request->parmanent_address;
        $request->has('same') ? $staff->present_address = $request->parmanent_address : $staff->present_address = $request->present_address;
        $staff->phone = $request->phone;
        $staff->nid = $request->nid;
        $staff->dob = $request->dob;
        $staff->salary = $request->salary;
        $staff->blood_group = $request->blood_group;
        $staff->father_name = $request->father_name;
        $staff->mother_name = $request->mother_name;
        $staff->image = $fileName;
        $staff->save();
        toastr()->success('Staff update Successfull');
        return to_route('staff.list');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Staff::find($id);
        return view('backend/layout/staff/edit',compact('edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Staff::find($id)->delete();
        return back();
    }
}
