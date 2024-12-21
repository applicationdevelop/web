<?php 
session_start();
$email=$_GET["email"];
$h_name=$_GET["h_name"];
if($_SESSION["useremail"]  == $email){
  
}
else{
   header("location:user.html");
}
include("conn.php");

$user=$_GET["name"];
include("connect.php");
// total hotel find
$total_hotel="select * from hotel_infor where hotel_name='$h_name'";
$h_result= mysqli_query($conn,$total_hotel);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Listed Rooms</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
               .container {
            padding-left: 15px;
            padding-right: 15px;
        }
        button{
            width:200px;

        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Hotel Booking</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="profile.php">&lt;back</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="Logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- add -->
     <?php 
     while($hotel=mysqli_fetch_array($h_result))
     {
     ?>
    <section class="listing-section">
        <div class="container">
            <h2 class="text-center mb-4">List Your Room</h2>
            <div class="form-container">
                <form action="add_room.php?name=<?php echo $user;  ?>" method="post">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="hotelName" class="form-label">hotel name</label>
                            <input type="text" class="form-control" id="hotelName" value="<?php echo $hotel[2]; ?>" placeholder="Enter hotel name" name="hotel_name" >
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="hotelName" class="form-label">aviable features</label>
                            <input type="text" class="form-control" id="hotelName" placeholder="Enter hotel name" name="hotel_feature" >
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="hotelName" class="form-label">Rooms Name/Room no.</label>
                            <input type="text" class="form-control" id="hotelName" placeholder="Enter hotel name" name="room_name" >
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="location" class="form-label">floor</label>
                            <input type="text" class="form-control" id="location" placeholder="Enter hotel location" name="floor" >
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="location" class="form-label">location</label>
                            <input type="text" class="form-control" id="location" value="<?php echo $hotel[3]; ?>" placeholder="Enter hotel location" name="location" >
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="price" class="form-label">Price per Night ($)</label>
                            <input type="number" class="form-control" id="price" placeholder="Enter price" name="prices" >
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <button type="submit" name="rahul" class="btn btn-success"> <i class="fas fa-hotel"></i>ADD ROOM</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </section>
    <?php  } ?>
</body>
</html>