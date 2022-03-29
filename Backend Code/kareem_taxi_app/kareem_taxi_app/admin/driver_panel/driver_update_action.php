<?php
include('../../config.php');

var_dump($_POST);
session_start();
$id = $_SESSION['adminid'];

if(isset($_POST['update'])){


    $email_address = $_POST['email'];
    $password = $_POST['password_id'];

    $query = "UPDATE Captain SET email = '$email_address', password = '$password' WHERE id = '$id' ";
    $result = queryRunner($query);

    header("location:../driver_panel/profile.php");







}