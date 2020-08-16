<!--Top Link -->
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
      <h1><i class="fa fa-file-text" ></i>Post <small> Details </small></h1>
      <hr>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-tachometer" ></i>Dashboard</a></li>
        <li class="breadcrumb-item active"><i class="fa fa-file-text" ></i>Post Details</li>
      </ol>
      <!--Info Details-->
        <?php

        if(isset($_GET['dtl'])){
          $dtl = $_GET['dtl'];
          $dtl_query = "SELECT * FROM posts WHERE id =$dtl";
          $dtl_query_run = mysqli_query($con, $dtl_query);
          $row = mysqli_fetch_array($dtl_query_run);

          $image = $row['image'];
          $id = $row['id'];
          $date = getdate($row['date']);
          $day = $date['mday'];
          $month = substr($date['month'],0,3);
          $year = $date['year'];
          $title = $row['title'];
          $author = $row['author'];
          $author_image = $row['author_image'];
          $image = $row['image'];
          $post_data = $row['post_data'];
}

        ?>


        <div class="cotainer">
          <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">

                    <img src="../img/<?php echo $author_image; ?>" alt="Profile Picture" class="rounded-circle py-3 ml-5" width="150px">

                  </div>
                  <div class="col-md-8">
                    <a href="posts.php" class="btn btn-info float-right">Back</a>
                    <h2 class="mt-5"><?php echo $title; ?></h2>
                    <p>Written by:<span> <?php echo $author; ?></span> </p>
                  </div>
                </div>
                <div class="py-5">
                  <center><img src="../img/<?php echo $image; ?>" alt="post picture" class="rounded" width="350px"></center>
                </div>
                <div class=" text-justify">
                  <p><?php echo $post_data; ?></p>
                </div>
              </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
<!--footer-->
<?php require_once('inc/footer.php'); ?>
