<?php
session_start();
if (!isset($_SESSION['active_user'])) {
    header("Location: login.php"); // Redirect to login page
    exit;
}

require_once('../functions.php');

// Fetch feedback entries from the database
$feedbacks = getFeedbacks(); // Ensure `get_feedbacks()` is defined in functions.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
    <!-- Include your CSS and scripts -->
</head>
<body>
<div class="wrapper">
    <!-- Navbar -->
    <?php include_once('../components/sidenav.php'); ?>

    <div class="content-wrapper" style="height: 600px;">
        <div class="container" style="padding-top: 30px;">
            <h1 class="display-5" style="font-size: 42px; font-weight: 600; font-family: 'Poppins'">Feedbacks</h1>
            <p class="text-muted" style="position: relative; bottom: 12px; font-size: 22px; font-weight: 450; font-family: 'Poppins'">User Engagement</p>

            <div class="card" style="font-family: 'Poppins';">
                <div class="card-header bg-light">
                    <p class="card-title">Feedback Entries</p>
                </div>
                <div class="card-body table-responsive p-0" style="max-height: 316px; overflow-y: auto;">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Content</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($feedbacks)) {
                                foreach ($feedbacks as $feedback) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($feedback['id']) . "</td>";
                                    echo "<td>" . htmlspecialchars($feedback['content']) . "</td>";
                                    echo "<td>" . htmlspecialchars($feedback['rating']) . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3' class='text-center'>No feedbacks available</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
</body>
</html>
