<?php

function connect() // DATABASE CONNECTION
{
    $host = "localhost";
    $db = "skl_db";
    $user = "root";
    $password = "";
    $dsn = "mysql:host=$host;dbname=$db";

    try
    {
        $conn = new PDO($dsn, $user, $password);
        return $conn;
    }
    catch(PDOException $e) 
    {
        echo "Error: " . $e->getMessage();
		die();
    }
}

// USER-RELATED FUNCTIONS
function auth($email)
{
    $conn = connect();

    $query = $conn->prepare("SELECT * FROM `user` WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();
	$result = $query->fetch(PDO::FETCH_ASSOC);

	return $result;
}
function add_user($email, $fname, $lname, $password, $role)
{
    $conn = connect();

    // Check if the email already exists
    $check_query = $conn->prepare("SELECT COUNT(*) FROM `user` WHERE email = :email");
    $check_query->bindParam(':email', $email);
    $check_query->execute();
    $email_exists = $check_query->fetchColumn();

    if ($email_exists) {
        $conn = null;
        return "email_exists";
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = $conn->prepare("INSERT INTO `user` (email, fname, lname, password, role) VALUES (:email, :fname, :lname, :password, :role)");

    $query->bindParam(':email', $email);
    $query->bindParam(':fname', $fname);
    $query->bindParam(':lname', $lname);
    $query->bindParam(':password', $hashed_password);
    $query->bindParam(':role', $role);

    $response = $query->execute();

    if ($response) {
        $id = $conn->lastInsertId();
        $conn = null;
        return $id;
    } else {
        $conn = null;
        return FALSE;
    }
}
function get_users()
{
	$conn = connect(); 

	$query = $conn->prepare("SELECT * FROM user");  
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_ASSOC);

	return $result;
}
function update_user($id, $email, $fname, $lname, $password)
{
    $conn = connect();

    // Check if the email already exists for a different user
    $check_query = $conn->prepare("SELECT COUNT(*) FROM `user` WHERE email = :email AND id != :id");
    $check_query->bindParam(':email', $email);
    $check_query->bindParam(':id', $id);
    $check_query->execute();
    $email_exists = $check_query->fetchColumn();

    if ($email_exists) {
        $conn = null;
        return "email_exists";
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = $conn->prepare("UPDATE `user` SET email = :email, fname = :fname, lname = :lname, password = :password WHERE id = :id");

    $query->bindParam(':id', $id);
    $query->bindParam(':email', $email);
    $query->bindParam(':fname', $fname);
    $query->bindParam(':lname', $lname);
    $query->bindParam(':password', $hashed_password);

    $response = $query->execute();

    if ($response) {
        $conn = null;
        return true;
    } else {
        $conn = null;
        return FALSE;
    }
}
function delete_user($id, $current_user_id) 
{
    if ($id == 1) {
        return "error"; // Return a custom error message or code
    }

    if ($id == $current_user_id) {
        return "self_delete"; // Return a code indicating that the user is trying to delete their own account
    }
    
    $conn = connect();

    // Check the role of the user
    $query = $conn->prepare("SELECT role FROM user WHERE id = :id");
    $query->bindParam(':id', $id);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    // If the user is an editor, delete associated blogs and comments
    if ($user['role'] === "editor") {
        // Delete editor blogs associated with the user
        $query = $conn->prepare("DELETE FROM editor_blog WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();

        // Delete blogs associated with the user
        $query = $conn->prepare("DELETE FROM posts WHERE post_id IN (SELECT post_id FROM editor_blog WHERE id = :id)");
        $query->bindParam(':id', $id);
        $query->execute();

        // Delete comments associated with the posts of the user
        $query = $conn->prepare("DELETE FROM comments WHERE id IN (SELECT id FROM comment_blog WHERE post_id IN (SELECT post_id FROM editor_blog WHERE id = :id))");
        $query->bindParam(':id', $id);
        $query->execute();
    }

    // Delete the user regardless of role
    $query = $conn->prepare("DELETE FROM user WHERE id = :id");
    $query->bindParam(':id', $id);
    $response = $query->execute();

    $conn = null; 

    return $response; 
}
function count_users()
{
    $conn = connect(); 

	$query = $conn->prepare("SELECT COUNT(*) AS total_records from user");  
	$query->execute();
	$result = $query->fetch(PDO::FETCH_ASSOC);
    
	return $result['total_records'];
}

// CATEGORY RELATED FUNCTIONS
function add_category($category_name)
{
    $conn = connect();

    // Check if the category name already exists
    $check_query = $conn->prepare("SELECT COUNT(*) FROM `categories` WHERE category_name = :cat_name");
    $check_query->bindParam(':cat_name', $category_name);
    $check_query->execute();
    $category_exists = $check_query->fetchColumn();

    if ($category_exists) {
        $conn = null;
        return "category_exists";
    }

    // Insert the new category if it doesn't already exist
    $query = $conn->prepare("INSERT INTO `categories` (category_name) VALUES (:cat_name)");
    $query->bindParam(':cat_name', $category_name);

    $response = $query->execute();

    if ($response) {
        $id = $conn->lastInsertId();
        $conn = null;
        return $id;
    } else {
        $conn = null;
        return FALSE;
    }
}
function get_categories()
{
    $conn = connect();

    $query = $conn->prepare("SELECT * FROM `categories`");
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}
function update_category($id, $category_name)
{
    $conn = connect();

    $query = $conn->prepare("UPDATE `categories` SET category_name = :cat_name WHERE category_id = :id");
    $query->bindParam(':id', $id);
    $query->bindParam(':cat_name', $category_name);

    $response = $query->execute();

    if($response)
	{
		$id = $conn->lastInsertId();
		$conn = null;
		
		return $id;
	}
	else
	{
		$conn = null;
		return FALSE;
	}  
}
function delete_category($id) 
{
    $conn = connect();

    $query = $conn->prepare("DELETE FROM `categories` WHERE category_id = :id");
    $query->bindParam(':id', $id);

    $response = $query->execute();

    $conn = null; 

    return $response; 
}
function count_categories()
{
    $conn = connect(); 

	$query = $conn->prepare("SELECT COUNT(*) AS no_of_cat FROM categories");  
	$query->execute();
	$result = $query->fetch(PDO::FETCH_ASSOC);
    
	return $result['no_of_cat'];
}

// POST-RELATED FUNCTIONS
function publish($title, $thumbnail, $content, $status, $category_id, $editor) 
{
    $conn = connect();

    $conn->beginTransaction();

    try {
        // Insert into the posts table
        $query = $conn->prepare("INSERT INTO `posts` (title, thumbnail, content, status, category_id) VALUES (:title, :thumbnail, :content, :status, :cat_id)");
        $query->bindParam(':title', $title);
        $query->bindParam(':thumbnail', $thumbnail);
        $query->bindParam(':content', $content);
        $query->bindParam(':status', $status);
        $query->bindParam(':cat_id', $category_id);
        $query->execute();

        // Get the last inserted post_id
        $post_id = $conn->lastInsertId();

        // Insert into the editor_blog table
        $query = $conn->prepare("INSERT INTO `editor_blog` (id, post_id) VALUES (:user_id, :post_id)");
        $query->bindParam(':user_id', $editor);
        $query->bindParam(':post_id', $post_id);
        $query->execute();

        // Commit transaction
        $conn->commit();

        // Close connection
        $conn = null;

        return $post_id;

    } catch (Exception $e) {
        // Rollback transaction in case of error
        $conn->rollBack();

        // Close connection
        $conn = null;

        throw $e;
    }
}
function update_blog($title, $thumbnail, $content, $status, $category_id, $post_id)
{
    $conn = connect();

    $conn->beginTransaction();

    try {
        // Update the posts table
        $query = $conn->prepare("UPDATE `posts` SET title = :title, thumbnail = :thumbnail, content = :content, status = :status, category_id = :cat_id WHERE post_id = :post_id");
        $query->bindParam(':title', $title);
        $query->bindParam(':thumbnail', $thumbnail);
        $query->bindParam(':content', $content);
        $query->bindParam(':status', $status);
        $query->bindParam(':cat_id', $category_id);
        $query->bindParam(':post_id', $post_id);
        $query->execute();

        // Commit transaction
        $conn->commit();

        // Close connection
        $conn = null;

        return true;

    } catch (Exception $e) {
        // Rollback transaction in case of error
        $conn->rollBack();

        // Close connection
        $conn = null;

        throw $e;
    }
}
function renderAllPublishedBlogs()
{
    // Connect to the database
    $conn = connect(); // Assuming you have a function named connect() that returns a PDO connection

    // Prepare the SQL statement
    $sql = "SELECT posts.post_id, posts.title, posts.thumbnail, posts.content, categories.category_name,
                   user.fname, user.lname
            FROM posts
            INNER JOIN categories ON posts.category_id = categories.category_id
            INNER JOIN editor_blog ON posts.post_id = editor_blog.post_id
            INNER JOIN user ON editor_blog.id = user.id
            WHERE posts.status = 0
            ORDER BY posts.post_id DESC";

    // Prepare the statement
    $query = $conn->prepare($sql);

    // Execute the statement
    $query->execute();

    // Fetch all rows into an associative array
    $posts = $query->fetchAll(PDO::FETCH_ASSOC);

    // Close the database connection
    $conn = null;

    return $posts;
}
function renderBlogs($user_id)
{
    // Connect to the database
    $conn = connect(); // Assuming you have a function named connect() that returns a PDO connection

    // Prepare the SQL statement
    $sql = "SELECT posts.post_id, posts.title, posts.thumbnail, posts.content, categories.category_name,
                   user.fname, user.lname
            FROM editor_blog
            INNER JOIN posts ON editor_blog.post_id = posts.post_id
            INNER JOIN categories ON posts.category_id = categories.category_id
            INNER JOIN user ON editor_blog.id = user.id
            WHERE editor_blog.id = :user_id AND posts.status = 0";

    // Prepare the statement
    $query = $conn->prepare($sql);

    // Bind parameters
    $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    // Execute the statement
    $query->execute();

    // Fetch all rows into an associative array
    $posts = $query->fetchAll(PDO::FETCH_ASSOC);

    // Close the database connection
    $conn = null;

    return $posts;
}
function countAllBlogs() 
{
    $conn = connect();

    $query = $conn->prepare("SELECT COUNT(*) AS total_posts FROM posts WHERE status = 0");
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    
	return $result['total_posts'];
}
function renderDrafts($user_id)
{
    // Connect to the database
    $conn = connect(); // Assuming you have a function named connect() that returns a PDO connection

    // Prepare the SQL statement
    $sql = "SELECT posts.post_id, posts.title, posts.thumbnail, posts.content, categories.category_name,
                   user.fname, user.lname
            FROM editor_blog
            INNER JOIN posts ON editor_blog.post_id = posts.post_id
            INNER JOIN categories ON posts.category_id = categories.category_id
            INNER JOIN user ON editor_blog.id = user.id
            WHERE editor_blog.id = :user_id AND posts.status = 1";

    // Prepare the statement
    $query = $conn->prepare($sql);

    // Bind parameters
    $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    // Execute the statement
    $query->execute();

    // Fetch all rows into an associative array
    $posts = $query->fetchAll(PDO::FETCH_ASSOC);

    // Close the database connection
    $conn = null;

    return $posts;
}
function shortenContent($content, $char_limit) {
    // Check if the length of the content exceeds the character limit
    if (strlen($content) > $char_limit) {
        // Truncate the content to the specified character limit
        $shortened_content = substr($content, 0, $char_limit) . ' . . .';
    } else {
        // If the content length is within the limit, use the original content
        $shortened_content = $content;
    }
    return $shortened_content;
}   
function countuserBlogs($userId, $status) {
    // Establish a connection to the database
    $conn = connect();
    
    try {
        // Prepare the SQL query to count the blogs based on the user's ID and the status
        $query = $conn->prepare("
            SELECT COUNT(p.post_id) as blog_count 
            FROM posts p 
            JOIN editor_blog eb ON p.post_id = eb.post_id 
            WHERE eb.id = :user_id AND p.status = :status
        ");
        
        // Bind the parameters to the query
        $query->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $query->bindParam(':status', $status, PDO::PARAM_INT);
        
        // Execute the query
        $query->execute();
        
        // Fetch the result
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        // Close the connection
        $conn = null;
        
        // Return the count of blogs
        return $result['blog_count'];
        
    } catch (Exception $e) {
        // Handle any errors
        $conn = null;
        throw $e;
    }
}

// COMMENT-RELATED FUNCRIONS
function add_comment($alias, $comment, $post_id) 
{
    $conn = connect();

    $conn->beginTransaction();

    try {
        // Insert into the comment table
        $query = $conn->prepare("INSERT INTO `comments` (alias, comment) VALUES (:alias, :comment)");
        $query->bindParam(':alias', $alias);
        $query->bindParam(':comment', $comment);
        $query->execute();

        // Get the last inserted comment_id
        $comment_id = $conn->lastInsertId();

        // Insert into the comment_post table
        $query = $conn->prepare("INSERT INTO `comment_blog` (id, post_id) VALUES (:comment_id, :post_id)");
        $query->bindParam(':comment_id', $comment_id);
        $query->bindParam(':post_id', $post_id);
        $query->execute();

        // Commit transaction
        $conn->commit();

        // Close connection
        $conn = null;

        return $comment_id;

    } catch (Exception $e) {
        // Rollback transaction in case of error
        $conn->rollBack();

        // Close connection
        $conn = null;

        throw $e;
    }
}
function get_comments($post_id) 
{
    $conn = connect();

    try {
        $query = $conn->prepare("SELECT c.alias, c.comment FROM comments c INNER JOIN comment_blog cb ON c.id = cb.id WHERE cb.post_id = :post_id");
        $query->bindParam(':post_id', $post_id);
        $query->execute();

        $comments = $query->fetchAll(PDO::FETCH_ASSOC);

        // Close connection
        $conn = null;

        return $comments;

    } catch (Exception $e) {
        // Close connection
        $conn = null;

        throw $e;
    }
}
function count_comments($post_id) 
{
    $conn = connect();

    try {
        $query = $conn->prepare("SELECT COUNT(*) AS comment_count FROM comment_blog WHERE post_id = :post_id");
        $query->bindParam(':post_id', $post_id);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Close connection
        $conn = null;

        return $result['comment_count'];

    } catch (Exception $e) {
        // Close connection
        $conn = null;

        throw $e;
    }
}
?>