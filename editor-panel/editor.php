<?php
  session_start();
  require_once('../functions.php');

  $_SESSION['no_of_cat'] = count_categories();
  $publsihed = countuserBlogs($_SESSION['active_user_id'], 0);
  $drafted = countuserBlogs($_SESSION['active_user_id'], 1);

?>


<div class="wrapper">
  <!-- Navbar -->
  <?php include_once('../components/editor-nav.php'); ?>

  <div class="content-wrapper bg-light" style="height: 600px">
    <div class="container" style="padding-top: 30px;">
        <h1 class="display-5" style="font-size: 42px; font-weight: 600; font-family: 'Poppins'">Hello, <?php echo  $_SESSION['active_user'] ?></h1>
        <p class="text-muted" style="position: relative; bottom: 12px; font-size: 22px; font-weight: 450; font-family: 'Poppins'"> What's on your mind? </p>
      
        <div class="container-fluid">

        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-indigo">
                  <i class="ion ion-person-add"><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" height="30" fill="#fff"><path d="M.1,6C.57,3.72,2.59,2,5,2h14c2.41,0,4.43,1.72,4.9,4H.1Zm23.9,2v9c0,2.76-2.24,5-5,5H5c-2.76,0-5-2.24-5-5V8H24Zm-14,4c0-.55-.45-1-1-1H5c-.55,0-1,.45-1,1s.45,1,1,1h1v4c0,.55,.45,1,1,1s1-.45,1-1v-4h1c.55,0,1-.45,1-1Zm10,4c0-.55-.45-1-1-1h-6c-.55,0-1,.45-1,1s.45,1,1,1h6c.55,0,1-.45,1-1Zm0-4c0-.55-.45-1-1-1h-6c-.55,0-1,.45-1,1s.45,1,1,1h6c.55,0,1-.45,1-1Z"/></svg></i>
                </span>

                <div class="info-box-content">
                  <span class="info-box-text" style="font-family: 'Poppins'">Published</span>
                  <span class="info-box-number"><?php echo $publsihed ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-indigo">
                <i class="ion ion-stats-bars">
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" height="30" fill="#fff"><path d="m12,7V.46c.913.346,1.753.879,2.465,1.59l3.484,3.486c.712.711,1.245,1.551,1.591,2.464h-6.54c-.552,0-1-.449-1-1Zm1.27,12.48c-.813.813-1.27,1.915-1.27,3.065v1.455h1.455c1.15,0,2.252-.457,3.065-1.27l6.807-6.807c.897-.897.897-2.353,0-3.25-.897-.897-2.353-.897-3.25,0l-6.807,6.807Zm-3.27,3.065c0-1.692.659-3.283,1.855-4.479l6.807-6.807c.389-.389.842-.688,1.331-.901-.004-.12-.009-.239-.017-.359h-6.976c-1.654,0-3-1.346-3-3V.024c-.161-.011-.322-.024-.485-.024h-4.515C2.243,0,0,2.243,0,5v14c0,2.757,2.243,5,5,5h5v-1.455Z"/></svg>
                </i>
                </span>

                <div class="info-box-content">
                  <span class="info-box-text" style="font-family: 'Poppins'">Drafts</span>
                  <span class="info-box-number"><?php echo $drafted ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-indigo">
                <i class="ion ion-stats-bars">
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24"  height="30" fill="#fff">
                  <path d="m0,3v7h10V0H3C1.346,0,0,1.346,0,3Zm22,0c0-1.654-1.346-3-3-3h-7v10h10V3ZM0,19c0,1.654,1.346,3,3,3h7v-10H0v7Zm23.979,3.564l-2.812-2.812c.524-.791.833-1.736.833-2.753,0-2.757-2.243-5-5-5s-5,2.243-5,5,2.243,5,5,5c1.017,0,1.962-.309,2.753-.833l2.812,2.812,1.414-1.414Z"/>
                </svg>
                </i>
                </span>

                <div class="info-box-content">
                  <span class="info-box-text" style="font-family: 'Poppins'">Categories</span>
                  <span class="info-box-number"><?php echo  $_SESSION['no_of_cat'] ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

        </div>
        
    </div>
 
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- Page specific script -->

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
