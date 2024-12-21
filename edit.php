<?php
if(isset($_POST["del"]))
{
    $email=$_GET["email"];
    $h_name=$_GET["name"];
    $id=$_GET["id"];
    include("conn.php");
    include("connect.php");
    $myq="delete from hotel_room where id='$id'";
    $h_room=mysqli_query($conn,$myq);
    echo "<script>alert('delete successfully');</script>"; 
    header("refresh:0;url=profile.php?&&name=<?php echo $h_name;?>&&email=<?php echo $email;?>");

}
?>
<?php 
if(isset($_POST["edit"]))
{
$email=$_GET["email"];
$h_name=$_GET["name"];
$id=$_GET["id"];
include("conn.php");
include("connect.php");
$myq="select * from hotel_room where id='$id'";
$h_room=mysqli_query($conn,$myq);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Your Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        a{
            text-decoration: none;
            color: #f8f9fa;
        }
        .listing-section {
            padding: 40px 0;
            background-color: #f8f9fa;
            /* Light background color */
            border-radius: 8px;
            /* Rounded corners */
        }
        
        .form-container {
            background-color: white;
            /* White background for the form */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
        }
        
        #imagePreview {
            display: none;
            max-width: 100%;
            height: auto;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Hotel Booking</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#list">List Your Hotel</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="listing-section">
        <div class="container">
            <h2 class="text-center mb-4">List Your Hotel</h2>
            <div class="form-container">
                <?php 
                while($room=mysqli_fetch_array($h_room))
                {
                ?>
                <form action="add_room.php?id=<?php echo $id;?>&&name=<?php echo $h_name;?>&&email=<?php echo $email;?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="hotelName" class="form-label">Hotel Name</label>
                            <input type="text" class="form-control" value="<?php echo $room[1]; ?>" id="hotelName" placeholder="Enter hotel name" name="hotel_name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="location" class="form-label">features</label>
                            <input type="text" class="form-control" value="<?php echo $room[2]; ?>" id="location" placeholder="Enter hotel location" name="features" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="price" class="form-label">Room Name/Room no.</label>
                            <input type="text" class="form-control" value="<?php echo $room[3]; ?>" id="price" placeholder="Enter price" name="room_no" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="price" class="form-label">Location</label>
                            <input type="text" class="form-control" value="<?php echo $room[4]; ?>" id="price" placeholder="Enter price" name="location" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="price" class="form-label">floor</label>
                            <input type="number" class="form-control" value="<?php echo $room[5]; ?>" id="price" placeholder="Enter price" name="floor" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="price" class="form-label">prices</label>
                            <input type="number" class="form-control" value="<?php echo $room[6]; ?>" id="price" placeholder="Enter price" name="prices" required>
                        </div>
                       
                    </div>
                    <button type="submit" class="btn btn-success" name="update"><i class="fas fa-hotel"></i> Update Room</button>
                    <button type="submit" class="btn btn-success"><a href="profile.php?name=<?php echo $h_name;?>&&email=<?php echo $email;?>">&lt;Back</a></button>
                </form>
                <?php } ?>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h4><i class="fas fa-info-circle"></i> About Us</h4>
                    <p>Your reliable hotel booking service providing a range of options to meet your needs.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h4><i class="fas fa-envelope"></i> Contact Us</h4>
                    <p>Email: contact@hotelbooking.com</p>
                    <p>Phone: (123) 456-7890</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h4><i class="fas fa-users"></i> Follow Us</h4>
                    <div>
                        <a class="text-white mx-2" href="#"><i class="fab fa-facebook"></i></a>
                        <a class="text-white mx-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="text-white mx-2" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="text-center bg-dark text-white py-2">
        <p>&copy; 2024 Hotel Booking. All rights reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('imageUpload').addEventListener('change', function(event) {
            const preview = document.getElementById('imagePreview');
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>
<?php
if(isset($_POST["update"]))
{
    $hotel_name=$_POST["h"];
}
?>