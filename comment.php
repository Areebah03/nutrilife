<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>NutriLife - Comments</title>
</head>

<body>
    <?php
   require 'partials/connect.php';
   require 'partials/header.php';
   ?>
<?php
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `threads` WHERE sno=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $th_title=$row['thread_title'];
        $th_desc=$row['thread_desc'];
    }
?>
<?php
$showAlert=false;
$id=$_GET['threadid'];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $comment=$_POST['comment'];
    $comment_id=$_POST['sno'];
    $showAlert=true;
    $sql="INSERT INTO `comment` ( `comment_content`, `comment_id`, `date`,`comment_user_id`) VALUES ( '$comment', '$id', current_timestamp(),'$comment_id')";
    $result=mysqli_query($conn,$sql); 
}
if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success !</strong> Your comment has been posted successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
   <?php
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `threads` WHERE sno=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $th_title=$row['thread_title'];
        $th_desc=$row['thread_desc'];
        $tid=$row['thread_user_id'];
        $usersql="SELECT `user_name` FROM `user` WHERE `sno`='$tid'";
        $myresult=mysqli_query($conn,$usersql);
        $row2=mysqli_fetch_assoc($myresult);      
   echo '<div class="container my-5">
<div class="p-5 mb-4 bg-light border rounded-3" >
   <div class="container-fluid py-5">
       <h1 class="display-5 fw-bold">'.$th_title.'</h1>
       <p class="col-md-8 fs-4" style ="width: 100%;">'.$th_desc.'</p>
       <p>Posted By : <b>'.$row2["user_name"].'</b></p>
       <hr>
       <p class="col-md-8 fs-5 text-secondary" style ="width: 100%;">This is peer to peer forum to share knowledge . Spam , advertising , self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post <em>“offensive”</em> posts, links or images. Do not cross post questions. Do not PM users asking for help. Remain respectful of other members at all times.</p>
       <button class="btn btn-danger btn-lg" type="button"><a class="text-white text-decoration-none" href="https://opentuition.com/forums/forum-rules/">Learn More</a></button>
   </div>
</div>
</div>';
    }
?>
<?php
      if(isset($_SESSION['loggedin'])&&($_SESSION['loggedin']==true)){
 echo '<div class="container my-5">
    <h1>Post a Comment</h1>
    <form action="'. $_SERVER["REQUEST_URI"].'" method="post">
    <div class="mb-3">
    <label for="comment" class="form-label">Type a Comment</label>
    <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Post Comment</button>
    <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
    </form>
    </div>';
      }
      else{
        echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
            </svg><div class="container my-5">
            <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
              You are not loggedin ! Please login to post a comment.
            </div>
            </div>
          </div>';
        }
?>
<div class="container my-5">
<h1>Discussions</h1>
    <?php
    $showNone=true;
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `comment` WHERE comment_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $showNone=false;
        $co_contect=$row['comment_content'];
        $co_id=$row['comment_user_id'];
        $mysql="SELECT `user_name` FROM `user` WHERE `sno`='$co_id'";
        $myresult=mysqli_query($conn,$mysql);
        $row2=mysqli_fetch_assoc($myresult);
        echo '<div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="d-flex text-muted pt-3">
        <img src="img/user.jpg" class="mx-3" width="32" height="32" alt="">
          <p class="pb-3 mb-0 small lh-sm border-bottom" style="width:80%;">
           '.$co_contect.'
          </p>
          <p class="mt-3">Posted By : <b>'.$row2["user_name"].'</b></p>
        </div>
      </div>';
    }
    if($showNone){
        echo ' <div class="p-3 mb-4 my-5 bg-light border rounded-3" >
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">No Comments Found !</h1>
            <hr>
            <p class="col-md-8 fs-5 text-secondary" style ="width: 100%;">Be the first one to post a comment.</p>   
        </div>
     </div>';
    }
    ?>

<?php
    require 'partials/footer.php';
?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>
</html>