
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
      <h1 class="text-muted"><i class="fa fa-users" ></i>Vistor <small>View All</small></h1>
      <hr>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-tachometer" ></i>Dashboard</a></li>
        <li class="breadcrumb-item active"><i class="fa fa-users" ></i>Visitor</li>
      </ol>

<!--form /table-->
      <?php
        $query ="SELECT * FROM visitor ORDER BY visitor_id DESC";
        $run = mysqli_query($con, $query);
        if(mysqli_num_rows($run) > 0){


       ?>

       <hr>

       <table class="table table-hover table-striped text-muted">
         <thead>
           <tr>
             <th>Sr #</th>
             <th>Date</th>
             <th>Name</th>
             <th>Username</th>
             <th>Email</th>
             <th>Phone</th>
           </tr>
         </thead>
         <tbody>
           <?php
             while($row = mysqli_fetch_array($run)){
               $id = $row['visitor_id'];
               $first_name = ucfirst($row['fname']);
               $last_name = ucfirst($row['lname']);
               $username = $row['username'];
               $email = $row['email'];
               $phone = $row['phone'];
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
             <td><?php echo $phone; ?></td>
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
