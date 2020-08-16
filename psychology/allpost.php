<!--Top Link -->
  <?php

   require_once('inc/top.php');

   if(!isset($_SESSION['username'])){
     header('Location:../index.php');
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
        <h1 class="text-muted"><i class="fa fa-file" ></i>Posts <small>View All</small></h1>
        <hr>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><i class="fa fa-tachometer" ></i>Dashboard</a></li>
          <li class="breadcrumb-item active"><i class="fa fa-eye" ></i>Post Views</li>
        </ol>
  <!--table--->
        <hr>
        <?php
        //posts
        $get_post_query = "SELECT * FROM posts WHERE status ='publish' AND author='$session_username' ORDER BY id DESC";
        $get_post_run = mysqli_query( $con, $get_post_query);
        if(mysqli_num_rows($get_post_run) > 0){
       ?>
      <h2>All Post Views</h2>
      <table class="table table-hover table-striped text-muted">
        <thead>
          <tr>
            <th>Sr #</th>
            <th>Date</th>
            <th>Post Title</th>
            <th>category</th>
            <th>Views</th>
          </tr>
        </thead>
        <tbody>
          <?php
            while($get_post_row = mysqli_fetch_array($get_post_run)){
              $post_id = $get_post_row['id'];
              $post_date = getdate($get_post_row['date']);
              $day = $post_date['mday'];
              $month = substr($post_date['month'],0,3);
              $year = $post_date['year'];
              $post_title = $get_post_row['title'];
              $post_category = $get_post_row['categories'];
              $post_views = $get_post_row['views'];
           ?>
          <tr>
            <td><?php echo $post_id ;?></td>
            <td><?php echo "$day $month $year" ;?></td>
            <td><?php echo $post_title ;?></td>
            <td><?php echo $post_category ;?></td>
            <td><i class="fa fa-eye"></i><?php echo $post_views ;?></td>
          </tr>
          <?php   } ?>
        </tbody>
      </table>
      <a href="allpost.php" class="btn btn-info">View All Posts</a>
        <?php }  ?>
        <!---->
      </div>
    </div>
  </div>
  </div>
  <!--footer-->
  <?php require_once('inc/footer.php'); ?>
