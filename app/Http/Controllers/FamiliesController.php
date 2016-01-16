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
            return redirect('/users');
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
