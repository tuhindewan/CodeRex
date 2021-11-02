<?php  
  use App\Lib\Session;
  session_start();

  // Select directory name for active menu
  $directoryURI = $_SERVER['REQUEST_URI'];
  $path = parse_url($directoryURI, PHP_URL_PATH);
?>

<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
  <img src="<?php echo __BASE_URI__ ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light">CodeRex</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="<?php echo __BASE_URI__ ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block"><?php echo Session::get('username') ?></a>
    </div>
  </div>

  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">
        <a href="<?php echo __BASE_URI__ ?>" class="nav-link <?php if($path =='/src/' || $path =='/src/index.php'){echo 'active';}?>">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <?php if(Session::get('access') == '1'){ ?>
      <li class="nav-item menu-open">
        <a href="<?php echo __BASE_URI__ ?>views/files" class="nav-link <?php if($path =="/src/views/files/" || $path =="/src/views/files/index.php" || $path =="/src/views/files/create.php"){echo 'active';}?>">
          <i class="nav-icon fas fa-file"></i>
          <p>
            Files
          </p>
        </a>
      </li>
      <?php }?>
      <li class="nav-item menu-open">
        <a href="<?php echo __BASE_URI__ ?>?action=logout" class="nav-link ">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>
            Logout
          </p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>