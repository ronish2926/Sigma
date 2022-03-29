<?php
include('../../config.php');


if(isset($_POST['login'])){


    $email_address = $_POST['email_address'];
    $password = $_POST['password'];
    $ciphering = "AES-128-CTR";
    $options = 0;
    $iv_length = openssl_cipher_iv_length($ciphering);
    $encryption_key = "Admin";
    $encryption_text = '1234567891011121';
    $encriptpassword = openssl_encrypt($password, $ciphering,
        $encryption_key, $options, $encryption_text);
    ////echo "Encrypted String: " . $encriptpassword . "\n";


    $query = "SELECT * FROM Admin WHERE username='$email_address' AND password='$encriptpassword' AND type='admin' ";
    $result = queryRunner($query);
    $row = rowRetrieverArray($result);
    
    ///var_dump($row);

    if($row['username']==$email_address && $row['password']==$encriptpassword){

        session_start();
        $_SESSION['adminid'] = $row['id'];
        header("location:../dashboard/index.php");
    }
    else{
        header("location:../dashboard/login.php");

    }




}




?>