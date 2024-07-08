@extends('backend.master')
@section('content')

<!--start content-->
<main class="page-content">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded" style="margin-top: 20px;">
                        <form class="row g-3" method="post" action="{{ route('income.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Fee<span style="color:red;"></span></label>

                                        <select name="purpose" class="form-control" id="">
                                            <option value="Admission Fee">Admission Fee</option>
                                            <option value="Savings Fee">Savings Fee</option>
                                            <option value="Share Fee">Share Fee</option>
                                            <option value="Form Fee">Form Fee</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="form-label"> Income From<span style="color:red;">&nbsp;&nbsp;&nbsp;</span>

                                                <select name="account" class="form-control" id="">
                                                    @foreach($member as $data)
                                                    <option value="{{$data->id}}">{{$data->name}}-{{$data->account_number}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
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
        <div class="col-md-2"></div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <center>
                            <h3>Income List</h3>
                        </center>
                        <table id="myTable" class="table table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Income Type</th>
                                    <th>Amount</th>
                                    <th>Income By</th>
                                    <!-- <th>Amount</th> -->

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($income as $key=>$data)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$data->purpose}}</td>
                                    <td>{{$data->amount}}</td>
                                    <td>{{$data->income_by}}</td>
                                    <!-- <td><button class="btn btn-priamry">Edit</button></td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>


    </div>
</main>




@endsection