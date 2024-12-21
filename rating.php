<?php 
include("conn.php");
$find_hotel=$_GET["name"];
$name=$_GET["h_name"];
$myq="select * from hotel_infor where hotel_name='$name' && hotel_find='$find_hotel' ";
$res=mysqli_query($con,$myq);
$a=mysqli_num_rows($res);
if($a==1)
{

}
else{
    header("location:index.php");
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="refresh" content="3"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* HEADER */
        header{
            display: flex;
            justify-content:space-around;
            align-items: center;
            background-color: aqua;
            text-transform: capitalize;
            ol{
                display: flex;
                list-style: none;
                font-size: 30px;
                li{
                    margin:0px 20px;
                    a{
                        text-decoration: none;
                    }
                }
            }
        }
        .father{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: 90vh;
        }
        .son{
            display: block;
            justify-content: center;
            align-items: center;
            background-color:wheat;
            padding:10px;
            font-weight: bold;
            text-transform: capitalize;
            text-align: center;
            border-radius: 20px;
            animation:tada 1s ease 1s infinite alternate;
            box-shadow: 10px 10px 20px rgba(0,0,0,0.9);
            input,button{
                font-size: 30px;
                padding:5px 10px;
                border-radius: 15px;
                margin:10px;
            }
            button{
                background-color: blue;
               text-transform: capitalize;
               font-weight: bold; 
            }
           
        }
        @keyframes tada {
            from{
                transform: translateY(-10px);
            }
            to{
                transform: translateY(0px);
            }
            
        }
        p{
            font-size: 20px;

        }
        span{
            color:blue;
        }
        h3{
            font-size: 30px;
            position: absolute;
            top:110px;
            left:40%;
            align-items: center;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <div class="head">
            <h1>hotel booking</h1>
        </div>
        <div class="head">
            <ol>
                <li><a href="index.php">home</a></li>
                <li><a href="contactus.php">contact</a></li>
                <li><a href="index.php">&lt;Back</a></li>
                
            </ol>
        </div>
    </header>
    <?php 
    while($result=mysqli_fetch_array($res))
    {
    ?>
    <form action="" method="post">
        <div class="father">
            <div class="son">
                <h1>rating from <span><?php echo $result[1];?></span> hotel</h1>
                <p>&#11088;&#11088;&#11088;&#11088;&#11088;</p>
                <!--  -->
                <p> rating from user:-<span><?php $i=0;
                while($i<$result[7])
                {
                    echo"&#11088;";
                    $i++;
                }
                ?></span></p>
                <!--  -->
                <p>total people rating:<span><?php echo $result[8];?></span>k</p>
                <input type="number" name="star" id="star" onkeyup="fun()" placeholder="giving star 1 to 5 number" required><br>
                <button type="submit" name="submit">submit</button>
            </div>
        </div>
    </form>
    <?php } ?>
    <!-- scripting start -->
     <script>
        function fun()
        {
            let st=document.getElementById("star").value;
            if(st<1)
        {
            document.querySelector("#star").style.border="6px solid red";
        }
           else if(st<=5)
        {
            document.querySelector("#star").style.border="6px solid green";
        }
        else{
            document.querySelector("#star").style.border="6px solid red"; 
        }
        }
     </script>
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
     $star=$_POST["star"];
    if($star<1)
    {
        header("rating.php");
        echo" <h3>please submit again</h3>";
    }
    else if($star<=5)
    {
        $myquery="select * from hotel_infor where hotel_name='$name' && hotel_find='$find_hotel' ";
        $response=mysqli_query($con,$myquery);   
        while($find=mysqli_fetch_array($response))
    {
        // get value total people and rating
        $oldnum=$find[8];
        $oldrating=$find[9];
        // add star new or old and oldnum +1;
        $newnum=$oldnum+1;
        $add=$oldrating+$star;
        //total star divided by total people 
        $cal=ceil($add/$newnum);

        // set rating 
        $q="update hotel_infor set rating='$cal' where hotel_name='$name' && hotel_find='$find_hotel' ";
        mysqli_query($con,$q);

        // set total user
        $ratenum="update hotel_infor set rate_num='$newnum' where hotel_name='$name' && hotel_find='$find_hotel' ";
        mysqli_query($con,$ratenum);
        
        // set total star
        $totalstar="update hotel_infor set total_star='$add' where hotel_name='$name' && hotel_find='$find_hotel' ";
        mysqli_query($con,$totalstar);

        echo "<script>alert('rating successfully');</script>";
        header("refresh:0;index.php");
        
    }
    }
    else{
        header("rating.php");
        echo" <h3>please submit again</h3>";
    }
    
    
}
?>