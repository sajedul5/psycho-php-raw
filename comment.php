<!--Message-->
<?php
  $c_query = "SELECT * FROM comments WHERE status ='approve' AND post_id='$id' ORDER BY id DESC";
  $c_run = mysqli_query( $con, $c_query);
  if(mysqli_num_rows($c_run) > 0){


 ?>
<div class="comment">
  <h2>Comments</h2>
  <?php
    while($c_row = mysqli_fetch_array($c_run)){
      $c_id = $c_row['id'];
      $c_name = $c_row['name'];
      $c_image = $c_row['image'];
      $c_comment = $c_row['comment'];
   ?>
  <hr>
  <div class="row single-comment">
    <div class="col-sm-2">
        <img src="img/<?php echo $c_image; ?>" alt="unknown">
    </div>
    <div class="col-sm-10">
        <h4><?php echo ucfirst($c_name); ?></h4>
        <p><?php echo $c_comment; ?></p>
    </div>
  </div>
<?php } ?>
</div>
<?php } ?>
<!--Comment Box-->
<?php
  if(isset($_POST['comments'])){
    $cs_name = $_POST['name'];
    $cs_email = $_POST['email'];
    $cs_comment = $_POST['comment'];
    $cs_date = date("Y-m-d H:i:s");

    $cs_query = "INSERT INTO comments(date, name, post_id, email, image, comment,status)
    VALUES('$cs_date','$cs_name','$post_id','$cs_email','un.jpg','$cs_comment','pending')";
    if(mysqli_query($con, $cs_query)){
      $msg ="Thanks for Comment";
      //header('Location:post.php');

  }
}
 ?>
<div class="comment-box">
  <div class="row">
      <div class="col-sm-12">
        <form class="" method="post">
          <div class="form-group">
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fa fa-user"></i>
                </span>
              </div>
              <input class="form-control from-control-lg"type="text" placeholder="Name" name="name"
               data-validation="required" data-validation-length="min3">
            </div>
            </div>
            <div class="form-group">
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fa fa-envelope"></i>
                </span>
              </div>
              <input class="form-control from-control-lg" type="email" placeholder="Email" name="email"
              data-validation="email">
            </div>
            </div>
            <div class="form-group">
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-pencil-alt"></i>
                </span>
              </div>
              <textarea  class="form-control form-control-lg" name="comment" rows="5"
              data-validation="required"></textarea>
            </div>
            </div>
            <div class="form-group">
          <input type="submit" class="btn btn-info btn-lg btn-block" value="Submit" name="comments">
        </div>
        <?php
          if(isset($msg)){
            echo "<span class='pull-right text-success'>$msg</span>";
          }
         ?>
        </form>
      </div>
  </div>
</div>
</div>
