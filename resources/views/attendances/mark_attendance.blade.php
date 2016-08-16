<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
  <label for="date" class="col-sm-2 control-label">Members who were present</label>
  <div class="col-sm-12">
    
    <table id="table_users" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Address</th>
        </tr>
      </thead>
      <tbody>
        @foreach(Auth::user()->church()->first()->users()->get() as $key => $value)
          <tr>
            <td>
              @if (in_array($value->id, $attended_user_ids))
                <input type="checkbox" name="attendants[]"  value="{{ $value->id }}" checked="checked">{{ $value->name }}
              @else
                <input type="checkbox" name="attendants[]"  value="{{ $value->id }}">{{ $value->name }}
              @endif
            </td>
            <td>
              {{ $value->address }}
            </td>
          </tr>
        @endforeach  
      </tbody>
    </table>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-danger">Submit</button>
  </div>
</div>

<script src="{{ URL::asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ URL::asset('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('adminlte/plugins/fastclick/fastclick.min.js') }}"></script>
<script>
  $(function () {
    $('#table_users').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": false
    });
  });
</script>
