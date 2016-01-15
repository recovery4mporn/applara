@extends('layouts/application')

@section('title')
    Create User
@endsection

@section('page_header')
    Create User
@endsection

@section('content')
<!-- Main content -->
  <div class="row">
    <div class="col-md-12">
    <form class="form-horizontal" role="form" method="POST" action="/users">
      <input type="hidden" name="_method" value="POST">

      @include('users/user_profile')
    </form>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
