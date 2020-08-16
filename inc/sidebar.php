<div class="col-md-4">
  <!--Search-->
  <div class="container-fluid plr">
    <form class="" action="blog.php" method="post">
      <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Search" name="search-title">
      <div class="input-group-append">
        <input class="btn btn-outline-info" type="submit" value="Go" name="search">
      </div>
    </div>
    </form>
  </div>
  <!--Popular Posts-->
  <div class="container-fluid plr">
  <div class="popular">
      <h4>Popular Posts</h4>
      <hr>
      <?php
        $p_query = "SELECT * FROM posts WHERE status = 'publish'
        ORDER BY views  DESC LIMIT 3";
        $p_run = mysqli_query($con, $p_query);
        if(mysqli_num_rows($p_run) > 0 ){
          while($p_row = mysqli_fetch_array($p_run)){
                $p_id = $p_row['id'];
                $p_date = getdate($p_row['date']);
                $p_day = $p_date['mday'];
                $p_month = $p_date['month'];
                $p_year = $p_date['year'];
                $p_title = $p_row['title'];
                $p_image = $p_row['image'];

       ?>

    <div class="row">
      <div class="col-xs-4">
        <a href="post.php?post_id=<?php echo $p_id; ?>"><img src="img/<?php echo $p_image; ?>" alt="head"></a>
      </div>
      <div class="col-xs-8 details">
        <a href="post.php?post_id=<?php echo $p_id; ?>"><h6><?php echo $p_title; ?></h6></a>
          <p> <i class="fa fa-clock-o"></i> <?php echo "$p_day $p_month $p_year"; ?></p>
      </div>
    </div>
    <hr>
    <?php
    }
      }
    else {
      echo "<h2 class='text-info'>No Post Available</h2>";
    }
     ?>
  </div>
  </div>


  <!--recent post-->
  <div class="container-fluid plr">
  <div class="popular">
      <h4>Recent Posts</h4>
      <hr>
        <?php
          $p_query = "SELECT * FROM posts WHERE status = 'publish'
          ORDER BY id  DESC LIMIT 2";
          $p_run = mysqli_query($con, $p_query);
          if(mysqli_num_rows($p_run) > 0 ){
            while($p_row = mysqli_fetch_array($p_run)){
                  $p_id = $p_row['id'];
                  $p_date = getdate($p_row['date']);
                  $p_day = $p_date['mday'];
                  $p_month = $p_date['month'];
                  $p_year = $p_date['year'];
                  $p_title = $p_row['title'];
                  $p_image = $p_row['image'];

         ?>

      <div class="row">
        <div class="col-xs-4">
          <a href="post.php?post_id=<?php echo $p_id; ?>"><img src="img/<?php echo $p_image; ?>" alt="head"></a>
        </div>
        <div class="col-xs-8 details">
          <a href="post.php?post_id=<?php echo $p_id; ?>"><h6><?php echo $p_title; ?></h6></a>
            <p> <i class="fa fa-clock-o"></i> <?php echo "$p_day $p_month $p_year"; ?></p>
        </div>
      </div>
      <hr>
      <?php
      }
        }
      else {
        echo "<h2 class='text-info'>No Post Available</h2>";
      }
       ?>

  </div>
  </div>

  <!--Category-->

  <div class="container-fluid plr">
    <div class="popular">
        <h4>Category</h4>
        <hr>
    <div class="row">
      <div class="col-xs-6">
          <ul>
            <?php
              $c_query = "SELECT * FROM categories";
              $c_run = mysqli_query($con, $c_query);
              if(mysqli_num_rows($c_run) > 0){
                $count = 2;
                  while($c_row =mysqli_fetch_array($c_run)){
                    $c_id = $c_row['id'];
                    $c_category = $c_row['category'];
                    $count = $count + 1;
                    if(($count % 2) == 1){
                      echo "<li><a href='blog.php?cat=".$c_id."'>".(ucfirst($c_category))."</a></li>";
                    }
                  }
              }
              else {
                echo "<p>No Category</p>";
              }
             ?>
          </ul>
      </div>
      <div class="col-xs-6">
        <ul class="">
          <?php
            $c_query = "SELECT * FROM categories";
            $c_run = mysqli_query($con, $c_query);
            if(mysqli_num_rows($c_run) > 0){
              $count = 2;
                while($c_row =mysqli_fetch_array($c_run)){
                  $c_id = $c_row['id'];
                  $c_category = $c_row['category'];
                  $count = $count + 1;
                  if(($count % 2) == 0){
                    echo "<li><a href='blog.php?cat=".$c_id."'>".(ucfirst($c_category))."</a></li>";
                  }
                }
            }
            else {
              echo "<p>No Category</p>";
            }
           ?>
        </ul>  
      </div>
    </div>
    </div>
  </div>
