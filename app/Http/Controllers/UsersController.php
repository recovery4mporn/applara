<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use Redirect;
use Session;
use DB;
use Bican\Roles\Models\Role;
class UsersController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */

  public function __construct()
  {
  }

  public function index(Request $request)
  {
    //
    // $users = User::where('church_id', '=',Auth::user()->church_id)->get();
    if(!($request->has('view'))){
      $users = Auth::user()->church()->get()->first()->users()->get();
    } 
    elseif($request->input('view') == 0){
      $users = Auth::user()->church()->get()->first()->users()->where("member_type","=",0)->get();
    }
    elseif($request->input('view') == 1){
      $users = Auth::user()->church()->get()->first()->users()->where("member_type","=",1)->get();
    }
    elseif($request->input('view') == 2){
      $users = Auth::user()->church()->get()->first()->users()->where("member_type","=",2)->get();
    }
    return view('users.index', ['users' => $users]);
  }

  // public function scopeUsers($query, $id)
 //    {
 //        return $query->where('church_id', );
 //    }


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
            $this->attachOrDetachRole($request, $user, "new");
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
  public function show(Request $request, $id)
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
            return redirect()->action('UsersController@show', [$request->input('id'), 'edit'])
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
      $user = User::find($request->input('id'));
      $user = $this->assignValues($request, $user);
      $user->save();
      $this->attachOrDetachRole($request, $user, "edit");
      Session::flash('status', 'Successfully updated your details!');
    }

    return view('users.show', ['user' => $user]);
  }

  public function update_profile_picture(Request $request, $id){
    $user = User::find($id);
    $file = array('image' => $request->file('image'));
    // setting up rules
    $rules = array('image' => 'required|mimes:jpeg,bmp,png',); //mimes:jpeg,bmp,png and for max size max:10000
    // doing the validation, passing post data, rules and the messages
    $validator = Validator::make($file, $rules);
    if ($validator->fails()) {
    // send back to the page with the input data and errors
      return redirect('users')->with('user', $user);
    }
    else {
    // checking file is valid.
    if ($request->file('image')->isValid()) {
      $destinationPath = 'uploads'; // upload path
      $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
      $fileName = $user->id .'.'.$extension; // renameing image
      $request->file('image')->move($destinationPath, $fileName); // uploading file to given path
      // sending back with message
      $user->image_url = $destinationPath .'/'. $fileName;
      $user->save();
      Session::flash('status', 'Upload successfully'); 
      return redirect()->action('UsersController@show', [$user->id]);
    }
    else {
      // sending back with error message.
      Session::flash('error', 'uploaded file is not valid');
      return redirect()->action('UsersController@show', [$user->id]);
    }
    }   
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

    $user = User::find($id);
    if($user && $id == Auth::user()->id){
      Session::flash('error', 'Sorry you can not delete yourself!');
    }
    elseif($user) {
      User::destroy($id);
      Session::flash('status', 'The user has been deleted!'); 
    }
    return Redirect::to('users');
  }

  public function getRestrictions($id)
  {
    return array(
      'name' => 'required|max:255',
      'email' => 'required|email|max:255|unique:users'. ($id ? ",id,$id" : ''),
      'phone_number' => 'required|min:10',
      'dob' => 'required',
      'married' => 'required',
      'gender' => 'required',
      'baptism_taken' => 'required',
      'annointing_taken' => 'required',
      'member_type' => 'required'
        );
  }

  public function assignValues($request, $user){
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->phone_number = $request->input('phone_number');
    $user->dob = $request->input('dob');
    $user->joined_on = $request->input('joined_on');
    $user->gender = $request->input('gender');
    $user->baptism_taken = $request->input('baptism_taken');
    $user->annointing_taken = $request->input('annointing_taken');
    $user->married = $request->input('married');
    $user->weddingDate = $request->input('weddingDate');
    $user->job = $request->input('job');
    $user->address = $request->input('address');
    $user->member_type = $request->input('member_type');
    $user->zone_id = $request->input('zone');
    $user->church_id  = Auth::user()->church()->get()->first()->id;
    return $user;
  }

  public function attachOrDetachRole($request, $user, $action){
    $roles = Role::all();
    if($action == "edit"){
      if(empty($request->input("roles"))){
        $user->detachAllRoles();
        return;
      }
    }
    foreach($roles as $role){
      if($user->is($role->slug) && !empty($request->input("roles")) && !in_array($role->slug, $request->input("roles"))){
        $user->detachRole($role);
      }
      elseif(!$user->is($role->slug) && !empty($request->input("roles")) && in_array($role->slug, $request->input("roles"))){
        $user->attachRole($role);
      }
    }
  }

}
