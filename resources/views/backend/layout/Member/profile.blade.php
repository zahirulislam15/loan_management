@extends('backend.master')

@section('content')<div id="content">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <div class="card mb-4">
    <div class="row">
      <div class="col-md-2">
        <div class="user-image" style="padding: 50px;">
          <img class="" src="{{ asset('/uploads/image/' . $member->image) }}" style="height: 100px;width:100px" alt="No Image">
        </div>
      </div>

      <div class="col-md-5 mt-5">
        <div class="table-responsive show-table">
          <table class="table">
            <tbody>
              <tr>
                <th>Account Number</th>
                <td>{{$member->account_number}}</td>
              </tr>
              <tr>
                <th>Holder Name</th>
                <td>{{$member->name}}</td>
              </tr>
              <tr>
                <th>Address</th>
                <td>{{$member->present_address}}</td>
              </tr>
              <tr>
                <th>Mobile</th>
                <td>{{$member->mobile}}</td>
              </tr>
              <tr>
                <th>Joined</th>
                <td>{{$member->created_at}}</td>
              </tr>
              <td> <a href="{{route('view.more',$member->id)}}">View More</a>
              </td>
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-sm-4 mx-auto mb-4 mt-5">
        <!-- <a class="btn btn-success" style="margin-top:20px" data-bs-toggle="modal" href="#bill">Collect Fees</a> -->

        <div class="d-flex justify-content-between">
          <h3 class="card-title text-center"> <strong>Transection</strong></h3>
          <a class="btn btn-success" style="margin-top:20px" href="{{route('single.transection',$member->id)}}">Transection History</a>
        </div>
        <form action="{{route('transection',$member->id)}}" method="post">
          @csrf
          <div class="form-group">
            <label for="inp-address">Amount</label>
            <input type="number" class="form-control" id="" name="transection_amount" placeholder="Enter Amount" value="" min="0" step="0.01" required="">
          </div>
          <input type="hidden" name="account_id" value="{{$member->id}}">

          <div class="form-group">
            <label for="exampleFormControlSelect1">Select One</label>
            <select class="form-control" name="transection_type" id="exampleFormControlSelect1" required="">
              <option value="1">Deposit</option>
              <option value="2">WITHDRAW </option>
            </select>
          </div>

          <br>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Select Method</label>
            <select class="form-control" name="account_type" id="exampleFormControlSelect1" required="">
              <option value="1">Account</option>
              <option value="2">FDR </option>
              <option value="3">DPS</option>
              <option value="4">Loan</option>
            </select>
          </div>

          <br>

          <button style="margin-bottom: 10px;" type="submit" id="submit-btn" class="btn btn-primary w-100">Submit</button>
        </form>
      </div>

    </div>
  </div>
</div>


<div class="row mb-3">


  {{-- Personal Account Card--}}
  <div class="col-xl-3 col-md-6 mb-4">
    <a class="" data-bs-toggle="modal" href="#personal">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <center>
                <h3>Personal Account</h3>
                <h4>{{$Account->personal_amount}}</h4>
              </center>
            </div>
            <div class="col-auto">
              <i class="fas fa-file-signature fa-2x text-danger"></i>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>

  {{-- Loan Card--}}
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col mr-2">
            <center>
              <div class="text-xs font-weight-bold text-uppercase mb-1">Loan</div>
              @if($loan)
              <a href="" data-bs-toggle="modal" data-bs-target="#loan">
                <h3>LOAN</h3>
                <h3>{{$loan->loan_amount+$loan->interest_amount}}</h3>
              </a>
              @else
              <h4>No Loan Account Available</h4>
              @endif
            </center>
          </div>
          <div class="col-auto">
            <i class="fas fa-cash-register fa-2x text-danger"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- fdr  card --}}
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col mr-2">
            <center>
              <div class="text-xs font-weight-bold text-uppercase mb-1">FDR</div>
              @if($fdr)
              <a href="" data-bs-toggle="modal" data-bs-target="#fdr">
                <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800">
                  <h2> {{$fdr->amount+$fdr->interest_amount}}</h2>
                </div>
              </a>
              @else
              <div>
                <h4>No FDR Account Available</h4>
              </div>
              @endif
          </div>
          </center>
          <div class="col-auto">
            <i class="fas fa-user-shield fa-2x text-success"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- dps Card--}}
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col mr-2">
            <center>
              <div class="text-xs font-weight-bold text-uppercase mb-1">DPS</div>
              @if($dps)
              <a class="" data-bs-toggle="modal" href="#dps">
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  @if($dps->type==7 ?? '')
                  <h3>{{$dps->type_amount}} Weekly </h3>
                  @endif
                  @if($dps->type==30)
                  <h3>{{$dps->type_amount}} Monthly </h3>
                  @endif
                  @if($dps->type==1)
                  <h3>{{$dps->type_amount}} Daily </h3>
                  @endif
                </div>
              </a>
              @else
              <h4>No DPS Account Available</h4>
              @endif
            </center>
          </div>
          <div class="col-auto">
            <i class="fas fa-warehouse fa-2x text-success"></i>
          </div>
        </div>
      </div>

      <!-- Modal Section -->
      <!-- Loan Modal Section -->
      <div class="modal fade" id="loan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h5> Loan Information</h5>
              </center>
              <button class="btn btn-primary" data-bs-target="#loan1" data-bs-toggle="modal">Loan History</button>
            </div>
            <div class="modal-body">
              <div class="list-group">
                @if($loan)
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h3 class="mb-1">Loan Amount</h3>
                    <h4>{{$loan->loan_amount}}</h4>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h3 class="mb-1">Loan Month</h3>
                    <h4>{{$loan->month}} Month</h4>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h3 class="mb-1">Loan Close Date</h3>
                    <h4>{{$loan->close_date}}</h4>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h3 class="mb-1">Interest Rate Monthly</h3>
                    <h4>{{$loan->interest}}%</h4>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h3 class="mb-1">Loan interest</h3>
                    <h4>{{$loan->interest_amount}}</h4>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h3 class="mb-1">Total Amount</h3>
                    <h4>{{$loan->loan_amount+$loan->interest_amount}}</h4>
                  </div>
                </a>

                {{-- <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h3 class="mb-1">Deposit Loan Amount</h3>
                <h4>{{$loan_deposit}}</h4>
              </div>
              </a> --}}
              {{-- <a href="#" style="background-color: red;" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h3 class="mb-1">Lake Amount</h3>
                <h4>{{$total_loan_interest+$loan1-$loan_deposit}}</h4>
            </div>
            </a> --}}
            @endif
          </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <!-- Loan  Submodal -->
  <div class="modal fade" id="loan1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Transection History</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Transection Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($loanHistory as $loan)
              <tr>
                <td>@if($Account->transection_type==1)
                  Deposit
                  @else
                  Withdraw
                  @endif
                </td>
                <td>{{$loan->transection_amount}}</td>
                <td>{{$loan->created_at}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
      </div> -->
      </div>
    </div>
  </div>

  <!-- FDR  modal Section-->
  <div class="modal fade" id="fdr" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <center>
            <h5>FDR Information</h5>
          </center>
          <button class="btn btn-primary" data-bs-target="#fdr2" data-bs-toggle="modal">FDR History</button>
        </div>
        <div class="modal-body">
          <div class="list-group">
            @if($fdr)

            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h3 class="mb-1">FDR Amount</h3>
                <h4>{{$fdr->amount}}</h4>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h3 class="mb-1">FDR Month</h3>
                <h4>{{$fdr->month}} Month</h4>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h3 class="mb-1">FDR Closed Date</h3>
                <h4>{{$fdr->close_date}}</h4>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h3 class="mb-1">FDR Interest Rate</h3>
                <h4>{{$fdr->interest ??''}}%</h4>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h3 class="mb-1">Total Interest</h3>
                <h4>{{$fdr->interest_amount}}</h4>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h3 class="mb-1">Total Amount & Interest</h3>
                <h4>{{$fdr->interest_amount+$fdr->amount}}

                </h4>
              </div>
            </a>
            @endif
          </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <!-- Fdr Submodal -->
  <div class="modal fade" id="fdr2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Transection History</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Transection Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($fdrHistory as $fdr)
              <tr>
                <td>@if($Account->transection_type==1)
                  Deposit
                  @else
                  Withdraw
                  @endif
                </td>
                <td>{{$fdr->transection_amount}}</td>
                <td>{{$fdr->created_at}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
      </div> -->
      </div>
    </div>
  </div>

  <!---dps Modal Section-->
  <div class="modal fade" id="dps" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <center>
            <h5>DPS Information</h5>
          </center>
          <button class="btn btn-primary" data-bs-target="#dps1" data-bs-toggle="modal">All History</button>
        </div>
        <div class="modal-body">
          <div class="list-group">
            @if($dps)
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h3 class="mb-1">DPS Installment Type</h3>
                <h4>
                  @if($dps)
                  @if($dps->type==7 ?? '')
                  Weekly
                  @endif
                  @if($dps->type==30)
                  Monthly
                  @endif
                  @if($dps->type==1)
                  Daily
                  @endif
                  @endif</h4>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h3 class="mb-1">DPS Installment Amount</h3>
                <h4>{{$dps->type_amount ??''}}</h4>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h3 class="mb-1">DPS Month</h3>
                <h4>{{$dps->month}} Month</h4>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h3 class="mb-1">DPS Closed Date</h3>
                <h4></h4>
              </div>
            </a>

            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h3 class="mb-1">DPS Interest Rate</h3>
                <h4>{{$dps->interest ?? ''}}%</h4>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h3 class="mb-1">Deposited Amount</h3>
                <h4>{{$dps->amount}}</h4>
              </div>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h3 class="mb-1">Total Interest</h3>
                <h4>{{$dps->interest_amount}}</h4>
              </div>
            </a>
            <a href="#" style="background-color:aqua;" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h3 class="mb-1">Intotal Amount</h3>
                <h4>{{$dps->amount+$dps->interest_amount}}</h4>
              </div>
            </a>
            @endif
          </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <!---dps Sub Modal Section-->
  <div class="modal fade" id="dps1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Transection History</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Transection Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($dpsHistory as $dps)
              <tr>
                <td>@if($Account->transection_type==1)
                  Deposit
                  @else
                  Withdraw
                  @endif
                </td>
                <td>{{$dps->transection_amount}}</td>
                <td>{{$dps->created_at}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
      </div> -->
      </div>
    </div>
  </div>

  <div class="modal fade" id="bill" aria-hidden="true" aria-labelledby="exampleModalToggleLabel">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body">
          <form class="row g-3" method="post" action="{{ route('income.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="col-md-12">
              <div class="row">
                <div class="">
                  <input type="hidden" name="account_id" value="{{$member->id}}" id="">
                  <label class="form-label">Fee<span style="color:red;"></span></label>
                  <select name="purpose" class="form-control" id="">
                    @foreach($fees as $fee)

                    <option value="{{$fee->name}}">{{$fee->name}}</option>

                    @endforeach
                  </select>
                </div>

                <input type="hidden" name="account" value="{{$member->id}}">
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
  <!---Personal-->
  <div class="modal fade" id="personal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Transection History</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Transection Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($AccountHistory as $Account)
              <tr>
                <td>@if($Account->transection_type==1)
                  Deposit
                  @else
                  Withdraw
                  @endif
                </td>
                <td>{{$Account->transection_amount}}</td>
                <td>{{$Account->created_at}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
      </div> -->
      </div>
    </div>
  </div>

</div>

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</script>