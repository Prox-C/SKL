<?php
require_once('../functions.php');

$post_id = $_GET['post_id'];
$title = urldecode($_GET['title']);
$category = urldecode($_GET['category']);
$thumbnail = urldecode($_GET['thumbnail']);
$content = urldecode($_GET['content']);

$comments = get_comments($post_id);
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SKL</title>
  
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


  <style>
    * {font-family: 'Poppins'}

    .logotext {
        font-size: 32px; 
        font-weight: 600; 
    }

    .mainCTA {
        width: 150px;
    }

    .hero-section {
        background: red;
        padding-top: 30px;
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
  </style>

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
  <!-- Nav -->
  <nav class="main-header navbar navbar-expand-md navbar-dark bg-light sticky-top" style="height: 10vh;">
    <div class="container">
        <!-- Button to redirect to blogs.php -->
        <a class="text-secondary" href="blogs.php"> 
          <svg style="position: relative; bottom: 2px; margin-right: 4px" xmlns="http://www.w3.org/2000/svg" id="Bold" viewBox="0 0 24 24" width="17" fill="#6c757d"><path d="M4.943,5.606,1.024,9.525a3.585,3.585,0,0,0,0,4.95l3.919,3.919a1.5,1.5,0,1,0,2.121-2.121L4.285,13.492l18.25-.023a1.5,1.5,0,0,0,1.5-1.5v0a1.5,1.5,0,0,0-1.5-1.5L4.3,10.492,7.064,7.727A1.5,1.5,0,0,0,4.943,5.606Z"/></svg>
        Return</a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Right navbar links -->
            <div class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <div class="mainCTA">
                    <a class="text-secondary" href="update_post.php?post_id=<?php echo urlencode($post_id); ?>&title=<?php echo urlencode($title); ?>&category=<?php echo urlencode($category); ?>&thumbnail=<?php echo urlencode($thumbnail); ?>&content=<?php echo urlencode($content); ?>">
                    Update
                    <svg style="position: relative; bottom: 2px; margin-left: 4px" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="17" fill="#6c757d"><path d="m18.813,10c.309,0,.601-.143.79-.387s.255-.562.179-.861c-.311-1.217-.945-2.329-1.833-3.217l-3.485-3.485c-1.322-1.322-3.08-2.05-4.95-2.05h-4.515C2.243,0,0,2.243,0,5v14c0,2.757,2.243,5,5,5h3c.552,0,1-.448,1-1s-.448-1-1-1h-3c-1.654,0-3-1.346-3-3V5c0-1.654,1.346-3,3-3h4.515c.163,0,.325.008.485.023v4.977c0,1.654,1.346,3,3,3h5.813Zm-6.813-3V2.659c.379.218.732.488,1.05.806l3.485,3.485c.314.314.583.668.803,1.05h-4.338c-.551,0-1-.449-1-1Zm11.122,4.879c-1.134-1.134-3.11-1.134-4.243,0l-6.707,6.707c-.755.755-1.172,1.76-1.172,2.829v1.586c0,.552.448,1,1,1h1.586c1.069,0,2.073-.417,2.828-1.172l6.707-6.707c.567-.567.879-1.32.879-2.122s-.312-1.555-.878-2.121Zm-1.415,2.828l-6.708,6.707c-.377.378-.879.586-1.414.586h-.586v-.586c0-.534.208-1.036.586-1.414l6.708-6.707c.377-.378,1.036-.378,1.414,0,.189.188.293.439.293.707s-.104.518-.293.707Z"/></svg>
                    </a>
                </div>
                <!-- <div class="deleteCTA">
                    <input name="delete_post" type="submit" class="btn bg-danger btn-block" style="margin-left: 10px" value="Delete">
                </div> -->
            </div>
        </div>
    </div>
</nav>

<div class="content-wrapper bg-light" style="height: 600px; background: red; padding-top: 50px; overflow-y: auto">
  

<div class="container container-fluid bg-light"> 
    <div class="container" style="padding-top: 50px; padding-bottom: 30px">
      <div class="" style="display: flex; justify-content: center; align-items: center; flex-direction: column">
         <div class="col-lg-8" style="padding: 10px 0 10px 10px">
            <h2 class="display-3" style="font-family: 'Poppins'; font-weight: 500; font-size: 44px; height: 85%" ><?php echo $title; ?></h2>
            <h4 class="text-muted display-4" style="font-family: 'Poppins'; font-size: 14px; font-weight: 350; position: relative; bottom: 4px">Category: <?php echo $category; ?></h4>
          </div>
          <div class="col-lg-8" style="margin: 60px 0 60px 0">
            <img src="../<?php echo $thumbnail?>" alt="" style="width: 100%; height: auto; object-fit: cover; border-radius: 25px">
          </div>
          <div class="col-md-8">
            <h5 style="font-size: 16px; font-family: 'Poppins'; text-align: center; font-weight: 300"> By: <strong>You</strong></h3>
              <p class="" style="letter-spacing: 0.5px; color: #101720; font-size: 16px; line-height: 30px; word-spacing: 5px; white-space: pre-line; font-weight: 350; font-family: 'Poppins'; ">
              <?php echo $content?>
              </p>
            </div>  
      </div>
    </div>
      <div class="comment container">
        <div class="row">
          <div class="col-md-3">

          </div>

          <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title" style="font-family: 'Poppins'">
                    Comments(<?php echo count($comments); ?>)
                  </h3>
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <dl>
                      <?php 
                          $comments = get_comments($post_id);
                          if(empty($comments)) {
                      ?>
                      <dd style="text-align: center">Wow, such empty.</dd>
                      <?php
                          } else {
                              foreach($comments as $comment) {
                      ?>
                      <dt class="text-muted" style="font-size: 12px"><?php echo htmlspecialchars($comment['alias']); ?></dt>
                      <dd style="position: relative; bottom: 4px; font-size: 16px;"><?php echo htmlspecialchars($comment['comment']); ?></dd>
                      <?php
                              }
                          }
                      ?>
                  </dl>
              </div>

                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

          </div>

          <div class="col-md-3">

          </div>

        </div>
      </div>

    </div>
  </div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
</body>
</html>
