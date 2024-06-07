<?php
session_start();
require_once('../functions.php');

// Retrieve the values from the URL
$post_id = $_GET['post_id'];
$title = urldecode($_GET['title']);
$category = urldecode($_GET['category']);
$thumbnail = urldecode($_GET['thumbnail']);
$content = urldecode($_GET['content']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $category_id = $_POST['category'];

    // Validate title
    if (empty($title)) {
        $errors[] = "Title is required.";
    }

    // Validate content
    if (empty($content)) {
        $errors[] = "Content is required.";
    }

    // Validate category
    if (empty($category_id)) {
        $errors[] = "Category is required.";
    }

    $thumbnail_path = $thumbnail; // default to existing thumbnail

    // Validate thumbnail
    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] != UPLOAD_ERR_NO_FILE) {
        if ($_FILES['thumbnail']['error'] != UPLOAD_ERR_OK) {
            $errors[] = "Failed to upload file.";
        } else {
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($_FILES['thumbnail']['type'], $allowed_types)) {
                $errors[] = "Only JPEG, PNG, and GIF files are allowed.";
            } elseif ($_FILES['thumbnail']['size'] > 2000000) { // 2MB limit
                $errors[] = "File size should not exceed 2MB.";
            } else {
                // Define the upload directory using an absolute path
                $upload_dir = __DIR__ . '/../assets/thumbnails/';
                $uploaded_file = $upload_dir . basename($_FILES['thumbnail']['name']);

                // Ensure the upload directory exists
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }

                if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uploaded_file)) {
                    // Save the relative path in the database
                    $thumbnail_path = 'assets/thumbnails/' . basename($_FILES['thumbnail']['name']);
                } else {
                    $errors[] = "Failed to move uploaded file.";
                }
            }
        }
    }

    if (empty($errors)) {
        // Check which submit button was used
        if (isset($_POST['publish'])) {
            $status = 0; // Set status to 'published' when 'Save changes' is pressed
        } elseif (isset($_POST['save'])) {
            $status = 1; // Set status to 'draft' when 'Archive' is pressed
        }

        try {
            update_blog($title, $thumbnail_path, $content, $status, $category_id, $post_id);
            echo "Post updated successfully!";
            echo "<script>location.href='blogs.php'</script>";
        } catch (Exception $e) {
            echo "Failed to update post: " . $e->getMessage();
        }
    } else {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
        echo "<script>location.href='new_blog.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Post</title>
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-dark bg-gray-dark sticky-top" style="height: 10vh;">
    <div class="container">
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Right navbar links -->
      </div>
    </div>
  </nav>
  <!-- /.navbar -->

  <div class="content-wrapper bg-light" style="height: 600px">
    <div class="container" style="padding-top: 30px;">
      <h1 class="display-5" style="font-size: 42px; font-weight: 600; margin-bottom: 30px">Update Blog</h1>       
      <div class="container-fluid">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="form-group col-md-4">
              <label for="current_thumbnail">Current Thumbnail</label>
              <div>
                <img src="../<?php echo htmlspecialchars($thumbnail); ?>" alt="Current Thumbnail" style="width: 100%; height: auto;">
              </div>
            </div>

            <div class="form-group col-md-4">
              <label for="thumbnail">Change Thumbnail</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                <label class="custom-file-label" for="thumbnail">Choose file</label>
              </div>
            </div>

            <div class="form-group col-md-4">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="<?php echo htmlspecialchars($title); ?>" required>
            </div>

            <div class="form-group col-md-4">
              <label for="category">Category</label>
              <select class="form-control" id="category" name="category" required>
                <option value="" disabled selected>Select category</option>
                <?php
                  $categories = get_categories();
                  foreach ($categories as $cat) {
                    $selected = ($cat['category_name'] == $category) ? 'selected' : '';
                    echo "<option value='".$cat['category_id']."' $selected>".$cat['category_name']."</option>";
                  }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-12">    
              <label for="content">Body</label>
              <textarea class="form-control" id="content" name="content" rows="4" placeholder="Enter content" style="height: 250px" ><?php echo htmlspecialchars($content); ?></textarea>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-auto ml-auto">
              <input type="submit" class="btn bg-secondary" name="save" value="Archive">
              <input type="submit" class="btn bg-indigo" name="publish" value="Publish">
            </div>
          </div>
        </form>
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
</body>
</html>
