<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Family;
class Church extends Model {


	protected $table = 'churches';

	protected $fillable = ['name', 'address'];
	
	public function users()
	{
	    return $this->hasMany('App\User'); // or whatever your namespace is
	}

	public function zones()
	{
	    return $this->hasMany('App\Zone'); // or whatever your namespace is
	}

	public function attendances()
	{
	    return $this->hasMany('App\Attendance'); // or whatever your namespace is
	}

	public function families()
	{
    return Family::whereIn("id",  $this->users()->whereNotNull("family_id")->select('family_id')->lists('family_id'))->get(); // or whatever your namespace is
	}
	//

}
