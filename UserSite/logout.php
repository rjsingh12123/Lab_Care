<?php
session_start();
unset($_SESSION['userlogin']);
unset($_SESSION['UserID1']);
header("location:Login.php"); 
?>