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
            <div class="blog-item row border rounded overflow-hidden shadow-sm h-md-300 position-relative col-md-11" style="padding: 15px 10px 15px 15px; margin: 0 0 20px 2px">
                <div class="col-md-7 d-flex flex-column">
                    <h3 class="display-6 title" style="font-weight: 750; font-family: 'Poppins'; font-size: 28px"><?php echo htmlspecialchars($post['title']); ?></h3>
                    <h5 class="text-muted poster" style="position: relative; bottom: 10px; font-size: 18px">By: <?php echo htmlspecialchars($post['fname'] . ' ' . $post['lname']); ?></h5>
                    <h6 class="text-muted ctgry" style="position: relative; bottom: 10px; font-weight: 750"><?php echo htmlspecialchars($post['category_name']); ?></h6>
                    <p style="width: 100%;" class="flex-grow-1"><?php echo htmlspecialchars(shortenContent($post['content'], 300)); ?></p>
                    <a class="mt-auto text-indigo" style="font-family: 'Poppins'; font-weight: 500" href="post.php?post_id=<?php echo htmlspecialchars($post['post_id']); ?>&title=<?php echo urlencode($post['title']); ?>&category=<?php echo urlencode($post['category_name']); ?>&thumbnail=<?php echo urlencode($post['thumbnail']); ?>&content=<?php echo urlencode($post['content']); ?>&fname=<?php echo urlencode($post['fname']); ?>&lname=<?php echo urlencode($post['lname']); ?>">Read more</a>
                </div>
                <div class="col">
                    <img src="<?php echo htmlspecialchars($post['thumbnail']); ?>" alt="" class="float-right" width="100%" height="100%" style="border-radius: 4px">
                </div>
            </div>
            <?php
        }
    } else {
        echo '<h6 style="width: 100%; text-align: center">No results found</h6>';
    }
}
?>
