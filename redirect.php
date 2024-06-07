<?php
session_start();
require_once('functions.php');

// Check if form was submitted
if(isset($_POST['login'])) {
    // Validate that both username and password are not empty
    if(empty($_POST['uname']) || empty($_POST['password'])) {
        echo "<script>alert('Both username and password are required.');</script>";
        echo "<script>location.href='login.php'</script>"; // Redirect back to the login page if validation fails
        exit; // Stop further script execution
    }

    $username = (string)$_POST['uname'];
    $password = (string)$_POST['password'];

    $user = auth($username); // Assume auth is a function that retrieves user details from the database

    if(!empty($user)) {
        // Use password_verify to compare the input password with the stored hashed password
        if (password_verify($password, $user['password'])) {
    // Set session variables on successful login
    $_SESSION['active_user'] = $user['fname'];
    $_SESSION['active_user_id'] = $user['id'];

    // Redirect based on user role
    if ($user['role'] == "admin") {
        echo"<script>location.href='admin-panel/admin.php'</script>";
    } else if ($user['role'] == "editor") {  
        echo"<script>location.href='editor-panel/editor.php'</script>";
    }
} else {
    echo"<script>alert('Wrong Password');</script>";
    echo"<script>location.href='login.php'</script>";
}

    } else {
        echo"<script>alert('Account does not exist');</script>";
        echo"<script>location.href='login.php'</script>";
    }
}
?>
