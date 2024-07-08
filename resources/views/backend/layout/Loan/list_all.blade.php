@extends('backend.master')
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{session("success")}}
</div>
@endif
@if (session('danger'))
<div class="alert alert-danger">
    {{session("danger")}}
</div>
@endif

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">
           Closed Loan List </h3>
      
    </div>

    <div class="card-body">
        <div class="table-responsive">
        <table id="myTable" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Account Number</th>
                        <th>Account Holder</th>
                        <th>Loan Amount</th>
                        <th>interest</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loan as $data)
                    <tr>
                        <td>{{$data->loan->account_number ??''}}
                        </td>

                        <td>{{$data->loan->name ??''}}</td>
                      
                        <td>
                            {{$data->loan_amount}}
                        </td>
                        <td>
                            {{$data->interest}}%
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{route('loan.status.change',$data->id)}}">
                                active
                            </a>

                        </td>
                        <td>
                        <a class="btn btn-primary" href="{{route('loan.edit',$data->id)}}">Edit</a>    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="d-flex justify-content-center" @endsection