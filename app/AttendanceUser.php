<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceUser extends Model {
	protected $table = 'attendances_users';
	public function setUpdatedAt($value)
	{
	    // Do nothing.
	}
	public function setCreatedAt($value)
	{
	    // Do nothing.
	}
	public function attendance_record(){
		return $this->belongsTo('App\Attendance', 'attendance_id');
	}

}
