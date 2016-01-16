<?php namespace App\Http\Controllers;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\Family;
use Validator;
use Session;

class FamiliesController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    //
    $families = Auth::user()->church()->get()->first()->families();
    return view('families.index', ['families' => $families]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    //
    $users = Auth::user()->church()->get()->first()->users()->where("family_id","=",null)->get();
    return view('families.create', ['users' => $users]);
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
        $rules = $this->getRestrictions();
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('/families/create')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $family = new Family;
            $family = $this->assignValues($request, $family);
            $family->save();
            User::whereIn("id", $request->input('members'))->update(["family_id" => $family->id]);
            Session::flash('status', 'Successfully created the Family!');
            return redirect('/families');
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
    //
    $family = Family::find($id);
    if($family){
      return view('families.show', ['family' => $family]);
    }
    else{
      Session::flash('error', 'Sorry there is no Family!');
      return view('families.index');
    }
  }

  public function update_profile_picture(Request $request, $id){
    $family = Family::find($id);
    $file = array('image' => $request->file('image'));
    // setting up rules
    $rules = array('image' => 'required|mimes:jpeg,bmp,png',); //mimes:jpeg,bmp,png and for max size max:10000
    // doing the validation, passing post data, rules and the messages
    $validator = Validator::make($file, $rules);
    if ($validator->fails()) {
    // send back to the page with the input data and errors
      return redirect('families');
    }
    else {
    // checking file is valid.
    if ($request->file('image')->isValid()) {
      $destinationPath = 'uploads/families/'; // upload path
      $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
      $fileName = $family->id .'.'.$extension; // renameing image
      $request->file('image')->move($destinationPath, $fileName); // uploading file to given path
      // sending back with message
      $family->image_url = $destinationPath .'/'. $fileName;
      $family->save();
      Session::flash('status', 'Upload successfully'); 
      return redirect()->action('FamiliesController@show', [$family->id]);
    }
    else {
      // sending back with error message.
      Session::flash('error', 'uploaded file is not valid');
      return redirect()->action('FamiliesController@show', [$family->id]);
    }
    }   
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
  public function update($id)
  {
    //
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
    $family = Family::find($id);
    if($family){
      User::where("family_id", "=", $id)->update(["family_id" => null]);
      Family::destroy($id);
      Session::flash('status', 'The user has been deleted!'); 
    }
    return redirect('families');
  }

    public function getRestrictions()
  {
    return array(
      'name' => 'required|max:255',
      'members' => 'required'
      );
  }

  public function assignValues($request, $family){
    $family->name = $request->input('name');
    return $family;
  }

}
