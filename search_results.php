<?php
require 'functions.php';

function searchBlogs($searchQuery) {
    $conn = connect();
    $sql = "SELECT posts.post_id, posts.title, posts.thumbnail, posts.content, categories.category_name,
                   user.fname, user.lname
            FROM posts
            INNER JOIN categories ON posts.category_id = categories.category_id
            INNER JOIN editor_blog ON posts.post_id = editor_blog.post_id
            INNER JOIN user ON editor_blog.id = user.id
            WHERE posts.status = 0
            AND (user.fname LIKE :search OR user.lname LIKE :search OR posts.title LIKE :search OR categories.category_name LIKE :search)";
    $query = $conn->prepare($sql);
    $searchParam = '%' . $searchQuery . '%';
    $query->bindParam(':search', $searchParam, PDO::PARAM_STR);
    $query->execute();
    $posts = $query->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $posts;
}

if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    $results = searchBlogs($searchQuery);

    if (count($results) > 0) {
        foreach ($results as $post) {
            ?>
 <div class="blog-item row border rounded-lg overflow-hidden h-md-300 position-relative col-md-12 bg-white" style="padding: 15px 15px 15px 10px; margin: 0 0 20px 2px;">
            
            <div class="col">
                <img src="<?php echo htmlspecialchars($post['thumbnail']); ?>" alt="" class="float-right rounded-lg" width="100%" height="100%" style="border-radius: 4px: object-fit: cover">
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
            <?php
        }
    } else {
        echo '<h6 style="width: 100%; text-align: center">No results found</h6>';
    }
}
?>
