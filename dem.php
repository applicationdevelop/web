<?php 
session_start();
if($_SESSION["email"]=="rahul")
{


}
else{
   
    header("refresh:0;index.php");

}
include("conn.php");
$user=$_GET["name"];
        // user name convert into character or array;
        $str2 ="$user";
        $ram=str_split($str2);
        $ram[0];
$id=$_GET["id"];
$price=$_GET["price"];
$h_name=$_GET["h_name"];
if(isset($_POST["confirm"]))
{
    
    $users = $_POST["user"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $date1 = $_POST["date_in"];
    $date2 = $_POST["date_out"];
    $d1=date_create($date1);
    echo"<br><br>";
    $d2=date_create($date2);
    echo"<br><br>";

    $d=date_diff($d1,$d2);
    $ram= $d->days;

    $price=$price*$ram;

    $myq="insert into customer_data(username,email,mobile,days) values('$users','$email','$mobile','$ram')";
    mysqli_query($con,$myq);
    echo" <script>alert(' information submit successfully')</script>";
    header("refresh:0;url=buy.php?user=$users&&email=$email&&mb=$mobile&&price=$price&&day=$ram&&datein=$date1&&dateout=$date2&&h_name=$h_name ");
}
?>