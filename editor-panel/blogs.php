<?php
session_start();
if (!isset($_SESSION['active_user'])) {
    header("Location: login.php"); // Redirect to login page
    exit;
  }
  
require_once('../functions.php');

if (isset($_POST['compose'])) {
    echo "<script>location.href='admin-panel/admin.php'</script>";
}

?>

<style>
    .title {
        font-weight: 800;
        font-size: 32px;
    }

    .poster {
        font-size: 18px;
    }

    .ctgry {
        font-size: 14px;
        font-weight: 750;
    }
</style>


<div class="wrapper">
    <!-- Navbar -->
    <?php include_once('../components/editor-nav.php'); ?>
  
    <div class="content-wrapper bg-light" style="height: 600px; overflow-y: auto;">
        <div class="container container-fluid" style="padding-left: 15px">
  
            <div class="postheader bg-light" style="height: 190px; padding-top: 30px; padding-right: 50px; z-index: 5; border: 0;">
                <h1 class="display-5" style="font-size: 42px; font-weight: 600; font-family: 'Poppins'"> My Posts </h1>
                <p class="text-muted" style="position: relative; bottom: 12px; font-size: 22px; font-weight: 450; font-family: 'Poppins'"> Published blogs </p>

                <div>
                    <a href="new_blog.php" class="btn bg-indigo" style="margin-bottom: 30px;">Compose 
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" height="16" fill="#fff" style="position: relative; bottom: 2px; margin-left: 5px">
                            <path d="M24,7.5v6c0,.83-.67,1.5-1.5,1.5s-1.5-.67-1.5-1.5V7.5c0-.17-.02-.34-.05-.5H3.05c-.03,.16-.05,.33-.05,.5v9c0,1.38,1.12,2.5,2.5,2.5h6c.83,0,1.5,.67,1.5,1.5s-.67,1.5-1.5,1.5H5.5c-3.03,0-5.5-2.47-5.5-5.5V7.5C0,4.47,2.47,2,5.5,2h13c3.03,0,5.5,2.47,5.5,5.5Zm-7.45,5.77c-.81-.81-1.92-1.27-3.06-1.27h-.95c-.28,0-.5,.22-.5,.5v.95c0,1.15,.46,2.25,1.27,3.06l6.81,6.81c.95,.95,2.53,.89,3.41-.18,.76-.93,.6-2.32-.25-3.17l-6.71-6.71Z"/>
                        </svg>
                    </a>
                </div>
            </div>
        
            <div class="bloglist" style="padding-top: 50px">
                <?php
                $posts = renderAllPublishedBlogs(); // Adjust this function as needed
                foreach ($posts as $post) {
                ?>
                <div class="blog-item row border rounded-lg overflow-hidden h-md-300 position-relative col-md-12 bg-white" style="padding: 15px 15px 15px 10px; margin: 0 0 20px 2px;">
                    <div class="col">
                        <img src="../<?php echo htmlspecialchars($post['thumbnail']); ?>" alt="" class="float-right rounded-lg" width="100%" height="100%" style="border-radius: 4px; object-fit: cover">
                    </div>
                    <div class="col-md-7 d-flex flex-column" style="padding: 10px 30px 10px 30px">
                        <p style="font-family: 'Poppins'; font-weight: 250; font-size: 14px">In <b><?php echo htmlspecialchars($post['category_name']); ?></b>, by <b><?php echo htmlspecialchars($post['fname'] . ' ' . $post['lname']); ?></b></p>
                        <h2 style="font-family: 'Poppins'"><?php echo htmlspecialchars($post['title']); ?></h2>
                        <p style="width: 100%; font-family: 'Poppins'; text-align: justify; text-justify: inter-word" class="flex-grow-1 text-muted">
                           <em> <?php echo shortenContent($post['content'], 250); ?> </em>
                        </p> 
                        <a class="mt-auto text-fuchsia" style="font-family: 'Poppins'; font-weight: 500" href="view_post.php?post_id=<?php echo htmlspecialchars($post['post_id']); ?>&title=<?php echo urlencode($post['title']); ?>&category=<?php echo urlencode($post['category_name']); ?>&thumbnail=<?php echo urlencode($post['thumbnail']); ?>&content=<?php echo urlencode($post['content']); ?>"> View 
                        <svg xmlns="http://www.w3.org/2000/svg" id="Isolation_Mode" data-name="Isolation Mode" viewBox="0 0 24 24" width="17" fill="#f012be"><path d="M23.8,11.478c-.13-.349-3.3-8.538-11.8-8.538S.326,11.129.2,11.478L0,12l.2.522c.13.349,3.3,8.538,11.8,8.538s11.674-8.189,11.8-8.538L24,12ZM12,18.085c-5.418,0-8.041-4.514-8.79-6.085C3.961,10.425,6.585,5.915,12,5.915S20.038,10.424,20.79,12C20.038,13.576,17.415,18.085,12,18.085Z"/><circle cx="12" cy="12" r="4"/></svg>

                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
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
    </div>
</div>
</body>
</html>
