<?php
include("conn.php");
if(isset($_POST["confirm"]))
{
    $data=(int)$_POST["date"];
    $da=$_POST["date"];
    
    echo $data;
    echo"<script>
    let data=document.getElementById('checkin');
        alert(data.innertext);
    </script>";
}
?>