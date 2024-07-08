@extends('backend.master')
@section('content')
<style>
  .c-dashboardInfo {
    margin-bottom: 15px;
  }

  .c-dashboardInfo .wrap {
    background: #ffffff;
    box-shadow: 2px 10px 20px rgba(0, 0, 0, 0.1);
    border-radius: 7px;
    text-align: center;
    position: relative;
    overflow: hidden;
    padding: 40px 25px 20px;
    height: 100%;
  }

  .c-dashboardInfo__title,
  .c-dashboardInfo__subInfo {
    color: #6c6c6c;
    font-size: 1.18em;
  }

  .c-dashboardInfo span {
    display: block;
  }

  .c-dashboardInfo__count {
    font-weight: 600;
    font-size: 2.5em;
    line-height: 64px;
    color: #323c43;
  }

  .c-dashboardInfo .wrap:after {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 10px;
    content: "";
  }

  .c-dashboardInfo:nth-child(1) .wrap:after {
    background: linear-gradient(82.59deg, #00c48c 0%, #00a173 100%);
  }

  .c-dashboardInfo:nth-child(2) .wrap:after {
    background: linear-gradient(81.67deg, #0084f4 0%, #1a4da2 100%);
  }

  .c-dashboardInfo:nth-child(3) .wrap:after {
    background: linear-gradient(69.83deg, #0084f4 0%, #00c48c 100%);
  }

  .c-dashboardInfo:nth-child(4) .wrap:after {
    background: linear-gradient(81.67deg, #ff647c 0%, #1f5dc5 100%);
  }

  .c-dashboardInfo__title svg {
    color: #d7d7d7;
    margin-left: 5px;
  }

  .MuiSvgIcon-root-19 {
    fill: currentColor;
    width: 1em;
    height: 1em;
    display: inline-block;
    font-size: 24px;
    transition: fill 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
    user-select: none;
    flex-shrink: 0;
  }
</style>


<div id="root">
  <div class="container pt-5">
    <div class="row align-items-stretch">
      <div class="c-dashboardInfo col-lg-3 col-md-6">
        <div class="wrap">
          <!-- Button trigger modal -->

          <!-- Modal -->
          <a href="" data-bs-toggle="modal" data-bs-target="#income">
            <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Todays Income</h4><span class="hind-font caption-12 c-dashboardInfo__count">{{$dayIncome}} <i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
            <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">This Month Expense {{$monthDeposit}} </h4>
          </a>
        </div>
      </div>
      <div class="c-dashboardInfo col-lg-3 col-md-6">
        <div class="wrap">
          <a href="" data-bs-toggle="modal" data-bs-target="#expense">
            <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Todays Expense</h4><span class="hind-font caption-12 c-dashboardInfo__count">{{$dayExpense}} <i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
            <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">This Month Expense {{$monthWithraw}} </h4>
          </a>
        </div>
      </div>
      @if($DayDrawer>=0)
      <div class="c-dashboardInfo col-lg-3 col-md-6">
        <div class="wrap">
          <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Hand Cash</h4>

          <span class="hind-font caption-12 c-dashboardInfo__count">{{$DayDrawer}} <i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
          @if($MonthDrawer>=0)
          <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">This Month Profit {{$MonthDrawer}} </h4>
          @else @php
          $negativeValue =($MonthDrawer);
          $positiveValue = abs($negativeValue);
          @endphp
          <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">This Month Loss {{$positiveValue}} </h4>
          @endif

        </div>
      </div>
      @else
      @php
      $negativeValue =($drawer);
      $positiveValue = abs($negativeValue);
      @endphp

      <div class="c-dashboardInfo col-lg-3 col-md-6">
        <div class="wrap">
          <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Loss</h4><span class="hind-font caption-12 c-dashboardInfo__count">{{$dayExpense}} <i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
          <span class="hind-font caption-12 c-dashboardInfo__count">-{{$positiveValue}} <i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
          @if($MonthDrawer>=0)
          <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">This Month Cash {{$MonthDrawer}} </h4>
          @else @php
          $negativeValue =($MonthDrawer);
          $positiveValue = abs($negativeValue);
          @endphp
          <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">This Month Cash -{{$positiveValue}} </h4>
          @endif
        </div>
      </div>
    </div>
    @endif
  </div>
</div>

<div class="modal fade" id="income" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Todays Income History {{$today->format('d-m-Y')}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Income Type</th>
              <th scope="col">Amount</th>
              <th scope="col">Time</th>
            </tr>
          </thead>
          <tbody>
            @foreach($IncomeList as $data)
            <tr>
              <td>
                @if($data->account_type==1)
                Personal Transection
                @elseif($data->account_type==2)
                FDR
                @elseif($data->account_type==3)
                Dps
                @else
                Loan
                @endif
              </td>
              <td>{{$data->transection_amount}}</td>
              <td>{{$data->created_at->format('H:i:s');}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="expense" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Todays Expense History {{$today->format('d-m-Y')}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Income Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Time</th>
              </tr>
            </thead>
            <tbody>
              @foreach($ExpenseList as $data)
              <tr>
                <td>
                  @if($data->account_type==1)
                  Personal Transection
                  @elseif($data->account_type==2)
                  FDR
                  @elseif($data->account_type==3)
                  Dps
                  @else
                  Loan
                  @endif
                </td>
                <td>{{$data->transection_amount}}</td>
                <td>{{$data->created_at->format('H:i:s');}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection