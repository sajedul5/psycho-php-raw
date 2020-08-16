
<?php
$session_username = $_SESSION['username'];


?>

<?php

//Message
$uid=$_SESSION['username'];
$get_message = "SELECT * FROM message,visitor  where visitor.email=message.email and visitor.username='$uid'";
$get_message_run = mysqli_query( $con, $get_message);
$message = mysqli_num_rows($get_message_run);


 ?>
<nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top">
  <div class="container">
    <a class="navbar-brand" href="../index.php">
      <img src="../img/t.png" alt="M" class="img-fluid" width="50" height="50">
      <h3 class="d-inline align-middle">1me!</h3>
    </a>
    <div id="navbarnav" class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" href="inbox.php"><i class="fa fa-inbox"><?php
            if($message){
              echo "<span class='badge badge-info m-1'>$message</span>";
            }
           ?></i> Inbox</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="inbox.php"><i class="fa fa-user"></i> <?php echo ucfirst($session_username); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
