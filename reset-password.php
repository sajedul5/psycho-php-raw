<!-- Top Link-->
<?php require_once('inc/top.php');?>
<!-- NavBar Link-->
<?php require_once('inc/header.php'); ?>

<!-- Reset Password Query-->
<?php
 if(isset($_POST['change'])){
    $lname= $_SESSION['lname'];
    $email= $_SESSION['email'];
    $newpassword =md5($_POST['pass_confirmation']);

    $query = "UPDATE psychology SET password='$newpassword' WHERE lname='$lname' AND email='$email'";
    $query_run= mysqli_query($con, $query);
    if($query_run){

    echo "<script>alert('Password successfully updated.');</script>";
    echo "<script>window.location.href ='index.php'</script>";
    }
  }

 ?>
<body>
  <div class="container">
    <div class="row">
      <div class="col md-3"></div>
      <div class="col md-6 f-top">
        <div class="card my-5" style="width: 25rem;">
          <div class="card-body">
            <h4 class="card-title">Psychology Reset Password</h4>
            <hr>
            <p class="lead">
							Please set your new password.<br />

						</p>
            <form class="my-3" action="" method="post">
              <div class="form-group">
              <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-lock"></i>
                  </span>
                </div>
                <input class="form-control from-control-lg" type="password" placeholder="New Password" name="pass_confirmation" data-validation="length" data-validation-length="min8"
         		 data-validation-error-msg="Password Must Be 8 Length!.">
              </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-lg">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-lock"></i>
                  </span>
                </div>
                <input class="form-control from-control-lg" type="password" placeholder="Confirm Password" name="pass" data-validation="confirmation" data-validation-error-msg="Password Not Confirm Please Try Again! .">
                </div>
                </div>
                <button type="submit" class="btn btn-info pull-right" name="change">
  									Change <i class="fa fa-arrow-circle-right"></i>
  							</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col md-3"></div>
    </div>
  </div>
  <div class="" style="height:  10rem;">

  </div>
</body>


<!-- FOOTER-->
<?php require_once('inc/footer.php'); ?>
<script>
  $.validate({
    modules : 'security'
  });
</script>
