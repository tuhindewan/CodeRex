<?php 
require_once "../../../vendor/autoload.php";
use App\Lib\Session;
use App\Classes\FileUpload;
Session::checkSession();
$fu = new FileUpload();

if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['upload'])) {
    if($_FILES['file']['size'] != 0){
        $msg = $fu->storeFiletoDatabase($_POST);
    }
 }
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
            <?php 
                if($msg){
                    echo $msg;
                }
            ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Upload new File</h3>
                <div class="card-tools">

                </div>
              </div>
              <!-- /.card-header -->
              <form id="quickForm" action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="filename">File name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter file name">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" id="description" placeholder="Description">
                  </div>
                  <div class="form-group">
                  <label for="description">File</label>
                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="share" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">Share</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="upload" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
<!-- jquery-validation -->
<script src="../../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      name: {
        required: true,
      },
      description: {
        required: true,
      },
      file: {
        required: true
      }
    },
    messages: {
      name: {
        required: "Please enter file name",
      },
      description: {
        required: "Please provide description",
      },
      file: "Please select a file"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
<script>
  setTimeout(()=>{
            document.querySelector('.alert').remove();
        }, 4000);
</script>
</body>
</html>
