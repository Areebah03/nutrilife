<?php
include 'connect.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
    $username=$_POST['loginname'];
    $password=$_POST['lpass'];
    $sql="SELECT * FROM `user` WHERE `user_name`='$username'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        while($row=mysqli_fetch_assoc($result)){
            if(password_verify($password , $row['user_pass'])){
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['username']=$username;
                $_SESSION['sno']=$row['sno'];
                header("location:/index.php?loginsuccess=true");
        }
            else{
                $showError="Invalid Password";
                header("location:/index.php?loginfailed=true&error=$showError");
            }
        }
    }
    else{
        $showError="Invalid Username";
        header("location:/index.php?loginfailed=true&error=$showError");
    }
}
?>
