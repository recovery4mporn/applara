<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Auth;
use App\Zone;
class ZoneController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    //
    $zones = Auth::user()->church()->get()->first()->zones()->get();
    return view('zones.index', ['zones' => $zones]);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    //
    return view('zones.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    //
    $rules = $this->getRestrictions();
    $validator = Validator::make($request->all(), $rules);

    // process the login
    if ($validator->fails()) {
        return Redirect::to('zones/create')
            ->withErrors($validator)
            ->withInput($request->all());
    } else {
        // store
        Zone::destroy(8);
        Zone::destroy(9);
        Zone::destroy(10);
        Zone::destroy(11);
        $zone = new Zone;

        $church = Auth::user()->church()->get()->first();

        $zone = $this->assignValues($request, $zone, $church->id);
        $zone->save();
        // redirect
        Session::flash('status', 'Successfully created zone!');
        return Redirect::to('zones');
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
    $zone = Auth::user()->church()->get()->first()->zones()->find($id);
    return view('zones.edit',['zone' => $zone]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $rules = $this->getRestrictions();
    $validator = Validator::make($request->all(), $rules);

    // process the login
    if ($validator->fails()) {
        return Redirect::to('zones')
            ->withErrors($validator)
            ->withInput($request->all());
    } else {
        // update
        $church = Auth::user()->church()->get()->first();

        $zone = $church->zones()->get()->find($request->input('id'));
        $zone = $this->assignValues($request, $zone, $church->id);  
        $zone->save();
        // // redirect
        Session::flash('status', 'Successfully updated zone!');
        return Redirect::to('zones');
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
  }
  public function getRestrictions()
  {
  return array(
    'name' => 'required|max:255'
    );
  }

  public function assignValues($request, $zone, $church_id){
    $zone->name = $request->input('name');
    $zone->description = $request->input('description');
    $zone->church_id = $church_id;
    return $zone;
  }

}
