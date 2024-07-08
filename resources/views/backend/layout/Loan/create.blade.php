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
                                        <input type="number" class="form-control" name="amount" value="{{ old('amount') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">

                                        <label class="form-label">Monthly interest(%)<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" placeholder="5%" name="interest" value="{{ old('interest') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Loan Month<span style="color:red;">*</span></label>
                                        <input type="number" placeholder="Please Enter Month" class="form-control" name="month" value="{{ old('month') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">


                                <label class="form-label">Loan Purpose<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" placeholder="Write valid Purpose" name="loan_purpose" value="{{ old('loan_purpose') }}" >
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
</script>