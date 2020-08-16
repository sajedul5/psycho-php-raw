<!--Top Link -->
<?php
 require_once('inc/top.php');

if(!isset($_SESSION['username'])){
  header('Location:login.php');
}
$session_username=$_SESSION['username'];
$session_author_image=$_SESSION['image'];
 ?>
 <style >
   .post-data{
     width: 100%;
   }
 </style>
  <!--navbar-->
<?php require_once('inc/nav.php'); ?>


<!--List Group-->
<div class="comtainer body">
  <div class="row">
    <?php require_once('inc/sidebar.php'); ?>
    <!--Dashboard-->
    <div class="col-md-9">
      <div class="Dashboard">
      <h1><i class="fa fa-plus-square" ></i>Add Post <small>Here</small></h1>
      <hr>
      <div class="container">

            <?php
            if(isset($_POST['post'])){
              $date = time();
              $title = mysqli_real_escape_string($con,trim($_POST['title']));
              $post_data = mysqli_real_escape_string($con,trim($_POST['post-data']));
              $categories = $_POST['categories'];
              $tags = mysqli_real_escape_string($con,trim($_POST['tags']));
              $file = $_FILES['file']['name'];
              $file_tmp = $_FILES['file']['tmp_name'];
              $file_stor="../img/".$file;



              $insert_query = "INSERT INTO posts(date, title, author, author_image, image, categories, tags, post_data,views,status)
              VALUES('$date','$title','$session_username','$session_author_image','$file','$categories','$tags','$post_data','0','draft')";
              if(mysqli_query($con, $insert_query) && move_uploaded_file($file_tmp, $file_stor)){
                  $msg = "Post Has Been Added";
                }
                else {
                  $error = "Post Has not Been Added";
                }
              }
             ?>

      <div class="row">
        <div class="col-md-12">
          <?php
            if(isset($error)){
              echo "<span class='pull-right text-danger'>$error</span>";
            }
            elseif(isset(($msg)))  {
              echo "<span class='pull-right text-success'>$msg</span>";
            }
           ?>
          <form class="" action="#" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:*</label>
                <input type="text" name="title" value="" placeholder="Type Post Title Here" class="form-control"
                data-validation="required">
            </div>
            <div class="form-group">
            <div class="input-group input-group-lg">
              <textarea  class="form-control form-control-lg" name="post-data" rows="10"
              data-validation="length" data-validation-length="20-2000" id="text"></textarea>
            </div>
            </div>

          <div class="form-row">
           <div class="form-group col-md-6">
             <label for="">Image</label>
             <input class="form-control from-control-lg" type="file" name="file" data-validation="required">
           </div>
           <div class="form-group col-md-6">
             <div class="form-group">
               <label for="exampleFormControlSelect1">Categories</label>

               <select class="form-control" name="categories" data-validation="required">
                 <?php
                    $cat_query ="SELECT * FROM categories ORDER BY id DESC";
                    $cat_run = mysqli_query( $con, $cat_query);
                    if(mysqli_num_rows($cat_run) > 0){

                      while($row = mysqli_fetch_array($cat_run)){
                        $cat_name = $row['category'];
                        echo "<option value='".$cat_name."'>".ucfirst($cat_name)."</option>";

                      }
                    }
                    else {
                      echo "<center><h6>No Category Available</h6></center>";
                    }
                  ?>
               </select>
             </div>
           </div>
         </div>
           <div class="form-group">
               <label for="title">Tags:*</label>
               <input type="text" name="tags" value="" placeholder="Type Post Tags Here" class="form-control"
               data-validation="required">
           </div>
           <div class="form-group">
            <input type="submit" class="btn btn-outline-info btn-lg btn-block" value="Add Post" name="post">
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!---->
</div>
</div>
</div>

<script src="../ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace('post-data');
</script>
<!--footer-->
<?php require_once('inc/footer.php'); ?>
