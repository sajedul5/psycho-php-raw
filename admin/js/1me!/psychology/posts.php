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
      <h1 class="text-muted"><i class="fa fa-file" ></i>Posts <small>View All Posts</small></h1>
      <hr>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-tachometer" ></i>Dashboard</a></li>
        <li class="breadcrumb-item active"><i class="fa fa-file" ></i>Posts</li>
      </ol>

<!--form /table-->
      <?php
        $query ="SELECT * FROM posts WHERE status ='publish' and author='$session_username' ORDER BY id DESC";
        $run = mysqli_query($con, $query);
        if(mysqli_num_rows($run) > 0){

       ?>
        <table class="table table-hover table-striped text-muted">
          <thead>
            <tr>

              <th>Sr #</th>
              <th>Date</th>
              <th>title</th>
              <th>Author</th>
              <th>Categories</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($row = mysqli_fetch_array($run)){
                $id = $row['id'];
                $title = ucfirst($row['title']);
                $author = ucfirst($row['author']);
                $categories = ucfirst($row['categories']);
                $author_image = $row['image'];
                $image = $row['image'];
                $post_data = $row['post_data'];
                $status = $row['status'];
                $views = $row['views'];
                $date = getdate($row['date']);
                $day =$date['mday'];
                $month =substr($date['month'],0,3);
                $year =$date['year'];

             ?>
            <tr>

              <td><?php echo $id; ?></td>
              <td><?php echo "$day $month $year"; ?></td>
              <td><?php echo "$title"; ?></td>
              <td><?php echo $author; ?></td>
              <td><?php echo $categories; ?></td>
              <td><span style="color:<?php if($status== 'publish'){echo 'green';}elseif($status=='draft'){echo 'red';} ?>" >
                <?php echo ucfirst($status); ?></span></td>
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
