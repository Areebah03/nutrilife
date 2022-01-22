<?php
session_start();
include 'connect.php';
include 'loginmodal.php';
include 'signupmodal.php';
 echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="index.php">
      <img src="img/logo1.png" alt="" width="30" height="24">
    </a>
    <a class="navbar-brand" href="index.php">NutriLife</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Top Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

        $sql="SELECT title, sno FROM `categories` LIMIT 3 ";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
        echo '
            <li><a class="dropdown-item" href="thread.php?catid='.$row["sno"].'">'.$row["title"].'</a></li>';
        }
        echo '
        </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Feedback</a>
        </li>
      </ul>
      <form action="/search.php" method="get" class="d-flex">
        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
      ';

      if(!(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']==true))){
      echo '<button class="btn  btn-warning mx-2"  type="submit" data-bs-toggle="modal" data-bs-target="#login">Login</button>
      <button class="btn  btn-warning" type="submit" data-bs-toggle="modal" data-bs-target="#signup">Signup</button>
      </div>
      </div>
      </nav>';
      }
      if(isset($_SESSION['loggedin'])&&($_SESSION['loggedin']==true)){
       
        echo ' <button type="text" class=" btn-danger btn-sm text-white mx-3"><b>Welcome : '.$_SESSION["username"].'</b></button>
        <button class="btn  btn-warning " type="submit" ><a class="text-black text-decoration-none" href="partials/logout.php">Logout</a></button>
        </div>
        </div>
        </nav>';
      }

if(isset($_GET['signupsuccess'])&&($_GET['signupsuccess']=="true")){
  echo '<div class="alert mb-0 alert-success alert-dismissible fade show" role="alert">
  <strong>Success !</strong> Your account has been created successfully. You can now login.
  <button type="button" class="btn-close "  data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['signupfailed'])&&($_GET['signupfailed']=="true")){
  echo '<div class="alert mb-0 alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> Username already in use or password do not match.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['loginsuccess'])&&($_GET['loginsuccess']=="true")){
  echo '<div class="alert mb-0 alert-success alert-dismissible fade show" role="alert">
  <strong>Success !</strong> You have logged in successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['loginfailed'])&&($_GET['loginfailed']=="true")){
  echo '<div class="alert mb-0 alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> Invalid Credentials.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['logoutsuccess'])&&($_GET['logoutsuccess']=="true")){
  echo '<div class="alert mb-0 alert-success alert-dismissible fade show" role="alert">
  <strong>Success !</strong> You have been logged out successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>