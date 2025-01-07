<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign in to SKL</title>
  
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <style>
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

      .bbj {
        margin: 0; 
        padding: 0; 
        display: flex; 
        justify-content: center; 
        align-items: center; 
        background: url('./assets/vids/dive.gif');
        background-size: cover;
      }

      .hdr {
        font-family: "Poppins";
        font-size: 16px;
        font-weight: 350;
      }

      
      .logoTxt {
        font-family: "Poppins";
        font-size: 90px;
        font-weight: 800;
        color: #fff;
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
<body class="bbj">
  <div style="height: 100vh; width: 100%; position: absolute; background: #000; z-index: -1; opacity: 80%;"></div>
  <div class="forms-con bg-light" style="width: 30%; height: 100vh; padding: 180px 50px 0 50px; ">
  <form action="redirect.php" method="post">
    <h1 class="h3 mb-3 fw-bold" style="font-family: 'Poppins';">Welcome back!</h1>
    <p style="font-family: 'Poppins'; position: relative; bottom: 20px" class="text-muted">Sign in to your account.</p>

    <div class="form-floating">
      <input name="uname" style="font-family: 'Poppins';" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" required>
      <label style="font-family: 'Poppins';" class="fw-normal" for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input name="password" style="font-family: 'Poppins';" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword" class="fw-normal" style="font-family: 'Poppins';">Password</label>
    </div>

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label style="font-family: 'Poppins';" class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
    <input name="login" value="Login" style="font-family: 'Poppins'; padding: 8px 16px" class="btn btn-lg bg-indigo w-100 py-2 btn rounded-pill bg-indigo" type="submit"></input>
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2023- 2024</p>
  </form>
  </div>
  <div class="forms-con" style="width: 70%; height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; background: url('./assets/vids/dive.gif'); background-size: cover; background-position: center; z-index: -2;">
  <h1 class="logoTxt" style="display: none">SKL</h1>
  <p class="text-white hdr" style="display: none">Dive into stories that captivates the soul.</p>
  </div>
  <div class="bgx" style="position: absolute; display: flex; justify-content: center; align-items: center; flex-direction: column;  ">
  <h1 class="logoTxt" style="position: relative; left: 200px">SKL</h1>
  <p class="text-white hdr" style="position: relative; left: 200px">Dive into the art of self-expression.</p>
  </div>
</body>
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
