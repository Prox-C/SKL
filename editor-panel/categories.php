<?php
  session_start();
  require_once('../functions.php');

  if(isset($_POST['create']))
  {
    $category_name= (string) $_POST['category_name'];
  
    add_category($category_name);
    echo"<script>location.href='categories.php'</script>";
  }

  if(isset($_POST['save'])) 
  {
    $id = $_POST['edit_category'];
    $category_name = $_POST['xcategory_name'];

    update_category($id, $category_name);

    echo"<script>location.href='categories.php'</script>";
  }

  if(isset($_POST['delete'])) 
  {
    $id = $_POST['delete_category'];

    delete_category($id);
    echo"<script>location.href='categories.php'</script>";
  }
?>
<div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="TRUE">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header bg-indigo">
            <h5 class="modal-title" id="confirmAlert"> New Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="card">
              <!-- /.card-header -->
              <!-- form start -->
              <form action="categories.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="category">Category Name</label>
                    <input name="category_name" type="text" class="form-control" id="name" placeholder="Example: Tech, Politics, Lifestyle, etc." required>
                  </div>
                </div>
                <div class="card-footer">
                  <input name="create" type="submit" class="btn bg-indigo btn-block" value="Create">
                </div>
              </form>
            </div>
        </div>
        </div>
    </div>
  </div>


<div class="wrapper">
  <!-- Navbar -->
  <?php include_once('../components/editor-nav.php'); ?>

  <div class="content-wrapper bg-light" style="height: 600px">
    <div class="container" style="padding-top: 30px;">
        <h1 class="display-5" style="font-size: 42px; font-weight: 600; font-family: 'Poppins'">Categories</h1>
        <p class="text-muted" style="position: relative; bottom: 12px; font-size: 22px; font-weight: 450; font-family: 'Poppins'"> Organize Blogs</p>
        
        <a href="" class="btn bg-indigo" style="margin-bottom: 30px;" data-toggle="modal" data-target="#add-category">Create new<svg id="Layer_1" viewBox="0 0 24 24"xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" height="16" fill="#fff" style="position: relative; bottom: 2px; margin-left: 5px"><path d="m12 0a12 12 0 1 0 12 12 12.013 12.013 0 0 0 -12-12zm4 13h-3v3a1 1 0 0 1 -2 0v-3h-3a1 1 0 0 1 0-2h3v-3a1 1 0 0 1 2 0v3h3a1 1 0 0 1 0 2z"/></svg></a>

<div class="card" style="width: 60%">
      <div class="card-header bg-light">
        <p class="card-title">Topics</p>
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="max-height: 314px; overflow-y: auto">
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>Category</th>
              <th colspan="2" style="text-align: center" width="20%">Actions</th>
            </tr>
          </thead>
          <tbody>
                    <?php
                      $result = get_categories();

                      if(!empty($result))
                      {
                        foreach ($result as $record) 
                        { 
                    ?>
                          <tr style="padding: 0;">

                            <td><?php echo $record['category_name']; ?></td>
                           
                            <td  style="padding: 6px 5px 0 0;">
                              <form method="post" action="categories.php" style="margin: 0;">
                                <input type="hidden" name="edit_record" value="<?php echo $record['category_id']; ?>">
                                <button type="button" class="btn btn-outline-info btn-sm btn-block" data-toggle="modal" data-target="#edit_cat_<?php echo $record['category_id']; ?>" style="margin: 0;"> Edit </button>
                              </form>
                            </td>
                            <td  style="padding: 6px 5px 0 0;">
                              <!-- <form action="categories.php" method="post" style="margin: 0;">
                              <button type="button" class="btn btn-outline-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_cat_<?php echo $record['category_id'];?>" style="margin: 0;"> Delete </button>
                              </form> -->
                            </td>
                            <div class="modal fade" id="delete_cat_<?php echo $record['category_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="confirmAlert">Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        All posts with this category will be arhived. Do you wish to proceed?
                                      </div>
                                      <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-outline-secondary btn-sm btn-block" data-dismiss="modal">Cancel</button>                                         -->
                                        <form action="categories.php" method="post">
                                        <input type="hidden" name="delete_category" value="<?php echo $record['category_id']; ?>">
                                        <input name="delete" type="submit" class="btn btn-danger btn-block btn-sm" value="Delete category">
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal fade" id="edit_cat_<?php echo $record['category_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="TRUE">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header bg-info">
            <h5 class="modal-title" id="confirmAlert"> Edit Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="card">
              <!-- /.card-header -->
              <!-- form start -->
              <form action="categories.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="category">Category Name</label>
                    <input name="xcategory_name" type="text" class="form-control" id="name" placeholder="Example: Tech, Politics, Lifestyle, etc." value="<?php echo $record['category_name'];?>">
                  </div>
                </div>
                <div class="card-footer">
                  <input type="hidden" name="edit_category" value="<?php echo $record['category_id']; ?>">
                  <input name="save" type="submit" class="btn bg-info btn-block" value="Save changes">
                </div>
              </form>
            </div>
        </div>
        </div>
    </div>
  </div>


<div class="wrapper">
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
<!-- tbody -->
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
