<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model {

	//
	public function church(){
		return $this->belongsTo('App\Church');
	}

	public function attendance_users(){
		return $this->hasMany('App\AttendanceUser');
	}

	public function getDateAttribute($value)
	{
		return date('M d Y', strtotime($value));
	}
}
