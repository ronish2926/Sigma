<?php


include('../../config.php');

session_start();
unset($_SESSION['driver_id']);
header("location:../driver_panel/driver_login.php");
die;

?>

