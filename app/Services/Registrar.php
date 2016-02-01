<?php namespace App\Services;

use App\User;
use App\Church;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'phone_number' => 'required|min:10',
			'dob' => 'required',
			'church_name' => 'required',
			'church_address' => 'required',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		$church = Church::create([
			'name' => $data['church_name'],
			'address' => $data['church_address'],
			]);
		$user = new User([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'church_id' => $church['id'],
			'dob' => $data['dob'],
			'phone_number' => $data['phone_number']
		]);
		$user->church_id = $church->id;
		$user->admin = true;
		$user->save();
		$church->approved = true;
		$church->initiator_id = $user->id;
		$church->save();
		return $user;
	}

}
