<!--Top Link -->
<?php
 require_once('inc/top.php');

if(!isset($_SESSION['username'])){
  header('Location:../index.php');
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
      <h1><i class="fa fa-user" ></i>Profile <small>Personal Details </small></h1>
      <hr>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-tachometer" ></i>Dashboard</a></li>
        <li class="breadcrumb-item active"><i class="fa fa-user" ></i>Profile</li>
      </ol>
      <!--Profil-->
        <?php
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
        $id_number = $row['phone'];
        $about = $row['about'];

        ?>
      <div class="row">
        <div class="col">
          <a href="edit_profile.php?edit=<?php echo $psy_id; ?>" class="btn btn-info float-right">Edit Profile</a>
          <div class="mx-auto">
            <center>
            <img src="../img/<?php echo $image; ?>" alt="Profile"
              class="rounded-circle shadow p-1 mb-5 bg-info rounded" width="200px">
            </center>
          </div>
          <hr>
          <h3>Profile Details</h3>
          <br>
          <table class="table table-bordered">
            <tr>
              <td width="20%"><b>User ID:</b></td>
              <td width="30%"><?php echo $psy_id; ?></td>
              <td width="20%"><b>Signup Date:</b></td>
              <td width="30%"><?php echo "$day $month $year"; ?></td>
            </tr>
            <tr>
              <td width="20%"><b>First Name:</b></td>
              <td width="30%"><?php echo $fname; ?></td>
              <td width="20%"><b>Last Name:</b></td>
              <td width="30%"><?php echo $lname; ?></td>
            </tr>
            <tr>
              <td width="20%"><b>Username:</b></td>
              <td width="30%"><?php echo $username; ?></td>
              <td width="20%"><b>Email:</b></td>
              <td width="30%"><?php echo $email; ?></td>
            </tr>
            <tr>
              <td width="20%"><b>Phone</b></td>
              <td width="30%"><?php echo $phone; ?></td>
              <td width="20%"><b>ID Number</b></td>
              <td width="30%"><?php echo $phone; ?></td>
            </tr>
          </table>
          <div class="row">
            <div class="col-lg-8 col-sm-12">
              <b>Details</b>
              <div class="">
                <?php echo $about; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!---->
    </div>
  </div>
</div>
</div>
<!--footer-->
<?php require_once('inc/footer.php'); ?>
