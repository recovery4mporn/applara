@extends('layouts/application')

@section('title')
    Attendance Stats
@endsection

@section('page_header')
    View Statistics of Attendance
@endsection

@section('content')
<!-- Main content -->
  <div class="row">
    <div class="col-md-6">
      <!-- DONUT CHART -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Attendants Chart - Members</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <canvas id="pieChart" style="height:250px"></canvas>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
    <div class="col-md-6">
      <!-- DONUT CHART -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Littles Chart - Members</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <canvas id="pieChartKids" style="height:250px"></canvas>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
    <div class="col-md-6">
      <!-- DONUT CHART -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Teens Chart - Members</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <canvas id="pieChartTeens" style="height:250px"></canvas>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
    <div class="col-md-6">
      <!-- DONUT CHART -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Adults Chart - Members</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <canvas id="pieChartAdults" style="height:250px"></canvas>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
    @foreach($zones as $zone)
      <div class="col-md-6">
        <!-- DONUT CHART -->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">{{$zone->name}} Chart</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
              <canvas id={{"zone_".$zone->id}} style="height:250px"></canvas>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
      
    @endforeach
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body box-profile">
          <h3 class="profile-username text-center">{{$attendance->name}}</h3>
          <p class="text-muted text-center">{{$attendance->date}}</p>
          <p class="text-muted text-center">Attended Members</p>

          <ul class="list-group list-group-unbordered">
          @foreach(App\User::whereIn("id", $attendance->attendance_users()->where("attended", "=", 1)->get()->lists("user_id"))->whereIn("member_type",[0])->get() as $key => $user)
            <li class="list-group-item">
              <a  href="/users/{{$user->user_id}}"><b>{{$user->name}}</b></a><a class="pull-right">{{ $user->phone_number }}</a>
            </li>
          @endforeach
          </ul>

          <p class="text-muted text-center">Absent Members</p>
          <ul class="list-group list-group-unbordered">
          @foreach(App\User::whereIn("id", $attendance->attendance_users()->where("attended", "=", 0)->get()->lists("user_id"))->whereIn("member_type",[0])->get() as $key => $user)
            <li class="list-group-item">
              <a  href="/users/{{$user->user_id}}"><b>{{$user->name}}</b></a><a class="pull-right">{{ $user->phone_number }}</a>
            </li>
          @endforeach
          </ul>

          <p class="text-muted text-center">Attended New Comers</p>

          <ul class="list-group list-group-unbordered">
          @foreach(App\User::whereIn("id", $attendance->attendance_users()->where("attended", "=", 1)->get()->lists("user_id"))->whereIn("member_type",[1])->get() as $key => $user)
            <li class="list-group-item">
              <a  href="/users/{{$user->user_id}}"><b>{{$user->name}}</b></a><a class="pull-right">{{ $user->phone_number }}</a>
            </li>
          @endforeach
          </ul>

          <p class="text-muted text-center">Absent New Comers</p>
          <ul class="list-group list-group-unbordered">
          @foreach(App\User::whereIn("id", $attendance->attendance_users()->where("attended", "=", 1)->get()->lists("user_id"))->whereIn("member_type",[1])->get() as $key => $user)
            <li class="list-group-item">
              <a  href="/users/{{$user->user_id}}"><b>{{$user->name}}</b></a><a class="pull-right">{{ $user->phone_number }}</a>
            </li>
          @endforeach
          </ul>

          <p class="text-muted text-center">Attended Non Members</p>

          <ul class="list-group list-group-unbordered">
          @foreach(App\User::whereIn("id", $attendance->attendance_users()->where("attended", "=", 1)->get()->lists("user_id"))->whereIn("member_type",[2])->get() as $key => $user)
            <li class="list-group-item">
              <a  href="/users/{{$user->user_id}}"><b>{{$user->name}}</b></a><a class="pull-right">{{ $user->phone_number }}</a>
            </li>
          @endforeach
          </ul>


          <!-- @foreach($zones as $zone)
            <p class="text-muted text-center">{{$zone->name}} Attended Members and New Comers</p>

            <ul class="list-group list-group-unbordered">
          
            @foreach(App\User::whereIn("id", $attendance->attendance_users()->where("attended", "=", 1)->get()->lists("user_id"))->where("zone_id","=", $zone->id)->whereIn("member_type",[0,1])->get() as $key => $user)        
              <li class="list-group-item">
                <a  href="/users/{{$user->id}}"><b>{{$user->name}}</b></a><a class="pull-right">{{ $user->phone_number }}</a>
              </li>
            @endforeach
            </ul>
            <p class="text-muted text-center">{{$zone->name}} Absent Members and New Comers</p>

            <ul class="list-group list-group-unbordered">
          
            @foreach(App\User::whereIn("id", $attendance->attendance_users()->where("attended", "=", 0)->get()->lists("user_id"))->where("zone_id","=", $zone->id)->whereIn("member_type",[0,1])->get() as $key => $user)        
              <li class="list-group-item">
                <a  href="/users/{{$user->id}}"><b>{{$user->name}}</b></a><a class="pull-right">{{ $user->phone_number }}</a>
              </li>
            @endforeach
            </ul>
          @endforeach -->
          <!--  -->
          <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
        </div><!-- /.box-body -->
      </div><!-- /.box -->
      @foreach($zones as $zone)
        <div class="box box-primary">
          <div class="box-body box-profile">
            <h3 class="profile-username text-center">{{$zone->name}}</h3>
            <p class="text-muted text-center">{{$zone->name}} Attended Members and New Comers</p>

            <ul class="list-group list-group-unbordered">
          
            @foreach(App\User::whereIn("id", $attendance->attendance_users()->where("attended", "=", 1)->get()->lists("user_id"))->where("zone_id","=", $zone->id)->whereIn("member_type",[0,1])->get() as $key => $user)        
              <li class="list-group-item">
                <a  href="/users/{{$user->id}}"><b>{{$user->name}}</b></a><a class="pull-right">{{ $user->phone_number }}</a>
              </li>
            @endforeach
            </ul>
            <p class="text-muted text-center">{{$zone->name}} Absent Members and New Comers</p>

            <ul class="list-group list-group-unbordered">
          
            @foreach(App\User::whereIn("id", $attendance->attendance_users()->where("attended", "=", 0)->get()->lists("user_id"))->where("zone_id","=", $zone->id)->whereIn("member_type",[0,1])->get() as $key => $user)        
              <li class="list-group-item">
                <a  href="/users/{{$user->id}}"><b>{{$user->name}}</b></a><a class="pull-right">{{ $user->phone_number }}</a>
              </li>
            @endforeach
            </ul>
          </div>
        </div>
      @endforeach
      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">About Attendance</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <strong><i class="fa fa-book margin-r-5"></i>Description</strong>
          <p class="text-muted">
            {{ $attendance->description }}
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
<script src="{{ URL::asset('adminlte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script src="{{ URL::asset('adminlte/plugins/chartjs/Chart.min.js') }}"></script>
<script>
$(function() {
  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = [
    {
      value: {{App\User::whereIn("id", $attendance->attendance_users()->where("attended", "=", 0)->lists("user_id"))->whereIn("member_type", [0])->count()}},
      color: "#f56954",
      highlight: "#f56954",
      label: "Absent Members"
    },
    {
      value: {{App\User::whereIn("id", $attendance->attendance_users()->where("attended", "=", 1)->lists("user_id"))->whereIn("member_type", [0])->count()}},
      color: "#00a65a",
      highlight: "#00a65a",
      label: "Attended Members"
    }
  ];
  

  var PieKidsData = [
    {
      value: {{App\User::whereIn('id',$attendance->attendance_users()->where('attended',"=",1)->lists('user_id'))->where('dob','>', Carbon\Carbon::now()->subYears(10))->whereIn("member_type", [0])->count()}},
      color: "#f39c12",
      highlight: "#f39c12",
      label: "Attended Kids"
    },
    {
      value: {{App\User::whereIn('id',$attendance->attendance_users()->where('attended',"=",0)->lists('user_id'))->where('dob','>', Carbon\Carbon::now()->subYears(10))->whereIn("member_type", [0])->count()}},
      color: "#00c0ef",
      highlight: "#00c0ef",
      label: "Absent Kids"
    }
  ];
  var PieAdultsData = [
    {
      value: {{App\User::whereIn('id',$attendance->attendance_users()->where('attended',"=",1)->lists('user_id'))->where('dob','<', Carbon\Carbon::now()->subYears(24))->whereIn("member_type", [0])->count()
}},
      color: "#f39c12",
      highlight: "#f39c12",
      label: "Attended Adults"
    },
    {
      value: {{App\User::whereIn('id',$attendance->attendance_users()->where('attended',"=",0)->lists('user_id'))->where('dob','<', Carbon\Carbon::now()->subYears(24))->whereIn("member_type", [0])->count()
}},
      color: "#00c0ef",
      highlight: "#00c0ef",
      label: "Absent Adults"
    }
  ];
  var PieTeensData = [
    {
      value: {{App\User::whereIn('id',$attendance->attendance_users()->where('attended',"=",1)->lists('user_id'))->where('dob','>', Carbon\Carbon::now()->subYears(24))->where('dob','<', Carbon\Carbon::now()->subYears(10))->whereIn("member_type", [0])->count()
}},
      color: "#3c8dbc",
      highlight: "#3c8dbc",
      label: "Attended Teens"
    },
    {
      value: {{App\User::whereIn('id',$attendance->attendance_users()->where('attended',"=",0)->lists('user_id'))->where('dob','>', Carbon\Carbon::now()->subYears(24))->where('dob','<', Carbon\Carbon::now()->subYears(10))->whereIn("member_type", [0])->count()
}},
      color: "#d2d6de",
      highlight: "#d2d6de",
      label: "Absent Teens"
    }
  ];
  var pieOptions = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke: true,
    //String - The colour of each segment stroke
    segmentStrokeColor: "#fff",
    //Number - The width of each segment stroke
    segmentStrokeWidth: 2,
    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    //Number - Amount of animation steps
    animationSteps: 100,
    //String - Animation easing effect
    animationEasing: "easeOutBounce",
    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate: true,
    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale: false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
  };
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);
  var pieChartKidsCanvas = $("#pieChartKids").get(0).getContext("2d");
  var pieChartKids = new Chart(pieChartKidsCanvas);
  pieChartKids.Doughnut(PieKidsData,pieOptions);

  var pieChartTeensCanvas = $("#pieChartTeens").get(0).getContext("2d");
  var pieChartTeens = new Chart(pieChartTeensCanvas);
  pieChartTeens.Doughnut(PieTeensData,pieOptions);

  var pieChartAdultsCanvas = $("#pieChartAdults").get(0).getContext("2d");
  var pieChartAdults = new Chart(pieChartAdultsCanvas);
  pieChartAdults.Doughnut(PieAdultsData,pieOptions);
});


</script>

@foreach($zones as $zone)

<script>
  $(function() {
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('{{"#" . "zone_" . $zone->id}}').get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: {{App\User::whereIn("id",  $attendance->attendance_users()->where("attended", "=", 0)->lists("user_id"))->where("zone_id", "=", $zone->id)->count()}},
        color: "#f56954",
        highlight: "#f56954",
        label: "Absent Members"
      },
      {
        value: {{App\User::whereIn("id",  $attendance->attendance_users()->where("attended", "=", 1)->lists("user_id"))->where("zone_id", "=", $zone->id)->count()}},
        color: "#00a65a",
        highlight: "#00a65a",
        label: "Attended Members"
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    pieChart.Doughnut(PieData, pieOptions);
  });
</script>
@endforeach