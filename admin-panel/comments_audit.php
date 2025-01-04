<?php
session_start();
if (!isset($_SESSION['active_user'])) {
    header("Location: login.php"); // Redirect to login page
    exit;
}

require_once('../functions.php');
$commentsAuditRecords = getCommentsAudit();
?>

<div class="wrapper">
  <!-- Navbar -->
  <?php include_once('../components/sidenav.php'); ?>

  <div class="content-wrapper" style="min-height: 600px;">
    <div class="container" style="padding-top: 30px;">
        <p class="h5 mb-4">Comments Audit Records</p>
        <div class="card">
            <div class="card-body table-responsive p-0" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th style="width: 10%;">ID</th>
                            <th style="width: 10%;">User ID</th>
                            <th style="width: 20%;">Alias</th>
                            <th style="width: 40%;">Comment</th>
                            <th style="width: 10%;">Action Type</th>
                            <th style="width: 10%;">Action Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($commentsAuditRecords)) { ?>
                            <?php foreach ($commentsAuditRecords as $record) { ?>
                                <tr>
                                    <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['audit_id']); ?></td>
                                    <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['id']); ?></td>
                                    <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['alias']); ?></td>
                                    <td style="vertical-align: middle;">
                                        <?php
                                        echo htmlspecialchars(strlen($record['comment']) > 50 
                                            ? substr($record['comment'], 0, 50) . '...' 
                                            : $record['comment']);
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['action_type']); ?></td>
                                    <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['action_date']); ?></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="6" class="text-center">No records found</td>
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
