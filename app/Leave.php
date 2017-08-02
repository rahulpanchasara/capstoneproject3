<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
	protected $table = 'leave_requests';

	// $leave->employee

    public function employee(){
    	return $this->belongsTo('App\User', 'emp_id');
    }

    // function approveLeave($id){
    // 	$this->employee()->where('id',$id)->update(['status'=>'approved']);
    // }
    //works only for pivot table

}
