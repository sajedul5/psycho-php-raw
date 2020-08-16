
<?php

$session_username = $_SESSION['username'];

 ?>

<nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top">
    <a class="navbar-brand" href="../index.php">
      <img src="../img/t.png" alt="M" class="img-fluid" width="50" height="50">
      <h3 class="d-inline align-middle">1me!</h3>
    </a>
    <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarnav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarnav" class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="add-post.php" ><i class="fa fa-plus-square"></i>Add Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php"><i class="fa fa-user"></i><?php echo ucfirst($session_username); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
        </li>
      </ul>
    </div>
</nav>
