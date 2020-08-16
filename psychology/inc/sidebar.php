<!--Sidebar-->
<?php

//posts
$get_post = "SELECT * FROM posts WHERE status ='publish' and author='$session_username' ORDER BY id DESC";
$get_post_run = mysqli_query( $con, $get_post);
$post = mysqli_num_rows($get_post_run);

//comments
$get_comment = "SELECT comments.id,comments.date, comments.name, comments.email, comments.comment, comments.status FROM comments,posts,psychology WHERE comments.status='pending' and  psychology.username=posts.author and comments.post_id=posts.id and author='$session_username' ORDER BY id DESC";
$get_comment_run = mysqli_query( $con, $get_comment);
$comment = mysqli_num_rows($get_comment_run);

//Message
$query = "SELECT psy_id FROM psychology WHERE username='$session_username'";
$result = mysqli_query($con , $query);
if(mysqli_num_rows($result) > 0){
  $row =mysqli_fetch_array($result);
       $get_message ="SELECT * FROM message where psy_id =$row[0] ORDER BY msg_id DESC";
      $get_message_run = mysqli_query($con, $get_message);
      $messageNum = mysqli_num_rows($get_message_run);
    }

 ?>


<div class="col-md-3">
  <div class="list-group">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <i class="fa fa-tachometer" ></i> <a href="index.php"> Dashboard</a>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <i class="fa fa-file-text" ></i> <a href="posts.php">All Posts</a>
        <?php
          if($post){
            echo "<span class='badge badge-info'>$post</span>";
          }
         ?>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <i class="fa fa-comments" ></i> <a href="comments.php">Comments </a>
        <?php
          if($comment){
            echo "<span class='badge badge-danger'>$comment</span>";
          }
         ?>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <i class="fa fa-inbox" ></i> <a href="message.php">Inbox</a>
        <?php
          if($messageNum>0){
            echo "<span class='badge badge-danger'>".$messageNum."</span>";
          }
         ?>
      </li>
    </ul>
  </div>
</div>
