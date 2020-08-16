<!-- Top Link-->
<?php require_once('inc/top.php');?>
<!-- NavBar Link-->
<?php require_once('inc/header.php'); ?>

<!-- Forgot Password Query-->
<?php
  if(isset($_POST['submit'])){
    $lname =$_POST['lname'];
    $email =$_POST['email'];

    $query = "SELECT lname, email FROM psychology WHERE lname='$lname' AND email='$email'";
    $query_run= mysqli_query($con, $query);
    $query_run_row =mysqli_num_rows($query_run);
    if($query_run_row > 0){
      $_SESSION['lname']=$lname;
      $_SESSION['email']=$email;
      header('location:reset-password.php');
    }else {

      $message_error = 'Invalid details. Please try with valid details';
    }
  }

 ?>
<body>
  <div class="container">
    <div class="row">
      <div class="col md-3"></div>
      <div class="col md-6 f-top">
        <div class="card my-5" style="width: 25rem;" >
          <div class="card-body">
            <h4 class="card-title">Psychologists Password Recovery</h4>
            <hr>
            <p class="lead">
								Please enter your Last Name and Email to recover your password.<br />

						</p>
            <?php
            if(isset($message_error)){
              echo "<span class='alert alert-danger'>$message_error</span>";
            }
             ?>
            <form class="my-3" action="" method="post">
              <div class="form-group">
              <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-pencil-alt"></i>
                  </span>
                </div>
                <input class="form-control from-control-lg"type="text" placeholder="Your Last Name" data-validation="required" name="lname">
              </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-lg">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-envelope"></i>
                  </span>
                </div>
                <input class="form-control from-control-lg"type="email" placeholder="Your Email Address" data-validation="required email" name="email">
                </div>
                </div>
                <button type="submit" class="btn btn-info pull-right" name="submit">
									Reset <i class="fa fa-arrow-circle-right"></i>
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
