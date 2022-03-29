<?php
include('../../config.php');

var_dump($_POST);

if(isset($_POST['update'])){


    $email_address = $_POST['email'];
    $password = $_POST['password_id'];
    $ciphering = "AES-128-CTR";
    $options = 0;
    $iv_length = openssl_cipher_iv_length($ciphering);
    $encryption_key = "Admin";
    $encryption_text = '1234567891011121';
    $encriptpassword = openssl_encrypt($password, $ciphering,
        $encryption_key, $options, $encryption_text);


    $query = "UPDATE Admin SET username = '$email_address', password = '$encriptpassword' WHERE id = '1' ";
    $result = queryRunner($query);

    header("location:../dashboard/index.php");







}