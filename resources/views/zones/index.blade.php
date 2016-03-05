@extends('layouts/application')

@section('title')
    Zones List
@endsection

@section('page_header')
    View Zones List
@endsection

@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Zones List</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <table id="table_zones" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($zones as $key => $value)
          <tr>
            <td>{{ $value->name }}</td>
            <td>{{ $value->description }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <a class="btn btn-small btn-success" href="{{ URL::to('zones/' . $value->id . '/edit') }}">Edit Zone</a>
            </td>
          </tr>
        @endforeach  
      </tbody>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
    </table>
  </div><!-- /.box-body -->
</div><!-- /.box -->
<script src="{{ URL::asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ URL::asset('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('adminlte/plugins/fastclick/fastclick.min.js') }}"></script>
<script>
  $(function () {
    $('#table_zones').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection
