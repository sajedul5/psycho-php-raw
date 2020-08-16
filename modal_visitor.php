
<?php

if(isset($_POST['login'])){
  $uid = mysqli_real_escape_string($con, $_POST['uid']);
  $pwd = mysqli_real_escape_string($con, $_POST['pwd']);
  $pwd =md5($pwd);
  if(isset($_POST['psyid'])) $psyid= $_POST['psyid'];

  $check_username_query = "SELECT * FROM visitor WHERE username= '$uid' AND password='$pwd'";
  $chech_username_run = mysqli_query($con , $check_username_query);
  $check_user = mysqli_num_rows($chech_username_run);
  if($check_user > 0){
    $_SESSION['username'] =$uid;
    header('location:visitor/message.php?id='.$psyid);
  }
  else{
    $error ="Username & Password Worng! " ;

  }
}

 ?>
<div class="modal fade" id="visitor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title m-auto text-info" id="exampleModalLabel">Login Visitor</h3>

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
              <input class="form-control from-control-lg" type="text" placeholder="Username" data-validation="required" name="uid">
            </div>
            </div>
            <div class="form-group">
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fa fa-lock"></i>
                </span>
              </div>
              <input class="form-control from-control-lg" type="password" placeholder="Password" data-validation="required" name="pwd">
            </div>
            </div>
            <input type="hidden" value='ssss' id='psyid' name='psyid' />
            <div class="form-group">
          <input type="submit"  class="btn btn-info btn-lg btn-block" value="Login" name="login">
        </div>

        </form>
      </div>
      <div class="modal-footer">
        <a href="visitor/forgot-password.php" class="text-info">Forget Password?</a>
        |
        <a href="signup/visitor.html" class="text-info" target="_blank">Sign Up</a>
      </div>
    </div>
  </div>
</div>
