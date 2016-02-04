@extends('layouts/application')

@section('title')
    Family Profile
@endsection

@section('page_header')
    View Family Profile
@endsection

@section('content')
<!-- Main content -->
  <div class="row">
    <div class="col-md-12">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <!-- Button trigger modal -->
          <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Launch demo modal
          </button> -->

          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Upload your new profile picture</h4>
                </div>
                <form enctype="multipart/form-data" method='post' action='/families/{{$family->id}}/update_profile_picture'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                  <input id="fileupload" type="file" name="image">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <input type="submit" id="#pic_btn" class="btn btn-primary">
                </div>
                </form>
              </div>
            </div>
          </div>
          <a href="#myModal" data-toggle="modal" data-target="#myModal"><img class="profile-user-img img-responsive img-circle" src="{{displayFamilyProfilePicture($family)}}" alt="User profile picture"></a>
          <h3 class="profile-username text-center">{{$family->name}}</h3>
          <p class="text-muted text-center"></p>

          </ul>
          <ul class="list-group list-group-unbordered">
          @foreach($family->members()->get() as $key => $member)
            <li class="list-group-item">
              <a  href="/users/{{$member->id}}"><b>{{$member->name}}</b></a>
            </li>
          @endforeach
          </ul>
          <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
        </div><!-- /.box-body -->
      </div><!-- /.box -->

      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">About Me</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <strong><i class="fa fa-book margin-r-5"></i>Description</strong>
          <p class="text-muted">
            {{ $family->description }}
          </p>

          <hr>
<!-- 
          <strong><i class="fa fa-map-marker margin-r-5"></i>Address</strong>
          <p class="text-muted"></p>

          <hr> -->

<!--           <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
          <p>
            <span class="label label-danger">UI Design</span>
            <span class="label label-success">Coding</span>
            <span class="label label-info">Javascript</span>
            <span class="label label-warning">PHP</span>
            <span class="label label-primary">Node.js</span>
          </p>

          <hr>

          <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
 -->        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
