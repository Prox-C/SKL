<?php 
  require_once('functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SKL | Blogs</title>
  
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
<?php include_once('./components/topnav.php');?>

<div class="wrapper">
  <div class="content-wrapper bg-light" style="height: 600px; overflow-y: auto">
    <div class="container container-fluid">
      <div class="headerSec bg-light" style="width: 100%; padding-top: 30px; padding-bottom: 10px; z-index: 5">
        <h1 class="display-6" style="font-weight: 750; font-family: 'Poppins'">Explore</h1>
        <p class="text-muted" style="position: relative; bottom: 10px; font-weight: 300; font-family: 'Poppins'">Check out the latest stories from our creative minds</p>
      
        <div class="container-fluid">
            <form id="searchForm" style="margin-bottom: 30px">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="form-group ">
                            <div class="input-group input-group-lg rounded-5">
                                <input type="search" id="searchQuery" class="form-control form-control-lg" placeholder="Browse" style="font-weight: 400; font-family: 'Poppins'">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg bg-indigo">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <h3 id="sectionTitle" class="display-6 text-dark" style="font-size: 18px; font-weight: 400; font-family: 'Poppins'">Latest Blogs</h3>
      </div>

      <div class="bloglist" style="padding-top: 50px">
        <div id="searchResults"></div>
        <div id="blogPosts">
          <?php
          // Render all published blogs
          $posts = renderAllPublishedBlogs();
          foreach ($posts as $post) {
          ?>
          <div class="blog-item row border rounded-4 overflow-hidden h-md-300 position-relative col-md-12 bg-white" style="padding: 15px 15px 15px 10px; margin: 0 0 20px 2px;">
            
            <div class="col">
                <img src="<?php echo htmlspecialchars($post['thumbnail']); ?>" alt="" class="float-right rounded-3" width="100%" height="100%" style="border-radius: 4px: object-fit: cover">
            </div>
            <div class="col-md-7 d-flex flex-column" style="padding: 10px 30px 10px 30px">
              <p style="font-family: 'Poppins'; font-weight: 250; font-size: 14px">In <b><?php echo htmlspecialchars($post['category_name']); ?></b>, by <b><?php echo htmlspecialchars($post['fname'] . ' ' . $post['lname']); ?></b></p>
              <h2 style="font-family: 'Poppins'"><?php echo htmlspecialchars($post['title']); ?></h2>
                <!-- <h3 class="display-6 title" style="font-weight: 750; font-family: 'Poppins'; font-size: 28px"><?php echo htmlspecialchars($post['title']); ?></h3>
                <h5 class="text-muted poster" style="position: relative; bottom: 10px; font-size: 18px">By: <?php echo htmlspecialchars($post['fname'] . ' ' . $post['lname']); ?></h5>
                <h6 class="text-muted ctgry" style="position: relative; bottom: 10px; font-weight: 750"><?php echo htmlspecialchars($post['category_name']); ?></h6> -->
                <p style="width: 100%; font-family: 'Poppins'; text-align: justify; text-justify: inter-word" class="flex-grow-1 text-muted">
                   <em> <?php echo shortenContent($post['content'], 250); ?> </em>
                </p> 
                <a class="mt-auto text-fuchsia" style="font-weight: 500; font-family: 'Poppins'" href="post.php?post_id=<?php echo htmlspecialchars($post['post_id']); ?>&title=<?php echo urlencode($post['title']); ?>&category=<?php echo urlencode($post['category_name']); ?>&thumbnail=<?php echo urlencode($post['thumbnail']); ?>&content=<?php echo urlencode($post['content']); ?>&fname=<?php echo urlencode($post['fname']); ?>&lname=<?php echo urlencode($post['lname']); ?>">Read more <svg xmlns="http://www.w3.org/2000/svg" id="Bold" viewBox="0 0 24 24" fill="#f012be" width="20" height="15"><path d="M19.122,18.394l3.919-3.919a3.585,3.585,0,0,0,0-4.95L19.122,5.606A1.5,1.5,0,0,0,17,7.727l2.78,2.781-18.25.023a1.5,1.5,0,0,0-1.5,1.5v0a1.5,1.5,0,0,0,1.5,1.5l18.231-.023L17,16.273a1.5,1.5,0,0,0,2.121,2.121Z"/></svg>
                </a>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
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

<script>
    $(document).ready(function() {
        $('#searchForm').on('submit', function(event) {
            event.preventDefault();
            var query = $('#searchQuery').val();
            if (query) {
                $('#sectionTitle').text('Results');
            }

            $.ajax({
                url: 'search_results.php',
                type: 'GET',
                data: { search: query },
                success: function(data) {
                    $('#blogPosts').hide();
                    $('#searchResults').html(data);
                },
                error: function() {
                    $('#searchResults').html('<p>An error has occurred</p>');
                }
            });
        });
    });
</script>
</body>
</html>
