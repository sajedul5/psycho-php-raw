<!--Top Link-->
  <?php  require_once('inc/top.php');  ?>

<body>
 <!-- NAVBAR SECTION-->
<?php require_once('inc/header.php'); ?>
 <!--Showcase-->
 <section id="showcase" class="text-center text-light p-5">
  <div class="primary-overlay">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12 ">
          <div class="animated fadeInLeft">
            <h3 class="display-2 mt-5 pt-5 ">Do What You Dream Of...</h3>
            <p class="lead"> Make care, love, and belonging a reality for everyone around the world. </p>
          </div>

        </div>
      </div>
    </div>
  </div>
 </section>

  <!--About/ Why-->
  <?php require_once('about.php'); ?>

    <!--AUTHORS SECTION-->

  <section id="authors" class="text-center py-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class=" mb-5 pb-3">
            <h1 text-info><i class="fa fa-user-md pi"></i></h1>
            <h2 class="display-4 info-authors pb-3">Meet The Psychologists </h2>
            <p class="lead mt-3">Get support from an online psychologists. Want a little extra help? You can get ongoing support and guidance from a licensed psychologists when you sign up for online 1me! </p>
          </div>
        </div>
      </div>
      <div class="row slider">
        <!--Psychology Query-->
        <?php

        $query ="SELECT * FROM psychology WHERE status ='approve' ORDER BY psy_id DESC LIMIT 4 ";
        $run = mysqli_query( $con, $query);
        if(mysqli_num_rows($run) > 0){

          while($row = mysqli_fetch_array($run)){
            $image = $row['image'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $about = $row['about'];
            $psy_id =$row['psy_id'];

         ?>
        <div class="col-lg-3 col-md-6 col-sm-12 " >

          <div class="card">
            <div class="card-body">
              <a href="#" class="psych_info" data-toggle="modal" data-target="#psycho-info<?php echo $psy_id; ?>"><img  class="img-fluid rounded-circle w-50 mb-3" src="img/<?php echo $image; ?>" alt="Susan Williams"></a>
              <a href="#" class="psych_info" data-toggle="modal" data-target="#psycho-info<?php echo $psy_id; ?>"><h4 class="text-info"><?php echo $fname." ".$lname; ?></h4></a>
              <h5>Psychologist</h5>
              <!-- Modal Psycho Info Start -->
              <div class="modal fade" id="psycho-info<?php echo $psy_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title m-auto text-info" id="exampleModalLabel" >Psychologist Info</h3>
                    </div>
                    <div class="modal-body">
                      <div class="card my-3">
                        <div class="card-body">
                          <img  class="img-fluid rounded-circle w-50 mb-3" src="img/<?php echo $image; ?>" alt="Susan Williams">
                          <h4 class="text-info"><?php echo $fname." ".$lname; ?></h4>
                          <h5>Psychologist</h5>
                          <div class="d-flex flex-row justify-content-center">
                            <div class="my-3">
                              <h3 class="text-info">About</h3>
                              <hr>
                              <p class="lead "><?php echo $about; ?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal Psycho Info End -->
              <div class="d-flex flex-row justify-content-center">
                <div class="my-3">
                  <button   class="btn btn-outline-info m-4" id="<?php echo $psy_id;?>">Message</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
            }
          }
         ?>
      </div>
    </div>
    <a href="psycho_info.php" class="btn btn-outline-info mt-5 vp"><h4>View All Psychologists</h4> </a>
  </section>

  <!--Contact section-->

  <?php require_once('contact.php'); ?>

  <!--Modal Visitor-->
  <?php require_once('modal_visitor.php'); ?>
  <!--Modal Psychology-->
  <?php require_once('modal_psychology.php'); ?>

  <!-- FOOTER-->
  <?php require_once('inc/footer.php'); ?>

  <!--jQuery for Psychology ID-->

  <script>
  var n;
    $( document ).ready(function() {

     $('.btn-outline-info').on('click', function(e) {
      n = $(this).attr( "id" );
      $('#psyid').val(n);
        $('#visitor').modal('show');
       });
    });
  </script>
