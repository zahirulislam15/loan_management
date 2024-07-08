@extends('backend.master')

@section('content')<div id="content">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">



    <div class="card mb-4">
        <div class="row">
            <section>
                <div class="card p-4">
                    <div class="row">
                        <div class="">
                            <center>
                                <h4>Personal Information</h4>
                            </center>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="row" p-3>
                                <div class="col-4"> @if($data->image)

                                    <img src="{{asset('/uploads/image/' . $data->image )}}" width="150" height="150" alt="">
                                    @else
                                    <img src="{{asset('/uploads/image/no.png')}}" width="150" height="150" alt="">

                                    @endif
                                    <center>
                                        <h5>User</h5>
                                    </center>
                                </div>
                                <div class="col-4">
                                    @if($data->signature)

                                    <img src="{{asset('/uploads/image/' . $data->signature )}}" width="150" height="150" alt="">
                                    @else
                                    <img src="{{asset('/uploads/image/no.png')}}" width="150" height="150" alt="">

                                    @endif <center>
                                        <h5>Signature</h5>
                                    </center>
                                </div>
                                <div class="col-4">
                                    @if($data->nid_image)

                                    <img src="{{asset('/uploads/image/' . $data->nid_image )}}" width="150" height="150" alt="">
                                    @else
                                    <img src="{{asset('/uploads/image/no.png')}}" width="150" height="150" alt="">

                                    @endif <center>
                                        <h5>Nid Image</h5>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">Name</label>
                                <input type="text" readonly value="{{$data->name}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">Father Name</label>
                                <input type="text" readonly value="{{$data->father_name}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">Present Address</label>
                                <input type="text" readonly value="{{$data->present_address}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label"> Birth Id </label>
                                <input type="text" readonly value="{{$data->birth_id}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">Present Address</label>
                                <input type="text" readonly value="{{$data->present_address}}" class="form-control" id="">
                            </div>

                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">Date of Birth</label>
                                <input type="text" readonly value="{{$data->dob}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">Mother Name</label>
                                <input type="text" readonly value="{{$data->mother_name}}" class="form-control" id="">
                            </div>

                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">Parmamnent Address</label>
                                <input type="text" readonly value="{{$data->parmanent_address}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label"> Nid Id</label>
                                <input type="text" readonly value="{{$data->nid}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">Mobile</label>
                                <input type="text" readonly value="{{$data->mobile}}" class="form-control" id="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-4">
                    <div class="row">
                        <div class="">
                            <center>
                                <h4>Nominee Information</h4>
                            </center>
                        </div>
                        <div class="col-lg-6 col-12 text-center">
                            <div class="row">
                                <div class="col-6">
                                    @if($data->nominee_image)

                                    <img src="{{asset('/uploads/image/' . $data->nominee_image )}}" width="150" height="150" alt="">
                                    @else
                                    <img src="{{asset('/uploads/image/no.png')}}" width="150" height="150" alt="">

                                    @endif
                                    <center>
                                        <h5>Nominee</h5>
                                    </center>
                                </div>
                                <div class="col-6">
                                    @if($data->nominee_signature)

                                    <img src="{{asset('/uploads/image/' . $data->nominee_signature)}}" width="150" height="150" alt="">
                                    @else
                                    <img src="{{asset('/uploads/image/no.png')}}" width="150" height="150" alt="">

                                    @endif
                                    <center>
                                        <h5>Signature</h5>
                                    </center>
                                </div>

                            </div>
                        </div>


                        <div class="col-lg-3 col-12">
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">Nominee Name</label>
                                <input type="text" readonly value="{{$data->nominee_name}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">Father Name</label>
                                <input type="text" readonly value="{{$data->nominee_father_name}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">Present Address</label>
                                <input type="text" readonly value="{{$data->nominee_present_address}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label"> Birth Id </label>
                                <input type="text" readonly value="{{$data->nominee_birth_id}}" class="form-control" id="">
                            </div>

                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">Date of Birth</label>
                                <input type="text" readonly value="{{$data->nominee_dob}}" class="form-control" id="">
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">Nominee Relation*
                                </label>
                                <input type="text" readonly value="{{$data->nominee_relation}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">Mother Name</label>
                                <input type="text" readonly value="{{$data->nominee_mother_name}}" class="form-control" id="">
                            </div>

                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">Profession</label>
                                <input type="text" readonly value="{{$data->nominee_profession}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label"> Nid</label>
                                <input type="text" readonly value="{{$data->nominee_nid}}" class="form-control" id="">
                            </div>

                        </div>
                    </div>
                </div>
                @if($data->type==2)
                <div class="card p-4">
                    <div class="row row d-md-flex justify-content-center gap-2 pt-4">
                        <div class="">
                            <center>
                                <h4> company
                                    Information</h4>
                            </center>
                        </div>



                        <div class="col-lg-5 col-12">
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">Type</label>
                                <input type="text" readonly value="{{$data->type}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label"> Account Mantainance </label>
                                <input type="text" readonly value="{{$data->account_mantain}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label"> Company
                                    Address</label>
                                <input type="text" readonly value="{{$data->company_address}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">
                                    Issue Date
                                </label>
                                <input type="text" readonly value="{{$data->issue_date}}" class="form-control" id="">
                            </div>

                        </div>
                        <div class="col-lg-5 col-12">
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label"> Account Mantainer Name
                                </label>
                                <input type="text" readonly value="{{$data->accountman}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label"> Trade License
                                </label>
                                <input type="text" readonly value="{{$data->trade_license}}" class="form-control" id="">
                            </div>

                            <div class="mb-3 mr-2">
                                <label for="" class="form-label"> TIN</label>
                                <input type="text" readonly value="{{$data->tin}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label"> Issued By
                                </label>
                                <input type="text" readonly value="{{$data->issued_by}}" class="form-control" id="">
                            </div>

                        </div>
                    </div>
                </div>



                <div class="card p-4">
                    <div class="row">
                        <div class="">
                            <center>
                                <h4>Garanteer Information</h4>
                            </center>
                        </div>
                        <div class="col-lg-6 col-12 text-center">
                            <div class="row">
                                <div class="col-6">
                                    @if($data->garanteer_image)

                                    <img src="{{asset('/uploads/image/' . $data->garanteer_image )}}" width="150" height="150" alt="">
                                    @else
                                    <img src="{{asset('/uploads/image/no.png')}}" width="150" height="150" alt="">

                                    @endif
                                    <center>
                                        <h5>Garanteer</h5>
                                    </center>
                                </div>
                                <div class="col-6">
                                    @if($data->garanteer_ignature)

                                    <img src="{{asset('/uploads/image/' . $data->garanteer_ignature )}}" width="150" height="150" alt="">
                                    @else
                                    <img src="{{asset('/uploads/image/no.png')}}" width="150" height="150" alt="">

                                    @endif <center>
                                        <h5>Signature</h5>
                                    </center>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-3 col-12">
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">Name</label>
                                <input type="text" readonly value="{{$data->garanteer_name}}" class="form-control" id="">
                            </div>
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label"> Phone </label>
                                <input type="text" readonly value="{{$data->garanteer_phone}}" class="form-control" id="">
                            </div>



                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="mb-3 mr-2">
                                <label for="" class="form-label">NID
                                </label>
                                <input type="text" readonly value="{{$data->garanteer_nid}}" class="form-control" id="">
                            </div>


                        </div>
                    </div>
                </div>

                @endif
            </section>

        </div>

    </div>
</div>
<!-- DataTable with Hover -->
</div>







</div>

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</script>