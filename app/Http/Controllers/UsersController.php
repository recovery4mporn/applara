<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use Redirect;
use Session;
class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$users = User::all();
		return view('users.index', ['users' => $users]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = $this->getRestrictions(null);
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('users/create')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $user = new User;
            $user = $this->assignValues($request, $user);
            $user->save();

            // redirect
            Session::flash('status', 'Successfully created user!');
            return Redirect::to('users');
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		return view('users.show',['user' => $user]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$rules = $this->getRestrictions($request->input('id'));
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('users/create')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
			$user = User::find($request->input('id'));
			$user = $this->assignValues($request, $user);
			$user->save();
			Session::flash('status', 'Successfully updated your details!');
		}

		return view('users.show', ['user' => $user]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getRestrictions($id)
	{
		return array(
    		'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users'. ($id ? ",id,$id" : ''),
			'phone_number' => 'required|min:10',
			'dob' => 'required',

        );
	}

	public function assignValues($request, $user){
		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->phone_number = $request->input('phone_number');
		$user->dob = $request->input('dob');
		$user->church_id 	= Auth::user()->church()->get()->first()->id;
		return $user;
	}

}
