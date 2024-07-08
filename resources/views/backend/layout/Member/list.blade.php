@extends('backend.master')
@section('content')

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">
            Personal Account List </h3>
        <div class="card-tools">
            <a href="{{route('member.create')}}" type="button" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                Create Account
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Account Number</th>
                        <th>Father name</th>
                        <th>Mother Name</th>
                        <th>Mobile</th>
                        <th>Nominee Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->account_number}}</td>
                        <td>{{$value->father_name}}</td>
                        <td>{{$value->mother_name}}</td>
                        <td>{{$value->mobile}}</td>
                        <td>{{$value->nominee_name}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('edit.member.account',$value->id)}}">Edit</a>
                            <a class="btn btn-danger" href="" onclick="if(confirm('Are you sure? You are going to delete this record')){ location.replace( '{{route('member.delete',$value->id) }}' ); }" >Delete</a>
                            <a class="btn btn-success" href="{{route('profile',$value->id)}}">Profile</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> @endsection 