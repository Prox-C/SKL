<?php
session_start();
if (!isset($_SESSION['active_user'])) {
    header("Location: login.php"); // Redirect to login page
    exit;
  }
  
require_once('../functions.php');

if (isset($_POST['publish']) || isset($_POST['save'])) {
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

    // Validate thumbnail
    $thumbnail_path = '';
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
        // Check if publish or save as draft
        $status = isset($_POST['publish']) ? 0 : 1; // Corrected: 1 for publish, 0 for draft
        publish($title, $thumbnail_path, $content, $status, $category_id, $_SESSION['active_user_id']);
        
        echo "<script>location.href='blogs.php'</script>";
    } else {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
        echo "<script>location.href='new_blog.php'</script>";
    }
}
?>





    <div class="wrapper">
    <!-- Navbar -->
    <?php include_once('../components/editor-nav.php'); ?>

    <div class="content-wrapper bg-light" style="height: 600px">
        <div class="container" style="padding-top: 30px;">
            <h1 class="display-5" style="font-size: 42px; font-weight: 600; margin-bottom: 30px">New Blog</h1>       
            <div class="container-fluid">
                <form action="new_blog.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Thumbnail</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail" required>
                                <label class="custom-file-label" for="thumbnail">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="Untitled" required>
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="" disabled selected>Select category</option>
                                <?php
                                    $categories = get_categories(); // Assuming get_categories() returns an array of category objects
                                    foreach ($categories as $category) {
                                        echo "<option value='".$category['category_id']."'>".$category['category_name']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">    
                            <label for="content">Body</label>
                            <textarea class="form-control" id="content" name="content" rows="4" placeholder="Enter content" style="height:400px"></textarea required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-auto ml-auto">
                        <input type="submit" class="btn bg-secondary" name="save" value="Save as draft">
                            <input type="submit" class="btn bg-indigo" name="publish" value="Publish blog">
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
