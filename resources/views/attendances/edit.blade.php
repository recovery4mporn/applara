@extends('layouts/application')

@section('title')
    Add Members to the Attendance
@endsection

@section('page_header')
    Add Members to the Attendance
@endsection

@section('content')
<!-- Main content -->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Add the Attendance</div>
          <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{displayUpdateAttendanceLink($trequest)}}">
              <input type="hidden" name="_method" value="POST">
              @include('attendances/mark_attendance')
            </form>
          </div>
        </div>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
