<?php
if (isset($_POST['sign-out'])) {
  // Clear all session variables
  session_unset();
  // Destroy the session
  session_destroy();
  // Redirect to the login page or home page
  header("Location: ../index.php");
  exit; // Stop further execution of the script after redirection
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> SKL | Admin </title>
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
      <!-- SidebarSearch Form 
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="admin.php" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" height="20 " style="position: relative; bottom: 3px;" fill="#dedede">
                <path d="M19,3H5C2.239,3,0,5.239,0,8v8c0,2.761,2.239,5,5,5h14c2.761,0,5-2.239,5-5V8c0-2.761-2.239-5-5-5ZM6.802,17.359c-1.909-.449-3.404-2.058-3.729-3.992-.469-2.791,1.377-5.249,3.927-5.767v4.485c0,.53,.211,1.039,.586,1.414l3.169,3.169c-1.093,.724-2.482,1.036-3.952,.691Zm5.366-2.105l-2.876-2.876c-.188-.188-.293-.442-.293-.707V7.601c2.282,.463,4,2.48,4,4.899,0,1.019-.308,1.964-.832,2.754Zm7.832,1.746h-3c-.552,0-1-.448-1-1h0c0-.552,.448-1,1-1h3c.552,0,1,.448,1,1h0c0,.552-.448,1-1,1Zm0-4h-3c-.552,0-1-.448-1-1h0c0-.552,.448-1,1-1h3c.552,0,1,.448,1,1h0c0,.552-.448,1-1,1Zm0-4h-3c-.552,0-1-.448-1-1h0c0-.552,.448-1,1-1h3c.552,0,1,.448,1,1h0c0,.552-.448,1-1,1Z"/>
            </svg>
              <p style="margin-left: 6px; font-family: 'Poppins'"> Dashboard </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./members.php" class="nav-link">
            <svg id="Layer_1" height="18" viewBox="0 0 24 24" style="position: relative; bottom: 3px;" fill="#dedede" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m7.5 13a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm6.5 11h-13a1 1 0 0 1 -1-1v-.5a7.5 7.5 0 0 1 15 0v.5a1 1 0 0 1 -1 1zm3.5-15a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm-1.421 2.021a6.825 6.825 0 0 0 -4.67 2.831 9.537 9.537 0 0 1 4.914 5.148h6.677a1 1 0 0 0 1-1v-.038a7.008 7.008 0 0 0 -7.921-6.941z"/></svg>              
            <p style="margin-left: 6px; font-family: 'Poppins'"> Members </p>
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
          <li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" height="18" style="position: relative; bottom: 3px;" fill="#dedede">
      <path d="m23.553,22.139l-2.666-2.666c.698-.981,1.113-2.177,1.113-3.473,0-3.314-2.686-6-6-6s-6,2.686-6,6,2.686,6,6,6c1.296,0,2.492-.415,3.473-1.113l2.666,2.666c.195.195.451.293.707.293s.512-.098.707-.293c.391-.391.391-1.023,0-1.414Zm-8.226-3.142c-.601,0-1.204-.225-1.664-.674l-1.132-1.108c-.395-.387-.401-1.02-.015-1.414.386-.395,1.019-.401,1.414-.016l1.132,1.108c.144.142.379.141.522,0l2.713-2.624c.398-.381,1.032-.37,1.414.029.383.398.37,1.031-.029,1.414l-2.703,2.614c-.452.446-1.052.671-1.653.671Zm-7.327-2.997c0-4.411,3.589-8,8-8,1.458,0,2.822.398,4,1.083v-4.083c0-2.757-2.244-5-5-5H4.999C2.242,0,0,2.244,0,5.001v13.999c0,2.757,2.244,5,5,5h11c-4.411,0-8-3.589-8-8Zm2-11h5c.552,0,1,.447,1,1s-.448,1-1,1h-5c-.552,0-1-.447-1-1s.448-1,1-1Zm-4,12h-1c-.552,0-1-.447-1-1s.448-1,1-1h1c.552,0,1,.447,1,1s-.448,1-1,1Zm0-5h-1c-.552,0-1-.447-1-1s.448-1,1-1h1c.552,0,1,.447,1,1s-.448,1-1,1Zm0-5h-1c-.552,0-1-.447-1-1s.448-1,1-1h1c.552,0,1,.447,1,1s-.448,1-1,1Z"/>
    </svg>
    <p style="margin-left: 6px; font-family: 'Poppins'">
      Audit
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="./audit_option1.php" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Option 1</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="./audit_option2.php" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Option 2</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="./audit_option3.php" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Option 3</p>
      </a>
    </li>
  </ul>
</li>


         
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>