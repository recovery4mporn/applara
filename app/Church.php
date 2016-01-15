<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model {


	protected $table = 'churches';

	protected $fillable = ['name', 'address'];
	
	public function users()
	{
	    return $this->hasMany('App\User'); // or whatever your namespace is
	}

	//

}
