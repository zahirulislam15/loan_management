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
            DPS List </h3>
        <div class="card-tools">
            <a href="{{route('dps.create')}}" type="button" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                Create
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
        <table id="myTable" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Account Number</th>
                        <th>Account Holder</th>
                        <th>DPS Amount</th>
                        <th>Type</th>
                        <th>interest</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fdr as $data)
                    <tr>

                        <td>{{ $data->dps->account_number ?? ''}}
                        </td>
                        <td>{{ $data->dps->name ?? ''}}
                        </td>
                        <td>
                            {{$data->amount}}
                        </td>
                        <td>

                            @if($data->type==1)
                            <p>Daily</p>
                            @endif
                            @if($data->type==7)
                            <p>Weekly</p>
                            @endif
                            @if($data->type==30)
                            <p>Monthly</p>
                            @endif
                        </td>
                        <td>
                            {{$data->interest}}%
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{route('dps.status.change',$data->id)}}">
                                Make it inactive
                            </a>


                        </td>
                        <td>
                        <a class="btn btn-primary" href="{{route('dps.edit',$data->id)}}">Edit</a>    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="d-flex justify-content-center" @endsection