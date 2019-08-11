<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="<?= $config['admin_url'] ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Ger</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> GER</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="logout.php">
              <span class="hidden-xs">Logout</span>
            </a>
            
          </li>         
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <aside class="main-sidebar">
    <section class="sidebar">    
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="<?=  $config['admin_url'] ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </span>
          </a>
        </li>
        <li>
          <a href="roaster.php">
            <i class="fa fa-calendar"></i>
            <span>Roaster</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Customers</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            <ul class="treeview-menu">
            <li><a href="add-customer.php"><i class="fa fa-circle-o"></i> Add Customer</a></li>
            <li><a href="customers.php"><i class="fa fa-circle-o"></i> All Customer(s)</a></li>
          </ul>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Bookings</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            <ul class="treeview-menu">
            <li><a href="bookings.php"><i class="fa fa-circle-o"></i> All Booking(s)</a></li>
            <li><a href="add-booking.php"><i class="fa fa-circle-o"></i> Add Booking</a></li>
            <li><a href="booking-status.php"><i class="fa fa-circle-o"></i> Booking Status</a></li>
          </ul>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Invoice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="invoice.php"><i class="fa fa-circle-o"></i> View Invoice</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Stock Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add-stock.php"><i class="fa fa-circle-o"></i> Add new Stock</a></li>
            <li><a href="stocks.php"><i class="fa fa-circle-o"></i> View Stock</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add-service.php"><i class="fa fa-circle-o"></i> Add new Service</a></li>
            <li><a href="services.php"><i class="fa fa-circle-o"></i> View Services</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Mechanics</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add-mechanics.php"><i class="fa fa-circle-o"></i>Add Mechanics</a></li>
            <li><a href="mechanics.php"><i class="fa fa-circle-o"></i> View Mechanics</a></li>
          </ul>
        </li>
        <li>
          <a href="settings.php">
            <i class="fa fa-calendar"></i>
            <span>Settings</span>
          </a>
        </li>       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>