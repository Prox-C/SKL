<?php
session_start();
require_once('../functions.php');

if (!isset($_SESSION['active_user'])) {
  header("Location: ../login.php"); // Redirect to login page
  exit;
}

// Proceed with the rest of the page code
$_SESSION['total_users'] = count_users();
$_SESSION['no_of_cat'] = count_categories();
$_SESSION['total_posts'] = countAllBlogs();
$_SESSION['no_of_fb'] = countFeedbacks();

?>


<div class="wrapper">
  <!-- Navbar -->
  <?php include_once('../components/sidenav.php'); ?>

  <div class="content-wrapper" style="height: 600px">
    <div class="container" style="padding-top: 30px;">
        <h1 class="display-5" style="font-size: 42px; font-weight: 600; font-family: 'Poppins'">Dashboard</h1>
        <p class="text-muted" style="position: relative; bottom: 12px; font-size: 22px; font-weight: 450; font-family: 'Poppins'"> Hello, <?php echo $_SESSION['active_user'];?></p>

        <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-indigo" style="border-radius: 15px;">
              <div class="inner">
                <h3 style="font-family: 'Poppins';"><?php echo  $_SESSION['total_users'] ?></h3>

                <p style="font-family: 'Poppins'; font-weight: 500; font-size: 22px">Members</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"><svg id="Layer_1" height="45" viewBox="0 0 24 24" fill="#dedede" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m7.5 13a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm6.5 11h-13a1 1 0 0 1 -1-1v-.5a7.5 7.5 0 0 1 15 0v.5a1 1 0 0 1 -1 1zm3.5-15a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm-1.421 2.021a6.825 6.825 0 0 0 -4.67 2.831 9.537 9.537 0 0 1 4.914 5.148h6.677a1 1 0 0 0 1-1v-.038a7.008 7.008 0 0 0 -7.921-6.941z"/></svg></i>
              </div>
              <a href="members.php" class="small-box-footer" style="font-family: 'Poppins'">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-indigo" style="border-radius: 15px;">
              <div class="inner">
                <h3 style="font-family: 'Poppins';"><?php echo  $_SESSION['no_of_cat'] ?></h3>

                <p style="font-family: 'Poppins'; font-weight: 500; font-size: 22px">Categories</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars">
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24"  height="45" fill="#dedede">
                  <path d="m0,3v7h10V0H3C1.346,0,0,1.346,0,3Zm22,0c0-1.654-1.346-3-3-3h-7v10h10V3ZM0,19c0,1.654,1.346,3,3,3h7v-10H0v7Zm23.979,3.564l-2.812-2.812c.524-.791.833-1.736.833-2.753,0-2.757-2.243-5-5-5s-5,2.243-5,5,2.243,5,5,5c1.017,0,1.962-.309,2.753-.833l2.812,2.812,1.414-1.414Z"/>
                </svg>
                </i>
              </div>
              <a href="categories.php" class="small-box-footer" style="font-family: 'Poppins'">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-indigo card" style="border-radius: 15px;">
              <div class="inner">
                <h3 style="font-family: 'Poppins';"><?php echo  $_SESSION['total_posts'] ?></h3>

                <p style="font-family: 'Poppins'; font-weight: 500; font-size: 22px">Posts</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" height="50" fill="#dedede"><path d="M.1,6C.57,3.72,2.59,2,5,2h14c2.41,0,4.43,1.72,4.9,4H.1Zm23.9,2v9c0,2.76-2.24,5-5,5H5c-2.76,0-5-2.24-5-5V8H24Zm-14,4c0-.55-.45-1-1-1H5c-.55,0-1,.45-1,1s.45,1,1,1h1v4c0,.55,.45,1,1,1s1-.45,1-1v-4h1c.55,0,1-.45,1-1Zm10,4c0-.55-.45-1-1-1h-6c-.55,0-1,.45-1,1s.45,1,1,1h6c.55,0,1-.45,1-1Zm0-4c0-.55-.45-1-1-1h-6c-.55,0-1,.45-1,1s.45,1,1,1h6c.55,0,1-.45,1-1Z"/></svg></i>
              </div>
              <a href="#" class="small-box-footer" style="font-family: 'Poppins'">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-indigo" style="border-radius: 15px;">
              <div class="inner">
                <h3 style="font-family: 'Poppins';"><?php echo  $_SESSION['no_of_fb'] ?></h3>

                <p style="font-family: 'Poppins'; font-weight: 500; font-size: 22px">Feedbacks</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add">
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" height="50" fill="#dedede">
                  <path d="m17.829,10.762c-.141,0-.282-.045-.4-.133-.227-.17-.321-.464-.236-.734l.627-2.011-1.585-1.29c-.213-.181-.291-.476-.194-.738.096-.262.346-.437.626-.437h2.001l.708-1.987c.097-.261.346-.434.625-.434s.528.173.625.434l.708,1.987h2.001c.28,0,.53.175.626.438s.017.558-.197.739l-1.577,1.285.652,1.987c.089.269-.001.565-.226.738-.225.173-.534.185-.771.031l-1.836-1.196-1.805,1.208c-.112.075-.242.113-.371.113Zm-8-3c-.141,0-.282-.045-.4-.133-.227-.17-.321-.464-.236-.734l.627-2.011-1.585-1.29c-.213-.181-.291-.476-.194-.738.096-.262.346-.437.626-.437h2.001l.708-1.987c.097-.261.346-.434.625-.434s.528.173.625.434l.708,1.987h2.001c.28,0,.53.175.626.438s.017.558-.197.739l-1.577,1.285.652,1.987c.089.269-.001.565-.226.738-.225.173-.534.185-.771.031l-1.836-1.196-1.805,1.208c-.112.075-.242.113-.371.113ZM1.829,10.762c-.141,0-.282-.045-.4-.133-.227-.17-.321-.464-.236-.734l.627-2.011L.235,6.595c-.213-.181-.291-.476-.194-.738.096-.262.346-.437.626-.437h2.001l.708-1.987c.097-.261.346-.434.625-.434s.528.173.625.434l.708,1.987h2.001c.28,0,.53.175.626.438s.017.558-.197.739l-1.577,1.285.652,1.987c.089.269-.001.565-.226.738-.225.173-.534.185-.771.031l-1.836-1.196-1.805,1.208c-.112.075-.242.113-.371.113Zm15.17,3.238h-4.183l.58-3.265c.057-.334.029-.519.007-.599-.188-.69-.75-1.136-1.432-1.136-.213,0-.428.044-.64.132-.254.105-.503.367-.682.719l-2.193,4.149h-1.456c-1.657,0-3,1.343-3,3v4c0,1.657,1.343,3,3,3h0v-7c0-.552.448-1,1-1s1,.448,1,1v7h6.379c1.907,0,3.548-1.346,3.922-3.216l.639-3.196c.371-1.856-1.049-3.588-2.942-3.588Z"/>
                </svg>
                </i>
              </div>
              <a href="feedbacks.php" class="small-box-footer" style="font-family: 'Poppins'">More info <i class="fas fa-arrow-circle-right"></i></a>
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
