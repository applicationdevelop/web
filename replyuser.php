<?php
include("conn.php");
 if(isset($_POST["reply"]))
 {
    $id=$_GET["id"];
    echo $reason=$_POST["reason"];
    echo $complete=$_POST["select"];
    $solve="update query set status='$complete' where id='$id' ";
    mysqli_query($con,$solve);

    $res_sol="update query set reason='$reason' where id='$id' ";
    mysqli_query($con,$res_sol);
    echo "<script>alert('reply success');</script>";
    header("refresh:0;url=totalmessage.php");
 }
 if(isset($_POST["delete"]))
 {
    $id=$_GET["id"];

    $solve="delete from query where id='$id' ";
    mysqli_query($con,$solve);
    echo "<script>alert('delete success');</script>";
    header("refresh:0;url=totalmessage.php");
 }
 ?>