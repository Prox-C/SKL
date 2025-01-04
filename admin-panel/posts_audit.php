<?php
session_start();
if (!isset($_SESSION['active_user'])) {
    header("Location: login.php"); // Redirect to login page
    exit;
}

require_once('../functions.php');
$auditRecords = getPostsAudit();
?>

<div class="wrapper">
  <!-- Navbar -->
  <?php include_once('../components/sidenav.php'); ?>

  <div class="content-wrapper" style="min-height: 600px;">
    <div class="container" style="padding-top: 30px;">
        <p class="h5 mb-4">Posts Audit Record</p>
        <div class="card">
            <div class="card-body table-responsive p-0" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th style="width: 5%;">ID</th>
                            <th style="width: 5%;">Post ID</th>
                            <th style="width: 15%;">Title</th>
                            <th style="width: 10%;">Thumbnail</th>
                            <th style="width: 25%;">Content</th>
                            <th style="width: 5%;">Status</th>
                            <th style="width: 5%;">Category ID</th>
                            <th style="width: 15%;">Action Type</th>
                            <th style="width: 15%;">Action Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($auditRecords)) { ?>
                            <?php foreach ($auditRecords as $record) { ?>
                                <tr>
                                    <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['audit_id']); ?></td>
                                    <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['post_id']); ?></td>
                                    <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['title']); ?></td>
                                    <td style="vertical-align: middle;">
                                        <img src="../<?php echo htmlspecialchars($record['thumbnail']); ?>" 
                                             alt="Thumbnail" 
                                             width="100%" 
                                             height="60px" 
                                             style="object-fit: cover;">
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <?php
                                        echo htmlspecialchars(strlen($record['content']) > 50 
                                            ? substr($record['content'], 0, 50) . '...' 
                                            : $record['content']);
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['status']); ?></td>
                                    <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['category_id']); ?></td>
                                    <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['action_type']); ?></td>
                                    <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['action_date']); ?></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="9" class="text-center">No records found</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>

<!-- Scripts -->
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
