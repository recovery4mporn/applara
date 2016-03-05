@foreach($zones as $zone)
  <p class="text-muted text-center">Attended Members In {{$zone->name}}</p>
  <ul class="list-group list-group-unbordered">
  @foreach({{App\User::whereIn("id",  $attendance->attendance_users()->where("attended", "=", 1)->lists("user_id"))->where("zone_id", "=", $zone->id)->get()}} as $user)
    <li class="list-group-item">
      <a  href="/users/{{$user->id}}"><b>{{$user->name}}</b></a><a class="pull-right">{{ $user->phone_number }}</a>
    </li>
  @endforeach
  </ul>

  <p class="text-muted text-center">Absent Members In {{$zone->name}}</p>
  <ul class="list-group list-group-unbordered">
  @foreach({{App\User::whereIn("id",  $attendance->attendance_users()->where("attended", "=", 0)->lists("user_id"))->where("zone_id", "=", $zone->id)->get()}} as $user)
    <li class="list-group-item">
      <a  href="/users/{{$user->id}}"><b>{{$user->name}}</b></a><a class="pull-right">{{ $user->phone_number }}</a>
    </li>
  @endforeach
  </ul>
@endforeach