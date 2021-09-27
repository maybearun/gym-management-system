<?php
// <!--9820535049-  razorpay no.-->

require 'includes/functions.php';

if (isset($_POST['memberLoginBtn'])) {
  $email = $_POST['memberEmail'];
  $password = $_POST['memberPassword'];
  loginMember($email, $password);
  if (isset($_SESSION['errors'])) {
    echo "<div class='alert alert-danger' role='alert'>
  data not inserted try again" . print_r($_SESSION['errors']) . "</div>";;
    unset($_SESSION['errors']);
  }
  
}
if (isset($_POST['staffLoginBtn'])) {
  $email = $_POST['staffEmail'];
  $password = $_POST['staffPassword'];
  loginStaff($email, $password);
  // echo $_SESSION['role'];
  if (isset($_SESSION['errors'])) {
    echo "<div class='alert alert-danger' role='alert'>
  data not inserted try again" . print_r($_SESSION['errors']) . "</div>";
    unset($_SESSION['errors']);
  }
  
}
if (isset($_SESSION['role'])){
  switch($_SESSION['role']){
    case 'member':
      echo '<script>window.location="member/"</script>';
      break;
    case 'admin':
      echo '<script>window.location="admin/"</script>';
      break;
  }
  // echo $_SESSION['role'];
  die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- jquery validate -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $(document).ready(function(){
      $('#memberLogin').hide();
      $('#staffLogin').hide();

      $('#member').click(function() {
        $('#memberLogin').show();
        $('#staffLogin').hide();
      });
      $('#staff').click(function() {
        $('#staffLogin').show();
        $('#memberLogin').hide();
      });
      
    });
     
  </script>
</head>

<body class="hold-transition login-page">
  <div class="container">
    <center>
      <button id="member" class="btn btn-primary"> Login as member</button>
      <button id="staff" class="btn btn-primary"> Login as staff</button>
    </center>
  </div>
  <div class="login-box" id="staffLogin">
    <div class="login-logo">
      <a href="../../index.html"><b>Gym Mangement</b></a>
    </div>

    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in as staff</p>
        <form id="staffLoginForm" action="" method="post">
          <div class="input-group mb-3">
            <input type="email" name="staffEmail" id="staffEmail" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="staffPassword" id="staffPassword" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="staffLoginBtn" id="staffLoginBtn" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <div class="login-box" id="memberLogin">
    <div class="login-logo">
      <a href="../../index.html"><b>Gym Mangement</b></a>
    </div>

    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in as Member</p>
        <!-- <p id="invalid" style="display: none;">invalid credentials</p> -->
        <form id="memberLoginForm" action="" method="post">
          <div class="input-group mb-3">
            <input type="email" name="memberEmail" id="memberEmail" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="memberPassword" id="memberPassword" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- /.col -->
            <div class="col-4">
              <button type="submit" id="memberLoginBtn" name="memberLoginBtn" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
  
  <script>
   
  </script>
</body>

</html>