<?php

include("conn.php");
session_start();
$user=$_GET["name"];
$h_name=$_GET["h_name"];
if(isset($_POST["login"]))
 {
    $email=$_POST["emails"];
    $password=$_POST["pass"];
    $myq="select * from customer where email='$email' && pass='$password' ";
    $res=mysqli_query($con,$myq);
    $num=mysqli_num_rows($res);
    if($num==1)
    {
        $_SESSION["email"]="rahul";
        echo"<script>alert('login successfully');</script>"; 
        header("refresh:0;url=booknow.php?name=$user&&h_name=$h_name");
    }
    else{
        echo"<script>alert('incorrect email or password');</script>";
        header("refresh:0;url=customerlogin.php?name=$user&&h_name=$h_name");
    }
    
 }
?>