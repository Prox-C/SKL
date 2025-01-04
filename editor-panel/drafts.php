<?php
session_start();
if (!isset($_SESSION['active_user'])) {
    header("Location: login.php"); // Redirect to login page
    exit;
}

require_once('../functions.php');
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
                <h1 class="display-5" style="font-size: 42px; font-weight: 600; font-family: 'Poppins'"> My Drafts </h1>
                <p class="text-muted" style="position: relative; bottom: 12px; font-size: 22px; font-weight: 450; font-family: 'Poppins'"> Archived blogs </p>
            </div>
        
            <div class="bloglist" style="padding-top: 50px">
                <?php
                $user_id = $_SESSION['active_user_id'];
                $posts = renderDrafts($user_id); // Fetch drafts for the current user
                if (empty($posts)) {
                    echo '<h6 class="text-center display-6">Wow, such empty.</h6>';
                } else {
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
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="../assets/dist/js/adminlte.min.js"></script>
<script>
$(function () {
    bsCustomFileInput.init();
});
</script>
</body>
</html>
