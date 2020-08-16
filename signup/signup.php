      <?php require_once('../inc/db.php'); ?>

      <!DOCTYPE html>
      <html lang="en">
      <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="shortcut icon" type="image/x-icon" href="../img/t.png">
       <link href="https://fonts.googleapis.com/css?family=Acme|Prata|ZCOOL+XiaoWei&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="../css/animated.css">
       <link rel="stylesheet" href="../css/bootstrap.css">
       <link rel="stylesheet" href="../css/navbar-fixed.css">
       <link rel="stylesheet" href="../css/style.css">
       <title>1me!</title>
      </head>
      <body>

      <!-- NAVBAR SECTION-->
      <nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top">
       <div class="container">
         <a class="navbar-brand" href="../index.php">
           <img src="../img/t.png" alt="M" class="img-fluid" width="50" height="50">
           <h3 class="d-inline align-middle">1me!</h3>
         </a>
       </div>
      </nav>
      <!--signup-->
      <?php
       if(isset($_POST['signup'])){
         $date = time();
         $fname = mysqli_real_escape_string($con,trim($_POST['fname']));
         $lname = mysqli_real_escape_string($con,trim($_POST['lname']));
         $uid = mysqli_real_escape_string($con,trim($_POST['uid']));
         $email = mysqli_real_escape_string($con,trim($_POST['email']));
         $pwd = mysqli_real_escape_string($con,trim($_POST['pwd']));
         $pwd =md5($pwd);
         $phone = mysqli_real_escape_string($con,trim($_POST['phone']));

         $check_query ="SELECT * FROM visitor WHERE username='$uid' or email='$email'";
         $check_run = mysqli_query($con, $check_query);

         if(mysqli_num_rows($check_run) > 0){
           $error = "Username or Email Aleady Exist!";
         }
         else {
           $insert_query = "INSERT INTO visitor(date,fname, lname,username, email, password, phone)
           VALUES('$date','$fname','$lname','$uid','$email','$pwd','$phone')";
           if(mysqli_query($con, $insert_query)){
             $msg = "Sign Up Successfully";
           }
           else {
             $error ="Sign Up Has Not Been Success!";
           }
         }

       }

      ?>
      <div class="text-center m-5 py-5 display-4">
        <?php
          if(isset($error)){
            echo "<span class='pull-right text-danger'>$error</span>";
          }
          elseif(isset(($msg)))  {
            echo "<span class='pull-right text-success'>$msg</span>";
          }
         ?>
      </div>
      <!-- FOOTER-->
