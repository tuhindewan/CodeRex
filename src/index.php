<?php
define('__BASE_URI__', '/src/');
require_once "../vendor/autoload.php";

use App\Lib\Session;
use App\Classes\File;


Session::checkSession();
// Get only public files
$file = new File();
$files = $file->getAllPublicFiles();
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
          <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">File List</h3>
                <div class="card-tools">
                    
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>File</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                    $i = 1;
                    while($file = $files->fetch_assoc()){ ?>

                    <tr>
                      <td><?php echo $i ?>.</td>
                      <td><?php echo $file['name']  ?></td>
                      <td><?php echo $file['description']  ?></td>
                      <td>
                        <?php if($file['is_public'] == 1) { ?>
                        Public
                        <?php }else { ?>
                        Private
                        <?php } ?>
                      </td>
                      <td>
                          <a type="button" title="Download"
                              href="">
                              <i class="fas fa-download text-blue"></i>
                          </a>  
                      </td>
                    </tr>


                    <?php $i++; }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">

              </div>
            </div>
            <!-- /.card -->
          </div>
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
