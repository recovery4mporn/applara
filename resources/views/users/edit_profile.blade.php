<div class="tab-pane" id="settings">
  <form class="form-horizontal" role="form" method="POST" action="/users/update">
  <input type="hidden" name="_method" value="PUT">
  <input type="hidden" name="id" value="{{$user->id}}">
  @include('users/user_profile')
  </form>
</div><!-- /.tab-pane -->