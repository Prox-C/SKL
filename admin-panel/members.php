<?php
  session_start();
  if (!isset($_SESSION['active_user'])) {
    header("Location: login.php"); // Redirect to login page
    exit;
  }

  require_once('../functions.php');
  
  $_SESSION['total_users'] = count_users();

  if (isset($_POST['delete'])) 
  {
      $delete_account = $_POST['delete_record'];
      $current_user_id = $_SESSION['active_user_id']; // Assuming you store user ID in session
      $result = delete_user($delete_account, $current_user_id);
  
      if ($result === true) 
      {
          echo "<script>location.href='members.php'</script>";
          exit();
      } 
      elseif ($result === "error") 
      {
          echo "<script>alert('This account can\'t be deleted');</script>";
      } 
      elseif ($result === "self_delete") 
      {
          echo "<script>alert('You can\\'t delete your own account');</script>";
      } 
      else 
      {
          // Show an error message
          echo "Error deleting record.";
      }
  }
  

  if (isset($_POST['register'])) 
  {
      $email = (string) $_POST['email'];
      $fname = ucwords((string) $_POST['fname']);
      $lname = ucwords((string) $_POST['lname']);
      $password = (string) $_POST['password'];
      $role = (string) $_POST['role'];
  
      $result = add_user($email, $fname, $lname, $password, $role);
  
      if ($result === "email_exists") 
      {
          echo "<script>alert('This email is already registered. Please use a different email.');</script>";
      } 
      else 
      {
          echo "<script>location.href='members.php'</script>";
      }
  }

  if(isset($_POST['save']))
  {
    $id = (string) $_POST['update_id'];
    $email = (string) $_POST['xemail'];
    $password = (string) $_POST['xpassword'];
    $fname = ucwords((string) $_POST['xfname']);
    $lname = ucwords((string) $_POST['xlname']);
    
    update_user($id, $email, $fname, $lname, $password);
    echo"<script>location.href='members.php'</script>";
  }  


?>

<div class="wrapper">
  <!-- Navbar -->
  <?php include_once('../components/sidenav.php'); ?>


  

  <div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="TRUE">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header bg-indigo">
            <h5 class="modal-title" id="confirmAlert"> User Registration</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="card">
              <!-- /.card-header -->
              <!-- form start -->
              <form action="members.php" method="POST">
                <div class="card-body container">
                  <div class="row mb-2">
                  <div class="form-group col-md-6">
                    <label for="fname">First Name</label>
                    <input style="text-transform: capitalize" name="fname" type="text" class="form-control" id="name" placeholder="Enter First Name" required >
                  </div>
                  <div class="form-group col-md-6">
                    <label for="lname">Last Name</label>
                    <input style="text-transform: capitalize" name="lname" type="text" class="form-control" id="name" placeholder="Enter Last Name" required>
                  </div>
                  </div>
               
                 
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Enter Email Address" required> 
                  </div>
                  <div class="form-group">  
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="A-Z, 1-9, No special characters" required>
                  </div>
                  <div class="form-group">
                    <span>
                      <label for="user_role">User Role</label></span><br>
                      <select name="role" class="form-control" required>
                        <option value="admin">Admin</option>
                        <option value="editor">Editor</option>
                      </select>
                  </div>
                </div>
                <div class="card-footer">
                  <input name="register" type="submit" class="btn bg-indigo btn-block" value="Create account">
                </div>
              </form>
            </div>
        </div>
        </div>
    </div>
  </div>


  <div class="content-wrapper" style="height: 600px">
    <div class="container" style="padding-top: 30px; padding-left: 15px">
        <h1 class="display-5" style="font-size: 42px; font-weight: 600; font-family: 'Poppins'">Members</h1>
        <p class="text-muted" style="position: relative; bottom: 12px; font-size: 22px; font-weight: 450; font-family: 'Poppins'"> Manage Users </p>

        <a href="" class="btn bg-indigo" style="margin-bottom: 30px;" data-toggle="modal" data-target="#add-user">Register new<svg id="Layer_1" viewBox="0 0 24 24"xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" height="16" fill="#fff" style="position: relative; bottom: 2px; margin-left: 5px"><path d="m12 0a12 12 0 1 0 12 12 12.013 12.013 0 0 0 -12-12zm4 13h-3v3a1 1 0 0 1 -2 0v-3h-3a1 1 0 0 1 0-2h3v-3a1 1 0 0 1 2 0v3h3a1 1 0 0 1 0 2z"/></svg></a>

        <div class="card">
              <div class="card-header bg-light">
                <p class="card-title">Registered Users (<?php echo $_SESSION['total_users'] ?>)</p>
                <div class="card-tools">
                  <!-- <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn bg-indigo">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div> -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="max-height: 316px; overflow-y: auto">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Email</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Role</th>
                      <th colspan="2" style="text-align: center" width="12%">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $result = get_users();
                      // var_dump($result);

                      if(!empty($result))
                      {
                        foreach ($result as $record) 
                        { 
                    ?>
                          <tr style="padding: 0;">

                            <td><?php echo $record['email']; ?></td>
                            <td><?php echo $record['fname']; ?></td>
                            <td><?php echo $record['lname']; ?></td>
                            <td  style="text-transform: capitalize;"><?php echo $record['role']; ?></td>
                            <td  style="padding: 6px 5px 0 0;">
                              <form method="post" action="members.php" style="margin: 0;">
                                <input type="hidden" name="edit_record" value="<?php echo $record['id']; ?>">
                                <button type="button" class="btn btn-outline-info btn-sm btn-block" data-toggle="modal" data-target="#edit_user_<?php echo $record['id']; ?>" style="margin: 0;"> Edit </button>
                              </form>
                            </td>
                            <td  style="padding: 6px 5px 0 0;">
                            <?php 
                            if($_SESSION['active_user_id'] != $record['id']) 
                            {
                              ?>
                            <form action="members.php" method="post" style="margin: 0;">
                              <button type="button" class="btn btn-outline-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_acc_<?php echo $record['id'];?>" style="margin: 0;"> Delete </button>
                              </form>
                            <?php
                            }
                            else
                            {
                              ?>
                            
                              <button type="button" class="btn btn-secondary btn-sm btn-block" style="margin: 0;" disabled> Delete </button>
                              
                            <?php
                            }
                            ?>
                            </td>
                            <div class="modal fade" id="delete_acc_<?php echo $record['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="confirmAlert">Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Are you sure you want to unregister this user?
                                      </div>
                                      <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-outline-secondary btn-sm btn-block" data-dismiss="modal">Cancel</button>                                         -->
                                        <form action="members.php" method="post">
                                        <input type="hidden" name="delete_record" value="<?php echo $record['id']; ?>">
                                        <input name="delete" type="submit" class="btn btn-danger btn-block btn-sm" value="Unregister account">
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal fade" id="edit_user_<?php echo $record['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="TRUE">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h5 class="modal-title" id="confirmAlert"> User Information</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="card">
                                              <!-- /.card-header -->
                                              <!-- form start -->
                                              <form action="members.php" method="post">
                                                <div class="card-body container">
                                                  <div class="row mb-2">
                                                  <div class="form-group col-md-6">
                                                    <label for="fname">First Name</label>
                                                    <input style="text-transform: capitalize" name="xfname" type="text" class="form-control" id="name" placeholder="Enter First Name" value="<?php echo $record['fname'];?>" required>
                                                  </div>
                                                  <div class="form-group col-md-6">
                                                    <label for="lname">Last Name</label>
                                                    <input style="text-transform: capitalize" name="xlname" type="text" class="form-control" id="name" placeholder="Enter Last Name" value="<?php echo $record['lname'];?>" required>
                                                  </div>
                                                  </div>
                                              
                                                
                                                  <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input name="xemail" type="text" class="form-control" id="email" placeholder="Enter Email Address" value="<?php echo $record['email'];?>" required> 
                                                  </div>
                                                  <div class="form-group">  
                                                    <label for="password">Password</label>
                                                    <input name="xpassword" type="password" class="form-control" id="password" placeholder="Enter New Password" required>
                                                  </div>
                                                </div>
                                                <div class="card-footer">
                                                  <input type="hidden" value="<?php echo $record['id']; ?>" name="update_id">
                                                  <input name="save" type="submit" class="btn bg-info btn-block" value="Save changes">
                                                </div>
                                              </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                  </div>
                              </tr>
                        <?php
                        }
                      } 
                      else
                      {
                        ?>
                        <tr>
                          <td colspan="7" class="text-center">No records found</td> 
                        </tr>
                        <?php
                      } 
                    ?>
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
