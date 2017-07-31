@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
<div class="tab-content">
    <!-- View for admin -->
    <div id="dash" class="tab-pane fade in active">
        <h1 class="page-header">Dashboard</h1>
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        <h2 class="sub-header">Pending Requests</h2>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="col-sm-1">Badge</th>
                    <th class="col-sm-2">Name</th>
                    <th class="col-sm-1">From</th>
                    <th class="col-sm-1">To</th>
                    <th class="col-sm-1">Type</th>
                    <th class="col-sm-2">Reason</th>
                    <th class="col-sm-1">Status</th>
                    <th class="col-sm-2">Created At</th>
                    @if(Auth::user()->role=='admin')
                    <th class="col-sm-1">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
            <form method="POST" action=''>
            {{ csrf_field() }}
            @foreach($leaves as $leave)
                <tr>
                
                    <td class="col-sm-1">{{ $leave->badge }}</td>
                    <td class="col-sm-2">{{ $leave->emp_name }}</td>

                    <td class="col-sm-1">{{ $leave->from }}</td>
                    <td class="col-sm-1">{{ $leave->to }}</td>
                    <td class="col-sm-1">{{ $leave->type }}</td>
                    <td class="col-sm-2">{{ $leave->reason }}</td>
                    <td class="col-sm-1">{{ $leave->status }}</td>
                    <td class="col-sm-2">{{ $leave->created_at }}</td>
                    @if(Auth::user()->role=='admin')
                    <td class="col-sm-1">
                        <button class="btn btn-primary">Approve</button><button class="btn btn-danger">Reject</button>
                    </td>
                    @endif
                </tr>
            </form>
            @endforeach
            </tbody>
        </table>
    </div>
    <div id="edit" class="tab-pane fade">
        <h1 class="page-header">Edit Records</h1>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="col-sm-1">Badge</th>
                    <th class="col-sm-2">Employee Name</th>
                    <th class="col-sm-2">Email</th>
                    <th class="col-sm-2">Role</th>
                    <th class="col-sm-2">Status</th>
                    <th class="col-sm-2">Vacation Leave Credits</th>
                    <th class="col-sm-1">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button class="btn btn-info">Edit</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="add" class="tab-pane fade">
        <h1 class="page-header">Add Records</h1>
        <form method="POST" action=''>
        {{ csrf_field() }}
            <table class="table table-bordered table-responsive">
                <tbody>
                    <tr>
                        <th class="col-sm-2">Employee Badge:</th>
                        <td class="col-sm-3"><input type="text" class="form-control" placeholder="Badge Number" id="badge" name="badge"></input></td> 
                        <th class="col-sm-2">Employee Name:</th>
                        <td class="col-sm-5"><input type="text" class="form-control" placeholder="First Name Last Name" id="ename" name="ename"></input></td>
                    </tr>
                    <tr>
                        <th class="col-sm-2">Role:</th>
                        <td class="col-sm-3"><input type="text" class="form-control" value="regular" id="role" name="role" disabled></input></td> 
                        <th class="col-sm-2">Employment Status:</th>
                        <td class="col-sm-5">
                            <select class="form-control" id="estatus" name="estatus">
                                <option>active</option>
                                <option>inactive</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-sm-2">Email:</th>
                        <td class="col-sm-3"><input type="email" class="form-control" id="email" name="email" placeholder="Email"></input></td>
                        <th class="col-sm-2">Password:</th>
                        <td class="col-sm-5"><input type="password" class="form-control" id="password" name="password" placeholder="Password"></input>
                    </tr>
                    <tr>
                        <th class="col-sm-2">Vacation Leave Credits:</th>
                        <td class="col-sm-3"><input type="text" class="form-control" value="24" id="creds" name="creds" disabled></input></td>
                        <th class="col-sm-2">Action:</th>
                        <td class="col-sm-5"><button class="btn btn-primary">Submit</button></td>
                    </tr>
                </tbody>
            </table> 
        </form>

    </div>


    <!-- View for regular employee -->
    <div id="request" class="tab-pane">
        <h1 class="page-header">Request for Leave</h1>
        <div class="text-center">
        <form method="POST" action='{{ url("submit_leave/$current_user->id") }}'>
        {{ csrf_field() }}
            <table class="table table-bordered table-responsive">
                <tbody>
                <tr>
                    <th class="col-sm-2">Employee Badge:</th>
                    <td class="col-sm-3">{{$current_user->badge}}</td> 
                    <th class="col-sm-2">Employee Name:</th>
                    <td class="col-sm-5">{{$current_user->emp_name}}</td>
                </tr>
                <tr>
                    <th class="col-sm-2">Role:</th>
                    <td class="col-sm-3">{{$current_user->role}}</td> 
                    <th class="col-sm-2">Employment Status:</th>
                    <td class="col-sm-5">{{$current_user->emp_status}}</td>
                </tr>
                <tr>
                    <th class="col-sm-2">Vacation Leave Credits:</th>
                    <td class="col-sm-3">{{$current_user->leave_bal}}</td> 
                    <th class="col-sm-2">Type of Leave:</th>
                    <td class="col-sm-5">
                    <div class="col-sm-6 col-sm-offset-3">
                        <select class="form-control" id="leave" name="leave">
                            <option>Vacation</option>
                            <option>Sick</option>
                            <option>Maternity</option>
                            <option>Paternity</option>
                            <option>Bereavement</option>
                        </select>
                    </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th class="col-sm-5 text-center">Duration: </th>
                    <td>
                        <div class="col-sm-6 col-sm-offset-3">
                            From: <input type="text" class="form-control" id="from" name="from" placeholder="MM/DD/YYYY">
                            To: <input type="text" class="form-control" id="to" name="to" placeholder="MM/DD/YYYY">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="col-sm-5 text-center">Reason: </th>
                    <td>
                        <div class="col-sm-8 col-sm-offset-2">
                        <input type="text" class="form-control" id="reason" name="reason" placeholder="Limit reason to 140 characters">
                        <div class="col-sm-6 col-sm-offset-3">
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>
                        <button class="btn btn-primary" id="file" name="file">Submit</button>
                    </td>
                </tr>
        </form>
                </tbody>
            </table>
        </div>
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
    </div>

    <div id="leaves" class="tab-pane fade">
        <h1 class="page-header">My Leaves</h1>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="col-sm-1">Badge</th>
                    <th class="col-sm-3">Name</th>
                    <th class="col-sm-1">From</th>
                    <th class="col-sm-1">To</th>
                    <th class="col-sm-1">Type</th>
                    <th class="col-sm-2">Reason</th>
                    <th class="col-sm-1">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-sm-1"></td>
                    <td class="col-sm-3"></td>
                    <td class="col-sm-1"></td>
                    <td class="col-sm-1"></td>
                    <td class="col-sm-1"></td>
                    <td class="col-sm-2"></td>
                    <td class="col-sm-1"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection