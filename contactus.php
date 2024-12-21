<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact page</title>
    <style>
        .father{
            display: block;
            width:100%;
            text-align: center;
            background-color:antiquewhite ;
            
        }
        .son{
            display:block;
            justify-content: center;
            align-items: center;
            width: 100%;
            background-color:antiquewhite ;
            text-transform: capitalize;
            text-align: center;
            
            input{
                width:90%;
                font-size: 20px;
                padding:5px 10px;
                border-radius: 15px;
                text-align: start;
                margin:10px;


            }
            label{
                font-size: 30px;
                color:blueviolet;
                font-weight: bolder;
            }
            textarea{
                width: 95%;
                margin:10px;
                font-size: 20px;
                padding:4px;
                font-size: 20px;

            }
            h1{
                text-align: center;
                font-size: 40px;
                font-weight: bolder;
                font-style: italic;
            }
        }
        button{
            font-size: 30px;
            border-radius: 20px;
            padding:5px;
            background-color: blue;
            color:pink;
            margin:10px;
        }
        button:hover{
            background-color: greenyellow;
            color:red;
            transition: all 0.5s ease;
        }
    </style>
</head>
<body>
    <form action="" method="post">
    <div class="father">
        <div class="son">
            <h1>contect us </h1>
            <label>your name</label><br>
            <input type="text" placeholder="your full name" name="name" required><br>
            <label>your email</label><br>
            <input type="text" placeholder="email id" name="email" required><br>
            <label>mobile number</label><br>
            <input type="text" placeholder="mobile number" name="mb" required><br>
            <label>subject/ problem</label><br>
            <input type="text" placeholder="subject of problem" name="subject" required><br>
            <label>your message</label><br>
            <textarea rows="3" cols="20" minlength="10" maxlength="200" placeholder="your message" name="massage"></textarea><br>

        </div>
        <button type="submit" name="submit">Submit</button>
    </div>
    </form>
</body>
</html>
<?php
include("conn.php");
if(isset($_POST["submit"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $mobile=$_POST["mb"];
    $subject=$_POST["subject"];
    $message=$_POST["massage"];
    $myq="insert into query(name,email,mobile,subject,message) values('$name','$email','$mobile','$subject','$message')";
    mysqli_query($con,$myq);
    echo"<script>alert('message sent successfully');</script>";
    header("refresh:0;url=index.php");
}
?>