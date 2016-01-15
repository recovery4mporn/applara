<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
  <label for="inputName" class="col-sm-2 control-label">Name</label>
  <div class="col-sm-10">
    <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
  </div>
</div>

<div class="form-group">
  <label for="inputEmail" class="col-sm-2 control-label">Email</label>
  <div class="col-sm-10">
    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
  </div>
</div>

<div class="form-group">
  <label for="inputPhoneNumber" class="col-sm-2 control-label">Phone Number</label>
  <div class="col-sm-10">
    <input class="form-control" name="phone_number" id="inputPhoneNumber" placeholder="Phone Number">
  </div>
</div>

<div class="form-group">
  <label for="inputDob" class="col-sm-2 control-label">Date of Birth</label>
  <div class="col-sm-10">
    <input type="date" class="form-control" name="dob" id="inputDob" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label" name="gender">Gender</label>
    <div class="col-sm-10">
      <input type="radio" value="male" class="" name="gender" id="gender1" > Male
      <input type="radio" value="female" class="" name="gender" id="gender2" > Female
  </div>
</div>

<div class="form-group">
  <label for="joined_on" class="col-sm-2 control-label">Joined On</label>
  <div class="col-sm-10">
    <input type="date" class="form-control" name="joined_on" id="inputJoinedon" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
  </div>
</div>

<div class="form-group">
  <label for="job" class="col-sm-2 control-label">Job</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="job" id="inputJob" placeholder="Job">
  </div>
</div>

<div class="form-group">
  <label for="address" class="col-sm-2 control-label">Address</label>
  <div class="col-sm-10">
    <textarea class="form-control" name="address" id="inputAddress" placeholder="Address"></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label" for="married">Married</label>
    <div class="col-sm-10">
      <input type="radio" value="1" class="" name="married" id="married1" > Yes 
      <input type="radio" value="0" class="" name="married" id="married2" > No
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label" name="baptism_taken">Baptism</label>
    <div class="col-sm-10">
      <input type="radio" value="1" class="" name="baptism_taken" id="baptism1" > Taken 
      <input type="radio" value="0" class="" name="baptism_taken" id="baptism2" > Not Taken
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label" name="annointing_taken">Annointing</label>
    <div class="col-sm-10">
      <input type="radio" value="1" class="" name="annointing_taken" id="annointing1" > Received 
      <input type="radio" value="0" class="" name="annointing_taken" id="annointing2" > Not Yet Received
  </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-danger">Submit</button>
  </div>
</div>
