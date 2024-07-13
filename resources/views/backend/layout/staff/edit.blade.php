@extends('backend.master')
@section('content')

<!--start content-->
<h1>Staff Create</h1>
<main class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded" style="margin-top: 20px;">
                        <form class="row g-3" method="post" action="{{ route('staff.update',$edit->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="" name="name" value="{{$edit->name}}" required>
                                        @error('name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Name(Bangle)</label>
                                        <input type="text" class="form-control" name="name_bn" value="{{$edit->name_bn}}">
                                        @error('name_bn')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Birth Date</label>
                                        <input type="date" class="form-control" placeholder="" name="dob" value="{{$edit->dob}}">
                                        @error('dob')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="phone" value="{{$edit->phone}}" required>
                                        @error('phone')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6"> <label>Image</label>
                                        <div class="input-group mb-1 ">
                                            <input type="file" class="form-control " name="image" placeholder="Image">
                                            @error('image')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <img width="100px" src="{{url('/uploads/image',$edit->image)}}" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label"> Blood Group</label>
                                        <select class="form-control" name="blood_group" id="">
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                        @error('blood_group')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Parmanent Address<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="parmanent_address" value="{{ old('parmanent_address') }}" required>
                                        @error('parmanent_address')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="form-label">Present Address<span style="color:red;">&nbsp;&nbsp;&nbsp;</span>
                                                <input type="checkbox" name="same" id="">&nbsp;<span><i>Same As Parmanent Address</i></span></label>
                                            @error('same')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <input type="text" class="form-control" placeholder="" name="present_address" value="{{$edit->present_address}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Father Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="" name="father_name" value="{{$edit->father_name}}" required>
                                        @error('father_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label"> Mother Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="mother_name" value="{{$edit->mother_name}}" required>
                                        @error('mother_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">NID / Birth Certificate No.</label>
                                        <input type="text" class="form-control" name="nid" value="{{$edit->nid}}">
                                        @error('nid')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Staff Salary</label>
                                        <input type="number" class="form-control" name="salary" value="{{$edit->salary}}">
                                        @error('salary')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection