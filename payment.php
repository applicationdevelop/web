<?php
include("conn.php");
if(isset($_POST["send"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $mobile=$_POST["mb"];
    $subject=$_POST["subject"];
    $message=$_POST["message"];
    $myq="insert into query(name,email,mobile,subject,message,status) values('$name','$email','$mobile','$subject','$message','unseen')";
    mysqli_query($con,$myq);
    echo"<script>alert('message sent successfully');</script>";
    header("refresh:0;url=index.php");

}
?>
<?php
session_start();
if($_SESSION["email"]=="rahul")
{


}
else{
   
    header("refresh:0;index.php");

}


$username=$_GET["user"];
$email=$_GET["email"];
$mobile=$_GET["mb"];
$price=$_GET["price"];
$day=$_GET["day"];
$datein=$_GET["datein"];
$dateout=$_GET["dateout"];
$h_name=$_GET["h_name"];
if(isset($_POST["sub"]))
{
   echo $utr=$_POST["number"];

   $myq="update customer_data set utr=$utr where username='$username' && email='$email' && mobile='$mobile' &&days='$day' ";
   $mila=mysqli_query($con,$myq);
   $my="update customer_data set rupees=$price where username='$username' && email='$email' && mobile='$mobile' &&days='$day' ";
   $mila=mysqli_query($con,$my);
   $sta="update customer_data set status='pending' where username='$username' && email='$email' && mobile='$mobile' &&days='$day' ";
   $mila=mysqli_query($con,$sta);

   echo "<script>alert('payment successfully')</script>";

   header("refresh:0;url=recipt.php?user=$username&&email=$email&&mb=$mobile&&price=$price&&day=$day&&datein=$datein&&dateout=$dateout&&h_name=$h_name&&utr=$utr ");


}
?>