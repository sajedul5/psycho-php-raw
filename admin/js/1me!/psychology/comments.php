<!--Top Link -->
<?php
require_once('inc/top.php');

if(!isset($_SESSION['username'])){
  header('Location:../index.php');
}
$psyco =$_SESSION['username'];
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
      <h1 class="text-muted"><i class="fa fa-comments" ></i>Comments <small>View All</small></h1>
      <hr>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-tachometer" ></i>Dashboard</a></li>
        <li class="breadcrumb-item active"><i class="fa fa-comments" ></i>Comments</li>
      </ol>
<!--comment reply -->
        <?php
            if(isset($_GET['reply'])){
              $reply_id = $_GET['reply'];
              $reply_check ="SELECT * FROM comments WHERE post_id= $reply_id";

              $reply_check_run = mysqli_query($con, $reply_check);
              if(mysqli_num_rows($reply_check_run) > 0){

                if(isset($_POST['reply'])){
                  $comment = mysqli_real_escape_string($con,trim($_POST['comment']));
                  $date = date("Y-m-d H:i:s");
                  $insert_comment_query ="INSERT INTO comments(date,name,email,post_id,image,comment,status)
                  VALUES ('$date','$psyco','admin@gmail.com','$reply_id','un.jpg','$comment','pending')";

                  if(mysqli_query($con, $insert_comment_query)){
                    $comment_msg ="Comment Reply Has Been Submited";
                  }
                  else {
                    $comment_error ="Comment Reply Has not Been Submited";
                  }
                }


         ?>

    <div class="row">
      <div class="col-md-12">
        <form class="" method="post">
          <?php

            if(isset($comment_error)){
              echo "<span class='alert alert-danger'>$comment_error</span>";
            }
            elseif(isset(($comment_msg)))  {
              echo "<span class='alert alert-success'>$comment_msg</span>";
            }


           ?>
              <div class="form-group">
                <label for="" class="lead"><b>Comment:</b></label>
              <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-pencil-alt"></i>
                  </span>
                </div>
                <textarea  class="form-control form-control-lg" name="comment" rows="5" placeholder="About" data-validation="required">

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

        $query ="SELECT comments.id,comments.date, comments.name, comments.email, comments.comment, comments.status,comments.post_id FROM comments,posts,psychology WHERE  psychology.username=posts.author and comments.post_id=posts.id and author='$session_username' ORDER BY id DESC";
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
          <th>Comment</th>
          <th>Status</th>
          <th>Reply</th>
        </tr>
      </thead>
      <tbody>
        <?php
          while($row = mysqli_fetch_array($run)){
            $id = $row['id'];
            $name = ucfirst($row['name']);
            $email = $row['email'];
            $comment = $row['comment'];
            $status = $row['status'];
            $post_id = $row['post_id'];
            $date = $row['date'];


         ?>
        <tr>
          <td><?php echo $id; ?></td>
          <td><?php echo $date; ?></td>
          <td><?php echo "$name"; ?></td>
          <td><?php echo $email; ?></td>
          <td><?php echo $comment; ?></td>
          <td><span style="color:<?php if($status== 'approve'){echo 'green';}elseif($status=='pending'){echo 'red';} ?>" >
            <?php echo $status; ?></span></td>
          <td><a href="comments.php?reply=<?php echo $post_id; ?>"><i class="fa fa-reply text-info"></i></a></td>
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
