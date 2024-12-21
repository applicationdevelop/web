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
$id=$_GET["id"];
$cus_data="select * from hotel_users where id='$id' ";
$cus_data_res=mysqli_query($con,$cus_data);
$cus_data_num=mysqli_num_rows($cus_data_res);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
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
        button{
            margin:0px 20px;
        }
        input:invalid{
            color:red;
        }
        a{
            color:white;
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="hotel_owner.php">&lt;Bcak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <?php 
        while($find=mysqli_fetch_array($cus_data_res))
        {
        ?>
        <h2 class="text-center">edit/delete hotel users</h2>
        <form class="booking-form" action="?id=<?php echo $id; ?>" method="post">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" value="<?php echo $find[1];?>" id="username" placeholder="Enter your username" name="user" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" value="<?php echo $find[2];?>" id="email" placeholder="Enter your email" name="email" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" value="<?php echo $find[3];?>" id="phone" placeholder="Enter your phone number" name="mobile" minlength="10" maxlength="10" required>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-4 mb-3">
                    <label for="checkin" class="form-label" >Password</label>
                    <input type="text" class="form-control" value="<?php echo $find[4];?>"  name="password" minlength="8" maxlength="15" required>
                </div>
               
            </div>
            
            <button type="submit" class="btn btn-success" name="confirm">Update</button>
            <button type="submit" class="btn btn-success" name="delete">Delete</button>
            <button type="submit" class="btn btn-success" ><a href="hotel_owner.php">back</a></button>
            
        </form>
        <?php } ?>
    </div>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2024 Hotel Booking. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
<?php
if(isset($_POST["confirm"]))
{
    $user=$_POST["user"];
    $email=$_POST["email"];
    $mobile=$_POST["mobile"];
    $pass=$_POST["password"];

    $insert="update hotel_users set name='$user' where id='$id' ";
    mysqli_query($con,$insert);

    $insert_em="update hotel_users set email='$email' where id='$id' ";
    mysqli_query($con,$insert_em);

    $insert_mb="update hotel_users set mobile='$mobile' where id='$id' ";
    mysqli_query($con,$insert_mb);
    $insert_pass="update hotel_users set password='$pass' where id='$id' ";
    mysqli_query($con,$insert_pass);

    echo"<script>alert('update success');</script>"; 
}
// delete button implementation
if(isset($_POST["delete"]))
{
    $insert="delete from hotel_users where id='$id' ";
    mysqli_query($con,$insert);
    echo"<script>alert('delete successfully');</script>";
}
?>
