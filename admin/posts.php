<!--Top Link -->
<?php
require_once('inc/top.php');

if(!isset($_SESSION['username'])){
  header('Location:login.php');
}

 ?>
  <!--navbar-->
<?php require_once('inc/nav.php'); ?>

<!--Delete Query-->
    <?php
      if(isset($_GET['del'])){
        $del_id = $_GET['del'];
        $del_query= "DELETE FROM posts WHERE id=$del_id";
        if(mysqli_query($con, $del_query)){
          $msg ="User has been Deleted";
        }
        else{
          $error ="User has not Deleted";
        }
      }


     ?>

     <!--Approve Query-->
         <?php
           if(isset($_GET['publish'])){
             $publish_id = $_GET['publish'];
             $approve_query= "UPDATE posts SET status ='publish' WHERE id=$publish_id";
             if(mysqli_query($con, $approve_query)){
               $msg ="Post Has Been Published";
             }
             else{
               $error ="Post Has not Been Published";
             }
           }


          ?>

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
        $query ="SELECT * FROM posts ORDER BY id DESC";
        $run = mysqli_query($con, $query);
        if(mysqli_num_rows($run) > 0){

       ?>

        <?php
          if(isset($error)){
            echo "<span class='pull-right text-danger'>$error</span>";
          }
          elseif(isset(($msg)))  {
            echo "<span class='pull-right text-success'>$msg</span>";
          }
         ?>
        <table class="table table-hover table-striped text-muted">
          <thead>
            <tr>

              <th>Sr #</th>
              <th>Date</th>
              <th>title</th>
              <th>Author</th>
              <th>Author</th>
              <th>Status</th>
              <th>Post Details</th>
              <th>publish</th>
              <th>Delete</th>

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
              <td><a href="post_details.php?dtl=<?php echo $id; ?>"><i class="fa fa-info-circle text-info"></i></a></td>
              <td><a href="posts.php?publish=<?php echo $id; ?>"><i class="fa fa-check text-success"></i></a></td>
              <td><a href="posts.php?del=<?php echo $id; ?>"><i class="fa fa-times text-danger"></i></a></td>

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
