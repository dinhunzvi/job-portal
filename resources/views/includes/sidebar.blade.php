<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!--<div class="image">
            <i class="fas fa-user img-circle"></i>
            <img class="img-circle elevation-2" alt="User Image" />
        </div>-->
        <div class="info">
            <a href="#" class="d-block">

                </a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
                <a href="{{ route( 'admin-home' ) }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                    <i class="right"></i>
                </a>
            </li>

            <li class="nav-item has-treeview">

                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Static data
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{ route( 'candidates' ) }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Transporters</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route( 'users') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Drivers</p>
                        </a>
                    </li>

                </ul>

            </li>

            <li class="nav-item has-treeview">

                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Transactions
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Fuel requests</p>
                        </a>
                    </li>

                </ul>

            </li>

            <li class="nav-item has-treeview">

                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                        Setup
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>

                </ul>

            </li>

        </ul>

    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
