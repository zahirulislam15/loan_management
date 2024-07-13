<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link">
    <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <span class="brand-text font-weight-light">{{Auth()->user()->project_name}}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('cashbook')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Todays Track
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('member.list')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Account
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Official
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('staff.list')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Staff List</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('fees.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Fees</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('outgoing.transection')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Expense Transection</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              FDR
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('fdr.list.all')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All FDR</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('fdr.list')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Closed FDR</p>
              </a>
            </li>
          </ul>

        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              DPS
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('dps.list.all')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Running Dps</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('dps.list')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Matured DPS</p>
              </a>
            </li>
          </ul>
        </li> -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Loan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('loan.list')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Running Loan</p>
              </a>
            </li>
          </ul>
          <!-- <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('closed.loan.list')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Matured DPS</p>
              </a>
            </li>
          </ul> -->
        </li>
        <li class="nav-item">
          <a href="{{route('transection.history')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Transection History
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>