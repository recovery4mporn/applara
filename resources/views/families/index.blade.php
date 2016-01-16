@extends('layouts/application')

@section('title')
    Families List
@endsection

@section('page_header')
    View Families List
@endsection

@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Users List</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <table id="table_users" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($families as $key => $value)
          <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <a class="btn btn-small btn-success" href="{{ URL::to('families/' . $value->id) }}">Show User</a>
                <a class="btn btn-small btn-danger" href="{{ URL::to('families/' . $value->id ) }}" data-method="delete" data-confirm="Are you sure ?"  data-token="{{csrf_token()}}">Delete User</a>
            </td>
          </tr>
        @endforeach  
      </tbody>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>DOB</th>
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
