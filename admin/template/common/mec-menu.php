<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Ger</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Mechanic</b> GER</span>
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
            <a href="mec-logout.php">
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
          <a href="<?=  $config['admin_url'] ?>index2.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </span>
          </a>
        </li>
                
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>