<!--Top Link -->
  <?php
   require_once('inc/top.php');

   if(!isset($_SESSION['username'])){
     header('Location:login.php');
   }

  ?>
  <!--navbar-->
<?php require_once('inc/nav.php'); ?>

<!--List Group-->
<div class="comtainer body">
  <div class="row">
    <?php require_once('inc/sidebar.php'); ?>
    <!--Dashboard-->
    <div class="col-md-9">
      <div class="Dashboard">
      <h1 class="text-muted"><i class="fa fa-users" ></i>Add User <small>Add New User</small></h1>
      <hr>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-tachometer" ></i>Dashboard</a></li>
        <li class="breadcrumb-item active"><i class="fa fa-user-plus" ></i>Add New User</li>
      </ol>

<!--form /table-->
        <?php
          if(isset($_POST['add-user'])){
            $date = time();
            $fname = mysqli_real_escape_string($con,trim($_POST['fname']));
            $lname = mysqli_real_escape_string($con,trim($_POST['lname']));
            $uid = mysqli_real_escape_string($con,trim($_POST['uid']));
            $email = mysqli_real_escape_string($con,trim($_POST['email']));
            $pwd = mysqli_real_escape_string($con,trim($_POST['pwd']));
            $pwd =md5($pwd);
            $role = $_POST['role'];
            $file = $_FILES['file']['name'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_stor="../img/".$file;


            $check_query ="SELECT * FROM users WHERE username='$uid' or email='$email'";
            $check_run = mysqli_query($con, $check_query);

            if(mysqli_num_rows($check_run) > 0){
              $error = "Username or Email Aleady Exist!";
            }
            else {
              $insert_query = "INSERT INTO users(date,first_name, last_name,username, email, password, role,image)
              VALUES('$date','$fname','$lname','$uid','$email','$pwd','$role','$file')";
              if(mysqli_query($con, $insert_query) && move_uploaded_file($file_tmp, $file_stor)){
                $msg = "Add User Successfully";

              }
              else {
                $error ="User Has Nt Been Added!";
              }
            }

          }

         ?>

        <div class="copntainer">
          <?php
            if(isset($error)){
              echo "<span class='pull-right text-danger'>$error</span>";
            }
            elseif(isset(($msg)))  {
              echo "<span class='pull-right text-success'>$msg</span>";
            }
           ?>
          <form class="main-form " method="post" enctype="multipart/form-data" action="#">
            <div class="form-row">
           <div class="form-group col-md-6">
             <div class="input-group input-group-lg">
               <div class="input-group-prepend">
                 <span class="input-group-text">
                   <i class="fa fa-pencil-alt"></i>
                 </span>
               </div>
               <input class="form-control from-control-lg"type="text" placeholder="First Name" data-validation="required" name="fname">
             </div>
           </div>
           <div class="form-group col-md-6">
             <div class="input-group input-group-lg">
               <div class="input-group-prepend">
                 <span class="input-group-text">
                   <i class="fa fa-pencil-alt"></i>
                 </span>
               </div>
               <input class="form-control from-control-lg"type="text" placeholder="Last Name" data-validation="required" name="lname">
             </div>
           </div>
         </div>
         <div class="form-group">
         <div class="input-group input-group-lg">
           <div class="input-group-prepend">
             <span class="input-group-text">
               <i class="fa fa-user"></i>
             </span>
           </div>
           <input class="form-control from-control-lg"type="text" placeholder="Username"
           data-validation="length alphanumeric" data-validation-length="3-12"
    		 data-validation-error-msg="Must Be Alphanumeric & Between 3-12 chars." name="uid">
         </div>
         </div>
            <div class="form-group">
              <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fa fa-envelope"></i>
                </span>
              </div>
              <input class="form-control from-control-lg"type="email" placeholder="Email" data-validation=" required email" name="email">
              </div>
              </div>
              <div class="form-group">
              <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-lock"></i>
                  </span>
                </div>
                <input class="form-control from-control-lg"type="password" placeholder="Password" data-validation="length" data-validation-length="3-50"
         		 data-validation-error-msg="Password Must be 8 Chars." name="pwd">
              </div>
              </div>
              <div class="form-group">
                <select class="form-control form-control-lg" name="role">
                <option >Role</option>
                <option>Admin</option>
                <option>Psychologist</option>
                </select>
              </div>
              <div class="form-group">
              <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-upload"></i>
                  </span>
                </div>
                <input class="form-control from-control-lg"type="file" placeholder="Image" name="file">
              </div>
              </div>

              <div class="form-group">
            <input type="submit" class="btn btn-outline-info btn-lg btn-block" value="Sign Up" name="add-user">
          </div>
          </form>

        </div>
<!---->
    </div>
  </div>
</div>
</div>
<!--footer-->
<?php require_once('inc/footer.php'); ?>
