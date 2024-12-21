<?php
include("conn.php");
$id=$_GET["id"];
if(isset($_POST["confirm"]))
{
     echo $status=$_POST["st"];
     echo $reg=$_POST["reg"];
    $insert="update customer_data set status='$status' where id='$id' ";
    mysqli_query($con,$insert);

    $insert_res="update customer_data set reason='$reg' where id='$id' ";
    mysqli_query($con,$insert_res);

    echo"<script>alert('update success');</script>";
    header("refresh:0;url=total_appling.php");
}
if(isset($_POST["down"]))
{
    echo"<script>alert('download successfully');</script>";
}
// delete button implementation for applingedit.php page 
if(isset($_POST["delete"]))
{
    $insert="delete from customer_data where id='$id' ";
    mysqli_query($con,$insert);
    echo"<script>alert('delete successfully');</script>";
    header("refresh:0;url=total_appling.php");
}
?>
