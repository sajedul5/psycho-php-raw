
    <footer class="bg-info py-3">
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-md4 p-5 ftr">
              <h3 class="text-light">Get Started</h3>
              <hr>
              <ul class="list-unstyled">
                <li><a href="#" class="text-light">Mental Health News & Advice</a></li>
                <li><a href="#" class="text-light">Volunteer as a Listener</a></li>
                <li><a href="#" class="text-light">Give 1me! a Try</a></li>
                <li><a href="#" class="text-light">Our Support Community</a></li>
              </ul>
            </div>
            <div class="col-md-4 p-5  ftr">
              <h3 class="text-light">Follow Us</h3>
              <hr>
              <p class="text-light">Please Follow us on our Social Media Profile Link:</p>
              <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f m-2 text-light"></i></a>
              <a href="https://twitter.com/?lang=en" target="_blank"><i class="fab fa-twitter m-2 text-light"></i></a>
              <a href="https://bd.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in m-2 text-light"></i></a>
              <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube m-2 text-light"></i></a>
            </div>
            <div class="col-md-4 p-5 ftr">
              <h3 class="text-light">Our Newletter</h3>
              <?php
                if(isset($_POST['subscribe'])){
                  $sub_date = date("Y-m-d H:i:s");
                  $sub_email = $_POST['email'];
                  $check_query ="SELECT * FROM subscribe WHERE email='$sub_email' ";
                  $check_run = mysqli_query($con, $check_query);

                  if(mysqli_num_rows($check_run) > 0){

                    echo '<script>alert("Email Aleady Exist!")</script>';
                  }
                  else {
                    $sub_query = "INSERT INTO subscribe(date,email)
                    VALUES('$sub_date','$sub_email')";
                    if(mysqli_query($con, $sub_query)){

                      echo '<script>alert("Thank You For Subscribe!")</script>';

                    }
                  }
                }
               ?>
              <hr>
              <p class="text-light">Number of People Helped 1me! Always</p>
              <form class="" action="" method="post">
                <input class="form-control m-2" type="email" placeholder="Enter Email"
                data-validation="required email" name="email">
                <input class="form-control m-2 btn btn-outline-light" type="submit" value="Subscribe" name="subscribe">
              </form>
            </div>
          </div>
          <hr class="bg-light">
          <div class="">
                <p class="lead text-center my-5 text-light" >Copyright &copy; <?php echo date('Y'); ?> <a href="https://github.com/sajedul5">Md. Sajedul Islam Shakil</a> </p>
          </div>
        </div>
      </div>
    </footer>


<!--THE END-->

  <script src="https://kit.fontawesome.com/2146e9efd0.js"></script>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/navbar-fixed.js"></script>

<!--Form Validation -->
<script>
  $.validate();
</script>

</body>
</html>
