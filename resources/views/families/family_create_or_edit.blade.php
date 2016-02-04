<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
  <label for="inputName" class="col-sm-2 control-label">Name</label>
  <div class="col-sm-10">
    <input type="text" name="name" class="form-control" id="inputName"  value="{{ old('name') }}" placeholder="Name">
  </div>
</div>

<div class="form-group">
  <label for="description" class="col-sm-2 control-label">Description</label>
  <div class="col-sm-10">
    <textarea class="form-control" name="description" id="inputAddress"  value="{{ old('description') }}" placeholder="A small description about your family"></textarea>
  </div>
</div>


<div class="form-group">
  <label for="description" class="col-sm-2 control-label">Members</label>
  <div class="col-sm-10">
    <select name="members[]" class="form-control select-2" multiple="multiple">
      @foreach($users as $key => $value)
        <option value="{{$value->id}}">{{$value->name}}</option>
      @endforeach  
    </select>

  </div>
</div>

<script type="text/javascript">$(".select-2"  ).select2();</script>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-danger">Submit</button>
  </div>
</div>

