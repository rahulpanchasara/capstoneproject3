@extends('layouts.master')

@section('content')
<div class="tab-content">
    <div id="request" class="tab-pane fade in active">
        <h1 class="page-header">Request for Leave</h1>
        <div class="text-center">
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
        <form method="POST" action='{{ url("/file_leave/$current_user->id") }}'>
        {{ csrf_field() }}
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
                    @if(Auth::user()->role=='admin')
                    <th class="col-sm-2">Action</th>
                    @endif
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
                    @if(Auth::user()->role=='admin')
                    <td class="col-sm-2"><button>Approve</button><button>Reject</button></td>
                    @endif
                </tr>
            </tbody>
        </table>

    </div>

    <div id="dash" class="tab-pane fade">
        <h1 class="page-header">Dashboard</h1>
    </div>

    <div id="edit" class="tab-pane fade">
        <h1 class="page-header">Edit Records</h1>
    </div>

    <div id="add" class="tab-pane fade">
        <h1 class="page-header">Add Records</h1>
    </div>


</div>
@endsection