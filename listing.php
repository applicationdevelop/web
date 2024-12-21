<?php 
session_start();
$email=$_GET["email"];
if($_SESSION["useremail"]  == $email){
  
}
else{
   header("location:user.html");
}
include("conn.php");
$user=$_GET["name"];
        // user name convert into character or array;
        $str2 ="$user";
        $ram=str_split($str2);
        $ram[0];
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
                <form action="add_hotel.php?name=<?php echo $ram[0]; ?>&&email=<?php echo $email; ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="hotelName" class="form-label">Hotel Name</label>
                            <input type="text" class="form-control" id="hotelName" placeholder="Enter hotel name" name="hotel_name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" placeholder="Enter hotel location" name="area" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="price" class="form-label">Price per Night ($)</label>
                            <input type="number" class="form-control" id="price" placeholder="Enter price" name="prices" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3" placeholder="Enter hotel description" name="details" required></textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="imageUpload" class="form-label">Upload Hotel Image</label>
                            <input type="file" class="form-control" id="imageUpload" accept="image/*" name="upload_image" required>
                            <img id="imagePreview" src="#" alt="Image Preview" class="img-thumbnail">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" name="listed_hotel"><i class="fas fa-hotel"></i> List Hotel</button>
                </form>
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