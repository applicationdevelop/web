<?php 
$user=$_GET["name"];

        // user name convert into character or array;
        $str2 ="$user";
        $ram=str_split($str2);
        $ram[0];
        $conn=mysqli_connect("sql205.infinityfree.com","if0_37240688","0ewq2WpY6rqU","if0_37240688_$ram[0]");
//      $conn =  mysqli_connect("localhost","root","","$ram[0]");
?>