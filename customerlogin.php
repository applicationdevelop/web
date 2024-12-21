<?php
include("conn.php");
$user=$_GET["name"];
$h_name=$_GET["h_name"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration and Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #e9ecef;
            /* Light gray background for the page */
        }
        
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #ffffff;
            /* White background for the form */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar {
            background-color: #28a745;
            /* Bootstrap green color for navbar */
        }
        
        footer {
            background-color: #343a40;
            /* Dark gray for footer */
        }
        input:invalid{
            color:red;
            
        }
        
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Hotel Booking</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Register or Login</h2>
        <div class="form-container">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="register-tab" data-bs-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="register-tab" data-bs-toggle="tab" href="#forget" role="tab" aria-controls="register" aria-selected="false">Forget</a>
                </li>
            </ul>
            <!-- Tab content -->
            <div class="tab-content mt-3" id="myTabContent">
                <!-- Login Form -->
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                    <form action="customerdata.php?name=<?php echo $user;?>&&h_name=<?php echo $h_name;?>" method="post">
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label" >Email</label>
                            <input type="email" class="form-control" id="loginEmail" placeholder="Enter your email" name="emails" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPassword" placeholder="Enter your password" name="pass" minlength="8" maxlength="15" required>
                        </div>
                        <button type="submit" class="btn btn-success" name="login">Login</button>
                    </form>
                </div>
                <!-- Registration Form -->
                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="registerUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="registerUsername"  placeholder="Enter your username" name="user" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="registerEmail" placeholder="Enter your email" name="emails" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerUsername" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="registerUsername" pattern="[0-9]*" placeholder="Enter Mobile number" name="mb" minlength="10" maxlength="10" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="registerPassword" placeholder="Enter new password" minlength="8" maxlength="15" name="pass" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" onkeyup="check()" id="confirmPassword" placeholder="Confirm password" minlength="8" maxlength="15" name="pass" required>
                        </div>
                        <button type="submit" class="btn btn-success" name="register">Register</button>
                    </form>
                </div>
                <!-- forget password -->
                <div class="tab-pane fade" id="forget" role="tabpanel" aria-labelledby="forget-tab">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="registerEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="registerEmail" placeholder="Enter your email" name="emails" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerUsername" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="registerUsername" pattern="[0-9]*" placeholder="Enter mobile number" minlength="10" maxlength="10" name="mb" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword" placeholder="Enter new password" minlength="8" maxlength="15" name="pass" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" onkeyup="fo()" id="confirmPass" placeholder="confirm password" name="pass" required>
                        </div>
                        <button type="submit" class="btn btn-success" name="forget">Forget password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2024 Hotel Booking. All rights reserved.</p>
        </div>
    </footer>
    <!-- scripting start -->
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
 if(isset($_POST["register"]))
 {
    $user=$_POST["user"];
    $em=$_POST["emails"];
    $mobile=$_POST["mb"];
    $password=$_POST["pass"];
    $myq="insert into customer(user,email,mobile,pass) values('$user','$em','$mobile','$password')";
    mysqli_query($con,$myq);

    echo"<script>alert('register successfully');</script>";

 }
//  forget implementation
if(isset($_POST["forget"]))
 {
    $em=$_POST["emails"];
    $mobile=$_POST["mb"];
    $password=$_POST["pass"];
    $cho="select * from customer where email='$em' && mobile='$mobile' ";
    $match_hua =  mysqli_query($con,$cho);
    $nums =  mysqli_num_rows($match_hua);
    if($nums==1)
    {
        $for_pass="update customer set pass='$password' where email = '$em' and mobile = '$mobile' ";
                mysqli_query($con,$for_pass);
                echo "<script>alert('forget password successfully');</script>";
                
    }
    else{
        echo "<script>alert('invalid email');</script>";
        header("refresh:0;url=customerlogin.php");  
    }

 }
?>