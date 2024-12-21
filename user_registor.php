<?php
    include("conn.php");

    if(isset($_POST["register"])){

        $user =$_POST["user"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $mobile = $_POST["mb"];
      // user name  convert into character or array;
      $str2 ="$user";
      $ram=str_split($str2);
      $ram[0];

       $mera_query =  "insert into hotel_users(name,email,mobile,password) values('$user','$email','$mobile','$pass')";
       mysqli_query($con,$mera_query);
      //  initialiaze or declear variable
      $finddatabase;
      //  show database
      $show="show databases";
      $database=mysqli_query($con,$show);
      while($data=mysqli_fetch_array($database))
{
   if("if0_37240688_$ram[0]"==$data[0])
   {
      $finddatabase="find";
   }
  
}
if($finddatabase=="find")
{
   $creat=mysqli_connect("localhost","root","","$ram[0]");

   $tab="insert into data(username,email,mobile,password) values('$user','$email','$mobile','$pass')";
    mysqli_query($creat,$tab);
    echo "<script>alert('Registration successfull !')</script>";
       header("Refresh:0;url=user.html");
}
else{
    //    create new database
       $create="create database $ram[0]";
       mysqli_query($con,$create);

    //  create  new table  
    $creat=mysqli_connect("sql205.infinityfree.com","if0_37240688","0ewq2WpY6rqU","if0_37240688_$ram[0]");
   //  $creat=mysqli_connect("localhost","root","","$ram[0]");

   
   //  create new table  name= data
    $tab="create table data(username text,email text,mobile bigint,password text)";
    mysqli_query($creat,$tab);

   //  create new table name= hotel_room;
    $hotel="create table hotel_room(id int primary key auto_increment,hotel_name text,feature text,room text,location text,floor int,price int)";
    mysqli_query($creat,$hotel);

   //  create new  table name= hotal_info
   $hotel_in="create table hotel_infor(id int primary key auto_increment,email text,hotel_name text,location text,price int,details text,photo varchar(30))";
   mysqli_query($creat,$hotel_in);
   
   //  $myq= "insert into hotel_room(hotel_name,room,floor,price) values('$h_name','$r_name','$r_location','$r_price')";

    //    insert data in new table with database
    $insert="insert into data(username,email,mobile,password) values('$user','$email','$mobile','$pass')";
    mysqli_query($creat,$insert);
       echo "<script>alert('Registration successfull !')</script>";
       header("Refresh:0;url=user.html");



    }
   }
?>