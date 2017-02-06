<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel" style="display:none">
        <div class="pull-left image">
          <img src="{{ asset('/admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group" style="display:none">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>

        @can(VIEWARTICLE)        
        <li class="active">
          <a href="#">
            <i class="fa fa-link"></i> 
            <span>文章管理</span>
          </a>
        </li>
        @endcan
        @can(VIEWUSER)
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>用户管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">          
            <li><a href=" {{ route('users.index') }} ">用户管理</a></li>          
          @can(VIEWROLE)
            <li><a href="{{ route('roles.index') }}">角色管理</a></li>
          @endcan
          @can(VIEWPERMISSION)
            <li><a href="{{ route('permission.index') }}">权限管理</a></li>
          @endcan
          </ul>
        </li>
        @endcan
        @can(VIEWPRODUCT)
        <li class="treeview">
          <a href="#">
            <i class="fa fa-link"></i> 
            <span>产品管理</span>            
          </a>         
        </li>
        @endcan

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>