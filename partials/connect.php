<?php
$servername="localhost";
$username="root";
$password="ayesha0303@Zafar";
$database="nutrilife";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Connection failed due to error ".mysqli_connect_error());
}
?>