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
                            <h2>Accountant Information</h2>
                        </center>
                        <form class="row g-3" method="post" id="" action="{{route('member.create.post') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Full Name" name="name" value="{{ old('name') }}" required>
                                        @error('name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Name(Bangle)<span style="color:red;"></span></label>
                                        <input type="text" class="form-control" placeholder="বাংলায় নাম লিখুন" name="name_bn" value="{{ old('name_bn') }}">
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
                                        <input type="text" class="form-control" placeholder="Enter Father's name" name="father_name" value="{{ old('father_name') }}" required>
                                        @error('father_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label"> Mother Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Mother's name" name="mother_name" value="{{ old('mother_name') }}" required>
                                        @error('mother_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Present Address<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Present Adderss" name="present_address" value="{{ old('present_address') }}" required>
                                        @error('present_address')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Parmanent Address<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Parmanent Adderss" name="parmanent_address" value="{{ old('parmanent_address') }}">
                                        @error('parmanent_address')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Birth Certificate</label>
                                        <input type="number" class="form-control" placeholder="Enter Birth Certificate Number" name="birth_id" value="{{ old('dob') }}">
                                        @error('birth_id')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">NID <span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" placeholder="Enter NID Number" name="nid" value="{{ old('nid') }}" required>
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
                                        <input type="date" class="form-control" name="dob" value="{{ old('dob') }}" required>
                                        @error('dob')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Mobile Number<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" placeholder="Enter Mobile No." name="mobile" value="{{ old('mobile') }}" required>
                                        @error('mobile')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Image<span style="color:red;">*</span></label>
                                        <input type="file" class="form-control" name="image" value="{{ old('image') }}" required>
                                        @error('image')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Signature<span style="color:red;">*</span></label>
                                        <input type="file" class="form-control" name="signature" value="{{ old('signature') }}" required>
                                        @error('signature')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">NID Image<span style="color:red;">*</span></label>
                                        <input type="file" class="form-control" name="nid_image" value="{{ old('nid_image') }}" required>
                                        @error('nid_image')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Personal Amount<span style="color:red;"></span></label>
                                        <input type="text" class="form-control" placeholder="" name="personal_amount" value="{{ old('personal_amount') }}">
                                        @error('personal_amount')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            
                            <div style="margin-top:30px;">
                                <center>
                                    <h2>Guarantor Information</h2>
                                </center>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Guarantor<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Full Name" name="Guarantor_name" value="{{ old('nominee_name') }}" required>
                                        @error('nominee_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Guarantor Relation<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Relationship With Account Holder" name="Guarantor_relation" value="{{ old('nominee_relation') }}" required>
                                        @error('nominee_relation')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Father Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="Guarantors Father Name" name="Guarantors father name" value="{{ old('nominee_father_name') }}" required>
                                        @error('nominee_father_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Mother Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="Guarantors Mother Name" name="Guarantor_mother_name" value="{{ old('nominee_mother_name') }}" required>
                                        @error('nominee_mother_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">NID Number<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" placeholder="Guarantors NID Number" name="Guarantor_nid" value="{{ old('nominee_nid') }}" required>
                                        @error('nominee_nid')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Birth Certificate<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" placeholder="Guarantors Birth Certificate Number" name="Guarantor_birth_id" value="{{ old('nominee_birth_id') }}" required>
                                        @error('nominee_birth_id')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Present Address<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="Guarantors Present Adderss" name="Guarantor_present_address" value="{{ old('nominee_present_address') }}" required>
                                        @error('nominee_present_address')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Profession</label>
                                        <input type="text" class="form-control" placeholder="Guarantors parmanent Adderss" name="Guarantor_profession" value="{{ old('nominee_profession') }}">
                                        @error('nominee_profession')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Birth Date<span style="color:red;">*</span></label>
                                        <input type="date" class="form-control" name="Guarantor_dob" value="{{ old('nominee_dob') }}" required>
                                        @error('nominee_dob')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Guarantor Image<span style="color:red;">*</span></label>
                                        <input type="file" class="form-control" name="Guarantor_image" value="{{ old('nominee_image') }}" required>
                                        @error('nominee_image')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label"> Guarantor Signature<span style="color:red;">*</span></label>
                                        <input type="file" class="form-control" name="Guarantor_signature" value="{{ old('nominee_signature') }}" required>
                                        @error('nominee_signature')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <label class="form-label"> Guarantor NID<span style="color:red;">*</span></label>
                                        <input type="file" class="form-control" name="Guarantor_nid" value="{{ old('nominee_nid') }}" required>
                                        @error('nominee_nid')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
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