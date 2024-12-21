
<?php
session_start();
if($_SESSION["email"]=="rahul")
{


}
else{
   
    header("refresh:0;index.php");

}

$user=$_GET["name"];
$h_name=$_GET["h_name"];

include("conn.php");
$myq="select * from hotel_infor";
$hotel_name= mysqli_query($con,$myq);

include("connect.php");
$myq="select * from hotel_room where hotel_name='$h_name'";
$res=mysqli_query($conn,$myq);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="20">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
    <style>
        body{
            background-color:burlywood;
            animation: coloring 1s linear 2s infinite;
        }
        @keyframes coloring {
            fron{
                background-color: greenyellow;
            }
            to{
                background-color: blue;
            }
            
        }
        table{
            width:90%;
            margin:10px 20px;
            background-color:red;
            text-transform: capitalize;
            border:1px solid black;
            
        }
        th
        {
            border:1px solid black;
            font-size: 20px;
            font-family: tahoma;
        }
        td {
            border:1px solid black;
            padding:5px;
            font-weight: bold;
            color:wheat;
            text-transform: capitalize;
            button{
                font-size: 20px;
                font-weight: bolder;
                color:blue;
                border-radius: 10px;
                padding: 0px 20px;
                margin:2px;
                background-color: greenyellow;

                a{
                    text-decoration: none;
                }
            }
        }
        button:hover{
            background-color:blue;
            transform:scale(1.1);
            color:yellow;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.7);
        }
        h1{
            text-align: center;
            text-transform: capitalize;
            margin: 10px 10px 30px 10px;
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
                    <li class="nav-item"><a class="nav-link text-white" href="index.php"><i class="fas fa-list"></i> Latest Hotels</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="index.php"><i class="fas fa-star"></i> Top Rated Hotels</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="reviews"><i class="fas fa-comments"></i> Guest Reviews</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="contactus.php"><i class="fas fa-envelope"></i> Contact</a></li>
                </ul>
                <a href="index.php">
                    <button class="btn btn-light ms-3">&lt;Back</button>

                </a>
                
            </div>
        </div>
    </nav>
    <!-- hotel name -->
 
     <h1> welcome to <?php echo $h_name; ?> hotel</h1>
     <!-- total room in hotel -->
    <div class="father">
        <div class="son">
            <table >
                <tr>
                    <th>hotel name</th>
                    <th>feature</th>
                    <th>room no</th>
                    <th>location</th>
                    <th>floor</th>

                    <th>price</th>
                    <th>payment</th>
                </tr>
                <?php 
                while($result=mysqli_fetch_array($res))
                {
                    // if(hotel_name==$h_name)
                    // {
                ?>
                <tr>
               
                    <td><?php echo $result[1]; ?></td>
                    <td><?php echo $result[2]; ?></td>
                    <td><?php echo $result[3]; ?></td>
                    <td><?php echo $result[4]; ?></td>
                    <td><?php echo $result[5]; ?></td>
                    <td><?php echo $result[6]; ?></td>
                    <td><a href="customer.php?name=<?php echo $user; ?>&&id=<?php echo $result[4];?>&&h_name=<?php echo $h_name;?>&&price=<?php echo $result[6]; ?>"><button>Buy</button></a></td>
                    
                </tr>
                <?php
                    // }
             } ?>
                
            </table>
        </div>
    </div>

</body>
</html>