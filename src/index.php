<?php
define('__BASE_URI__', '/src/');
require_once "../vendor/autoload.php";

use App\Lib\Session;


Session::checkSession();


//Logout
if (isset($_GET['action']) && $_GET['action']=='logout') {
  Session::destroy();
}



?>

<!DOCTYPE html>
<html lang="en">

<!-- Header section -->
<?php require_once 'views/partials/header.php' ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php require_once 'views/partials/navbar.php' ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <?php require_once 'views/partials/sidebar.php' ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <footer class="main-footer">
  <?php require_once 'views/partials/footer.php' ?>
  </footer>
</div>
<!-- ./wrapper -->

<!-- javascrpit files -->
<?php require_once 'views/partials/scripts.php' ?>
</body>
</html>
