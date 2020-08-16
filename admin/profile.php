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
      <h1><i class="fa fa-user" ></i>Profile <small>Personal Details </small></h1>
      <hr>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-tachometer" ></i>Dashboard</a></li>
        <li class="breadcrumb-item active"><i class="fa fa-user" ></i>Profile</li>
      </ol>
      <!--Profil-->
        <?php
        $user = $_SESSION['username'];

        $query = "SELECT * FROM users WHERE username='$user'";
        $run = mysqli_query($con , $query);
        $row = mysqli_fetch_array($run);

        $image = $row['image'];
        $id = $row['id'];
        $date = getdate($row['date']);
        $day = $date['mday'];
        $month = substr($date['month'],0,3);
        $year = $date['year'];
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $username = $row['username'];
        $email = $row['email'];
        $role = $row['role'];
        $details = $row['details'];

        ?>
      <div class="row">
        <div class="col">
          <a href="edit_profile.php?edit=<?php echo $id; ?>" class="btn btn-info float-right">Edit Profile</a>
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
              <td width="30%"><?php echo $id; ?></td>
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
              <td width="20%"><b>Role</b></td>
              <td width="30%"><?php echo $role; ?></td>
              <td width="20%"><b></b></td>
              <td width="30%"></td>
            </tr>
          </table>
          <div class="row">
            <div class="col-lg-8 col-sm-12">
              <b>Details</b>
              <div class="">
                <?php echo $details; ?>
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
