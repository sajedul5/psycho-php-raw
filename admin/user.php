
  <?php

   require_once('inc/top.php');

   if(!isset($_SESSION['username'])){
     header('Location:login.php');
   }

   ?>
<!--navbar-->
<?php require_once('inc/nav.php'); ?>

<!--Delete Query-->
    <?php
      if(isset($_GET['del'])){
        $del_id = $_GET['del'];
        $del_query= "DELETE FROM users WHERE id=$del_id";
        if(mysqli_query($con, $del_query)){
          $msg ="User has been Deleted";
        }
        else{
          $error ="User has not Deleted";
        }
      }
     ?>

<!--List Group-->
<div class="comtainer body">
  <div class="row">
    <?php require_once('inc/sidebar.php'); ?>
    <!--Dashboard-->
    <div class="col-md-9">
      <div class="Dashboard">
      <h1 class="text-muted"><i class="fa fa-users" ></i>Users <small>View All Users</small></h1>
      <hr>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-tachometer" ></i>Dashboard</a></li>
        <li class="breadcrumb-item active"><i class="fa fa-users" ></i>Users</li>
      </ol>
<!--form /table-->
      <?php
        $query ="SELECT * FROM users ORDER BY id DESC";
        $run = mysqli_query($con, $query);
        if(mysqli_num_rows($run) > 0){


       ?>

    <div class="row">
      <div class="col-sm-8">
          <form class="" action="" method="post">
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>Delete</option>
                      <option>Change to Author</option>
                      <option>Change to Admin</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-8">
                  <input type="submit" name="" value="Apply" class="btn btn-info">
                  <a href="add-user.php" class="btn btn-info">Add New</a>
                </div>
              </div>
          </form>
      </div>
    </div>
    <hr>
    <?php
      if(isset($error)){
        echo "<span class='pull-right text-danger'>$error</span>";
      }
      elseif(isset(($msg)))  {
        echo "<span class='pull-right text-success'>$msg</span>";
      }
     ?>
    <table class="table table-hover table-striped text-muted">
      <thead>
        <tr>
          <th>Sr #</th>
          <th>Date</th>
          <th>Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Image</th>
          <th>Role</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
          while($row = mysqli_fetch_array($run)){
            $id = $row['id'];
            $first_name = ucfirst($row['first_name']);
            $last_name = ucfirst($row['last_name']);
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            $role = $row['role'];
            $image = $row['image'];
            $date = getdate($row['date']);
            $day =$date['mday'];
            $month =substr($date['month'],0,3);
            $year =$date['year'];

         ?>
        <tr>
          <td><?php echo $id; ?></td>
          <td><?php echo "$day $month $year"; ?></td>
          <td><?php echo "$first_name $last_name"; ?></td>
          <td><?php echo $username; ?></td>
          <td><?php echo $email; ?></td>
          <td><img src="../img/<?php echo $image; ?>" width="30px"></td>
          <td><?php echo $role; ?></td>
          <td><a href="edit-user.php?edit=<?php echo $id; ?>"><i class="fa fa-pencil text-info"></i></a></td>
          <td><a href="user.php?del=<?php echo $id; ?>"><i class="fa fa-times text-danger"></i></a></td>
        </tr>
        <?php } ?>

      </tbody>

    </table>
    <?php
        }
        else {
          echo "<center> <h2 class='text-info'> No Users Availabe Now</h2></center>";
        }
     ?>
     <!---->
    </div>
  </div>
</div>
</div>
<!--footer-->
<?php require_once('inc/footer.php'); ?>
