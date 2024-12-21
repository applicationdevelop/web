<?php
session_start();
if($_SESSION["useremail"] != ""){
    session_destroy();
    echo "<script>alert('Logout success !')</script>";
    header("Refresh:0;url=user.html");
}
?>