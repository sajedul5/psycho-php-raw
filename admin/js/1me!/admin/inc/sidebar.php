<!--Top Link -->
<?php

//posts
$get_post = "SELECT * FROM posts WHERE status ='draft' ORDER BY id DESC";
$get_post_run = mysqli_query( $con, $get_post);
$post = mysqli_num_rows($get_post_run);

//comments
$get_comment = "SELECT * FROM comments WHERE status ='pending' ORDER BY id DESC";
$get_comment_run = mysqli_query( $con, $get_comment);
$comments = mysqli_num_rows($get_comment_run);

//psychology
$get_psychology = "SELECT * FROM psychology WHERE status ='pending'";
$get_psychology_run = mysqli_query( $con, $get_psychology);
$psychology = mysqli_num_rows($get_psychology_run);

//psychology
$get_user = "SELECT * FROM users";
$get_user_run = mysqli_query( $con, $get_user);
$user = mysqli_num_rows($get_user_run);

//visitor
$get_visitor = "SELECT * FROM visitor";
$get_visitor_run = mysqli_query( $con, $get_visitor);
$visitor = mysqli_num_rows($get_visitor_run);

//category
$get_category = "SELECT * FROM categories";
$get_category_run = mysqli_query( $con, $get_category);
$category = mysqli_num_rows($get_category_run);

//Message
$get_message = "SELECT * FROM contact";
$get_message_run = mysqli_query( $con, $get_message);
$message = mysqli_num_rows($get_message_run);

//Message
$get_subscribe = "SELECT * FROM subscribe";
$get_subscribe_run = mysqli_query( $con, $get_subscribe);
$subscribe = mysqli_num_rows($get_subscribe_run);

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
            echo "<span class='badge badge-danger'>$post</span>";
          }
         ?>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <i class="fa fa-folder-open" ></i> <a href="categories.php">Categories </a>
        <?php
          if($category ){
            echo "<span class='badge badge-info'>$category </span>";
          }
         ?>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <i class="fa fa-comments" ></i> <a href="comments.php">Comments </a>
        <?php
          if($comments){
            echo "<span class='badge badge-danger'>$comments</span>";
          }
         ?>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <i class="fa fa-inbox" ></i> <a href="message.php">Inbox</a>
        <?php
          if($message){
            echo "<span class='badge badge-danger'>$message</span>";
          }
         ?>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <i class="fa fa-user-md" ></i> <a href="psychology.php">psychology </a>
        <?php
          if($psychology){
            echo "<span class='badge badge-danger'>$psychology</span>";
          }
         ?>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <i class="fa fa-bell" ></i> <a href="subscribe.php">Subscribers </a>
        <?php
          if($subscribe){
            echo "<span class='badge badge-info'>$subscribe</span>";
          }
         ?>
      </li>

      <li class="list-group-item d-flex justify-content-between align-items-center">
        <i class="fa fa-users" ></i> <a href="user.php">Users </a>
        <?php
          if($user){
            echo "<span class='badge badge-info'>$user</span>";
          }
         ?>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <i class="fa fa-users" ></i> <a href="visitor.php">Visitor </a>
        <?php
          if($visitor){
            echo "<span class='badge badge-info'>$visitor</span>";
          }
         ?>
      </li>
    </ul>
  </div>
</div>
