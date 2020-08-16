<!--Top Link -->
  <?php
   require_once('inc/top.php');

   if(!isset($_SESSION['username'])){
     header('Location:../index.php');
   }

   $user = $_SESSION['username'];

   $query = "SELECT * FROM psychology WHERE username='$user'";
   $run = mysqli_query($con , $query);
   $row = mysqli_fetch_array($run);

   $image = $row['image'];
   $psy_id = $row['psy_id'];
   $date = getdate($row['date']);
   $day = $date['mday'];
   $month = substr($date['month'],0,3);
   $year = $date['year'];
   $fname = $row['fname'];
   $lname = $row['lname'];
   $username = $row['username'];
   $email = $row['email'];
   $phone = $row['phone'];
   $about = $row['about'];


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
      <h1 class="text-muted"><i class="fa fa-user" ></i>Edit<small> Profile Details</small></h1>
      <hr>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-tachometer" ></i>Dashboard</a></li>
        <li class="breadcrumb-item active"><i class="fa fa-user" ></i>Edit Profile</li>
      </ol>

<!--form /table-->
              <?php
                if(isset($_POST['update'])){
                  $fname = mysqli_real_escape_string($con,trim($_POST['fname']));
                  $lname = mysqli_real_escape_string($con,trim($_POST['lname']));
                  $uid = mysqli_real_escape_string($con,trim($_POST['uid']));
                  $file = $_FILES['file']['name'];
                  $file_tmp = $_FILES['file']['tmp_name'];
                  $file_stor="../img/".$file;
                  $about = mysqli_real_escape_string($con,trim($_POST['details']));

                  $update_query = "UPDATE psychology SET fname='$fname',lname='$lname',
                  image='$file',about='$about' WHERE psy_id='$psy_id'";

                  if(mysqli_query($con, $update_query)  && move_uploaded_file($file_tmp, $file_stor)){
                    $msg ="User Has Been Updated";
                  }
                  else{
                    $error ="User Has Not Been Updated";
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
            <label for="" class="lead"><b>Change First Name & Last Name</b></label>
            <div class="form-row">
           <div class="form-group col-md-6">
             <div class="input-group input-group-lg">
               <div class="input-group-prepend">
                 <span class="input-group-text">
                   <i class="fa fa-pencil-alt"></i>
                 </span>
               </div>
               <input class="form-control from-control-lg"type="text" placeholder="First Name" data-validation="required"
               name="fname" value="<?php echo $fname; ?>">
             </div>
           </div>
           <div class="form-group col-md-6">
             <div class="input-group input-group-lg">
               <div class="input-group-prepend">
                 <span class="input-group-text">
                   <i class="fa fa-pencil-alt"></i>
                 </span>
               </div>
               <input class="form-control from-control-lg"type="text" placeholder="Last Name" data-validation="required"
                name="lname" value="<?php echo $lname; ?>">
             </div>
           </div>
         </div>
         <div class="form-group">
           <label for="" class="lead"><b>Change Username</b></label>
         <div class="input-group input-group-lg">
           <div class="input-group-prepend">
             <span class="input-group-text">
               <i class="fa fa-user"></i>
             </span>
           </div>
           <input class="form-control from-control-lg"type="text" placeholder="Username"
           data-validation="length alphanumeric" data-validation-length="3-12"
    		 data-validation-error-msg="Must Be Alphanumeric & Between 3-12 chars." name="uid" value="<?php echo $username; ?>">
         </div>
         </div>
              <div class="form-group">
                <label for="" class="lead"><b>Change Image</b></label>
              <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-upload"></i>
                  </span>
                </div>
                <input class="form-control from-control-lg"type="file" placeholder="Image" name="file" >
              </div>
              </div>
              <div class="form-group">
                <label for="" class="lead"><b>Details:</b></label>
              <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-pencil-alt"></i>
                  </span>
                </div>
                <textarea  class="form-control form-control-lg" name="details" rows="5" placeholder="About" data-validation="required">
                  <?php echo $about; ?>
                </textarea>
              </div>
              </div>
              <div class="form-group">
            <input type="submit" class="btn btn-outline-info btn-lg btn-block" value="Update Profile" name="update">
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
