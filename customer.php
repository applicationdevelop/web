<?php
session_start();
if($_SESSION["email"]=="rahul")
{


}
else{
   
    header("refresh:0;index.php");

}
$user=$_GET["name"];
$id=$_GET["id"];
$h_name=$_GET["h_name"];
$price=$_GET["price"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f4f8;
            /* Light background for overall page */
        }
        a{
            color:white;
            text-decoration: none;
            
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
            font-size: 20px;
            margin:5px 20px;
            font-weight: bold;
            /* Blue border for buttons */
        }
        
        .btn-success:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
            border-color: #0056b3;
            /* Darker blue border on hover */
        }
        .change{
            background-color:red;
            animation: coloring 1s linear 5s infinite;
        }
        @keyframes coloring {
            fron{
                background-color:burlywood;
            }
            to{
                background-color:blueviolet;
            }
            
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Hotel Booking</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Latest Hotels</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Top Rated Hotels</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Guest Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="contactus.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 ">
        <h2 class="text-center">Book Your Room</h2>
        <form class="booking-form change" action="dem.php?name=<?php echo $user; ?>&&id=<?php echo $id; ?>&&h_name=<?php echo $h_name;?>&&price=<?php echo $price; ?>" method="post">
            <div class="row ">
                <div class="col-md-4 mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter your username" name="user" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" name="mobile" required>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-4 mb-3">
                    <label for="checkin" class="form-label" >Check-in Date</label>
                    <input type="date" class="form-control" id="checkin"  name="date_in" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="checkout" class="form-label">Check-out Date</label>
                    <input type="date" class="form-control" id="checkout" name="date_out" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success" name="confirm">Confirm Paytment</button>
            <button type="submit" class="btn btn-success"><a href="booknow.php?name=<?php echo $user; ?>&&id=<?php echo $id; ?>&&h_name=<?php echo $h_name;?>"><span id="sy">&#215;</span>Cancel</a></button>
            
        </form>
    </div>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2024 Hotel Booking. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
