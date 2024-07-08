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
                                        <input type="text" class="form-control" placeholder="" name="name" value="{{ old('name') }}">
                                        @error('name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Name(Bangle)<span style="color:red;"></span></label>
                                        <input type="text" class="form-control" name="name_bn" value="{{ old('name_bn') }}">
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
                                        <input type="text" class="form-control" placeholder="" name="father_name" value="{{ old('father_name') }}" required>
                                        @error('father_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label"> Mother Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="mother_name" value="{{ old('mother_name') }}" required>
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
                                        <input type="text" class="form-control" placeholder="" name="present_address" value="{{ old('present_address') }}">
                                        @error('present_address')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Parmanent Address<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="parmanent_address" value="{{ old('parmanent_address') }}">
                                        @error('parmanent_address')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Birth Id<span style="color:red;"></span></label>
                                        <input type="number" class="form-control" placeholder="" name="birth_id" value="{{ old('dob') }}">
                                        @error('birth_id')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Nid <span style="color:red;"></span></label>
                                        <input type="number" class="form-control" name="nid" value="{{ old('nid') }}">
                                        @error('nid')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Birth Date<span style="color:red;"></span></label>
                                        <input type="date" class="form-control" placeholder="" name="dob" value="{{ old('dob') }}">
                                        @error('dob')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Mobile Number<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" name="mobile" value="{{ old('mobile') }}">
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
                                        <input type="file" class="form-control" placeholder="" name="image" value="{{ old('image') }}">
                                        @error('image')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Signature<span style="color:red;">*</span></label>
                                        <input type="file" class="form-control" name="signature" value="{{ old('signature') }}">
                                        @error('signature')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">NID Image<span style="color:red;"></span></label>
                                            <input type="file" class="form-control" placeholder="" name="nid_image" value="{{ old('nid_image') }}">
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
                                        <input type="text" class="form-control" placeholder="" name="nominee_name" value="{{ old('nominee_name') }}">
                                        @error('nominee_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Nominee Relation<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="nominee_relation" value="{{ old('nominee_relation') }}">
                                        @error('nominee_relation')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Father Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="" name="nominee_father_name" value="{{ old('nominee_father_name') }}">
                                        @error('nominee_father_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Mother Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="nominee_mother_name" value="{{ old('nominee_mother_name') }}">
                                        @error('nominee_mother_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">NID Number<span style="color:red;"></span></label>
                                        <input type="number" class="form-control" placeholder="" name="nominee_nid" value="{{ old('nominee_nid') }}">
                                        @error('nominee_nid')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Birth Id<span style="color:red;"></span></label>
                                        <input type="number" class="form-control" name="nominee_birth_id" value="{{ old('nominee_birth_id') }}">
                                        @error('nominee_birth_id')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Present Address<span style="color:red;"></span></label>
                                    <input type="text" class="form-control" placeholder="" name="nominee_present_address" value="{{ old('nominee_present_address') }}">
                                    @error('nominee_present_address')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Profession<span style="color:red;"></span></label>
                                    <input type="text" class="form-control" placeholder="" name="nominee_profession" value="{{ old('nominee_profession') }}">
                                    @error('nominee_profession')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Birth Date<span style="color:red;"></span></label>
                                    <input type="date" class="form-control" name="nominee_dob" value="{{ old('nominee_dob') }}">
                                    @error('nominee_dob')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nominee Image<span style="color:red;"></span></label>
                                    <input type="file" class="form-control" name="nominee_image" value="{{ old('nominee_image') }}">
                                    @error('nominee_image')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label"> Nominee Signature<span style="color:red;"></span></label>
                                    <input type="file" class="form-control" name="nominee_signature" value="{{ old('nominee_signature') }}">
                                    @error('nominee_signature')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
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