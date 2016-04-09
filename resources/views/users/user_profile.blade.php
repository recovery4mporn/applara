<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
  <label for="inputName" class="col-sm-2 control-label">Name</label>
  <div class="col-sm-10">
    <input type="text" name="name" value="{{isset($user) ? $user->name : Request::old('name')}}" class="form-control" id="inputName" placeholder="Name">
  </div>
</div>

<div class="form-group">
  <label for="inputEmail" class="col-sm-2 control-label">Email</label>
  <div class="col-sm-10">
    <input type="email" name="email" class="form-control"  value="{{isset($user) ? $user->email : Request::old('email')}}" id="inputEmail" placeholder="Email">
  </div>
</div>

<div class="form-group">
  <label for="inputPhoneNumber" class="col-sm-2 control-label">Phone Number</label>
  <div class="col-sm-10">
    <input class="form-control" name="phone_number"  value="{{isset($user) ? $user->phone_number : Request::old('phone_number')}}" id="inputPhoneNumber" placeholder="Phone Number">
  </div>
</div>

<div class="form-group">
  <label for="inputDob" class="col-sm-2 control-label">Date of Birth</label>
  <div class="col-sm-10">
    <input type="date" class="form-control" name="dob" id="inputDob"  value="{{isset($user) ? $user->dob : Request::old('dob')}}" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label" name="gender">Gender</label>
    <div class="col-sm-10">
      <input type="radio" value="male" {{isset($user) ? ($user->gender == "male" ? 'checked' : '') : Request::old('gender') == 'male' ? 'checked' : ''}} class="" name="gender" id="gender1" > Male
      <input type="radio" value="female" {{isset($user) ? ($user->gender == "female" ? 'checked' : '') : Request::old('gender') == 'female' ? 'checked' : ''}} class="" name="gender" id="gender2" > Female
  </div>
</div>

<div class="form-group">
  <label for="joined_on" class="col-sm-2 control-label">Joined On</label>
  <div class="col-sm-10">
    <input type="date" class="form-control" name="joined_on" value="{{isset($user) ? $user->joined_on : Request::old('joined_on')}}" id="inputJoinedon" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
  </div>
</div>

<div class="form-group">
  <label for="job" class="col-sm-2 control-label">Job</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="job" value="{{isset($user) ? $user->job : Request::old('job')}}" id="inputJob" placeholder="Job">
  </div>
</div>

<div class="form-group">
  <label for="address" class="col-sm-2 control-label">Address</label>
  <div class="col-sm-10">
    <input class="form-control" name="address" id="inputAddress" value="{{isset($user) ? $user->address : Request::old('address')}}" placeholder="Address"></input>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label" for="married">Married</label>
    <div class="col-sm-10">
      <input type="radio" value="1" class="" {{isset($user) ? ($user->married == 'Married' ? 'checked' : '') : Request::old('married') == '1' ? 'checked' : ''}} name="married" id="married1" > Yes 
      <input type="radio" value="0" class="" {{isset($user) ? ($user->married == 'Single' ? 'checked' : '') : Request::old('married') == '0' ? 'checked' : ''}} name="married" id="married2" > No
  </div>
</div>

<div class="form-group">
  <label for="inputweddingDate" class="col-sm-2 control-label">Wedding Date</label>
  <div class="col-sm-10">
    <input type="date" class="form-control" name="weddingDate" id="inputweddingDate"  value="{{isset($user) ? $user->weddingDate : Request::old('weddingDate')}}" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
  </div>
</div>


<div class="form-group">
  <label class="col-sm-2 control-label" name="baptism_taken">Baptism</label>
    <div class="col-sm-10">
      <input type="radio" value="1" class="" {{isset($user) ? ($user->baptism_taken == 'Taken' ? 'checked' : '') : Request::old('baptism_taken') == '1' ? 'checked' : ''}} name="baptism_taken" id="baptism1" > Taken 
      <input type="radio" value="0" class="" {{isset($user) ? ($user->baptism_taken == 'Not yet taken' ? 'checked' : '') : Request::old('baptism_taken') == '0' ? 'checked' : ''}} name="baptism_taken" id="baptism2" > Not Taken
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label" name="annointing_taken">Annointing</label>
    <div class="col-sm-10">
      <input type="radio" value="1" class="" {{isset($user) ? ($user->annointing_taken == 'Received' ? 'checked' : '') : Request::old('annointing_taken') == '1' ? 'checked' : ''}} name="annointing_taken"  id="annointing1" > Received 
      <input type="radio" value="0" class="" {{isset($user) ? ($user->annointing_taken == 'Not yet received' ? 'checked' : '') : Request::old('annointing_taken') == '0' ? 'checked' : ''}} name="annointing_taken" id="annointing2" > Not Yet Received
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label" name="member_type">Member Type</label>
    <div class="col-sm-10">
      <input type="radio" value="0" {{isset($user) ? ($user->member_type == 0 ? 'checked' : '') : Request::old('member_type') == '0' ? 'checked' : ''}} class="" name="member_type" id="member_type_1" > Member 
      <input type="radio" value="1" {{isset($user) ? ($user->member_type == 1 ? 'checked' : '') : Request::old('member_type') == '1' ? 'checked' : ''}} class="" name="member_type" id="member_type_2" > New Member
      <input type="radio" value="2" {{isset($user) ? ($user->member_type == 2 ? 'checked' : '') : Request::old('member_type') == '2' ? 'checked' : ''}} class="" name="member_type" id="member_type_3" > Not a Member
  </div>
</div>

<div class="form-group">
  <label for="description" class="col-sm-2 control-label">Zones</label>
  <div class="col-sm-10">
    <select name="zone" class="form-control select-2">
      @foreach(Auth::user()->church()->get()->first()->zones()->get() as $key => $value)
        <option value="{{$value->id}}" {{isset($user) && $user->zone_id==$value->id ? 'selected' : ''}} >{{$value->name}}</option>
      @endforeach  
    </select>

  </div>
</div>


<div class="form-group">
  <label class="col-sm-2 control-label" name="roles">Roles</label>
    <div class="col-sm-10">
      @foreach(Bican\Roles\Models\Role::all() as $role)
        <input type="checkbox" value="{{$role['slug']}}" {{isset($user) ? ($user->is($role['slug']) ? 'checked' : '') : '' }}  class="" name="roles[]">{{$role['name']}}
      @endforeach
  </div>
</div>



<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-danger">Submit</button>
  </div>
</div>

<script type="text/javascript">$(".select-2"  ).select2();</script>