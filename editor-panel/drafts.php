<?php
session_start();
require_once('../functions.php');

?>

<div class="wrapper">
  <?php include_once('../components/editor-nav.php'); ?>
  
  <div class="content-wrapper bg-light" style="height: 600px; overflow-y: auto;"> 
    <div class="container container-fluid">
      <div class="postheader bg-light" style="position: absolute; width: 80%; height: 140px; padding-top: 30px; padding-right: 50px; z-index: 5; border: 0;">
        <h1 class="display-5" style="font-size: 42px; font-weight: 600; font-family: 'Poppins'">My Drafts</h1>
        <p class="text-muted" style="position: relative; bottom: 12px; font-size: 22px; font-weight: 450; font-family: 'Poppins'">Archived blogs</p>
      </div>
      
      <div class="bloglist" style="padding-top: 150px">
        <?php
        $user_id = $_SESSION['active_user_id'];
        $posts = renderDrafts($user_id);
        if (empty($posts)) {
            echo '<h6 class="text-center display-6">Wow, such empty.</h6>';
        } else {
            foreach ($posts as $post) {
                ?>
                <div class="blog-item row border rounded overflow-hidden shadow-sm h-md-250 position-relative col-md-11" style="padding: 15px 10px 15px 15px; margin: 0 0 20px 2px">
                    <div class="col-md-7 d-flex flex-column">
                        <h3 class="display-6 title" style="font-weight: 750; font-family: 'Poppins'"><?php echo htmlspecialchars($post['title']); ?></h3>
                        <h5 class="text-muted poster">By: <?php echo htmlspecialchars($post['fname'] . ' ' . $post['lname']); ?></h5>
                        <h6 class="text-muted ctgry"><?php echo htmlspecialchars($post['category_name']); ?></h6>
                        <p class="flex-grow-1"><?php echo htmlspecialchars(shortenContent($post['content'], 300)); ?></p>
                        <a class="mt-auto text-indigo" style="font-family: 'Poppins'; font-weight: 500" href="view_post.php?post_id=<?php echo htmlspecialchars($post['post_id']); ?>&title=<?php echo urlencode($post['title']); ?>&category=<?php echo urlencode($post['category_name']); ?>&thumbnail=<?php echo urlencode($post['thumbnail']); ?>&content=<?php echo urlencode($post['content']); ?>"> View </a>
                    </div>
                    <div class="col">
                        <img src="../<?php echo htmlspecialchars($post['thumbnail']); ?>" alt="" class="float-right" width="100%" height="100%" style="border-radius: 4px: object-fit: cover;">
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
