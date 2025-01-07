<?php
require_once('functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedbackText = $_POST['feedbackText'] ?? '';
    $rating = $_POST['rating'] ?? '';

    // Validate and sanitize inputs
    $feedbackText = trim($feedbackText);
    $rating = filter_var($rating, FILTER_VALIDATE_INT);

    if (!empty($feedbackText) && $rating) {
        $insertedId = insertFeedback($feedbackText, $rating);

        if ($insertedId) {
            // echo "<div class='alert alert-success'>Thank you for your feedback! Your feedback ID is $insertedId.</div>";
        } else {
            // echo "<div class='alert alert-danger'>There was an issue submitting your feedback. Please try again.</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Please fill in all fields and provide a valid rating.</div>";
    }
}
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <style>
    * {font-family: 'Poppins'}
    .txt {
        font-family: 'Poppins', "sans-serif";
    }

    .logotext {
      font-size: 32px;
      font-weight: 800; 
      font-family: 'Poppins'; 
      color: #101720;
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

      .bout {
        text-align: center;
        height: 440px;
      }
      .bout img {
        height: 55%;
        width: 100%;
      }

      .bout p {
        font-weight: 300;
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
<?php include_once('./components/topnav.php');?>

<div class="wrapper">
  <div class="content-wrapper bg-light" >
    
    <section id="hero">
      <div class="container" style="height: 100vh">
        <div class="row" style="height: 100%">
          <div class="col-md-8" style="display: flex; flex-direction: column; align-items: flext-start; justify-content: center;">
            <h1 style="font-size: 86px; font-family: 'Poppins'; font-weight: 750; color:101720"><span id="title"></span><span id="cursor">|</span></h1>
            <h2 style="font-size: 18px; font-family: 'Poppins'; font-weight: 400; color:#2f2f2f">Whatever it is, we've got it covered.</h2>
            <a href="home.php" type="button" class="btn bg-indigo btn-lg rounded-pill" style="font-family: 'Poppins'; width: 30%; margin-top: 50px; padding: 8px 16px">Get Started</a>
          </div>
          <div class="col-md-4" style="display: flex; flex-direction: column; align-items: flext-start; justify-content: center; position: relative; right: 60px">
            <img src="assets/icons/Blogging-amico.svg" alt="" style="width: 120%; height: 100%">
          </div>
        </div>
      </div>
    </section>

    <section id="about" class="bg-indigo">
  <div class="container" style="height: 100vh;">
    <div class="row" style="display: flex; justify-content: center; align-items: center; height: 100%;">
      <div class="col-md-5 d-flex justify-content-center align-items-center" style="height: auto;">
        <img src="assets/icons/iMac 24 inch.png" alt="" style="height: 550px; position: relative;">
      </div>
      <div class="col-md-7" style="padding: 20px;">
        <h1>About us</h1>
        <p style="padding: 20px 0 10px 0;">
          <b>SKL</b> is a web-based blog site where anyone can immerse into the tales of our creative team and be a part of an engaging online community. 
          It provides a platform for users to channel their inner thoughts and give them freedom to express themselves.
        </p>
        <h5>Powered by:</h5>
        <div>
          <a href=""> <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"> </a>
          <a href=""> <img src="https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white"> </a>
          <a href=""> <img src="https://img.shields.io/badge/MySql-4479A1?style=for-the-badge&logo=mysql&logoColor=white"> </a>
          <a href=""> <img src="https://img.shields.io/badge/Javascript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black"> </a>
          <a href=""> <img src="https://img.shields.io/badge/HTML-E34F26?style=for-the-badge&logo=html5&logoColor=white"> </a>
          <a href=""> <img src="https://img.shields.io/badge/CSS-1572B6?style=for-the-badge&logo=css3&logoColor=white"> </a>
        </div>
      </div>
    </div>
  </div>
</section>


    <section id="help">
  <div class="container d-flex flex-column align-items-center justify-content-center align-items-center" style="height: 100vh">
    <div class="row justify-content-center gap-3 mb-4">
      <div class="col-md-3 bout">
        <img src="assets/icons/Knowledge-rafiki.png" alt="">
        <h3 class="text-dark">Explore</h3>
        <p class="text-dark">Immerse in a world of ideas, stories, and perspectives. Lose yourself in thoughtfully crafted blog posts designed to inform, inspire, and entertain.</p>
      </div>
      <div class="col-md-3 bout">
        <img src="assets/icons/Blogging-pana.png" alt="">
        <h3 class="text-dark">Express</h3>
        <p class="text-dark">Share your voice with the world. Whether it’s your personal story, a creative idea, or valuable insights, this is your platform to create and inspire others through your words.</p>
      </div>
      <div class="col-md-3 bout">
        <img src="assets/icons/Status update-pana.png" alt="">
        <h3 class="text-dark">Engage</h3>
        <p class="text-dark">Join the conversation! Connect with authors and fellow readers by sharing your thoughts, feedback, and questions in the comments section. </p>
      </div>
    </div>
    <a href="manual.html" target="_blank" class="btn rounded-pill btn-lg bg-indigo" style="padding: 10px 30px">Open User Guide
    <svg style="margin-left: 4px" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="14" fill="#FFFFFF"><path d="M19.5,0H10.5c-.828,0-1.5,.671-1.5,1.5s.672,1.5,1.5,1.5h8.379L.439,21.439c-.586,.585-.586,1.536,0,2.121,.293,.293,.677,.439,1.061,.439s.768-.146,1.061-.439L21,5.121V13.5c0,.829,.672,1.5,1.5,1.5s1.5-.671,1.5-1.5V4.5c0-2.481-2.019-4.5-4.5-4.5Z"/></svg>

    </a>
  </div>
</section>

<section class="bg-white">
  <div class="container d-flex flex-column justify-content-center" id="feedback" style="height: 100vh">
    <div class="row">
      <div class="col-md-5">
        <img src="assets/icons/comment.gif" alt="" style="height: 350px;">
      </div>
      <div class="col-md-7 d-flex align-items-center">
        <div class="card w-100 shadow-sm border-1 rounded-4">
          <div class="card-body">
          <form method="POST" action="index.php#feedback">
              <!-- Feedback Textarea -->
              <div class="mb-3">
                <h2 class="text-dark" style="margin: 20px 0 10px 0">We value your opinion</h2>
                <textarea required class="form-control rounded-3" id="feedbackText" name="feedbackText" rows="4" placeholder="Share your thoughts and feedback" style="padding: 15px"></textarea>
              </div>

              <!-- Rating Section -->
              <div class="mb-3">
                <label class="form-label text-dark">Rate Our Site</label>
                <div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating" id="rating1" value="1">
                    <label class="form-check-label text-dark" for="rating1">1</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating" id="rating2" value="2">
                    <label class="form-check-label text-dark" for="rating2">2</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating" id="rating3" value="3">
                    <label class="form-check-label text-dark" for="rating3">3</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating" id="rating4" value="4">
                    <label class="form-check-label text-dark" for="rating4">4</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating" id="rating5" value="5">
                    <label class="form-check-label text-dark" for="rating5">5</label>
                  </div>
                </div>
              </div>

              <!-- Submit Button -->
              <div class="mb-3">
                <button type="submit" class="btn bg-indigo rounded-4" style="padding: 8px 16px">Submit
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="14" fill="#FFFFFF" style="margin-left: 4px"><path d="m21.697,8.382L4.566.324C3.396-.243,2.021-.049,1.056.82.087,1.692-.25,3.048.197,4.272c.024.064,4.106,7.734,4.106,7.734,0,0-4.005,7.664-4.028,7.727-.445,1.226-.105,2.58.865,3.45.601.538,1.358.816,2.121.816.47,0,.941-.105,1.379-.321l17.058-8.053c1.421-.667,2.303-2.056,2.302-3.625-.002-1.569-.885-2.956-2.303-3.619ZM3.001,3.184c-.004-.038.007-.084.062-.133.088-.079.157-.047.195-.027.007.004.015.007.021.011l15.874,7.466H6.9L3.001,3.184Zm.336,17.793c-.036.019-.106.053-.193-.026-.056-.05-.066-.098-.062-.136l3.827-7.314h12.266l-15.837,7.477Z"/></svg>
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>




    



  </div>
</div>


<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
 
<script src="/assets/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<script src="main.js"></script>

</body>
</html>
