<?php require_once('inc/top.php') ?>

<nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="img/t.png" alt="M" class="img-fluid" width="50" height="50">
      <h3 class="d-inline align-middle">1me!</h3>
    </a>
    <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarnav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarnav" class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link" href="blog.php"><i class="fa fa-home"></i> Blog</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-list-alt"></i> Categories
          </a>
        <div class="dropdown-menu bg-info" aria-labelledby="navbarDropdown">
<!-- Categories php -->
        <?php
          $query ="SELECT * FROM categories";
          $run =mysqli_query($con, $query);
          if(mysqli_num_rows($run) > 0){
            while($row =mysqli_fetch_array($run)){
              $category =ucfirst($row['category']);
              $id = $row['id'];
              echo "<a class='dropdown-item lead' href='blog.php?cat=".$id."  '>$category</a>";
            }
          }
          else {
            echo "<a class='dropdown-item lead' href='#'>No Categories Yet </a>";
          }
         ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal1" ><i class="fa fa-user-md" aria-hidden="true"></i> Psychologists</a>
      </li>
      </ul>
    </div>
  </div>
</nav>
