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
        $del_query= "DELETE FROM contact WHERE contact_id=$del_id";
        if(mysqli_query($con, $del_query)){
          $msg ="Comment has been Deleted";
        }
        else{
          $error ="Comment has not Deleted";
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
      <h1 class="text-muted"><i class="fa fa-comments" ></i>Message <small>View All</small></h1>
      <hr>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-tachometer" ></i>Dashboard</a></li>
        <li class="breadcrumb-item active"><i class="fa fa-comments" ></i>Message</li>
      </ol>
<!--comment reply -->
        <?php
            if(isset($_GET['reply'])){
              $reply_id = $_GET['reply'];
              $reply_check ="SELECT * FROM contact WHERE contact_id= $reply_id";

              $reply_check_run = mysqli_query($con, $reply_check);
              if(mysqli_num_rows($reply_check_run) > 0){

                if(isset($_POST['reply'])){
                  $message = mysqli_real_escape_string($con,trim($_POST['msg']));
                  $date = date("Y-m-d H:i:s");
                  $insert_message_query ="INSERT INTO contact(date,name,email,message)
                  VALUES ('$date','1me!','admin@gmail.com','$message')";

                  if(mysqli_query($con, $insert_message_query)){
                    $message_msg ="Message Reply Has Been Submited";
                  }
                  else {
                    $message_error ="Message Reply Has not Been Submited";
                  }
                }


         ?>

    <div class="row">
      <div class="col-md-12">
        <form class="" method="post">
          <?php

            if(isset($message_error)){
              echo "<span class='alert alert-danger'>$message_error</span>";
            }
            elseif(isset(($message_msg)))  {
              echo "<span class='alert alert-success'>$message_msg</span>";
            }


           ?>
           <div class="form-group">
           <div class="input-group input-group-lg">
             <div class="input-group-prepend">
               <span class="input-group-text">
                 <i class="fa fa-envelope"></i>
               </span>
             </div>
             <input class="form-control from-control-lg"type="email" placeholder="Email" name="email"
             data-validation="required email" >
           </div>
           </div>
              <div class="form-group">
                <label for="" class="lead"><b>Message:</b></label>
              <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-pencil-alt"></i>
                  </span>
                </div>
                <textarea  class="form-control form-control-lg" name="msg" rows="5" placeholder="About" data-validation="required">

                </textarea>
              </div>
              </div>
              <div class="form-group">
            <input type="submit" class="btn btn-outline-info btn-lg btn-block" value="Reply" name="reply">
          </div>
        </form>
      </div>
    </div>
<!--form /table-->
      <?php

          }
        }

        $query ="SELECT * FROM contact ORDER BY contact_id DESC";
        $run = mysqli_query($con, $query);

        if(mysqli_num_rows($run) > 0){



       ?>

    <div class="row">
      <div class="col-sm-8">

      </div>
    </div>
    <hr>
    <?php
      if(isset($error)){
        echo "<span class='alert alert-danger'>$error</span>";
      }
      elseif(isset(($msg)))  {
        echo "<span class='alert alert-success'>$msg</span>";
      }
     ?>
    <table class="table table-hover table-striped text-muted">
      <thead>
        <tr>
          <th>Sr #</th>
          <th>Date</th>
          <th>Name</th>
          <th>Email</th>
          <th>Message</th>
          <th>Reply</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
          while($row = mysqli_fetch_array($run)){
            $contact_id = $row['contact_id'];
            $name = ucfirst($row['name']);
            $email = $row['email'];
            $message = $row['message'];
            $date = $row['date'];

         ?>
        <tr>
          <td><?php echo $contact_id; ?></td>
          <td><?php echo $date; ?></td>
          <td><?php echo $name; ?></td>
          <td><?php echo $email; ?></td>
          <td><?php echo $message; ?></td>
          <td><a href="message.php?reply=<?php echo $contact_id; ?>"><i class="fa fa-reply text-info"></i></a></td>
          <td><a href="message.php?del=<?php echo $contact_id; ?>"><i class="fa fa-times text-danger"></i></a></td>
        </tr>
        <?php } ?>

      </tbody>

    </table>
    <?php
        }
        else {
          echo "<center> <h2 class='text-info'> No Message Availabe Now</h2></center>";
        }
     ?>
<!---->
    </div>
  </div>
</div>
</div>
<!--footer-->
<?php require_once('inc/footer.php'); ?>
