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
  <label class="">
    <div aria-disabled="false" aria-checked="false" style="position: relative;" class="iradio_minimal-blue"><input style="position: absolute; opacity: 0;" name="r1" class="minimal" type="radio"><ins style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;" class="iCheck-helper"></ins></div>
  </label>
</div>
<!-- <div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <div class="checkbox">
      <label>
        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
      </label>
    </div>
  </div>
</div> -->

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-danger">Submit</button>
  </div>
</div>
