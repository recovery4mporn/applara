      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ displayUserProfilePicture(Auth::user()) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ displayUserName() }}</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          @if (Auth::user())
            <ul class="sidebar-menu">
              <li class="header">Attendance Application</li>
              <!-- Optionally, you can add icons to the links -->
              <li class="active"><a href="/home"><i class="fa fa-link"></i> <span>Home</span></a></li>
              <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
              <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>User</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="/users/create">Create User</a></li>
                  <li><a href="/users"> Users Index</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Families</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  @if (Auth::user()->family_id)
                    <li><a href="/families/{{Auth::user()->family_id}}">My Family</a></li>
                  @endif
                  <li><a href="/families/create">Create Family</a></li>
                  <li><a href="/families"> Families Index</a></li>
                </ul>
              </li>

            </ul><!-- /.sidebar-menu -->
          @endif 
          
        </section>
        <!-- /.sidebar -->
      </aside>
