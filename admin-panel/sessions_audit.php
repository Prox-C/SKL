<?php
session_start();
if (!isset($_SESSION['active_user'])) {
    header("Location: login.php"); // Redirect to login page
    exit;
}

require_once('../functions.php');
$sessions = getSessions();
?>

<div class="wrapper">
  <!-- Navbar -->
  <?php include_once('../components/sidenav.php'); ?>

  <div class="content-wrapper" style="height: 600px">
    <div class="container" style="padding-top: 30px;">
        <p>Session Records</p>
        <table class="table table-sm table-hover text-nowrap">
            <thead style="position: sticky; top: 0; background-color: #f8f9fa; z-index: 1;">
                <tr>
                    <th style="width: 10%;">Session ID</th>
                    <th style="width: 30%;">Email</th>
                    <th style="width: 20%;">Log Type</th>
                    <th style="width: 40%;">Date Logged</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($sessions)) {
                    foreach ($sessions as $session) { ?>
                        <tr>
                            <td style="vertical-align: middle;"><?php echo htmlspecialchars($session['session_id']); ?></td>
                            <td style="vertical-align: middle;"><?php echo htmlspecialchars($session['email']); ?></td>
                            <td style="vertical-align: middle;"><?php echo htmlspecialchars($session['log']); ?></td>
                            <td style="vertical-align: middle;"><?php echo htmlspecialchars($session['date_logged']); ?></td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="4" class="text-center">No session records found</td>
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
