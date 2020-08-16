<!--Top Link-->
 <?php require_once('inc/top.php');?>
<!--login-->
 <?php

 if(isset($_POST['login'])){
   $uid = mysqli_real_escape_string($con, $_POST['uid']);
   $pwd = mysqli_real_escape_string($con, $_POST['pwd']);
   $pwd =md5($pwd);

   $check_username_query = "SELECT * FROM psychology WHERE username= '$uid' AND password='$pwd' and status='approve'";
   $chech_username_run = mysqli_query($con , $check_username_query);
   if(mysqli_num_rows($chech_username_run) > 0){
   $row =mysqli_fetch_array($chech_username_run);

   $db_username = $row['username'];
   $db_author_image = $row['image'];

   $_SESSION['username'] =$db_username;
   $_SESSION['image'] =$db_author_image;


   header('location:psychology/index.php');
 }
 else{
     $error ="Username & Password Worng!";
   }
 }

  ?>

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title m-auto text-info" id="exampleModalLabel">Login 1me!</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
        <?php
          if(isset(($error)))  {
            echo "<span class='alert alert-danger lead'>$error</span>";
          }
         ?>
        <form class="" method="post">
          <div class="form-group">
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fa fa-user"></i>
                </span>
              </div>
              <input class="form-control from-control-lg"type="text" placeholder="Username" data-validation="required" name="uid">
            </div>
            </div>
            <div class="form-group">
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fa fa-lock"></i>
                </span>
              </div>
              <input class="form-control from-control-lg"type="password" placeholder="Password" data-validation="required" name="pwd">
            </div>
            </div>
            <div class="form-group">
          <input type="submit"  class="btn btn-info btn-lg btn-block" value="Login" name="login">
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <a href="forgot-password.php" class="text-info" target="_blank">Forget Password?</a>
        |
        <a href="signup/psychology.html" class="text-info" target="_blank">Sign Up Psychologists</a>
        |
        <a href="signup/visitor.html" class="text-info" target="_blank">Sign Up Visitor</a>
      </div>
    </div>
  </div>
</div>
