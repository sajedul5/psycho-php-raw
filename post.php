<!--Top Link-->
<?php require_once('inc/top.php'); ?>
<body>
 <!-- NAVBAR SECTION-->
<?php require_once('inc/bnav.php'); ?>

<?php
if(isset($_GET['post_id'])){
  $post_id = $_GET['post_id'];
  //views Query
  $views_query ="UPDATE posts SET views= views + 1 WHERE posts .id=$post_id";
    mysqli_query($con, $views_query);

  $query = "SELECT * FROM posts WHERE status = 'publish'AND id= $post_id";
  $run = mysqli_query($con, $query);
  if(mysqli_num_rows($run) > 0){
    $row = mysqli_fetch_array($run);
    $id = $row['id'];
    $date =getdate($row['date']);
    $day = $date['mday'];
    $month = $date['month'];
    $year = $date['year'];
    $title = $row['title'];
    $image = $row['image'];
    $views = $row['views'];
    $author_image = $row['author_image'];
    $author = $row['author'];
    $categories = $row['categories'];
    $post_data = $row['post_data'];
  }
  else{
    header('Location: index.php');
  }
}

 ?>
<!--Header Jumbotron-->
<div class="jumbotron">
  <div class="container">
    <div  id="details" class="animated fadeInLeft">
      <h1 class="display-4"><?php echo $title;?></h1>
    </div>
  </div>
</div>
<!--Post Share-->
<section class="m-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="post">
            <div class="row">
              <div class="col-md-2 post-date">
                  <div class="day">
                    <?php echo $day;?>
                  </div>
                  <div class="month">
                    <?php echo $month;?>
                  </div>
                  <div class="year">
                    <?php echo $year;?>
                  </div>
              </div>
              <div class="col-md-8 post-title">
                  <a href="post.php?post_id=<?php echo $id;?>" class="title"><h2><?php echo $title;?></h2> </a>
                  <p>Written by:<span><?php echo ucfirst($author);?></span> </p>
              </div>
              <div class="col-md-2 post-profile">
                  <img src="img/<?php echo $author_image;?>" alt="Profile Picture" class="rounded-circle">
              </div>
            </div>
                <a href="img/<?php echo $image;?>"><img src="img/<?php echo $image;?>" alt="post picture"> </a>

                <div class=" text-justify desc">
                  <?php echo $post_data;  ?>
                </div>
              <div class="bottom">
                      <span class="ff"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $views ;?> </span>|
                  <span class="ss"><i class="fa fa-comment"></i><a href="#" class="ccc"> Comment</a> </span>
              </div>
        </div>
        <!--related post-->
        <div class="related-posts">
          <h2 class="text-info">Related Posts</h2>
          <hr>
          <div class="row">
            <?php
              $r_query = "SELECT * FROM posts WHERE status = 'publish' AND title LIKE '%$title%' LIMIT 3";
              $r_run = mysqli_query($con, $r_query);
              while($r_row = mysqli_fetch_array($r_run)){
                  $r_id = $r_row['id'];
                  $r_title = $r_row['title'];
                  $r_image = $r_row['image'];
             ?>
            <div class="col-sm-4">
              <a href="post.php?post_id=<?php echo $r_id; ?>">
                <img src="img/<?php echo $r_image; ?>" alt="slider">
                <h4><?php echo $r_title; ?></h4>
              </a>
            </div>
            <?php } ?>
          </div>
        </div>
        <!--author-->
        <div class="author">
            <div class="row">
              <div class="col-sm-3">
                <img src="img/<?php echo $author_image; ?>" alt="Profile Picture" class="rounded-circle">
              </div>
              <div class="col-sm-9">
                    <h2><?php echo ucfirst($author); ?></h2>
                      <?php
                      $bio_query = "SELECT * FROM psychology WHERE username ='$author'";

                      $bio_run = mysqli_query($con, $bio_query);
                      if(mysqli_num_rows($bio_run) > 0){
                        $bio_row =mysqli_fetch_array($bio_run);
                        $about = $bio_row['about'];

                       ?>

                    <p class="lead text-justify"><?php echo $about; ?></p>
                  <?php   } ?>
              </div>
            </div>
        </div>
  <!--Comments-->
    <?php require_once('comment.php'); ?>
  <!--sidebar-->
   <?php require_once('inc/sidebar.php'); ?>
<!------------------>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER-->
<?php require_once('inc/footer.php'); ?>
