@extends('layouts/application')

@section('title')
    Attendances List
@endsection

@section('page_header')
    View Attendances List
@endsection

@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Attendances List</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <table id="table_users" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Date</th>
          <th>Description</th>
          <th>Total Attended</th>
          <th>Total Members Count</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($attendances as $key => $attendance)
          <tr>
            <td>{{ $attendance->id }}</td>
            <td>{{ $attendance->name }}</td>
            <td>{{ $attendance->date }}</td>
            <td>{{ $attendance->description }}</td>
            <td>{{ $attendance->attendance_users()->where("attended","=",1)->count() }}</td>
            <td>{{ $attendance->attendance_users()->count() }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <a class="btn btn-small btn-success" href="{{ URL::to('attendances/' . $attendance->id) }}">Show</a>
                <a class="btn btn-small btn-success" href="{{ URL::to('attendances/' . $attendance->id . '/edit') }}">Edit</a>
            </td>
          </tr>
        @endforeach  
      </tbody>
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
    $('#table_users').DataTable({
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
