<?php


include('../../config.php');

session_start();
unset($_SESSION['adminid']);
//session_destroy();
//session_write_close();
header("location:../dashboard/login.php");
die;

?>

