@extends('backend.master')
@section('content')

<!--start content-->
<main class="page-content">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded" style="margin-top: 20px;">
                        <form method="post" action="{{ route('expense.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="form-label"> Expense Type</label>
                                            <select class="form-control" name="purpose">
                                                <option value="Staff Salary">Staff Salary</option>
                                                <option value="Transection Bill">Transport Bill</option>
                                                <option value="Others Bill">Others Bill</option>
                                            </select>
                                        </div>                                        
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="form-label">Expense By<span style="color:red;">&nbsp;&nbsp;&nbsp;</span>
                                            <select class="form-control" name="expense_by" id="">
                                                @foreach($staff as $data)
                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="form-label">Expense Amount<span style="color:red;">&nbsp;&nbsp;&nbsp;</span>
                                            <input class="form-control" type="number" name="amount">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="form-label">Date<span style="color:red;">&nbsp;&nbsp;&nbsp;</span>
                                            <input class="form-control" type="date" name="date">
                                        </div>
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
        <div class="col-md-2"></div>

    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <center>
                            <h3>Expense List</h3>
                        </center>
            <table id="myTable" class="table table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Expense Type</th>
                                    <th>Expense By</th>
                                    <th>Amount</th>
                                    <!-- <th>Action</th> -->

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expense as $key=>$data)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$data->purpose}}</td>
                                    <td>{{$data->staff->name ?? ''}}</td>

                                    <td>{{$data->transection_amount }}</td>
                                   


                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>


    </div>
</main>




@endsection