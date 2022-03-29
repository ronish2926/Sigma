
<?php
include('../../config.php');
session_start();

if(!empty($_SESSION['uid'])){
    header("location:../driver_panel/profile.php");

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Kufam:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../public/css/main.css" rel="stylesheet">

</head>

<body class="login_body">

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Login to Account</h5>
                    <h4 class="card-title2">Please enter your email and password to continue</h4>
                    <form role="form" method="post" action="driver_login_action.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="e_adress">Email address:</label>
                            <input type="text" class="form-control" name="email_address" placeholder="example@gmail.com" id="e_adress">
                        </div>
                        <div class="form-group">
                            <div class="label_flex">
                                <label for="password">Password</label>
                                <a href="#">Forget Password?</a>

                            </div>

                            <input type="password" class="form-control" placeholder="password" name="password" id="password">
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember password</label>
                        </div>
                        <button class="btn btn-lg  btn-block " name="login" id="login" type="submit">Sign
                            in</button>
                        <p>Don’t have an account? <a href="#">Create Account</a></p>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- Menu Toggle Script -->


</body>

</html>