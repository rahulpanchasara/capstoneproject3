<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Leave;
use Auth;
use Session;

class LeavesController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    function submitLeave(Request $request, $id){
    	$new_leave = new Leave();
        $new_leave->emp_id = Auth::user()->id;
    	$new_leave->from = date('Y-m-d', strtotime($request->from));
    	$new_leave->to = date('Y-m-d', strtotime($request->to));
    	$new_leave->type = $request->leave;
    	$new_leave->reason = $request->reason;
        $new_leave->save();

        Session::flash('message','Leave request submitted successfully!');

        return back();
    }
}
