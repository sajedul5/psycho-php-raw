<!--Top Link-->
<?php require_once('inc/top.php'); ?>
<body>
 <!-- NAVBAR SECTION-->
<?php require_once('inc/bnav.php');
//Pagination Start

    $number_of_posts = 3;
    if(isset($_GET['page'])){
      $page_id = $_GET['page'];
    }
    else {
      $page_id = 1;
    }

    if(isset($_GET['cat'])){
      $cat_id =$_GET['cat'];
      $cat_query ="SELECT * FROM categories WHERE id = $cat_id";
      $cat_run = mysqli_query($con, $cat_query);
      $cat_row =mysqli_fetch_array($cat_run);
      $cat_name= $cat_row['category'];
    }
    //Search
    if(isset($_POST['search'])){
      $search = $_POST['search-title'];
      $all_posts_query ="SELECT * FROM posts WHERE status ='publish'  AND tags LIKE '%$search%'";
      $all_posts_run = mysqli_query($con, $all_posts_query);
      $all_posts = mysqli_num_rows($all_posts_run);
      $total_pages = ceil($all_posts / $number_of_posts);
      $post_start_from = ($page_id - 1) * $number_of_posts;
    }
    else{
      $all_posts_query ="SELECT * FROM posts WHERE status ='publish'";
      if(isset($cat_name)){
        $all_posts_query .="AND categories ='$cat_name'";
      }
      $all_posts_run = mysqli_query($con, $all_posts_query);
      $all_posts = mysqli_num_rows($all_posts_run);
      $total_pages = ceil($all_posts / $number_of_posts);
      $post_start_from = ($page_id - 1) * $number_of_posts;
    }

 ?>
<!--Header Jumbotron-->
<div class="jumbotron">
  <div class="container">
    <div  id="details" class="animated fadeInLeft">
      <h1>Expert Mental Health <span> News & Advice</span></h1>
      <p class="lead">Leading doctors, psychologists, psychiatrists, share mental health news, guidance and support.</p>
    </div>
  </div>
<!--  <img src="img/head1.jpg" alt="">-->
</div>
<!--Post Share-->
<section class="m-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8">

        <!--carousel-->
        <?php
          $slider_query ="SELECT * FROM posts WHERE status= 'publish' ORDER BY id DESC LIMIT 3";
          $slider_run = mysqli_query($con, $slider_query);
          if(mysqli_num_rows($slider_run) > 0){
            $count = mysqli_num_rows($slider_run);
         ?>

        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php
              for($i = 0; $i < $count; $i++){
                if($i == 0){
                  echo "  <li data-target='#carouselExampleCaptions' data-slide-to='".$i."' class='active'></li>";
                }
                else{
                  echo "  <li data-target='#carouselExampleCaptions' data-slide-to='".$i."' ></li>";
                }
              }

             ?>
          </ol>

            <div class="carousel-inner">
                <?php
                  $check = 0;
                    while($slider_row = mysqli_fetch_array($slider_run)){
                      $slide_id = $slider_row['id'];
                      $slide_image = $slider_row['image'];
                      $slide_title = $slider_row['title'];
                      $check =$check + 1;
                      if($check == 1){
                        echo "<div class='carousel-item active' data-interval='3000'>";
                      }
                      else{
                        echo "<div class='carousel-item' data-interval='3000'>";
                      }
                  ?>
                <a href="post.php?post_id=<?php echo $slide_id; ?>"><img src="img/<?php echo $slide_image; ?>"
                   class="d-block w-100"></a>
                <div class="carousel-caption d-none d-md-block">
                  <h3><?php echo $slide_title; ?></h3>
                </div>
              </div>
              <?php } ?>
              </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>

          <!--post-->

        <?php
          }
            if(isset($_POST['search'])){
              $search = $_POST['search-title'];
              $query = "SELECT * FROM posts WHERE status= 'publish' AND tags LIKE '%$search%'";
              $query .= " ORDER BY id DESC LIMIT $post_start_from, $number_of_posts";
            }
            else{
              $query = "SELECT * FROM posts WHERE status= 'publish'";
              if(isset($cat_name)){
                $query .= " AND categories = '$cat_name'";
              }
              $query .= " ORDER BY id DESC LIMIT $post_start_from, $number_of_posts";
            }

            $run = mysqli_query($con, $query);
            if(mysqli_num_rows($run) > 0){
            while($row = mysqli_fetch_array($run)){
                  $id = $row['id'];
                  $date = getdate($row['date']);
                  $day =$date['mday'];
                  $month =$date['month'];
                  $year =$date['year'];
                  $title = $row['title'];
                  $author = $row['author'];
                  $author_image = $row['author_image'];
                  $categories = $row['categories'];
                  $tags = $row['tags'];
                  $post_data = $row['post_data'];
                  $views = $row['views'];
                  $status = $row['status'];
                  $image = $row['image'];

           ?>

          <div class="post">
              <div class="row">
                <div class="col-md-2 post-date">
                    <div class="day">
                      <?php echo $day; ?>
                    </div>
                    <div class="month">
                      <?php echo $month; ?>
                    </div>
                    <div class="year">
                      <?php echo $year; ?>
                    </div>
                </div>
                <div class="col-md-8 post-title">
                    <a href="post.php?post_id=<?php echo $id; ?>" class="title"><h2><?php echo $title; ?></h2> </a>
                    <p>Written by:<span><?php echo ucfirst($author)?></span> </p>
                </div>
                <div class="col-md-2 post-profile">
                    <img src="img/<?php echo $author_image; ?>" alt="Profile Picture" class="rounded-circle">
                </div>
              </div>
              <a href="post.php?post_id=<?php echo $id; ?>"><img src="img/<?php echo $image; ?>" alt="post picture"> </a>
              <div class="desc"><?php echo substr($post_data,0,650).".........."; ; ?></div>
                <a href="post.php?post_id=<?php echo $id; ?>" class="btn btn-info">Read More...</a>
                <div class="bottom">
                    <span class="ff"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $views ;?> </span>|
                    <span class="ss"><i class="fa fa-comment"></i><a href="#" class="ccc"> Comment</a> </span>
                </div>
          </div>

          <?php
                }
              }
              else {
                echo "<center><h2 class='text-info'>No Posts Available</h2></center>";
              }
           ?>

      <!--pagination-->
      <nav>
        <div class="container">
        <ul class="pagination justify-content-center">
          <?php

           if($page_id > 1){
                  echo "<li class='page-item'>
                    <a class='page-link' href='blog.php?page=".($page_id-1)."' aria-label='Previous'>
                      <span aria-hidden='true'>&laquo;</span>
                    </a>
                  </li>";
              }
            for($i = 1; $i <= $total_pages; $i++){
              echo "<li class=' ".($page_id == $i ? 'text-success' : '')."'>
              <a class='page-link'
              href='blog.php?page=".$i."&".(isset($cat_name)?"cat=$cat_id":"")."'>$i</a></li>";
            }

            if($i > $page_id){
                echo "<li class='page-item'>
                  <a class='page-link' href='blog.php?page=".($page_id+1)."' aria-label='Next'>
                    <span aria-hidden='true'>&raquo;</span>
                  </a>
                </li>";
            }
           ?>
        </ul>
      </div>
      </nav>
  </div>

  <!--sidebar-->
  <?php require_once('inc/sidebar.php'); ?>

<!------------------>
      </div>
    </div>
  </div>
</section>

<!--Modal-->
<?php require_once('modal_psychology.php'); ?>

<!-- FOOTER-->
<?php require_once('inc/footer.php'); ?>
