@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
<div class="tab-content">
    
    <!-- Dashboard view -->
    <div id="dash" class="tab-pane fade @if(!isset($_GET['page'])) {{ 'in active' }} @endif">
        <h1 class="page-header">Dashboard</h1>

        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('message') }}</div>
        @endif

        <h2 class="sub-header">Pending Requests</h2>
        <table class="table table-bordered table-responsive">
                <tr>
                    <th class="col-sm-1">Badge</th>
                    <th class="col-sm-2">Name</th>
                    <th class="col-sm-1">From</th>
                    <th class="col-sm-1">To</th>
                    <th class="col-sm-1">Type</th>
                    <th class="col-sm-2">Reason</th>
                    <th class="col-sm-1">Status</th>
                    <th class="col-sm-1">Created At</th>
                    <th class="col-sm-1">Updated At</th>

                    @if(Auth::user()->role=='admin')
                    <th class="col-sm-1">Action</th>
                    @endif

                </tr>

                @foreach($leaves as $leave)
                    <tr>
                        <td class="col-sm-1">{{ $leave->employee->badge }}</td>
                        <td class="col-sm-2">{{ $leave->employee->emp_name }}</td>
                        <td class="col-sm-1">{{ $leave->from }}</td>
                        <td class="col-sm-1">{{ $leave->to }}</td>
                        <td class="col-sm-1">{{ $leave->type }}</td>
                        <td class="col-sm-1">{{ $leave->reason }}</td>
                        <td class="col-sm-1">{{ $leave->status }}</td>
                        <td class="col-sm-1">{{ $leave->created_at }}</td>
                        <td class="col-sm-1">{{ $leave->updated_at }}</td>

                        @if(Auth::user()->role=='admin')
                        <td class="col-sm-2">
                            <a href='{{ url("approve_leave/$leave->id") }}' class="btn btn-primary btn-xs"><i class="fa fa-check" aria-hidden="true"></i></a>
                            <a href='{{ url("deny_leave/$leave->id") }}' class="btn btn-danger btn-xs"><i class="fa fa-times" aria-hidden="true"></i></a>
                            <a href='{{ url("cancel_leave/$leave->id") }}' class="btn btn-warning btn-xs"><i class="fa fa-ban" aria-hidden="true"></i></a>
                        </td>
                        @endif

                    </tr>
                @endforeach
        </table>
    </div>
    
    <!-- View for admin -->
    <div id="edit" class="tab-pane fade @if(isset($_GET['page'])) {{'in active'}} @endif">
        <h1 class="page-header">Edit Records</h1>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="col-sm-1">Badge</th>
                    <th class="col-sm-3">Employee Name</th>
                    <th class="col-sm-2">Email</th>
                    <th class="col-sm-2">Role</th>
                    <th class="col-sm-2">Status</th>
                    <th class="col-sm-1">Vacation Leave Credits</th>
                    <th class="col-sm-1">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td class="col-sm-1">{{ $employee->badge }}</td>
                    <td class="col-sm-3">{{ $employee->emp_name }}</td>
                    <td class="col-sm-2">{{ $employee->email }}</td>
                    <td class="col-sm-2">{{ $employee->role }}</td>
                    <td class="col-sm-2">{{ $employee->emp_status}}</td>
                    <td class="col-sm-1">{{ $employee->leave_bal }}</td>
                    <td class="col-sm-1">
                
                <form method="POST" action='{{ url("show_employee/$employee->id") }}'>
                {{ csrf_field() }}
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="{{'#profile' . $employee->id}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
                </form>

                    <!-- Modal -->
                    <div class="modal fade" id="{{'profile'.$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <form method="POST" action='{{ url("edit_profile/$employee->id") }}'>
                            {{ csrf_field() }}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h3>{{ $employee->emp_name }}</h3>
                                        <p><strong>{{ $employee->badge }}</strong></p>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Employee Name</label>
                                            <input type="text" class="form-control" name="ename" value="{{$employee->emp_name}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="{{$employee->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="pw1" value="{{$employee->password}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm password</label>
                                            <input type="password" class="form-control" name="pw2" value="{{ $employee-> password }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Vacation Leave Balance</label>
                                            <select class="form-control" name="creds">
                                                <option>24</option>
                                                <option>23</option>
                                                <option>22</option>
                                                <option>21</option>
                                                <option>20</option>
                                                <option>19</option>
                                                <option>18</option>
                                                <option>17</option>
                                                <option>16</option>
                                                <option>15</option>
                                                <option>14</option>
                                                <option>13</option>
                                                <option>12</option>
                                                <option>11</option>
                                                <option>10</option>
                                                <option>9</option>
                                                <option>8</option>
                                                <option>7</option>
                                                <option>6</option>
                                                <option>5</option>
                                                <option>4</option>
                                                <option>3</option>
                                                <option>2</option>
                                                <option>1</option>
                                                <option>0</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Role</label>
                                            @if($employee->role=='admin')
                                            <input class="form-control" name="role" value="admin" readonly>
                                            @else
                                            <select class="form-control" name="role">
                                                <option>Regular</option>
                                                <option>Supervisor</option>
                                                <option>Admin</option>
                                            </select>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="estatus">
                                                <option>Active</option>
                                                <option>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes</button>
                            </form>

                                    @if($employee->role!='admin')
                                        <a href='{{ url("del_employee/$employee->id") }}' class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete Profile</a>
                                    @endif

                                    </div>
                                </div>
                        </div>
                    </div>
                    
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $employees->links() }}
    </div>

    <div id="add" class="tab-pane fade">
        <h1 class="page-header">Add Records</h1>
        <form method="POST" action='{{ url("add_employee") }}'>
        {{ csrf_field() }}
            <table class="table table-bordered table-responsive">
                <tbody>
                    <tr>
                        <th class="col-sm-2">Employee Badge:</th>
                        <td class="col-sm-3"><input type="text" class="form-control" placeholder="Badge Number" id="badge" name="badge" required></input></td> 
                        <th class="col-sm-2">Employee Name:</th>
                        <td class="col-sm-5"><input type="text" class="form-control" placeholder="First Name Last Name" id="ename" name="ename" required></input></td>
                    </tr>
                    <tr>
                        <th class="col-sm-2">Role:</th>
                        <td class="col-sm-3"><input type="text" class="form-control" value="regular" id="role" name="role"></input></td> 
                        <th class="col-sm-2">Employment Status:</th>
                        <td class="col-sm-5">
                            <select class="form-control" id="estatus" name="estatus">
                                <option>inactive</option>
                                <option>active</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-sm-2">Email:</th>
                        <td class="col-sm-3"><input type="email" class="form-control" id="email" name="email" placeholder="Email" required></input></td>
                        <th class="col-sm-2">Password:</th>
                        <td class="col-sm-5"><input type="password" class="form-control" id="password" name="password" placeholder="Password" required></input>
                    </tr>
                    <tr>
                        <th class="col-sm-2">Vacation Leave Credits:</th>
                        <td class="col-sm-3"><input type="text" class="form-control" value="24" id="creds" name="creds"></input></td>
                        <th class="col-sm-2">Action:</th>
                        <td class="col-sm-5"><button class="btn btn-primary" id="submit" name="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Submit</button></td>
                    </tr>
                </tbody>
            </table> 
        </form>
    </div>

    <!-- View for regular employee -->
    <div id="request" class="tab-pane fade">
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
                        <input type="text" class="form-control" id="reason" name="reason" placeholder="Limit reason to 140 characters" required>
                        <div class="col-sm-6 col-sm-offset-3">
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>
                        <button class="btn btn-primary" id="file" name="file"><i class="fa fa-floppy-o" aria-hidden="true"></i> Submit</button>
                    </td>
                </tr>
        </form>
                </tbody>
            </table>
        </div>
    </div>

    <div id="leaves" class="tab-pane fade">
        <h1 class="page-header">My Leaves</h1>
        <h2 class="sub-header">{{ $current_user->emp_name }}</h2>
        <h3>Badge ID: {{ $current_user->badge }}</h3>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="col-sm-1">From</th>
                    <th class="col-sm-1">To</th>
                    <th class="col-sm-2">Type</th>
                    <th class="col-sm-2">Reason</th>
                    <th class="col-sm-1">Status</th>
                    <th class="col-sm-2">Created At</th>
                    <th class="col-sm-2">Updated At</th>
                    <th class="col-sm-1">Action</th>
                </tr>
            </thead>
            <tbody>

            @foreach($my_leaves as $ml)
                <tr>
                    <td class="col-sm-1">{{ $ml->from }}</td>
                    <td class="col-sm-1">{{ $ml->to }}</td>
                    <td class="col-sm-2">{{ $ml->type }}</td>
                    <td class="col-sm-2">{{ $ml->reason }}</td>
                    <td class="col-sm-1">{{ $ml->status }}</td>
                    <td class="col-sm-2">{{ $ml->created_at }}</td>
                    <td class="col-sm-2">{{ $ml->updated_at }}</td>
                    <td class="col-sm-1"><a href='{{ url("cancel_leave/$ml->id") }}' class="btn btn-warning btn-sm"><i class="fa fa-ban" aria-hidden="true"></i> Cancel</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection