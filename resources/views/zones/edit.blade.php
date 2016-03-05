@extends('layouts/application')

@section('title')
    Edit Zone
@endsection

@section('page_header')
    Edit Zone
@endsection

@section('content')
<!-- Main content -->
  <div class="row">
    <div class="col-md-12">
    <form class="form-horizontal" role="form" method="POST" action="/zones/update">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="id" value="{{$zone->id}}">

      @include('zones/zone_profile')
    </form>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
