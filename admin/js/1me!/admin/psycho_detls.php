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

  <div class="row m-5">
    <?php require_once('inc/sidebar.php'); ?>
    <!--Dashboard-->
    <div class="col-md-9">
      <div class="Dashboard">
      <h1><i class="fa fa-stethoscope" ></i>Psychologist <small>Info Details </small></h1>
      <hr>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-tachometer" ></i>Dashboard</a></li>
        <li class="breadcrumb-item active"><i class="fa fa-stethoscope" ></i>Psychologist</li>
      </ol>
      <!--Info Details-->
        <?php

        if(isset($_GET['dtl'])){
          $dtl = $_GET['dtl'];
          $dtl_query = "SELECT * FROM psychology WHERE psy_id =$dtl";
          $dtl_query_run = mysqli_query($con, $dtl_query);
          $row = mysqli_fetch_array($dtl_query_run);

          $image = $row['image'];
          $id = $row['psy_id'];
          $date = getdate($row['date']);
          $day = $date['mday'];
          $month = substr($date['month'],0,3);
          $year = $date['year'];
          $fname = $row['fname'];
          $lname = $row['lname'];
          $username = $row['username'];
          $email = $row['email'];
          $phone = $row['phone'];
          $id_number = $row['id_number'];
          $about = $row['about'];
          }
        ?>
      <div class="row">
        <div class="col">
          <a href="psychology.php" class="btn btn-info float-right">Back</a>
          <div class="mx-auto">
            <center>
            <img src="../img/<?php echo $image; ?>" alt="Profile"
              class="rounded-circle shadow p-1 mb-5 bg-info rounded" width="200px">
            </center>
          </div>
          <hr>
          <h3>Psychologist Details</h3>
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

<!--footer-->
<?php require_once('inc/footer.php'); ?>
