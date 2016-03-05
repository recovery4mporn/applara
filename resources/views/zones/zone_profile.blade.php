<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
  <label for="inputName" class="col-sm-2 control-label">Name</label>
  <div class="col-sm-10">
    <input type="text" name="name" value="{{isset($zone) ? $zone->name : Request::old('name')}}" class="form-control" id="inputName" placeholder="Name">
  </div>
</div>

<div class="form-group">
  <label for="inputDescription" class="col-sm-2 control-label">Description</label>
  <div class="col-sm-10">
    <input type="text" name="description" class="form-control"  value="{{isset($zone) ? $zone->description : Request::old('email')}}" id="inputEmail" placeholder="Description">
  </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-danger">Submit</button>
  </div>
</div>
