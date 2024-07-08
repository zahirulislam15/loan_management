@extends('backend.master')
@section('content')

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">
            Staff List</h3>
        <div class="card-tools">
            <a href="{{route('staff.create')}}" type="button" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                Create
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>Mother Name</th>
                        <th>Parmanent Address</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffMembers as $member)
                    <tr>
                        <td>{{$member->name}}</td>
                        <td>{{$member->father_name}}</td>
                        <td>{{$member->mother_name}}</td>
                        <td>{{$member->permanent_address}}</td>
                        <td>{{$member->salary}}</td>
                        <td>
                        <a class="btn btn-success" href="{{route('staff.edit',$member->id)}}">Edit</a>
                        <a class="btn btn-primary" href="" onclick="if(confirm('Are you sure? You are going to delete this record')){ location.replace( '{{route('staff.delete',$member->id) }}' ); }" >Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
 @endsection