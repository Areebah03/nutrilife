<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>NutriLife - Feedback</title>
</head>

<body>
    <?php
   require 'partials/header.php';
   require 'partials/connect.php';
   ?>
   <?php
   $showAlert=false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name=$_POST['name'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $check=$_POST['check'];
        $textarea=$_POST['textarea'];
        $showAlert=true;
        $sql="INSERT INTO `feedback` (`name`, `address`, `phoneno`, `hour`, `feedback`, `date`) VALUES ('$name', '$address', '$phone', '$check', '$textarea', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You response has been submitted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
   ?>
    <div class="container mt-5">
        <h1 class="text-center">Feedback</h1>
        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
            <div class="mb-3">
                <label for="name"  class="form-label">Enter your Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="address"  class="form-label">Enter your Address</label>
                <input type="text" name="address" class="form-control" id="address">
            </div>
            <div class="mb-3">
                <label for="phone"  class="form-label">Enter your Phone Number</label>
                <input type="number" name="phone" class="form-control" id="phone">
            </div>
            <select class="form-select mb-3" name="check" aria-label="Default select example">
                <option selected>How much time you exercise daily?</option>
                <option value="1">1 hr</option>
                <option value="2">2 hr</option>
                <option value="3">3 hr</option>
            </select>
            <div class="mb-3">
                <label for="textarea"  class="form-label">Write about us</label>
                <textarea class="form-control" name="textarea" id="textarea" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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