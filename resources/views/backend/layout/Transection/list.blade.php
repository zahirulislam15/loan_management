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
        <center>
            <h3>Transection Histroy</h3>
        </center>
        <div class="card-tools">
            <button class="btn btn-primary btn-sm mb-2" title="Print" onclick="printDiv()"><i class="bi bi-printer"> Print</i></button>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive" id="">
            <div></div>
            <table id="myTable" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Account Number</th>
                        <th>Account Holder</th>
                        <th>Transection Type</th>
                        <th>Transection Details</th>
                        <th>Transection Amount</th>
                        <th>Transection Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($history as $data)
                    <tr>
                        <td>@if($data->account_id)
                            {{$data->Transection->account_number ?? ''}}
                            @else
                            ----
                            @endif
                        </td>
                        <td>@if($data->account_id)
                            {{$data->Transection->name ?? ''}}
                            @else
                            ----
                            @endif
                        </td>
                        <td> @if($data->transection_type==1)
                            Deposit
                            @endif
                            @if($data->transection_type==2)
                            Withdraw
                            @endif
                        </td>
                        <td>
                            @if($data->account_type==1)
                            Account

                            @elseif($data->account_type==2)
                            FDR

                            @elseif($data->account_type==3)
                            DPS

                            @elseif($data->account_type==4)
                            Loan

                            @else
                            {{$data->purpose}}

                            @endif
                        </td>
                        <td>{{$data->transection_amount}}</td>
                        <td>{{$data->created_at}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div id="hiddenDiv" style="visibility: hidden;">
        <div class="card-body">
            <div class="table-responsive" id="print_history">
                <div></div>
                <table id="" class="table table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Account Number</th>
                            <th>Account Holder</th>
                            <th>Transection Type</th>
                            <th>Account Type</th>
                            <th>Transection Amount</th>
                            <th>Transection Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($history as $data)
                        <tr>
                            <td>{{$data->Transection->account_number ?? ''}}</td>
                            <td>{{$data->Transection->name ?? ''}}</td>
                            <td> @if($data->transection_type==1)
                                Deposit @endif
                                @if($data->transection_type==2)
                                Withdraw
                                @endif
                            </td>
                            <td>
                                @if($data->account_type==1)
                                Account

                                @elseif($data->account_type==2)
                                FDR

                                @elseif($data->account_type==3)
                                DPS

                                @elseif($data->account_type==4)
                                Loan

                                @else
                                Official Expense
                                @endif
                            </td>
                            <td>{{$data->transection_amount}}</td>
                            <td>{{$data->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div style="display: none">
        <div id="printable_content" style="font-size: 12px;"></div>
    </div>
</div>
@push('js')
<script src="{{asset('js/printThis.js')}}"></script>
<script>
    function printDiv(printDiv) {

        $("#printable_content").html($("#print_history").html());
        $("#printable_content #btn").remove();
        $("#printable_content #myTable").remove();
        $("#printable_content").printThis({
            header: `<div class="d-flex justify-content-center">
                        <div class="text-center text-dark">
                            <h4 style="margin-bottom:0px;">{{Auth()->user()->project_name}} </h4>
                            <p><b> Transection History</b></p>                                       
                        </div>                      
                </div>`,
            footer: `<div class="d-flex justify-content-between">
                        <small class="m-0">Powerd By {{Auth()->user()->name}} </small>
                    </div>`
        });
    }
</script>
@endpush
@endsection