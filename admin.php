<?php 
session_start();
if($_SESSION["email"]=="pankaj")
{


}
else{
   
    header("location:index.php");

}

include("conn.php");
// customer user to register
$cus="select * from customer";
$cus_res=mysqli_query($con,$cus);
$cus_num=mysqli_num_rows($cus_res);
// closed customer

// customer data for appling booking hotel
$cus_data="select * from customer_data";
$cus_data_res=mysqli_query($con,$cus_data);
$cus_data_num=mysqli_num_rows($cus_data_res);
// closed customer data appling booking hotel

// hotel information and hotel database
$hotel_info="select * from hotel_infor";
$hotel_info_res=mysqli_query($con,$hotel_info);
$hotel_info_num=mysqli_num_rows($hotel_info_res);
// closed hotel information and hotel database

// hotel information and hotel database
$hotel_users="select * from hotel_users";
$hotel_users_res=mysqli_query($con,$hotel_users);
$hotel_users_num=mysqli_num_rows($hotel_users_res);
// closed hotel information and hotel database

// query or message start
$query="select * from query";
$cus_q=mysqli_query($con,$query);
$cus_q_num=mysqli_num_rows($cus_q);
// query closed

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
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .father{
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin:20px;
            border:5px solid red;
            width:90%;
            height:fit-content;
            flex-wrap: wrap;
        }
        .son{
            display: block;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin:10px;
            padding:5px;
            border:2px solid blueviolet;
            height:fit-content;
            width:fit-content;
            background-color: aquamarine;
            border-radius: 20px;
            text-transform: capitalize;
            button{
                border-radius: 10px;
                background-color:blue;
            }
            a{
                text-decoration: none;
                text-transform: capitalize;
                padding: 3px;
                color:antiquewhite;
                font-size: 20px;
                font-weight: bolder;
            }
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container">
            <a class="navbar-brand text-white" href="total.php">Hotel Booking</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="#latest"><i class="fas fa-list"></i> Latest Hotels</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#best"><i class="fas fa-star"></i> Top Rated Hotels</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="trace.php">Track Your Booking</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#contact"><i class="fas fa-envelope"></i> Contact</a></li>
                </ul>
                <a href="user.html">
                    <button class="btn btn-light ms-3"><i class="fas fa-plus"></i> List Your Hotel</button>

                </a>
                
            </div>
        </div>
    </nav>
    <div class="father">
        <?php 
        ?>
        <div class="son">
            <h1>total customer/user</h1>
            <p>only booking hotel user id</p>
           <p>Total user:-   <?php echo $cus_num; ?></p>
           <button type="submit" ><a href="totaluser.php">show details</a></button>
        </div>
        <div class="son">
            <h1>all users appling for book hotel</h1>
            <p>Total appling form:-   <?php echo $cus_data_num; ?></p>
            <button type="submit" ><a href="total_appling.php">show details</a></button>
        </div>
        <div class="son">
            <h1>hotel information</h1>
            <p>Total hotel:-   <?php echo $hotel_info_num; ?></p>
            <button type="submit" ><a href="hotel_information.php">show details</a></button>
        </div>
        <div class="son">
            <h1>hotel owner</h1>
            <p>only list new room /hodel user id</p>
            <p>Total user:-   <?php echo $hotel_users_num; ?></p>
            <button type="submit" ><a href="hotel_owner.php">show details</a></button>
        </div>
        
    </div>
    <div class="father">
        <div class="son">
         
            <h1>Help message</h1>
            <p>total query for problem</p>
           <p>Total user:-   <?php echo $cus_q_num; ?></p>
           <button type="submit" ><a href="totalmessage.php">show details</a></button>
        </div>
        <div class="son"> all user appling book hotel</div>
        <div class="son">hotel information</div>
        <div class="son">hotel room</div>
        <div class="son">hotel owner</div>
        
    </div>
</body>
</html>