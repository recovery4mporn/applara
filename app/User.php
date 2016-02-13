<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermissionContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract {

	use Authenticatable, CanResetPassword, HasRoleAndPermission;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'dob', 'phone_number'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function church(){
		return $this->belongsTo('App\Church');
	}

	public function family(){
		return $this->belongsTo('App\Family');
	}

	public function getCreatedAtAttribute($value)
	{
		return date('M Y', strtotime($value));
	}

	public function getDobAttribute($value)
	{
		return date('M d Y', strtotime($value));
	}

	public function getJoinedOnAttribute($value)
	{
		return date('M d Y', strtotime($value));
	}

	public function getMarriedAttribute($value)
	{
		return $value == 1 ? "Married" : "Single";
	}


	public function getAnnointingTakenAttribute($value)
	{
		return $value == 1 ? "Received" : "Not yet received";
	}
	public function getBaptismTakenAttribute($value)
	{
		return $value == 1 ? "Taken" : "Not yet taken";
	}

	public function setFamilyIdAttribute($value)
	{
	    $this->attributes['family_id'] = $value ?: null;
	}
}
