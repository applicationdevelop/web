<?php
session_start();
if($_SESSION["email"]=="pankaj")
{


}
else{
   
    header("location:index.php");

}
include("conn.php");
// total data
$cus_data="select * from hotel_infor";
$cus_data_res=mysqli_query($con,$cus_data);
$cus_data_num=mysqli_num_rows($cus_data_res);
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
        img{
            height:100px;
            width:100px;
        }
        .father{
            display: grid;
            place-items: center;
        }
         table{
            width:90%;
            margin: 0px 20px 20px;
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
        button{
            padding: 3px 10px;
            border-radius: 20px;
            margin:10px;
            background-color:chartreuse;
        }
        a{
            text-decoration: none;
            font-size: 30px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Hotel Booking</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="tel:8825358487">Contact</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="trace.php">Track Your Booking</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="help.html">Help</a></li>
                </ul>
                <a href="trace.php">
                    <button class="btn btn-light ms-3">&lt;Back</button>

                </a>
                
            </div>
        </div>
    </nav>
<div class="father">
<h1>Information of hotels</h1>
    <table style="border: 1px solid red;">
        <tr>
            <th>id</th>
            <th>Hotel name</th>
            <th>location</th>
            <th>price</th>
            <th>image</th>
            <th>database</th>
            <th>rating</th>
            <th>action</th>
 
        </tr>
        <?php
        while($find=mysqli_fetch_array($cus_data_res))
        {
        ?>

        <form action="?id=<?php echo $find[0];?>" method="post">
        <tr>
            <td><?php echo $find[0];?></td>
            <td><?php echo $find[1];?></td>
            <td><?php echo $find[2];?></td>
            <td><?php echo $find[3];?>rs</td>
            <td><img src="hotel-image/<?php echo $find[5];?>"></td>
            <td><?php echo $find[6];?></td>
            <td><?php echo $find[7];?></td>
            
            <td><button type="submit" name="delete">Delete</button></td>

        </tr>
        </form>
        <?php } ?>
    </table>
</div>
<footer>
    <div></div>
</footer>
</body>
</html>
<?php
if(isset($_POST["delete"]))
{
    $id=$_GET["id"];
    $delete="delete from hotel_infor where id='$id'";
    $data_res=mysqli_query($con,$delete);
    echo "<script>alert('delete success');</script>";

}
?>