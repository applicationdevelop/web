<?php
include("conn.php");

$username=$_GET["user"];
$email=$_GET["email"];
$mobile=$_GET["mb"];
$price=$_GET["price"];
$day=$_GET["day"];
$datein=$_GET["datein"];
$dateout=$_GET["dateout"];
$h_name=$_GET["h_name"];
$utr=$_GET["utr"];
 $p=$price/$day;
//  find hotel data
$myq="select * from hotel_infor where hotel_name='$h_name' ";
$room=mysqli_query($con,$myq);

while($res=mysqli_fetch_array($room))
{
    //select old database
 $database= $res[6];
         // user name convert into character or array;
         $str2 ="$database";
         $ram=str_split($str2);
         echo $ram[0];
         $find_data=mysqli_connect("sql205.infinityfree.com","if0_37240688","0ewq2WpY6rqU","if0_37240688_$ram[0]");
//  $find_data=mysqli_connect("localhost","root","","$ram[0]");
 $find_room="select * from hotel_room where price='$p' ";

 $roon_found=mysqli_query($find_data, $find_room);
 while($rooms=mysqli_fetch_array($roon_found))
 {

?>
<!-- dem -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #f0f4f8;
            /* Light background for overall page */
        }
        
        .booking-form {
            max-width: 800px;
            /* Set max width */
            margin: 0 auto;
            /* Center the form */
            padding: 20px;
            /* Add some padding */
            border: 1px solid #ccc;
            /* Optional: Add a border */
            border-radius: 10px;
            /* Optional: Add rounded corners */
            background-color: #ffffff;
            /* White background for form */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            /* Optional: Add a subtle shadow */
        }
        
        .navbar {
            background-color: #004d7a;
            /* Dark blue for navbar */
        }
        
        .navbar-brand,
        .nav-link {
            color: #ffffff !important;
            /* White text for navbar items */
        }
        
        .btn-success {
            background-color: #007bff;
            /* Blue for buttons */
            border-color: #007bff;
            /* Blue border for buttons */
        }
        
        .btn-success:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
            border-color: #0056b3;
            /* Darker blue border on hover */
        }
        p{
            font-size: 20px;
            color:blue;
        }
        span{
            color:red;
            font-size: 20px;
            margin:20px;
        }
        button{
            margin:10px;
        }
        a{
            color:whitesmoke;
            text-decoration: none;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-3">

        <h2 class="text-center"> Recipt of Booking Room </h2>
        <form class="booking-form" action="dataupdate.php?id=<?php echo $id; ?>" method="post">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="username" class="form-label">Username</label>
                    <p><?php echo $username;?></p>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <p><?php echo $email;?></p>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <p><?php echo $mobile;?></p>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-4 mb-3">
                    <label for="checkin" class="form-label" >Hotel name</label>
                    <p><?php echo $h_name;?></p>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="checkout" class="form-label">Days</label>
                    <p><?php echo $day;?></p>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="checkout" class="form-label">Rupee's</label>
                    <p><?php echo $price;?></p>
                </div>
                
            </div>
            <div class="row">
                
                <div class="col-md-4 mb-3">
                    <label for="checkin" class="form-label" >check in date in hotel</label>
                    <input type="date" class="form-control" value="<?php echo $datein;?>" id="checkin"  name="date_in" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="checkout" class="form-label">check out date in hotel </label>
                    <input type="date" class="form-control" value="<?php echo $dateout;?>" id="checkout" name="date_out" disabled>
                </div>
               
            </div>
            <div class="row">
                
                <div class="col-md-4 mb-3">
                    <label for="checkin" class="form-label" >Utr</label>
                    <p><?php echo $utr;?></p>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="checkout" class="form-label">room no</label>
                    <p><?php echo $rooms[2];?></p>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="checkout" class="form-label">feature</label>
                    <p><?php echo $rooms[1];?></p>
                </div>
                
            </div>
            <span>Note:-please take Screenshot carefully <details>I am humble request to take a screenshot thank you users</details></span><br>
            <button type="submit" class="btn btn-success" name="down">Recipt download</button>
            <button type="submit" class="btn btn-success"><a href="index.php">&lt;back</a></button>
            
        </form>
</body>

</html>
<?php 
 }
}
?>