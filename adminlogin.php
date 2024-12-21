<?php 
include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration & Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .Father {
            max-width: 600px;
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .buttons{
            width: 100%;
            
        }
        input:invalid{
            color:red;
            
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
                    <li class="nav-item"><a class="nav-link text-white" href="#latest"><i class="fas fa-list"></i> Latest Rooms</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#best"><i class="fas fa-star"></i> Best Rooms</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#reviews"><i class="fas fa-comments"></i> Reviews</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#contact"><i class="fas fa-envelope"></i> Contact</a></li>
                </ul>
                <button class="btn btn-light ms-3"><i class="fas fa-plus"></i> List Your Room</button>
            </div>
        </div>
    </nav>

    <div class="container Father">
        <h2 class="text-center mb-4">Admin Login & forget password</h2>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="login-tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="false">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="login-tab" data-bs-toggle="tab" href="#forget" role="tab" aria-controls="login" aria-selected="false">forget</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                <form class="mt-4" method="post" action="login.php">
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="pass" placeholder="Password" minlength="8" maxlength="15" required>
                    </div>
                    <button type="submit" name="adminlogin" class="btn btn-success buttons">Login</button>
                    
                </form>
            </div>
            <div class="tab-pane fade" id="forget" role="tabpanel" aria-labelledby="forget-tab">
                <form class="mt-4" method="post" action="">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="user" pattern="[a-z]*" placeholder="Your Name without any space and symbol" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="mb" placeholder="Your mobile no" minlength="10" maxlength="10" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" id="newPassword" class="form-control" name="pass" placeholder="Enter new Password" minlength="8" maxlength="15" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" id="confirmPass" onkeyup="fo()" class="form-control" placeholder=" confirm Password" minlength="8" maxlength="15" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100" name="forget">Forget password</button>
                </form>
            </div>
        </div>
    </div>
    <!-- forget sec -->
    

    <div class="text-center bg-dark text-white py-2">
        <p>&copy; 2024 Hotel Booking. All rights reserved.</p>
    </div>
    <!-- scripting starting....  -->
     <script>
        function check()
        {
            let a=document.getElementById("registerPassword").value;
            let b=document.getElementById("confirmPassword").value;
            if(a==b)
        {
            document.getElementById("confirmPassword").style.border="1px solid black";
        }
        else{
            document.getElementById("confirmPassword").style.border="4px solid red";
        }
        }
        // forget confirm
        function fo()
        {
            let n=document.getElementById("newPassword").value;
            let c=document.getElementById("confirmPass").value;
            if(n==c)
        {
            document.getElementById("confirmPass").style.border="1px solid black";
        }
        else{
            document.getElementById("confirmPass").style.border="4px solid red";
        }
        }
     </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
if(isset($_POST["forget"]))
{
$user =$_POST["user"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$mobile = $_POST["mb"];
$mera_query =  "select * from adminlogin where user_name='$user' && email = '$email' and mobile = '$mobile'";
$data_match_hua =  mysqli_query($con,$mera_query);
echo $row =  mysqli_num_rows($data_match_hua);

if($row == 1){

$forget="update adminlogin set password='$pass' where user_name='$user' && email = '$email' and mobile = '$mobile' ";
echo "<script>alert('forget successfully');</script>";
mysqli_query($con,$forget);
}else{
    echo "<script>alert('data not found');</script>";
}
}
?>