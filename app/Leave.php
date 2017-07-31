<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
	protected $table = 'leave_requests';

    function showLeaves(){
    	return $this->belongsTo('App\User','leave_requests','emp_id');
    }
}
