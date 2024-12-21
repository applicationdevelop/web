<?php
include("conn.php");
if(isset($_POST["submit"]))
{
    
    $email=$_POST["email"];
    $mobile=$_POST["mobile"];
    
    $myq="select * from customer_data where email='$email'&& mobile='$mobile' ";
    $res=mysqli_query($con,$myq);
    $num=mysqli_num_rows($res);
    if($num==0)
    {
        echo"<script>alert('data not found');</script>";
        header("Refresh:0;url=trace.php");
    }
    else{
        echo"<script>alert('data found');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .heading{

            display: flex;
            text-transform: capitalize;
            background-color: blue;
            text-align: center;
            align-items: center;
            justify-content: space-between;
            
        }
        .head{
            a{
                font-size: 20px;
                text-decoration: none;
                color:white;
                margin: 20px;
                text-align: center;
                font-weight:bold;
                
            }
        }
        .father{
            display: grid;
            place-items: center;
        }
         table{
            width:40%;
            overflow: hidden;
            margin: 0px 20px;
            border:2px solid black;
            text-align: center;
            tr{
                border:1px solid black;
                background-color:blueviolet;
            }
            td,th{
                border: 2px solid red;
                margin: 2px;
                font-size: 20px;
                font-weight: bolder;
                text-align: center;
                text-transform: capitalize;
                padding: 4px;
            }
            td{
                padding: 10px;
            }
        }
        @media(max-width:880px)
        {
            table{
                width:20%;
                
            }
            td,th{
                font-size: 10px;
            }
        }
    </style>
</head>
<body>
<!-- header -->
<div class="heading">
    <h1>hotel booking</h1>
    <div class="head">
        <a href="index.php" >home</a>
        <a href="contactus.php" >contact</a>
        <a href="trace.php" >&lt;back</a>
    </div>
</div>
 <!-- closed header -->

 <!-- start section -->
<div class="father">
<h1>Your Order</h1>
    <table style="border: 1px solid red;">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Mobile no.</th>
            <th>booking days</th>
            <th>ruppes</th>
            <th>status</th>
            <th>reasion </th>
        </tr>
        <?php
        while($find=mysqli_fetch_array($res))
        {
        ?>
        <tr>
            <td><?php echo $find[1];?></td>
            <td><?php echo $find[2];?></td>
            <td><?php echo $find[3];?></td>
            <td><?php echo $find[4];?></td>
            <td><?php echo $find[6];?></td>
            <td><?php echo $find[7];?></td>
            <td><?php echo $find[8];?></td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>