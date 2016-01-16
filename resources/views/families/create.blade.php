@extends('layouts/application')

@section('title')
    Create Family
@endsection

@section('page_header')
    Create Family
@endsection

@section('content')
<!-- Main content -->
  <div class="row">
    <div class="col-md-12">
    <form class="form-horizontal" role="form" method="POST" action="/families">
      <input type="hidden" name="_method" value="POST">
      @include('families/family_create_or_edit')
    </form>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
