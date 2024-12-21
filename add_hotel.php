<?php


$user=$_GET["name"];
 echo $email=$_GET["email"];
include("connect.php");
include("conn.php");
if(isset($_POST["listed_hotel"]))
{

    $h_name=$_POST["hotel_name"];
    $h_location=$_POST["area"];
    $h_price=$_POST["prices"];
    $h_image=$_FILES['upload_image'];
    $file_name=$_FILES['upload_image']['name'];
    $file_tmp=$_FILES['upload_image']['tmp_name'];

    // //insert data;
    $myq="insert into hotel_infor(email,hotel_name,location,price,details,photo) values('$email','$h_name','$h_location','$h_price','best hotel','$file_name')";
    mysqli_query($conn,$myq);
    $main_data="insert into hotel_infor(hotel_name,location,price,details,photo,hotel_find) values('$h_name','$h_location','$h_price','best hotel','$file_name','$user')";
    mysqli_query($con,$main_data);
    move_uploaded_file($file_tmp,"hotel-image/".$file_name);
    echo"<script> alert(' listed success');</script>";
    header("refresh:0;url=listing.php?name=$user");
}
// contact message implementation of index.php page

//

?>