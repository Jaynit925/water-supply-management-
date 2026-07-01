<?php 
session_start();
session_destroy();
session_unset();
//header("location:login.php");
    echo "<script>window.location.href='../login.php';</script>";

 ?>