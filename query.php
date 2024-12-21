<?php 
include("conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="refresh" content="4"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .father{
            margin:10px;
        }
        .son{
            display: grid;
            place-items: center;
            background-color: aquamarine;
        }
        ol{
            list-style: none;
            li{
                margin: 10px;
                input{
                    font-size: 30px;
                    border-radius: 10px;
                    background-color: whitesmoke;
                }
            }
        }
        button{
            font-size: 30px;
            border-radius: 20px;
            padding: 5px;
            margin: 20px;
            background-color:bisque;
        }
        button:hover{
            background-color: blue;
            transition: all 3s ease;
        }
        @media(max-width:420px)
        {
            ol{
            
            li{
                margin: 5px;
                input{
                    font-size: 20px;
                    border-radius: 10px;
                    background-color: whitesmoke;
                }
            }
        }  
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
                    <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="tel:8825358487">Contact</a></li>
                    <!-- <li class="nav-item"><a class="nav-link text-white" href="trace.php">Track Your Booking</a></li> -->
                    <li class="nav-item"><a class="nav-link text-white" href="help.html">Help</a></li>
                </ul>
                <a href="index.php">
                    <button class="btn btn-light ms-3">&lt;Back</button>

                </a>
                
            </div>
        </div>
    </nav>
    <form action="traceid.php" method="post"> 
        <div class="father">
            <div class="son">
                <h1>Submit Some Information For Trace Your Order</h1>
                <ol>
                    <li><input type="text" placeholder="enter your  email" name="email"></li>
                    <li><input type="text" placeholder="enter mobile no." name="mobile"></li>
                    <!-- <li><input type="text" placeholder="Acknowladgement number" name="id"></li> -->
                </ol>
                <button type="submit" name="submit">Submit</button>
            </div>
        </div>
    </form>
    
</body>
</html>

