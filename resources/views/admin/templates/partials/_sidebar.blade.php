<aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ request()->is('admin/home') ? 'active' : '' }}"><a href="{{Route('admin.index.home')}}"><i class="fa fa-home"></i> <span>Home</span></a></li>
        {{-- <li class="{{ request()->is('admin/guru') ? 'active' : '' }} treeview {{ request()->is('admin/murid') ? 'active' : '' }} treeview {{ request()->is('admin/school') ? 'active' : '' }} treeview  {{ request()->is('admin/guest') ? 'active' : '' }} treeview {{ request()->is('admin/categories') ? 'active' : '' }} treeview"  > --}}
          {{-- <a href="#">
            <i class=" fa fa-book"></i> <span>Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a> --}}
          {{-- <ul class="treeview-menu"> --}}
            {{-- <li class="{{ request()->is('admin/guru') ? 'active' : '' }}"><a href="{{ route('user.guru') }}"><i class="fa fa-chevron-right"></i> Data Guru</a></li> --}}
            {{-- <li class="{{ request()->is('admin/murid') ? 'active' : '' }}"><a href="{{ route('user.murid') }}"><i class="fa fa-chevron-right"></i> Data Murid </a></li> --}}
            {{-- <li class="{{ request()->is('admin/guest') ? 'active' : '' }}"><a href="{{ route('user.guest') }}"><i class="fa fa-chevron-right"></i> Data Responder </a></li> --}}
            {{-- <li class="{{ request()->is('admin/school') ? 'active' : '' }}"><a href="{{ route('school.index') }}"><i class="fa fa-chevron-right"></i> Data Sekolah </a></li> --}}
            {{-- <li class="{{ request()->is('admin/categories') ? 'active' : '' }}"><a href="{{ route('category.index') }}"><i class="fa fa-chevron-right"></i> Data Kategori </a></li> --}}
          {{-- </ul> --}}

        {{-- </li> --}}

        {{-- <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li> --}}

        <li class="{{ request()->is('admin/customer') ? 'active' : '' }}"><a href="{{ route('admin.index.customer') }}"><i class="fa fa-user"></i> <span>Customer</span></a></li>
        <li class="{{ request()->is('admin/plan') ? 'active' : '' }}"><a href="{{ route('admin.index.plan') }}"><i class="ion ion-ios-pricetag-outline"></i> <span>Plan</span></a></li>
        <li class="{{ request()->is('admin/transaction') ? 'active' : '' }}"><a href="{{ route('admin.index.transaction') }}"><i class="ion ion-ios-cart-outline"></i> <span>Transaction</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
