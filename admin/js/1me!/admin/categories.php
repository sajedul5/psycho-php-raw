<!--Top Link -->
<?php
require_once('inc/top.php');

if(!isset($_SESSION['username'])){
  header('Location:login.php');
}
?>
  <!--navbar-->
<?php require_once('inc/nav.php'); ?>

<!--Update Category-->
  <?php
      if(isset($_GET['edit'])){
        $edit_id = $_GET['edit'];
      }
      if(isset($_POST['update'])){
        $cat_name = mysqli_real_escape_string($con, strtolower($_POST['cname']));
        $check_query = "SELECT * FROM categories WHERE category ='$cat_name'";
        $check_run = mysqli_query($con, $check_query);

        if(mysqli_num_rows($check_run) > 0){
          $up_error ="Category Already Exsit";
        }
        else {
          $update_query = "UPDATE categories  SET category ='$cat_name' WHERE id=$edit_id ";
          if(mysqli_query($con, $update_query)){
            $up_msg = "Category Has Been Updated";
          }
          else {
            $error = "Category Has not Been Updated";
          }
        }
      }
   ?>
<!--Category delete Query-->
<?php
  if(isset($_GET['del'])){
    $del_id =$_GET['del'];

    $del_query = "DELETE FROM categories WHERE id = '$del_id'";
    if(mysqli_query($con, $del_query)){
      $del_msg = "Category Has Been Deleted";
    }
    else {
      $del_error = "Category Has not Been Deleted";
    }
  }

 ?>
<!--Category Query Start-->
<?php
    if(isset($_POST['submit'])){
      $cat_name = mysqli_real_escape_string($con, strtolower($_POST['cname']));
      $check_query = "SELECT * FROM categories WHERE category ='$cat_name'";
      $check_run = mysqli_query($con, $check_query);

      if(mysqli_num_rows($check_run) > 0){
        $error ="Category Already Exsit";
      }
      else {
        $insert_query = "INSERT INTO categories (category) VALUES ('$cat_name')";
        if(mysqli_query($con, $insert_query)){
          $msg = "Category Has Been Added";
        }
        else {
          $error = "Category Has not Been Added";
        }
      }
    }

 ?>


<!--List Group-->
<div class="comtainer body">
  <div class="row">
    <?php require_once('inc/sidebar.php'); ?>
    <!--Dashboard-->
    <div class="col-md-9">
      <div class="Dashboard">
      <h1 class="text-muted"><i class="fa fa-folder-open" ></i>Categories <small>Different Categories</small></h1>
      <hr>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-tachometer" ></i>Dashboard</a></li>
        <li class="breadcrumb-item active"><i class="fa fa-folder-open" ></i>Categories</li>
      </ol>
      <?php
        if(isset($error)){
          echo "<span class='pull-right text-danger'>$error</span>";
        }
        elseif(isset(($msg)))  {
          echo "<span class='pull-right text-success'>$msg</span>";
        }
       ?>
<!--form /table-->

    <div class="row">
      <div class="col-md-6">
          <form class="" action="" method="post">
              <div class="form-group">
                <label for="category"><b>Category Name:</b> </label>
                <input type="text" name="cname" placeholder="Category Name" class="form-control" data-validation="required">
              </div>
              <input type="submit" name="submit" value="Add Category" class="btn btn-info">
          </form>

        <br> <br>
        <?php
          if(isset($_GET['edit'])){
            $edit_check_query = "SELECT * FROM categories WHERE id= $edit_id";
            $edit_check_run = mysqli_query($con, $edit_check_query);
            if(mysqli_num_rows($edit_check_run) > 0){

              $edit_row = mysqli_fetch_array($edit_check_run);
              $up_category = $edit_row['category'];


         ?>
        <hr>
         <br> <br>
        <!--Update Category-->
        <?php
          if(isset($up_error)){
            echo "<span class='pull-right text-danger'>$up_error</span>";
          }
          elseif(isset(($up_msg)))  {
            echo "<span class='pull-right text-success'>$up_msg</span>";
          }
         ?>
          <form class="" action="" method="post">
              <div class="form-group">
                <label for="category"><b>Category Upadate:</b> </label>
                <input type="text" name="cname" placeholder="Category Name" class="form-control" data-validation="required"
                value="<?php echo ucfirst($up_category); ?>">
              </div>
              <input type="submit" name="update" value="Update Category" class="btn btn-info">
          </form>
          <?php
            }
          }
          ?>
      </div>
      <div class="col-md-6">
        <?php
          if(isset($del_error)){
            echo "<span class='pull-right text-danger'>$del_error</span>";
          }
          elseif(isset(($del_msg)))  {
            echo "<span class='pull-right text-success'>$del_msg</span>";
          }
         ?>
      <table>
          <?php
            $get_query = "SELECT * FROM categories ORDER BY id DESC";
            $get_run = mysqli_query($con, $get_query);

            if(mysqli_num_rows($get_run) > 0){

           ?>
        </table>
          <table class="table table-hover text-muted ">
            <thead>
              <tr>
                <th>Sr #</th>
                <th>Category Name</th>
                <th>Posts</th>
                <th>Edit</th>
                <th>delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while($get_row = mysqli_fetch_array($get_run)){

                  $category_id = $get_row['id'];
                  $category_name = $get_row['category'];


               ?>
              <tr>
                <td><?php echo $category_id; ?></td>
                <td><?php echo ucfirst($category_name); ?></td>
                <td>12</td>
                <td><a href="categories.php?edit=<?php echo $category_id; ?>"><i class="fa fa-pencil text-info"></i></a></td>
                <td><a href="categories.php?del=<?php echo $category_id; ?>"><i class="fa fa-times text-danger"></i></a></td>
              </tr>
              <?php } ?>
            </tbody>

          </table>
          <?php
                }
                else {
                  echo "<center><h3> No Categories Available </h3></center>";
                }

           ?>
      </div>
    </div>

<!---->
    </div>
  </div>
</div>
</div>
<!--footer-->
<?php require_once('inc/footer.php'); ?>
