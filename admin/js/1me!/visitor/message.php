<?php require_once('inc/top.php'); ?>
 <!-- NAVBAR SECTION-->

<?php require_once('inc/nav.php'); ?>
<!--Message-->
<?php
  if(isset($_GET['id'])){
    $psy_id= $_GET['id'];
  }
  if(isset($_POST['message'])){
    $m_name = $_POST['name'];
    $m_email = $_POST['email'];
    $m_message = $_POST['p_message'];
    $m_date = date("Y-m-d H:i:s");



    $m_query = "INSERT INTO message(date,  psy_id, name, email, message)
    VALUES('$m_date','$psy_id','$m_name','$m_email','$m_message')";
    if(mysqli_query($con, $m_query)){
      echo '<script>alert("Thank You For Message!")</script>';

  }
}

 ?>
<section id="contact" class="my-5 bg-light p-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-12">
          <div class="info-contact">
            <h2 class="display-4">Get In Touch With Psychologists</h2>
            <p class="lead">Leading doctors, psychologists, psychiatrists, share mental health news, guidance and support.</p>
          </div>
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
                <input class="form-control from-control-lg"type="email" placeholder="Email" name="email"
                data-validation="required email">
              </div>
              </div>
              <div class="form-group">
              <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-pencil-alt"></i>
                  </span>
                </div>
                <textarea  class="form-control form-control-lg" name="p_message" rows="5"
                data-validation="required"></textarea>
              </div>
              </div>
              <div class="form-group">
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="message">
          </div>
          </form>
        </div>
  </div>
</section>

<!-- FOOTER-->
<?php require_once('inc/footer.php'); ?>
