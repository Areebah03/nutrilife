<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>NutriLife - Search</title>
</head>

<body>
    <?php
   require 'partials/connect.php';
   require 'partials/header.php';
   ?>
  <div class="container my-4">
      <h1>Search results for <em>"<?php echo$_GET["search"]?>"</em></h1>
      <?php
      $noresult=true;
      $id= $_GET["search"];
      $sql="SELECT * FROM threads WHERE match(`thread_title`,`thread_desc`) against ('$id')";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result)){
            $title=$row['thread_title'];
            $desc=$row['thread_desc'];
            $thread_id=$row['sno'];
            $noresult=false;
          echo '<div class="my-3 p-3 bg-body rounded shadow-sm">
          <div class="d-flex text-muted pt-3">
          <img src="img/user.jpg" class="mx-3" width="32" height="32" alt="">
            <p class="pb-3 mb-0 small lh-sm border-bottom" style="width:80%;">
              <strong class="d-block text-gray-dark"><a href="comment.php?threadid='.$thread_id.'" class="text-dark text-decoration-none">'.$title.'<a></strong>
             '.$desc.'
            </p>
          </div>
        </div>';
      }
      if($noresult){
          echo '   <div class="container my-5">
          <div class="p-5 mb-4 bg-light border rounded-3">
              <div class="container-fluid py-5">
              <h2>No Results Found !</h2>
              Your search - "'.$id.'" did not match any documents.
              <hr>
              <p class="my-2 "><b>Suggestions:</b></p>
              <ul>
              <li>Make sure that all words are spelled correctly.</li>
              <li>Try different keywords.</li>
              <li>Try more general keywords.</li></ul>
              </div>
          </div>
      </div>';
      }
      ?>
  </div>
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