<?php
require_once('functions.php');
// Check if the form is submitted
if (isset($_POST['submit-comment'])) {
    // Get the values from the form
    $post_id = $_POST['post_id'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $thumbnail = $_POST['thumbnail'];
    $content = $_POST['content'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    
    // Get comment details
    $alias = $_POST['alias'];
    $comment = $_POST['comment'];

    try {
        // Add the comment
        $comment_id = add_comment($alias, $comment, $post_id);
        // Redirect to the same page with updated URL parameters
        header("Location: $_SERVER[PHP_SELF]?post_id=$post_id&title=".urlencode($title)."&category=".urlencode($category)."&thumbnail=".urlencode($thumbnail)."&content=".urlencode($content)."&fname=".urlencode($fname)."&lname=".urlencode($lname)."#comm_sec");
        exit();
    } catch (Exception $e) {
        // Handle the exception
        $error_message = "Error: " . $e->getMessage();
    }
}

// Retrieve post information from the URL parameters
$post_id = $_GET['post_id'];
$title = urldecode($_GET['title']);
$category = urldecode($_GET['category']);
$thumbnail = urldecode($_GET['thumbnail']);
$content = urldecode($_GET['content']);
$fname = urldecode($_GET['fname']);
$lname = urldecode($_GET['lname']);

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
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


  <style>

    * {
        font-family: "Poppins", 'sans-serif';
    }

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
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
  <!-- Nav -->
  <?php include_once('./components/topnav.php');?>
<div class="content-wrapper bg-light" style="height: 600px; background: red; padding-top: 50px; overflow-y: auto">
  

  <div class="container container-fluid bg-light"> 
    <div class="container" style="padding-top: 50px; padding-bottom: 30px">
      <div class="" style="display: flex; justify-content: center; align-items: center; flex-direction: column">
         <div class="col-lg-8" style="padding: 10px 0 10px 10px">
            <h2 class="display-3" style="font-family: 'Poppins'; font-weight: 500; font-size: 44px; height: 85%" ><?php echo $title; ?></h2>
            <h4 class="text-muted display-4" style="font-family: 'Poppins'; font-size: 14px; font-weight: 350; position: relative; bottom: 4px">Category: <?php echo $category; ?></h4>
          </div>
          <div class="col-lg-8" style="margin: 60px 0 60px 0">
            <img src="<?php echo $thumbnail?>" alt="" style="width: 100%; height: auto; object-fit: cover; border-radius: 25px">
          </div>
          <div class="col-md-8">
            <h5 style="font-size: 16px; font-family: 'Poppins'; text-align: center; font-weight: 300"> By: <strong><?php echo $fname . ' ' . $lname; ?></strong></h3>
              <p class="" style="letter-spacing: 0.5px; color: #101720; font-size: 16px; line-height: 30px; word-spacing: 5px; white-space: pre-line; font-weight: 350; font-family: 'Poppins'; ">
              <?php echo $content?>
              </p>
            </div>  
      </div>
    </div>


      <div class="comment container">
        <div class="row">

          <div class="col-md-6">
            <div class="card rounded-3">
              <div class="card-header" id="comm_sec"> <h4 style="font-family: 'Poppins'; position: relative; top: 6px">Share your thoughts</h4></div>
              <div class="card-body">
              <form action="" method="post">
              <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($post_id); ?>">
              <input type="hidden" name="title" value="<?php echo htmlspecialchars($title); ?>">
              <input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>">
              <input type="hidden" name="thumbnail" value="<?php echo htmlspecialchars($thumbnail); ?>">
              <input type="hidden" name="content" value="<?php echo htmlspecialchars($content); ?>">
              <input type="hidden" name="fname" value="<?php echo htmlspecialchars($fname); ?>">
              <input type="hidden" name="lname" value="<?php echo htmlspecialchars($lname); ?>">
                    <div class="form-group">
                        <label for="userText">Comment as:</label>
                        <input name="alias" type="text" class="form-control" id="userText" placeholder="Enter an alias" value="Anonymous" required>
                    </div>
                    <div class="form-group">
                        <textarea name="comment" class="form-control" id="userComments" rows="4" placeholder="Write your thoughts" maxlength="200" required></textarea>
                    </div>
                    <input name="submit-comment" type="submit" class="btn bg-indigo float-right rounded-3" style="padding: 8px 16px" value="Comment">
                </form>
              </div>
            </div>
            </div>

          <div class="col-md-6">
            <div class="card rounded-3">
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
        </div>
      </div>

    </div>
  </div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
</body>
</html>
