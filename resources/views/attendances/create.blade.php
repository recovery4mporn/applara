@extends('layouts/application')

@section('title')
    Create Attendance
@endsection

@section('page_header')
    Create Attendance
@endsection

@section('content')
<!-- Main content -->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Create Attendance</div>
          <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="/attendances">
              <input type="hidden" name="_method" value="POST">
              @include('attendances/attendance_create_or_edit')
            </form>
          </div>
        </div>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
