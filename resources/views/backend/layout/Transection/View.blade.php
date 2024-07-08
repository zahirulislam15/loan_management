@extends('backend.master')
@section('content')

<div class="card card-outline card-primary">
    <div class="card-header">
        <center>
            <h2 style="color:purple;">Transection Histroy {{$data->name ?? ''}}</h2>
        </center>
        <div class="card-tools">
            <button class="btn btn-primary btn-sm mb-2" title="Print" onclick="printDiv()"><i class="bi bi-printer"> Print</i></button>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive" id="">
            <table id="myTable" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Transection Type</th>
                        <th>Account Type</th>
                        <th>Transection Amount</th>
                        <th>Transection Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($history as $data)
                    <tr>
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
    <div id="hiddenDiv" style="visibility: hidden;">
        <div class="card-body">
            <div class="table-responsive" id="print_history">
                <div></div>
                <table id="" class="table table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Transection Type</th>
                            <th>Account Type</th>
                            <th>Transection Amount</th>
                            <th>Transection Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($history as $data)
                        <tr>
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
<!-- For Print Div -->
<script>
    function printDiv(printDiv) {
        $("#printable_content").html($("#print_history").html());
        $("#printable_content #btn").remove();
        $("#printable_content #myTable").remove();

        $("#printable_content").printThis({
            header: `<div class="d-flex justify-content-center">
                        <div class="text-center text-dark">
                            <h4 style="margin-bottom:0px;">Loan </h4>
                            <p><b> Transection History {{$data->name}}</b></p>                                       
                        </div>                      
                </div>`,
            footer: `<div class="d-flex justify-content-between">
                        <small class="m-0">Powerd By Loan </small>
                    </div>`
        });
    }
</script>
@endpush
@endsection