<!--Top Link -->
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
        $del_query= "DELETE FROM psychology WHERE psy_id=$del_id";
        if(mysqli_query($con, $del_query)){
          $msg ="User has been Deleted";
        }
        else{
          $error ="User has not Deleted";
        }
      }

     ?>

     <!--Approve Query-->
         <?php
           if(isset($_GET['approve'])){
             $approve_id = $_GET['approve'];
             $approve_query= "UPDATE psychology SET status ='approve' WHERE psy_id=$approve_id";
             if(mysqli_query($con, $approve_query)){
               $msg ="Sign Up has been Approved";
             }
             else{
               $error ="Sign Up has not Approved";
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
      <h1 class="text-muted"><i class="fa fa-stethoscope" ></i>Psychologists <small>View All </small></h1>
      <hr>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-tachometer" ></i>Dashboard</a></li>
        <li class="breadcrumb-item active"><i class="fa fa-stethoscope" ></i>Psychologists</li>
      </ol>

<!--form /table-->
      <?php
        $query ="SELECT * FROM psychology ORDER BY psy_id DESC";
        $run = mysqli_query($con, $query);
        if(mysqli_num_rows($run) > 0){


       ?>

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
             <th>status</th>
             <th>Details</th>
             <th>Approve</th>
             <th>Delete</th>
           </tr>
         </thead>
         <tbody>
           <?php
             while($row = mysqli_fetch_array($run)){
               $id = $row['psy_id'];
               $first_name = ucfirst($row['fname']);
               $last_name = ucfirst($row['lname']);
               $username = $row['username'];
               $email = $row['email'];
               $password = $row['password'];
               $phone = $row['phone'];
               $id_nmb = $row['id_number'];
               $file = $row['image'];
               $about = $row['about'];
               $date = getdate($row['date']);
               $day =$date['mday'];
               $month =substr($date['month'],0,3);
               $year =$date['year'];
               $status = $row['status'];

            ?>
           <tr>
             <td><?php echo $id; ?></td>
             <td><?php echo "$day $month $year"; ?></td>
             <td><?php echo "$first_name $last_name"; ?></td>
             <td><span style="color:<?php if($status== 'approve'){echo 'green';}elseif($status=='pending'){echo 'red';} ?>" >
               <?php echo ucfirst($status); ?></span></td>
             <td><a href="psycho_detls.php?dtl=<?php echo $id; ?>"><i class="fa fa-info-circle text-info"></i></a></td>
             <td><a href="psychology.php?approve=<?php echo $id; ?>"><i class="fa fa-check text-success"></i></a></td>
            <td><a href="psychology.php?del=<?php echo $id; ?>"><i class="fa fa-times text-danger"></i></a></td>
           </tr>
           <?php } ?>

         </tbody>

       </table>
       <?php
           }
           else {
             echo "<center> <h2 class='text-info'> No Psychologist Availabe Now</h2></center>";
           }
        ?>
        <!---->
    </div>
  </div>
</div>
</div>



<!--footer-->
<?php require_once('inc/footer.php'); ?>
