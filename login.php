<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SKL | Login </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<style>
    .greetings {
        font-size: 28px;
        font-weight: 650;
    }
</style>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <h1 class="display-3 logotext" style="font-weight: 600; text-align: center;">SKL</h1>
  <div class="card">
    <div class="card-body login-card-body">
      <h1 class="display-6 greetings" style="font-family: 'Poppins';"> Welcome back! </h1>
      <p class="text-muted" style="position: relative; bottom: 8px; margin-bottom: 25px; font-family: 'Poppins'">Sign in to your account</p>

      <form action="redirect.php" method="post">
        <label for="" style="font-family: 'Poppins'">Username</label>
        <div class="input-group mb-3">
          <input name="uname" type="text" class="form-control" placeholder="Enter email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <label for="" style="font-family: 'Poppins'">Password</label>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Enter your password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <input name="login" type="submit" class="btn btn-block bg-indigo" value="Sign in" style="margin-top: 30px; margin-bottom: 15px; font-family: 'Poppins'">
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
