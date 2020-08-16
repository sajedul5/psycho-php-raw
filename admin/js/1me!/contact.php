<!--Message-->
<?php
  if(isset($_POST['msg'])){
    $c_name = $_POST['name'];
    $c_email = $_POST['email'];
    $c_msg = $_POST['message'];
    $c_date = date("Y-m-d H:i:s");

    $cs_query = "INSERT INTO contact(date, name, email, message)
    VALUES('$c_date','$c_name','$c_email','$c_msg')";
    if(mysqli_query($con, $cs_query)){

      echo '<script>alert("Thank You For Message!")</script>';

    }
  }
 ?>

<section id="contact" class="my-5 bg-light p-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-12">
          <div class="info-contact">
            <h2 class="display-4">Get In Touch</h2>
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
                <textarea  class="form-control form-control-lg" name="message" rows="5"
                data-validation="length" data-validation-length="20-200"></textarea>
              </div>
              </div>
              <div class="form-group">
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Submit" name="msg">
          </div>
          </form>
        </div>
        <div class="col-lg-3 align-self-center">
          <img  class="img-fluid d-none d-lg-block" src="img/mlogo.png" alt="Mizuxe">
        </div>
      </div>
  </div>
</section>
