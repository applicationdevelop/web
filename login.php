<?php
    include("conn.php");
    session_start();
    $user;

    if(isset($_POST["login"])){

        $email = $_POST["email"];
        $pass = $_POST["pass"];

       $mera_query =  "select * from hotel_users where email = '$email' and password = '$pass'";
       $data_match_hua =  mysqli_query($con,$mera_query);
       $row =  mysqli_num_rows($data_match_hua);

       if($row == 1){
        $_SESSION['useremail'] =$email;
        //loop to fetch data
        
        while($result=mysqli_fetch_array($data_match_hua))
        {
            $user=$result[0];
        }
        // user name convert into character or array;
        $str2 ="$user";
        $ram=str_split($str2);
        echo $user;
        echo $ram[0];

        // check new database
        $creat=mysqli_connect("sql205.infinityfree.com","if0_37240688","0ewq2WpY6rqU","if0_37240688_$ram[0]");
        // $creat=mysqli_connect("localhost","root","","$ram[0]");
        
        $tab="select * from data where email = '$email' and password = '$pass'";
        mysqli_query($creat,$tab);
        echo "<script>alert('Login successfull !')</script>";
        header("Refresh:0;url=connect.php?name=$user");
        
         header("Refresh:0;url=profile.php?name=$str2&&email=$email");
       }else{
        echo "<script>alert('Email or passoword is incorrect !')</script>";
        header("Refresh:0;url=user.html");
       }
    
    }
    // forget password
    if(isset($_POST["forget"])){

        $user =$_POST["user"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $mobile = $_POST["mb"];
        $mera_query =  "select * from hotel_users where name='$user' && email = '$email' and mobile = '$mobile'";
        $data_match_hua =  mysqli_query($con,$mera_query);
       $row =  mysqli_num_rows($data_match_hua);

       if($row == 1){
        // main database
        $forget="update hotel_users set password='$pass' where name='$user' && email = '$email' and mobile = '$mobile' ";
        mysqli_query($con,$forget);
        // convert string into char
        $str2 ="$user";
        $ram=str_split($str2);
        $ram[0];
        // change password in hotel database;
        $my=mysqli_connect("localhost","root","","$ram[0]");
        $founddata =  "select * from data where username='$user' && email = '$email' and mobile = '$mobile'";
        $match_hua =  mysqli_query($my,$founddata);
       $nums =  mysqli_num_rows($match_hua);
            if($nums==1)
            {
                $for_pass="update data set password='$pass' where username='$user' && email = '$email' and mobile = '$mobile' ";
                mysqli_query($my,$for_pass);
                echo "<script>alert('forget password successfully');</script>";
                header("refresh:0;url=user.html");
            }
            else{
                echo "<script>alert('data not found');</script>";
                header("refresh:0;url=user.html");  
            }
       }
       else{
        echo "<script>alert('data not found');</script>";
        header("refresh:0;url=user.html");
       }
    }

    if(isset($_POST["adminlogin"]))
    {
        $_SESSION["email"]="pankaj";
        $email=$_POST["email"];
        $password=$_POST["pass"];

        $myq="select * from adminlogin where email='$email' && password='$password' ";
        $res=mysqli_query($con,$myq);
        $nums=mysqli_num_rows($res);
        if($nums==1)
        {
            echo "<script>alert('login success'); </script>";
            header("refresh:0;url=admin.php");

        }else{
            echo "<script>alert('email or password incorrect'); </script>";
            header("refresh:0;url=adminlogin.php");
        }
    
    } 
?>