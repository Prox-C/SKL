<?php
  session_start();
  if (!isset($_SESSION['active_user'])) {
    header("Location: login.php"); // Redirect to login page
    exit;
  }
  
  require_once('../functions.php');

  $auditRecords = getUsersAudit();
?>


  <!-- Navbar -->
  <?php include_once('../components/sidenav.php'); ?>

  <div class="content-wrapper" style="height: 600px">
    <div class="container" style="padding-top: 30px;">
    <p>Users Audit Record</p>
    <div class="card-body table-responsive p-0" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd;">
    <table class="table table-sm table-hover text-nowrap">
        <thead style="position: sticky; top: 0; background-color: #f8f9fa; z-index: 1;">
            <tr>
                <th style="width: 5%;">Audit ID</th>
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
            <?php
            $auditRecords = getPostsAudit(); // Call the function to fetch data

            if (!empty($auditRecords)) {
                foreach ($auditRecords as $record) { ?>
                    <tr>
                        <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['audit_id']); ?></td>
                        <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['post_id']); ?></td>
                        <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['title']); ?></td>
                        <td style="vertical-align: middle;"> <img src="../<?php echo htmlspecialchars($record['thumbnail']); ?>" alt=""  width="100%" height="60px" style="object-fit: cover">
                        
                        </td>
                        <td style="vertical-align: middle;"><?php echo htmlspecialchars(strlen($record['content']) > 50 ? substr($record['content'], 0, 50) . '...' : $record['content']); ?></td>
                        <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['status']); ?></td>
                        <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['category_id']); ?></td>
                        <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['action_type']); ?></td>
                        <td style="vertical-align: middle;"><?php echo htmlspecialchars($record['action_date']); ?></td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="9" class="text-center">No records found</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
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
