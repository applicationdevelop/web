<?php
session_start();
if($_SESSION["email"]=="rahul")
{


}
else{
   
    header("refresh:0;index.php");

}
include("conn.php");
$username=$_GET["user"];
$email=$_GET["email"];
$mobile=$_GET["mb"];
$price=$_GET["price"];
$day=$_GET["day"];
$datein=$_GET["datein"];
$dateout=$_GET["dateout"];
$h_name=$_GET["h_name"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
    <style>
        body{
            background-color:burlywood;
        }
        a{
            font-size: 20px;
            text-decoration: none;
            
        }
        img{
            height: 200px;
            width: 200px;
            margin: 10px;
        }
        .father{
            display:grid;
            place-content: center;
        }
        .son{
            display:block;
            border-radius: 20px;
            background-color:bisque;
            margin:10px 0px;
            padding:30px;
            width:fit-content;
            text-transform: capitalize;
            justify-content: center;
            align-items: center;
            text-align: center;
            input,button{
                width:100%;
                margin:12px;
                font-size: 20px;
                font-weight: bolder;
                border-radius: 20px;
                text-align: center;
            }
        }
        button:hover{
            background-color: blue;
            transition: all 2s ease;
        }
        h5{
            font-weight: bolder;
            color:blueviolet;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            span{
                color:blue;
            }
        }
    </style>
</head>
<body>

    <!-- payment sec -->
   <form action="payment.php?user=<?php echo $username;?>&&email=<?php echo $email;?>&&mb=<?php echo $mobile;?>&&price=<?php echo $price;?>&&day=<?php echo $day;?>&&datein=<?php echo $datein;?>&&dateout=<?php echo $dateout;?>&&h_name=<?php echo $h_name;?>" method="post">
        <div class="father">
                <div class="son">
                <h1>payment method</h1>
                <img src="pay.jpg"><br>
                <h1 style="color:blueviolet"><span style="color:blue">PAY:  </span><?php echo $price;?><span>rs</span></h1>
                <h5><span>Booking days:- </span><?php echo $day;?></h5>
                <h5><span>UPI ID: </span> 8825358487@ybl</h5>

                <input type="text" maxlength="12" placeholder="submit 12 digit utr number" minlength="12" name="number" required><br>
                <button type="submit" name="sub">Submit</button>
                <button type="submit" ><a href="index.php">&#215;Cencal</a></button>
            </div>
        </div>
   </form>
</body>
</html>
<?php

?>