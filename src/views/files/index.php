<?php 
require_once "../../../vendor/autoload.php";

use App\Lib\Session;
use App\Classes\File;
$file = new File();
Session::checkSession();
$files = $file->getIndividualUsersFiles();

?>

<!DOCTYPE html>
<html lang="en">

<!-- Header section -->
<?php require_once '../partials/header.php' ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php require_once '../partials/navbar.php' ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <?php require_once '../partials/sidebar.php' ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Files</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
          <?php if(isset($_SESSION['success'])){ ?>
        <div class='alert alert-success' role='alert'><?php echo $_SESSION['success'];?></div>
        <?php } unset($_SESSION['success']);?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Private Files</h3>
                <div class="card-tools">
                    <a href="create.php" class="btn btn-success">
                        <i class="fas fa-plus"></i> Add File
                    </a>
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
                          <a type="button" title="Share"
                              href="">
                              <i class="fas fa-share text-cyan"></i>
                          </a>
                          /
                          <a type="button" title="Download"
                              href="">
                              <i class="fas fa-download text-blue"></i>
                          </a>
                          /
                          <a type="button" href="javascript:void(0)"
                              onclick="" title="Delete">
                              <i class="fas fa-trash text-red"></i>
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
          <!-- /.col -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <footer class="main-footer">
  <?php require_once '../partials/footer.php' ?>
  </footer>
</div>
<!-- ./wrapper -->

<!-- javascrpit files -->
<?php require_once '../partials/scripts.php' ?>
<script>
  setTimeout(()=>{
            document.querySelector('.alert').remove();
        }, 3000);
</script>
</body>
</html>
