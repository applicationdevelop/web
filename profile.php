<?php
     session_start();
     $email=$_GET["email"];
     $h_name=$_GET["name"];
     if($_SESSION["useremail"]  == $email){
       
     }
     else{
        header("location:user.html");
     }
     include("conn.php");
     $email = $_SESSION["useremail"];

     $mys =  "select name from hotel_users where email = '$email'";
     $mila_name = mysqli_query($con,$mys);
     $num=mysqli_num_rows($mila_name);
      $ha_mil_gya=mysqli_fetch_array($mila_name);
    //  connect other database
?>
<?php
include("connect.php");
// total hotel find
$total_hotel="select * from hotel_infor where email='$email'";
$h_result= mysqli_query($conn,$total_hotel);

// total room find
$mila= "select * from hotel_room";
$results= mysqli_query($conn,$mila);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Listed Hotels</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .container {
            padding-left: 15px;
            padding-right: 15px;
        }
        .t_hotel
        {
            display: flex;
            justify-content:start;
            align-items: center;
            flex-wrap:wrap;

        }
        a{
            text-decoration: none;
            color:white;
        }
        button{
            border-radius: 20px;
            text-transform: capitalize;
            background-color: darkgreen;
        }
        button:hover{
            background-color:yellow;
            a{
                color:blue;
            }
            box-shadow: 0px 0px 30px rgba(0,0,255,10);
            transition: all 300ms ease;
        }
        ol{
            display: flex;
            
            list-style: none;
            font-size: 25px;
            font-weight: bold;
            li{
                margin:5px 5px;

            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container">
            <a class="navbar-brand text-white" href="admin.php">Hotel Booking</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#contact">Welcome <?php echo $ha_mil_gya[0]; ?> </a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="Logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- represent total hotel -->
     
   
    <div class="container my-5">
        
        <h2 class="text-center mb-4">Your Listed Rooms</h2>
        <a href="listing.php?name=<?php echo $ha_mil_gya[0];  ?>&&email=<?php echo $email;  ?>" class="btn btn-primary mb-3">Add new hotel</a>
        
        <div class="father">
        <h4>Add new room with hotel</h4>
        <div class="t_hotel">
            <?php
            while($hotel_name=mysqli_fetch_array($h_result))
            {
                
            ?>
                <ol>
                    <li><button><a href="room.php?name=<?php echo $ha_mil_gya[0];  ?>&&email=<?php echo $email;  ?>&&h_name=<?php echo $hotel_name[2]; ?>"><?php echo $hotel_name[2]; ?></a></button></li>
                </ol>
                <?php
            }
            ?>
        </div>
     </div>
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Search Rooms..." onkeyup="searchRooms()">
        </div>
        <table class="table table-bordered">
            <thead class="table-success">
                <tr>
                <th>Hotel Name</th>
                <th>features</th>
                    <th>Room Name/Room no.</th>
                    <th>Location</th>
                    <th>floor</th>
                    <th>Price per Night</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="roomTableBody">
                <?php
                while($room=mysqli_fetch_array($results))
                {
                ?>
                <tr>
                    <td><?php echo $room[1];?></td>
                    <td><?php echo $room[2];?></td>
                    <td><?php echo $room[3];?></td>
                    <td><?php echo $room[4];?></td>
                    <td><?php echo $room[5];?></td>
                    <td><?php echo $room[6];?></td>
                    <form action="edit.php?id=<?php echo $room[0];?>&&name=<?php echo $h_name;?>&&email=<?php echo $email;?>" method="post">
                    <td>
                        <button class="btn btn-warning" name="edit">Edit</button>
                        <button class="btn btn-danger" name="del">Delete</button>
                    </td>
                    </form>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

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

    <script>
        function searchRooms() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('roomTableBody');
            const rows = table.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let found = false;
                for (let j = 0; j < cells.length - 1; j++) { // Exclude the last cell (Actions)
                    if (cells[j].innerText.toLowerCase().indexOf(filter) > -1) {
                        found = true;
                    }
                }
                rows[i].style.display = found ? '' : 'none';
            }
        }

        function editRoom(button) {
            const row = button.closest('tr');
            const roomName = row.cells[0].innerText;
            const location = row.cells[1].innerText;
            const price = row.cells[2].innerText;

            // Here you can add logic to open an edit modal or redirect to an edit page
            alert(`Editing Room: ${roomName}\nLocation: ${location}\nPrice: ${price}`);
        }

        function deleteRoom(button) {
            if (confirm("Are you sure you want to delete this room?")) {
                const row = button.closest('tr');
                row.remove();
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
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

}
?>