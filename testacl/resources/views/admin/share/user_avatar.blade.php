<li class="dropdown user user-menu">
  <!-- Menu Toggle Button -->
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <!-- The user image in the navbar-->
    <img src="{{ asset('/admin-lte/dist/img/user9-160x160.jpg') }}" class="user-image" alt="User Image">
    <!-- hidden-xs hides the username on small devices so only the image appears. -->
    <span class="hidden-xs">{{ Auth::user()->name }}</span>
  </a>
  <ul class="dropdown-menu">
    <!-- The user image in the menu -->
    <li class="user-header">
      <img src="{{ asset('/admin-lte/dist/img/user9-160x160.jpg') }}" class="img-circle" alt="User Image">

      <p>
        {{ Auth::user()->name }}
        <small>注册自:{{ Auth::user()->created_at }}</small>
      </p>
    </li>
    <!-- Menu Body -->
    <li class="user-body" style="display:none;">
      <div class="row">
        <div class="col-xs-4 text-center">
          <a href="#">Followers</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="#">Sales</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="#">Friends</a>
        </div>
      </div>
      <!-- /.row --> 
    </li>
    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-left">
        <a href="#" class="btn btn-default btn-flat">查看</a>
      </div>
      <div class="pull-right">
        <a href="{{ route('logout',Auth::user()->id ) }}" class="btn btn-default btn-flat">退出</a>
      </div>
    </li>
  </ul>
</li>