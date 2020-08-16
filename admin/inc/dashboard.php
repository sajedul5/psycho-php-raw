<div class="comtainer body">
  <div class="row">
    <?php require_once('inc/sidebar.php'); ?>
    <!--Dashboard-->
    <div class="col-md-9">
      <div class="Dashboard">
      <h1><i class="fa fa-tachometer" ></i>Dashboard <small>Statistics Overview</small></h1>
      <hr>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><i class="fa fa-tachometer" ></i>Dashboard</li>
      </ol>
      <?php
      //comments
      $get_comment = "SELECT * FROM comments WHERE status='approve'";
      $get_comment_run = mysqli_query( $con, $get_comment);
      $num_of_rows = mysqli_num_rows($get_comment_run);
      //psychology
      $get_psychology = "SELECT * FROM psychology WHERE status ='approve'";
      $get_psychology_run = mysqli_query( $con, $get_psychology);
      $psychology = mysqli_num_rows($get_psychology_run);

      //posts
      $get_post = "SELECT * FROM posts WHERE status ='publish' ORDER BY id DESC";
      $get_post_run = mysqli_query( $con, $get_post);
      $post = mysqli_num_rows($get_post_run);

      //visitor
      $get_visitor = "SELECT * FROM visitor";
      $get_visitor_run = mysqli_query( $con, $get_visitor);
      $visitor = mysqli_num_rows($get_visitor_run);

       ?>
      <div class="row">
          <div class="col-sm-3">
            <div class="card ">
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-sm-6">
                       <?php
                         if($num_of_rows){
                           echo "<p class='huge'>$num_of_rows</p>";
                         }
                        ?>
                       <p class="dp">All Comments</p>
                    </div>
                </div>
                <hr>
                <a href="comments.php" class="btn btn-info">View All Comments</a>
              </div>
              </div>
          </div>
          <div class="col-sm-3">
            <div class="card ">
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-user-md fa-5x"></i>
                    </div>
                    <div class="col-sm-6">
                       <?php
                         if($psychology){
                           echo "<p class='huge'>$psychology</p>";
                         }
                        ?>
                       <p class="dp">All Pasychologist</p>
                    </div>
                </div>
                <hr>
                <a href="psychology.php" class="btn btn-info">View All Psychologist</a>
              </div>
              </div>
          </div>
          <div class="col-sm-3">
            <div class="card ">
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-sm-6">
                       <?php
                         if($post){
                           echo "<p class='huge'>$post</p>";
                         }
                        ?>
                       <p class="dp">All Posts</p>
                    </div>
                </div>
                <hr>
                <a href="posts.php" class="btn btn-info">View All Posts</a>
              </div>
              </div>
          </div>
          <div class="col-sm-3">
            <div class="card ">
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-sm-6">
                      <?php
                        if($visitor){
                          echo "<p class='huge'>$visitor</p>";
                        }
                       ?>
                       <p class="dp">All Visitors</p>
                    </div>
                </div>
                <hr>
                <a href="visitor.php" class="btn btn-info">View All Visitors</a>
              </div>
              </div>
          </div>
      </div>
