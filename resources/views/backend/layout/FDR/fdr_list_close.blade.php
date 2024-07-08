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
            FDR Closed List </h3>

    </div>

    <div class="card-body">
        <div class="table-responsive">
        <table id="myTable" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Account Number</th>
                        <th>FDR Amount</th>
                        <th>interest</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fdr as $data)
                    <tr>
                        <td>{{$data->fdr->account_number ?? ''}}

                        </td>
                        <td>
                            {{$data->amount}}
                        </td>
                        <td>
                            {{$data->interest}}%
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{route('fdr.status.change',$data->id)}}">
                                Make it active
                            </a>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="d-flex justify-content-center" @endsection