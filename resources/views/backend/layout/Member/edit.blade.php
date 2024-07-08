@extends('backend.master')
@section('content')
<!--start content-->
<main class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded" style="margin-top: 20px;">
                        <center>
                            <h2>Accountant Information Edit</h2>
                        </center>
                        <form class="row g-3" method="post" id="studentData" action="{{ route('member.update',$edit->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="" name="name" value="{{$edit->name}}">
                                        @error('name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Name(Bangle)<span style="color:red;"></span></label>
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
                                        <label class="form-label">Father Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="" name="father_name" value="{{$edit->father_name}}">
                                        @error('father_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label"> Mother Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="mother_name" value="{{$edit->mother_name}}">
                                        @error('mother_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Present Address<span style="color:red;"></span></label>
                                        <input type="text" class="form-control" placeholder="" name="present_address" value="{{$edit->present_address}}">
                                        @error('present_address')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Parmanent Address<span style="color:red;"></span></label>
                                        <input type="text" class="form-control" name="parmanent_address" value="{{$edit->parmanent_address}}">
                                        @error('parmanent_address')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Birth Id<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" placeholder="" name="birth_id" value="{{$edit->birth_id}}">
                                        @error('birth_id')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Nid <span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" name="nid" value="{{$edit->nid}}">
                                        @error('nid')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Birth Date<span style="color:red;">*</span></label>
                                        <input type="date" class="form-control" placeholder="" name="dob" value="{{$edit->dob}}">
                                        @error('dob')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Mobile Number<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" name="mobile" value="{{$edit->mobile}}">
                                        @error('mobile')
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
                                    <div class="col-md-6"> <label>Signature</label>
                                        <div class="input-group mb-1 ">
                                            <input type="file" class="form-control " value="{{$edit->signature}}" name="signature" placeholder="Image">
                                            @error('signature')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <img width="100px" src="{{url('/uploads/image',$edit->signature)}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6"> <label>Nid Image</label>
                                        <div class="input-group mb-1 ">
                                            <input type="file" class="form-control " name="nid_image" placeholder="NID Image">
                                            @error('nid_image')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <img width="100px" src="{{url('/uploads/image',$edit->nid_image)}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top:30px;">
                                <center>
                                    <h2>Nominee Information</h2>
                                </center>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Nominee<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="" name="nominee_name" value="{{$edit->nominee_name}}">
                                        @error('nominee_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Nominee Relation<span style="color:red;"></span></label>
                                        <input type="text" class="form-control" name="nominee_relation" value="{{$edit->nominee_relation}}">
                                        @error('nominee_relation')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Father Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="" name="nominee_father_name" value="{{$edit->nominee_father_name}}">
                                        @error('nominee_father_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Mother Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="nominee_mother_name" value="{{$edit->nominee_mother_name}}">
                                        @error('nominee_mother_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">NID Number<span style="color:red;"></span></label>
                                        <input type="number" class="form-control" placeholder="" name="nominee_nid" value="{{$edit->nominee_nid}}">
                                        @error('nominee_nid')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Birth Id<span style="color:red;"></span></label>
                                        <input type="number" class="form-control" name="nominee_birth_id" value="{{$edit->nominee_birth_id}}">
                                        @error('nominee_birth_id')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Present Address<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" placeholder="" name="nominee_present_address" value="{{$edit->nominee_present_address}}">
                                    @error('nominee_present_address')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">

                                    <label class="form-label">Profession<span style="color:red;"></span></label>
                                    <input type="text" class="form-control" placeholder="" name="nominee_profession" value="{{$edit->nominee_profession}}">
                                    @error('nominee_profession')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Birth Date<span style="color:red;"></span></label>
                                    <input type="date" class="form-control" name="nominee_dob" value="{{$edit->nominee_dob}}">
                                    @error('nominee_dob')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nominee Image<span style="color:red;"></span></label>
                                    <input type="file" class="form-control" name="nominee_image">
                                    @error('nominee_image')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror <img width="100px" src="{{url('/uploads/image',$edit->nominee_image)}}" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Nominee Signature<span style="color:red;"></span></label>
                                    <input type="file" class="form-control" name="nominee_signature">
                                    @error('nominee_signature')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror <img width="100px" src="{{url('/uploads/image',$edit->nominee_signature)}}" alt="">
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