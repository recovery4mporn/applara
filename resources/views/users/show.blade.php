@extends('layouts/application')

@section('title')
    User Profile
@endsection

@section('page_header')
    View Profile
@endsection

@section('content')
<!-- Main content -->
  <div class="row">
    <div class="col-md-3">

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
                <form enctype="multipart/form-data" method='post' action='/users/{{$user->id}}/update_profile_picture'>
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
          <a href="#myModal" data-toggle="modal" data-target="#myModal"><img class="profile-user-img img-responsive img-circle" src="{{ displayUserProfilePicture($user) }}" alt="User profile picture"></a>
          <h3 class="profile-username text-center">{{$user->name}}</h3>
          <p class="text-muted text-center">{{ $user->church()->get()->first()->name}}</p>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Born on</b> <a class="pull-right">{{ $user->dob->format('M-d-Y') }}</a>
            </li>
            <li class="list-group-item">
              <b>Email</b> <a class="pull-right">{{ $user->email }}</a>
            </li>
            <li class="list-group-item">
              <b>Phone Number</b> <a class="pull-right">{{ $user->phone_number }}</a>
            </li>
            <li class="list-group-item">
              <b>Gender</b> <a class="pull-right">{{ $user->gender }}</a>
            </li>
            <li class="list-group-item">
              <b>Baptism</b> <a class="pull-right">{{ $user->baptism_taken }}</a>
            </li>
            <li class="list-group-item">
              <b>Annointing</b> <a class="pull-right">{{ $user->annointing_taken }}</a>
            </li>
            <li class="list-group-item">
              <b>Marriage status</b> <a class="pull-right">{{ $user->married }}</a>
            </li>
            <li class="list-group-item">
              <b>Joined On</b> <a class="pull-right">{{ $user->joined_on }}</a>
            </li>

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
          <strong><i class="fa fa-book margin-r-5"></i>Job</strong>
          <p class="text-muted">
            {{ $user->job }}
          </p>

          <hr>

          <strong><i class="fa fa-map-marker margin-r-5"></i>Address</strong>
          <p class="text-muted">{{ $user->address }}</p>

          <hr>

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
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#timeline" data-toggle="tab">Activity Timeline</a></li>
          <li><a href="#settings" data-toggle="tab">Edit Profile</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="timeline">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <li class="time-label">
                <span class="bg-red">
                  10 Feb. 2014
                </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                  <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                  <div class="timeline-body">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                    quora plaxo ideeli hulu weebly balihoo...
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-xs">Read more</a>
                    <a class="btn btn-danger btn-xs">Delete</a>
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-user bg-aqua"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
                  <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
                  <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                  <div class="timeline-body">
                    Take me to your leader!
                    Switzerland is small and neutral!
                    We are more like Germany, ambitious and misunderstood!
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline time label -->
              <li class="time-label">
                <span class="bg-green">
                  3 Jan. 2014
                </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-camera bg-purple"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
                  <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                  <div class="timeline-body">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
          </div><!-- /.tab-pane -->

          @include('users/edit_profile')
        </div><!-- /.tab-content -->
      </div><!-- /.nav-tabs-custom -->
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
