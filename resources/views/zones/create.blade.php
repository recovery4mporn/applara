@extends('layouts/application')

@section('title')
    Create Zone
@endsection

@section('page_header')
    Create Zone
@endsection

@section('content')
<!-- Main content -->
  <div class="row">
    <div class="col-md-12">
    <form class="form-horizontal" role="form" method="POST" action="/zones">
      <input type="hidden" name="_method" value="POST">

      @include('zones/zone_profile')
    </form>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
