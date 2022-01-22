<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>NutriLife</title>
</head>

<body>
    <?php
   require 'partials/header.php';
   require 'partials/connect.php';
   ?>

    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/pic4.jpeg" class="d-block w-100 " height="670px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Eat Healthy</h5>
                    <p>A healthy diet is essential for good health and nutrition.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/pic3.jpeg" class="d-block w-100" height="670px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Exercise Daily</h5>
                    <p>
                        Exercise strengthens your heart and improves your circulation. </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/pic5.jpeg" class="d-block w-100" height="670px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Maintain a balance diet</h5>
                    <p>A balanced diet provides all the nutrients a person requires.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<div class="container my-5 ">
<h1 class="text-center">Nutrilife Browse Category</h1>
<div class="d-flex flex-wrap justify-content-center my-3">
<?php
$sql="SELECT * FROM `categories`";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    $title=$row['title'];
    $desc=$row['desc'];
    $id=$row['sno'];
    echo '<div class="card text-center mx-3 my-3" style="width: 18rem;">
            <img src="img/icon'.$id.'.jpeg"  class="card-img-top  " style="height:240px;" alt="...">
            <div class="card-body">
                <h5 class="card-title">'.$title.'</h5>
                <p class="card-text">'.substr($desc,0,100).'...</p>
                <a href="thread.php?catid='.$id.'" class="btn btn-danger">View Threads</a>
            </div>
    </div>';
}
?>
     </div>
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