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
                            <h2>Loan Information Update</h2>
                        </center>
                        <form class="row g-3" method="post" id="" action="{{ route('loan.edit.post',$edit->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Account Number<span style="color:red;">*</span></label>
                                        
                                        <select name="account_number" class="form-control" id="">
                                            @foreach($account as $data)
                                            <option value="{{$data->id}}" {{ $data->id == $edit->account_number ? 'selected' : '' }}>{{$data->account_number}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Loan Aount<span style="color:red;">*</span></label>
                                        <input type="number" readonly class="form-control" name="loan_amount" value="{{$edit->loan_amount}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Monthly interest(%)<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" placeholder="5%" name="interest" value="{{$edit->interest}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Loan Month<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" name="month" value="{{$edit->month}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="frequency" class="form-label">Frequency:</label>
                                        <select class="form-control" id="frequency" name="frequency" onchange="calculatePayment()">
                                            <option value="monthly">Monthly</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="daily">Daily</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="payment">Payment:</label>
                                        <input class="form-control" type="text" id="payment" name="payment" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Loan Purpose<span style="color:red;">*</span></label>
                                <!-- <input type="text" class="form-control" placeholder="Write valid Purpose" name="loan_purpose" value="{{$edit->loan_purpose}}" required> -->
                                <textarea name="loan_purpose" id="" placeholder="Write valid Purpose" class="form-control"  value="{{$edit->loan_purpose}}" required>test</textarea>
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