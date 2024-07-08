@extends('backend.master')
@section('content')

<main class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded" style="margin-top: 20px;">
                        <form class="row g-3" method="post" action="{{ route('password') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">New Password<span style="color:red;"></span></label>
                                        <input type="text" class="form-control" name="new_password" value="{{old('new_password')}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="form-label">Confirm Password<span style="color:red;">&nbsp;&nbsp;&nbsp;</span>
                                                <input type="text" class="form-control" name="new_password_confirmation" value="{{old('confirm_password')}}" required>
                                        </div>
                                    </div>
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