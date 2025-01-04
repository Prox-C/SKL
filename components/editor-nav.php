<?php 

    if(isset($_POST['sign-out'])) {
      insertSession($_SESSION['active_user_email'], 'out');
      session_unset();
      session_destroy();
      echo"<script>location.href='../index.php'</script>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> SKL | Editor </title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


  <style>
        .logotext {
            font-size: 32px; 
            font-weight: 600; 
        }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="modal fade" id="sign-out" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="TRUE">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="confirmAlert">Confirmation</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Are you sure you want to sign out?
                </div>
                <div class="modal-footer">
                  <form action="" method="post">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>     
                    <input name="sign-out" type="submit" class="btn btn-danger" value="Logout">
                  </form>                                
                </div>
              </div>
            </div>
          </div>

<nav class="main-header navbar navbar-expand bg-indigo navbar-dark" style="padding-top: 16px">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a href="nav-link" data-toggle="dropdown" href="#">     
              <img src="../assets/icons/images.jpeg" alt="" height="25" width="25" style="border-radius: 50%; position: relative; bottom: 4px; right: 8px;">       
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <!-- <a href="#" class="dropdown-item">
                    Profile
                </a> -->
                <div class="dropdown-divider"></div>
                <button href="#" class="dropdown-item text-danger" data-toggle="modal" data-target="#sign-out">
                    Logout
                </button>
            </div>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 collapsed">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="display-4 font-weight-semibold logotext">SKL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="./editor.php" class="nav-link">
              <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" height="20 " style="position: relative; bottom: 3px;" fill="#dedede"><path d="M12,14a3,3,0,0,0-3,3v7.026h6V17A3,3,0,0,0,12,14Z"/><path d="M13.338.833a2,2,0,0,0-2.676,0L0,10.429v10.4a3.2,3.2,0,0,0,3.2,3.2H7V17a5,5,0,0,1,10,0v7.026h3.8a3.2,3.2,0,0,0,3.2-3.2v-10.4Z"/></svg>
              <p style="margin-left: 6px; font-family: 'Poppins'"> Home </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./blogs.php" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" height="18" style="position: relative; bottom: 3px;" fill="#dedede"><path d="M.1,6C.57,3.72,2.59,2,5,2h14c2.41,0,4.43,1.72,4.9,4H.1Zm23.9,2v9c0,2.76-2.24,5-5,5H5c-2.76,0-5-2.24-5-5V8H24Zm-14,4c0-.55-.45-1-1-1H5c-.55,0-1,.45-1,1s.45,1,1,1h1v4c0,.55,.45,1,1,1s1-.45,1-1v-4h1c.55,0,1-.45,1-1Zm10,4c0-.55-.45-1-1-1h-6c-.55,0-1,.45-1,1s.45,1,1,1h6c.55,0,1-.45,1-1Zm0-4c0-.55-.45-1-1-1h-6c-.55,0-1,.45-1,1s.45,1,1,1h6c.55,0,1-.45,1-1Z"/></svg>
            <p style="margin-left: 6px; font-family: 'Poppins'"> Posts </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./drafts.php" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" height="18" style="position: relative; bottom: 3px;" fill="#DEDEDE"><path d="m12,7V.46c.913.346,1.753.879,2.465,1.59l3.484,3.486c.712.711,1.245,1.551,1.591,2.464h-6.54c-.552,0-1-.449-1-1Zm1.27,12.48c-.813.813-1.27,1.915-1.27,3.065v1.455h1.455c1.15,0,2.252-.457,3.065-1.27l6.807-6.807c.897-.897.897-2.353,0-3.25-.897-.897-2.353-.897-3.25,0l-6.807,6.807Zm-3.27,3.065c0-1.692.659-3.283,1.855-4.479l6.807-6.807c.389-.389.842-.688,1.331-.901-.004-.12-.009-.239-.017-.359h-6.976c-1.654,0-3-1.346-3-3V.024c-.161-.011-.322-.024-.485-.024h-4.515C2.243,0,0,2.243,0,5v14c0,2.757,2.243,5,5,5h5v-1.455Z"/></svg>
            <p style="margin-left: 6px; font-family: 'Poppins'"> Drafts  </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./categories.php" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24"  height="18" style="position: relative; bottom: 3px;" fill="#dedede">
                <path d="m0,3v7h10V0H3C1.346,0,0,1.346,0,3Zm22,0c0-1.654-1.346-3-3-3h-7v10h10V3ZM0,19c0,1.654,1.346,3,3,3h7v-10H0v7Zm23.979,3.564l-2.812-2.812c.524-.791.833-1.736.833-2.753,0-2.757-2.243-5-5-5s-5,2.243-5,5,2.243,5,5,5c1.017,0,1.962-.309,2.753-.833l2.812,2.812,1.414-1.414Z"/>
            </svg>

            <p style="margin-left: 6px; font-family: 'Poppins'"> Categories  </p>
            </a>
          </li>

          
         
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>