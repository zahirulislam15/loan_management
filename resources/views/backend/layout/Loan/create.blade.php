@extends('backend.master')
@section('content')

@section('content')
<!--start content-->
<main class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded" style="margin-top: 20px;">
                        <center>
                            <h2>Loan Information</h2>
                        </center>
                        <form class="row g-3" method="post" id="" action="{{ route('loan.create.post') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Account Number<span style="color:red;">*</span></label>
                                        <select name="account_number" class="form-control" id="">
                                            @foreach($account as $data)
                                            <option value="{{$data->id}}">{{$data->account_number}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Loan Amount<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" name="amount"  id="amount" value="{{ old('amount') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">

                                        <label class="form-label">Interest(%)<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" placeholder="5%" name="interest" id="interest" value="{{ old('interest') }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Loan Month<span style="color:red;">*</span></label>
                                        <input type="number" placeholder="Please Enter Month" class="form-control" name="month" id="month" value="{{ old('month') }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Payable Amount</label>
                                        <input type="number" class="form-control" name="payable" id="payable" value="{{ old('payable') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="frequency" class="form-label">Frequency:</label>
                                        <select class="form-control" id="frequency" name="frequency" onchange="calculatePayment()">
                                            <option value="monthly">Monthly</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="daily">Daily</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="payment">Payment:</label>
                                        <input class="form-control" type="text" id="payment" name="payment" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="payment">Start Date</label>
                                        <input class="form-control" type="date" id="start_date" name="start_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Loan Purpose<span style="color:red;">*</span></label>
                                <textarea class="form-control" placeholder="Write valid Purpose" name="loan_purpose" value="{{ old('loan_purpose') }}" required ></textarea>
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
    </div>
</main>




@endsection
<script>
    $(document).ready(function() {
        $('#accountNumber').on('input', function() {
            let accountNumber = $(this).val();

            if (accountNumber.length >= 2) {
                $.ajax({
                    url: 'search.account',
                    type: 'POST',
                    data: {
                        account_number: accountNumber
                    },
                    success: function(data) {
                        $('#accountNumber').html(data);
                    }
                });
            } else {
                $('#accountNumber').html('');
            }
        });
    });

    function calculatePayment() {
        const amount = parseFloat(document.getElementById('amount').value);
        const interest = parseFloat(document.getElementById('interest').value);
        const month = parseFloat(document.getElementById('month').value);
        const frequency = document.getElementById('frequency').value;

        // Calculate monthly payment using a simple interest formula
        const monthlyPayment = (amount + (amount * (interest / 100))) / month;

        let payment = 0;

        switch(frequency) {
            case 'daily':
                payment = monthlyPayment / 30;
                Math.ceil('payment'); // Assuming 30 days in a month
                break;
            case 'weekly':
                payment = (monthlyPayment * 12) / 52;
                Math.ceil('payment'); // Converting monthly to yearly and then to weekly
                break;
            case 'monthly':
                payment = monthlyPayment;
                Math.ceil('payment');
                break;
        }

        const ceilPayment = Math.ceil(payment);

        document.getElementById('payment').value = ceilPayment.toFixed(2);
    }
</script>