
    <?php
    require_once('inc/top.php');
    ?>

    <?php

    if(isset($_POST['login'])){
      $uid = mysqli_real_escape_string($con, $_POST['uid']);
      $pwd = mysqli_real_escape_string($con, $_POST['pwd']);
      $pwd =md5($pwd);

      $check_username_query = "SELECT * FROM users WHERE username= '$uid' AND password='$pwd'";
      $chech_username_run = mysqli_query($con , $check_username_query);

    if(mysqli_num_rows($chech_username_run) > 0){
      $row =mysqli_fetch_array($chech_username_run);

      $db_username = $row['username'];
      $db_author_image = $row['image'];

      $_SESSION['username'] =$db_username;
      $_SESSION['image'] =$db_author_image;

      header('location:index.php');
    }
    else{
        $error ="Username & Password Worng!";
      }
    }

     ?>

  <body>
    <div class="container">
      <div class="">
        <h1 class="text-center text-info">Login Admin</h1>
        <?php
          if(isset(($error)))  {
            echo "<span class='palert alert-danger lead'>$error</span>";
          }
         ?>
        <hr>
    <form class="my-5" method="post" action="">
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
      <input type="submit" data-target="#exampleModal" class="btn btn-info btn-lg btn-block" value="Login" name="login">
    </div>
    </form>

    </div>
  </div>
  <div class="ht">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  </div>
  <!--footer-->
  <?php require_once('inc/footer.php'); ?>
