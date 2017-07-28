<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    function pendingRequests(){
    	return $this->belongsTo('App\Users');
    }

}
