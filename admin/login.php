<?php
session_start();
include 'cn.php'; 
if(isset($_SESSION['HelloABC'])){
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>MY</b>SHOP</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php
      if(isset($_REQUEST['btnLogin'])){
        // $txtName = $conn->real_escape_string($_REQUEST['txtName']);
        // $txtPass = md5($conn->real_escape_string($_REQUEST['txtPass']));
        // $sql = "SELECT * FROM `tbl_login` WHERE log_name='$txtName' AND log_pass='$txtPass'";
        // $qr = $conn->query($sql);
        // if($qr->num_rows>0){
        //   $row = $qr->fetch_assoc();
        //   $_SESSION['HelloABC'] = $row['log_id'];
        //   header("location: index.php");
        // }
        // else{
        //   echo 'Incorrect Username or Password';
        // }
        $txtName = $conn->real_escape_string($_REQUEST['txtName']);
        $txtPass = $conn->real_escape_string($_REQUEST['txtPass']);
        $sql = "SELECT * FROM `tbl_login` WHERE log_name='$txtName'";
        $qr = $conn->query($sql);
        $row = $qr->fetch_assoc();
        if ($row && password_verify($txtPass, $row['log_pass'])) {
          $_SESSION['HelloABC'] = $row['log_id'];
          header("location: index.php");
        }
        else{
          echo 'Incorrect Username or Password';
        }
      }
      ?>
      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="txtName">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="txtPass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
                    <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="btnLogin">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
