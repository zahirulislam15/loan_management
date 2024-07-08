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
                        <form class="row g-3" method="post" action="{{ route('fees.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Fees Name<span style="color:red;">*</span></label>
                                        <input type="text" name="name" value="" required class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Amount<span style="color:red;">*</span></label>
                                        <input type="text" name="amount" value="" required class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 p-2">
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
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <center>
                            <h3>Fees </h3>
                        </center>
                        <table id="myTable" class="table table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fees as $key=>$fee)
                                <tr>
                                    <td>{{$fee->id}}</td>
                                    <td>{{$fee->name}}</td>
                                    <td>{{$fee->amount}}</td>
                                    <!-- Button trigger modal -->
                                    <td>
                                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fees{{$key}}">Edit</a>
                                        <a href="{{route('fees.delete',$fee->id)}}" class="btn btn-primary">Delete</a>
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="fees{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Fees Edit</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="border p-3 rounded" style="margin-top: 20px;">
                                                        <form class="row g-3" method="post" action="{{ route('fees.update',$fee->id) }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Fees Name<span style="color:red;"></span></label>
                                                                        <input type="text" name="name" value="{{$fee->name}}" class="form-control">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-label">Amount<span style="color:red;"></span></label>
                                                                        <input type="text" name="amount" value="{{$fee->amount}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 p-2">
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