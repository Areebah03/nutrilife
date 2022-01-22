<?php
require 'connect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $signname=$_POST["signname"];
    $signpass=$_POST["signpass"];
    $cpass=$_POST["cpass"];
    $exitSql="SELECT * FROM `user` WHERE `user_name`='$signname'";
    $result=mysqli_query($conn,$exitSql);
    $num=mysqli_num_rows($result);
    if($num>0){
        $showError="Username already in use";
        header("location:/index.php?signupfailed=true&error=$showError");
    }
    else{
    if($signpass==$cpass){
            $hash=password_hash($signpass,PASSWORD_DEFAULT);
            $sql="INSERT INTO `user` ( `user_name`, `user_pass`, `date`) VALUES ( '$signname', '$hash', current_timestamp())";
            $result=mysqli_query($conn,$sql);
            if($result){
            header("location:/index.php?signupsuccess=true");
            }
        }
            else{
                $showError="Passwords do not match";
                header("location:/index.php?signupfailed=true&error=$showError"); 
            }
    }
}

?>
