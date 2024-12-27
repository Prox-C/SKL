<?php
  session_start();
  if (!isset($_SESSION['active_user'])) {
    header("Location: login.php"); // Redirect to login page
    exit;
  }
  
  require_once('../functions.php');
  $auditRecord = getCommentsAudit();
?>


<div class="wrapper">
  <!-- Navbar -->
  <?php include_once('../components/sidenav.php'); ?>

  <div class="content-wrapper" style="height: 600px">
    <div class="container" style="padding-top: 30px;">
        <p>Comments Audit Records</p>
    <table class="table table-sm table-hover text-nowrap">
    <thead style="position: sticky; top: 0; background-color: #f8f9fa; z-index: 1;">
        <tr>
            <th style="width: 10%;">Audit ID</th>
            <th style="width: 10%;">User ID</th>
            <th style="width: 20%;">Alias</th>
            <th style="width: 40%;">Comment</th>
            <th style="width: 10%;">Action Type</th>
            <th style="width: 10%;">Action Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $commentsAuditRecords = getCommentsAudit(); // Call the function to fetch data

        if (!empty($commentsAuditRecords)) {
            foreach ($commentsAuditRecords as $record) { ?>
                <tr>
                    <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['audit_id']); ?></td>
                    <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['id']); ?></td>
                    <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['alias']); ?></td>
                    <td style="vertical-align: middle;"><?php echo htmlspecialchars(strlen($record['comment']) > 50 ? substr($record['comment'], 0, 50) . '...' : $record['comment']); ?></td>
                    <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['action_type']); ?></td>
                    <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['action_date']); ?></td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="6" class="text-center">No records found</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

        
<!-- tbody -->
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
