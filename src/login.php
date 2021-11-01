<?php
require_once "../vendor/autoload.php";

use App\Classes\Auth;
use App\Lib\Session;

//Initialize Session
Session::checkLogin();

$auth = new Auth(); 

// Login request
if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['login'])) {
   $msg = $auth->login($_POST);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="assets/index2.html"><b>Admin</b>LTE</a>
  </div>
  <div class="card">
    <!-- Display authentication error message -->
    <?php 
      if (isset($msg)) {
        echo $msg;
      }
    ?>
    <!-- /.login-card-body -->
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form id="login_form" action="" method="POST">
        <div class="input-group mb-3">
          <input type="username" name="username" class="form-control" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 center">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
