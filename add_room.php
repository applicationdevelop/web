<?php 
session_start();
include("conn.php");
include("connect.php");
$user=$_GET["name"];
        // user name convert into character or array;
        $str2 ="$user";
        $ram=str_split($str2);
        $ram[0];

if(isset($_POST["rahul"]))
{
    echo $h_name=$_POST["hotel_name"];
    echo $feature=$_POST["hotel_feature"];
    echo $r_name=$_POST["room_name"];
    echo $r_floor=$_POST["floor"];
    echo $location=$_POST["location"];
    echo $r_price=$_POST["prices"];
   $myq= "insert into hotel_room(hotel_name,feature,room,location,floor,price) values('$h_name','$feature','$r_name','$location','$r_floor','$r_price')";
   $yes=mysqli_query($conn,$myq);
   $main=mysqli_query($con,$myq);
   if($yes==true)
   {
    echo"<script>alert('added successfully');</script>";
    header("refresh:0;url=profile.php?name=$user");
   }
   else{
    echo"<script>alert('added not successfully');</script>";
   }
}

if(isset($_POST["update"]))
{
    $email=$_GET["email"];
    $a=$_GET["id"];
    $data=$_GET["name"];
     $a;
    $h_name=$_POST["hotel_name"];
    $feature=$_POST["features"];
    $r_name=$_POST["room_no"];
    $r_location=$_POST["location"];
    $floor=$_POST["floor"];
    $r_price=$_POST["prices"];
   $myq= "update hotel_room set hotel_name='$h_name',feature='$feature',room='$r_name',location='$r_location',floor='$floor',price='$r_price' where id='$a'";
   $yes=mysqli_query($conn,$myq);
   $_SESSION['useremail'] =$email;
   if($yes==true)
   {
    echo"<script>alert('update successfully');</script>";

    header("refresh:0;url=edit.php?&&email=$email&&name=$data&&id=$a");
   }
   else{
    echo"<script>alert('update not successfully');</script>";
   } 
}
?>