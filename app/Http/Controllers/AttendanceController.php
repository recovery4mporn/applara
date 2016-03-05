<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Attendance;
use App\AttendanceUser;
use Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
class AttendanceController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
      return view('attendances.index',['attendances' => Auth::user()->church()->first()->attendances()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('attendances.create');
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
            return redirect('/attendances/create')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $attendance = new Attendance;
            $attendance = $this->assignValues($request, $attendance);
            $attendance->save();
            Session::flash('status', 'Successfully created the Attendance Event Pls mark the attendance!');
            return redirect()->action('AttendanceController@edit', ['trequest' => $attendance->id]);
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
      $attendance = Auth::user()->church()->first()->attendances()->where("id","=", $id)->first();
      $zones = Auth::user()->church()->first()->zones()->get();
      return view('attendances.show',['attendance' => $attendance, 'zones' => $zones]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
      if(Auth::user()->church()->first()->attendances()->where("id","=", $id)){
        $attended_user_ids = Auth::user()->church()->first()->attendances()->where("id","=", $id)->first()->attendance_users()->where('attended','=',1)->lists('user_id');
      }
      
      return view('attendances/edit', ['trequest' => $id, 'attended_user_ids' => $attended_user_ids]);
        //
    }

    public function mark_attendance(Request $request, $id)
    {
      $user_ids = Auth::user()->church->first()->users()->lists('id');
      $attendants = $request->input('attendants');
      if(Auth::user()->church()->first()->attendances()->where("id","=", $id)){
        Auth::user()->church()->first()->attendances()->where("id","=", $id)->first()->attendance_users()->delete();
      }
      foreach ($user_ids as $user_id) {
        if(in_array($user_id, $attendants)){
          $this->assignAttendanceForUser(1, $id, $user_id);
          // echo "Added Attended ". $user_id;
        }
        else{
          $this->assignAttendanceForUser(0, $id, $user_id);
          // echo "Added Not Attended ". $user_id;
        }
      }
      Session::flash('status', 'Successfully marked the attendance!');
      return view('attendances/edit', ['trequest' => $id, 'attended_user_ids' => $attendants]);      
      // print_r(array_values($attendants));
      // print_r(array_values($user_ids));
      // return('attendances/'.$id.'/edit');
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
        'date' => 'required'
        );
    }

    public function assignValues($request, $attendance){
      $attendance->name = $request->input('name');
      $attendance->description = $request->input('description');
      $attendance->date = $request->input('date');
      $attendance->church_id = Auth::user()->church_id;
      return $attendance;
    }
    public function assignAttendanceForUser($attended, $id, $user_id){
      $attendance_user = new AttendanceUser;
      $attendance_user->attendance_id = $id;
      $attendance_user->user_id = $user_id;
      $attendance_user->attended = $attended;
      $attendance_user->save();
      return $attendance_user;
    }
}
