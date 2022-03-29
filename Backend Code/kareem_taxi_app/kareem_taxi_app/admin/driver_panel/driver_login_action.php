<?php


include('../../config.php');

///var_dump($_POST);
if(isset($_POST['login'])){


    $email_address = $_POST['email_address'];
    $password = $_POST['password'];
//    $ciphering = "AES-128-CTR";
//    $options = 0;
//    $iv_length = openssl_cipher_iv_length($ciphering);
//    $encryption_key = "Admin";
//    $encryption_text = '1234567891011121';
//    $encriptpassword = openssl_encrypt($password, $ciphering,
//        $encryption_key, $options, $encryption_text);
//    echo "Encrypted String: " . $encriptpassword . "\n";


    $query = "SELECT * FROM Captain WHERE email='$email_address' AND password='$password'";
    $result = queryRunner($query);
    $row = rowRetrieverArray($result);


//    echo "decripted String: " . $decryption . "\n";
    if($row['email']==$email_address && $row['password']==$password){

//        $decryption=openssl_decrypt ($row['password'], $ciphering,
//            $encryption_key, $options, $encryption_text);


        session_start();
        $_SESSION['driver_id'] = $row['id'];
//        $_SESSION['brand_id'] = $row['term_id'];

//        $_SESSION['email'] = $row['email'];
//        $_SESSION['password'] = $decryption;

        header("location:../driver_panel/profile.php");

    }
    else{
        header("location:../driver_panel/driver_login.php");
        ///var_dump($row);
    }




}




?>