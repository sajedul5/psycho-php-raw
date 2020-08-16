
<?php
require_once('inc/top.php');

if(!isset($_SESSION['username'])){
  header('Location:login.php');
}
$visitor =$_SESSION['username'];
?>
  <!--navbar-->
<?php require_once('inc/nav.php'); ?>

<!--Delete Query-->
    <?php
      if(isset($_GET['del'])){
        $del_id = $_GET['del'];
        $del_query= "DELETE FROM message WHERE msg_id=$del_id";
        if(mysqli_query($con, $del_query)){
          $msg ="Message has been Deleted";
        }
        else{
          $error ="Message has not Deleted";
        }
      }


     ?>

    <!--Dashboard-->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <div class="Dashboard">
                  <h1 class="text-muted"><i class="fa fa-inbox" ></i>Inbox <small>View All</small></h1>
                  <hr>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" text-info><i class="fa fa-tachometer" ></i>Dashboard</a></li>
                    <li class="breadcrumb-item active"><i class="fa fa-inbox" ></i>Inbox</li>
                  </ol>
            <!--Message reply -->
                    <?php
                      if(isset($_GET['reply'])){
                      $reply_id = $_GET['reply'];
                      $reply_check ="SELECT * FROM message WHERE msg_id= $reply_id";

                      $reply_check_run = mysqli_query($con, $reply_check);
                      if(mysqli_num_rows($reply_check_run) > 0){

                        if(isset($_POST['reply'])){

                          $message = mysqli_real_escape_string($con,trim($_POST['msg']));
                          $date = date("Y-m-d H:i:s");
                          $insert_message_query ="INSERT INTO reply_msg(msg_id,username,message)
                          VALUES ($reply_id,'$visitor','$message')";

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

                    $uid=$_SESSION['username'];
                    $query ="SELECT message.msg_id,message.date,message.name,message.message,message.email,message.psy_id FROM message,visitor where visitor.email=message.email and visitor.username='$uid' ORDER BY msg_id DESC";

                    $run = mysqli_query($con, $query);
                   //$t= mysqli_num_rows($run);
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
                        <th>Message</th>
                        <th>Reply View</th>
                        <th>Reply</th>
                        <th>Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                      while($row = mysqli_fetch_array($run)){
                        $msg_id = $row['msg_id'];
                        $name = ucfirst($row['name']);
                        $email = $row['email'];
                        $message = $row['message'];
                        $date = $row['date'];
                        $psy_id = $row['psy_id'];


                     ?>
                    <tr>
                      <td><?php echo $msg_id; ?></td>
                      <td><?php echo $date; ?></td>
                      <td><?php echo $name; ?></td>
                      <td><?php echo $message; ?></td>
                      <td><a href="#"data-toggle="modal" data-target="#reply_msg<?php echo $msg_id; ?>"><i class="fa fa-eye text-info m-auto"></i></a>
                        <?php
                           $query2 = "SELECT * FROM reply_msg WHERE msg_id=$msg_id";
                           $run2 = mysqli_query($con, $query2);
                           $rec =mysqli_num_rows($run2);
                           if(mysqli_num_rows($run2) > 0){
                             while($row2 = mysqli_fetch_array($run2)){
                               $msg_id = $row2['msg_id'];
                               $r_date = $row2['reply_date'];
                               $username = $row2['username'];
                               $r_message= $row2['message'];
                           }
                         }
                         ?>
                        <!-- Modal -->
                        <div class="modal fade" id="reply_msg<?php echo $msg_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Message View Reply</h5>
                              </div>
                              <div class="modal-body">
                                <?php if($rec >0) { ?>
                              <h4><?php echo $username; ?></h4>
                              <p><?php echo $r_date; ?></p>
                              <p><?php echo $r_message; ?></p>
                            <?php } else { echo "No reply found.";}?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                      </td>
                      <td><a href="inbox.php?reply=<?php echo $msg_id; ?>"><i class="fa fa-reply text-info"></i></a></td>
                      <td><a href="message.php?del=<?php echo $msg_id; ?>"><i class="fa fa-times text-danger"></i></a></td>
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
          </div>
        </div>
      </div>
    </div>
<!--footer-->
<?php require_once('inc/footer.php'); ?>
