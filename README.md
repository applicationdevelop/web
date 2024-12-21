<?php
include("conn.php");
$myq="select * from hotel_infor order by id desc";
$res= mysqli_query($con,$myq);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
            a{
                text-decoration: none;
                color:white;
            }
        }
        
        /* logo implement */
        #logo{
            font-size: 30px;
            color:darkorange;
            text-shadow: 0px 0px 20px rgba(0,0,0,0.9);
            animation: changes 0.5s ease 1s infinite alternate;
        }
        @keyframes changes {
            from{
                color:darkred;
            }
            to{
                color:chartreuse;
            }
        }
        /* image implementation sec or two */
        .backimg{
           
            opacity: 0.7;

            img{
                
                height: 400px;
                width:100%;
                
            }
            
        }
        /* artical  */
        .article{
            display: block;
            position: absolute;
            color:darkblue;
            /* color:rgba(2, 0, 0, 0.998); */
            background-color: transparent;
            left: 25%;
            top: 70px;
            font-size: 30px;
            border: none;
            font-weight: bold;
        }
        /* father */
        .father{
            display:flex;
            justify-content: space-around;
            align-items: center;
            width:100%;
            overflow-x:scroll;
            float: left;
            flex-direction: row;
            flex-wrap: wrap;
            

        }
        .son{
            width:20%;
            margin:30px;
            background-color:blue;
            text-transform: capitalize;
            box-shadow: 0px 10px 40px rgba(0,0,0,0.7);

        }
        .son:hover{
            background-color: red;
            transform: translateY(-10px) rotate(3deg) scale(1.1);
            box-shadow: 10px 10px 30px rgba(0,0,0,0.7);
            transition: all 0.3s ease;
            
        }
        .search-section {
            background-color: #f8f9fa;
            padding: 40px 0;
            border-radius: 10px;
        }
        
        .container {
            padding-left: 15px;
            padding-right: 15px;
        }
        
        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30' fill='white'%3E%3Cpath stroke='rgba(255, 255, 255, 1)' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
        h1{
            text-align: center;
            text-transform: capitalize;
            font-weight: bolder;
        }
        /* top rating implementation */
        .top{
            background-color: blue;
            box-shadow: 0px 10px 30px rgba(0,0,0,0.5);
            
        }
        .rate{
            display: flex;
            flex-wrap: wrap;
            width:300px;
            margin:30px 10px;
            
        }
        .rate:hover{
            transform: translateY(-40px) scale(1.05);
            
            .top{
                background-color: red;
                box-shadow: 10px 10px 20px rgba(0,0,0,0.9);
            }
            transition: all 0.3s ease;
        }
        /* star implementation */
        .star{
            font-size: 20px;
            filter: blur(0.2);
        }
        /* image galary implementation */
        .imgs{
            box-shadow: 10px 10px 20px rgba(0,0,0,0.7);
        }
        .imgs:hover{
            transform: translateY(-20px) scale(1.01);
            box-shadow: 20px 30px 40px rgba(0,0,0,0.8);
            transition: all ease;
        }
        /* footer implementation */
        .foot{
            font-size: 20px;
            
        }
        .icon{
            color: #f8f9fa;
        }
        /* button hover */
        .buttonclick{
            font-size: 20px;
            font-weight: bold;
            text-transform: capitalize;
        }
        .buttonclick:hover{
            background-color:darkgreen;

        }
        @media (min-width: 768px) {
            .search-section .form-control,
            .search-section .btn {
                height: 55px;
            }
            .search-section .form-control {
                font-size: 1.2rem;
            }
        }
        @media (max-width: 660px) {
            .article{
            
                        font-size: 20px;
            
                        font-weight: bold;
            }
            .son{
                width: 30%;
            }
        }
        @media (max-width: 450px) {
            .article{
            display:none;
            }
            .backimg{
                opacity: 0.7;
            }
            .son{
                width: 80%;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container">
            <a class="navbar-brand" href="adminlogin.php" id="logo">Hotel Booking</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="#latest"><i class="fas fa-list"></i> Latest Hotels</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#bests"><i class="fas fa-star"></i> Top Rated Hotels</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="trace.php">Track Your Booking</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#contact"><i class="fas fa-envelope"></i> Contact</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><i class="fas fa-envelope"></i>query</a></li>
                </ul>
                <a href="user.html">
                    <button class="btn btn-light ms-3"><i class="fas fa-plus"></i> List Your Hotel</button>

                </a>
                
            </div>
        </div>
    </nav>

    <div id="carouselExampleAutoplaying" class="carousel slide backimg" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="hotel-image/international.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="hotel-image/viphotel.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="hotel-image/vip2.jpeg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="card article">
                <img src="" class="card-img-top" alt="">
                <div class="card-body ">
                    <h1 class="card-title">Welocome to Hotel Booking Website</h1>
                    <p class="card-text">Find Your Dream Hotel Today!</p>
                    <h3 class="card-text">Explore our extensive list of hotels and book your perfect stay.</h3>

                    <a href="#booking" class="btn btn-primary">Book Now</a>

                </div>
            </div>
    <!-- <div class="hero-content">
            <h2>Find Your Dream Hotel Today!</h2>
            <p>Explore our extensive list of hotels and book your perfect stay.</p>
        </div> -->

        <!-- search section -->

    <section class="search-section text-center">
        <div class="container">
            <h3 class="mb-4">Search for Hotels</h3>
            <form class="row g-3 justify-content-center" action="" method="post">
                <div class="col-md-3">
                    <select class="form-control form-select" aria-label="Room Type">
                        <option selected>Select Hotel Type</option>
                        <option value="1">Budget Hotel</option>
                        <option value="2">Luxury Hotel</option>
                        <option value="3">Boutique Hotel</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Location" aria-label="Location">
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" placeholder="Max Price" aria-label="Max Price">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-warning" style="height: 100%;"><i class="fas fa-search"></i> Start Searching now</button>
                </div>
            </form>
        </div>
    </section>
    <!-- closed searching section -->

<!-- leatest hotel for search in few day -->
    <section id="latest" class="py-5">
    <h1>leatest hotel</h1>
      <div class="father">
       
            <?php
                while($result=mysqli_fetch_array($res))
                {
                    
            ?>
            <div class="card son">
                <img src="hotel-image/<?php echo $result[5]; ?>" class="card-img-top" alt="hodel<?php echo $result[0]; ?>">
                <div class="card-body ">
                    <h3 class="card-title"><?php echo $result[1]; ?> hotel:</h3>
                    <h5 class="card-text" id="locations">location:- <?php echo $result[2]; ?></h5>
                    <p class="card-text">price:- <?php echo $result[3]; ?>rs only</p>

                    <a id="booking" href="customerlogin.php?name=<?php echo $result[6];?>&&h_name=<?php echo $result[1]; ?>&&" class="btn btn-primary buttonclick">Book Now</a>

                </div>
            </div>
            <?php
            }
            ?>
      </div>
    </section>
    <!-- closed leatest hotel tag -->

<!-- top rating hotel tag start -->
    <section id="best" class="py-5 bg-light">
        <div class="container" >
            <h3 class="text-center mb-4">Top Rated Hotels</h3>
            <div class="row" id="bests">
                <div class="father ">
                <?php 
                $my="select * from hotel_infor order by rating desc";
                $topr= mysqli_query($con,$my);

                while($result=mysqli_fetch_array($topr))
                {
                ?>
                <div class="col-md-4 rate">
                    <div class="card mb-4 top">
                        <img src="hotel-image/<?php echo $result[5]; ?>" class="card-img-top" alt="hodel<?php echo $result[0]; ?>">
                            
                        <div class="card-body top">
                        <h3 class="card-title"><?php echo $result[1]; ?> hotel:</h3>
                        <h5 class="card-text">location:- <?php echo $result[2]; ?></h5>
                        <p class="card-text">price:- <?php echo $result[3]; ?>rs only</p>
                        <p class="card-text star">rating:- <?php $i=0;
                            while($i<$result[7])
                            {
                                echo "&#11088;";
                                $i++; 
                            }
                            ?> </p>
                                                <a href="rating.php?name=<?php echo $result[6];?>&&h_name=<?php echo $result[1]; ?>" class="btn btn-primary buttonclick">rating now</a>
                        <a href="customerlogin.php?name=<?php echo $result[6];?>&&h_name=<?php echo $result[1]; ?>" class="btn btn-primary buttonclick">Book Now</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
<!-- top rating hotel closed -->

 <!-- review start -->

    <section id="reviews" class="py-5">
        <div class="container">
            <h3 class="text-center mb-4">Gallery Reviews</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 text-center">
                        <img src="hotel-image/rroom.jpg" class="card-img-top imgs" alt="User 1">
                       
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 text-center">
                        <img src="room1.jpg" class="card-img-top imgs" alt="User 2">
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 text-center">
                        <img src="room2.jpg" class="card-img-top imgs" alt="User 3">
                       
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 text-center">
                        <img src="room3.jpg" class="card-img-top imgs" alt="User 3">
                       
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 text-center">
                        <img src="room5.jpg" class="card-img-top imgs" alt="User 3">
                       
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 text-center">
                        <img src="room2.jpg" class="card-img-top imgs" alt="User 3">
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- review closed -->

<!-- contact us tag start  -->
    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <h3 class="text-center mb-4">Contact Us</h3>
            <form action="payment.php" method="post">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Your Name" name="name" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Your Email" name="email" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Mobile number" name="mb" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Subject" name="subject" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" placeholder="Your Message" name="message" required></textarea>
                </div>
                <button type="submit" class="btn btn-success" name="send"><i class="fas fa-paper-plane"></i> Send</button>
                <button type="submit" class="btn btn-success"><a href="tel:8825358487" ><i class="bi bi-telephone-outbound"></i> Call</a></button>
                <button type="submit" class="btn btn-success"><a href="mailto:rahulkumar882535@gmail.com" ><i class="bi bi-envelope-at"></i> Email</a></button>
            </form>
        </div>
    </section>

    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row foot">
                <div class="col-md-3 mb-3">
                    <h4><i class="fas fa-info-circle"></i> About Us</h4>
                    <p>Your reliable hotel booking service providing a range of options to meet your needs.</p>
                </div>
                <div class="col-md-3 mb-3">
                    <h4><i class="fas fa-link"></i> Quick Links</h4>
                    <ul class="list-unstyled">
                        <li><a class="text-white" href="#latest"><i class="fas fa-list"></i> Latest Hotels</a></li>
                        <li><a class="text-white" href="#bests"><i class="fas fa-star"></i> Top Rated Hotels</a></li>
                        <li><a class="text-white" href="#reviews"><i class="fas fa-comments"></i> Guest Reviews</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-3">
                    <h4><i class="fas fa-envelope"></i> Contact Us</h4>
                    <p>Email: contact@hotelbooking.com</p>
                    <p>Phone: (123) 456-7890</p>
                </div>
                <div class="col-md-3 mb-3">
                    <h4><i class="fas fa-users"></i> Follow Us</h4>
                    <div>
                        <a class="text-white mx-2" href="#"><i class="fab fa-facebook"></i></a>
                        <a class="text-white mx-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="text-white mx-2" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="text-white mx-2 icon" href="tel:8825358487"> <i class="bi bi-telephone-outbound"></i></a>
                        <a class="text-white mx-2 icon" href="mailto:rahulkumar882535@gmail.com"> <i class="bi bi-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="text-center bg-dark text-white py-2">
        <p>&copy; 2024 Hotel Booking. All rights reserved.</p>
    </div>
<!-- conatct us closed -->

<!-- scripting start -->
 <!-- <script>
    function find()
    {
        let loc=document.getElementById("locations").value;
        alert(loc);
    }
 </script> -->
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
