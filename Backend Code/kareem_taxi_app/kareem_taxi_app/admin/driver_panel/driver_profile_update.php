<?php
include('../../config.php');
session_start();

if(empty($_SESSION['adminid'])){
    header("location:../dashboard/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Kufam:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../public/css/main.css" rel="stylesheet">

</head>

<body>

<div class="d-flex" id="wrapper">



    <!-- Page Content -->
    <div id="page-content-wrapper">

        <?php

        include ('../navbar_update.php');

        ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col-xl-4 offset-xl-4">
                    <?php
                    $id = $_SESSION['driver_id'];
                    $query = "SELECT * FROM Captain WHERE id = '$id'";
                    $result = queryRunner($query);
                    $row = rowRetrieverArray($result);


                    ?>
                    <div class="card profile_update_card">
                        <div class="card-body">
                            <form role="form" method="post" action="driver_update_action.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" id="" class="form-control" value="<?=$row['email'];?>" placeholder="Enter Email" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="password_id">Password</label>
                                    <input type="password" name="password_id" id="password_id" value="<?=$row['password']?>" class="form-control " placeholder="Enter Password" aria-describedby="helpId">

                                </div>
                                <div class="button_update">
                                    <button type="submit" name="update" id="submit" class="btn btn-lg btn-block">submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>



            <!-- /#wrapper -->
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../public/js/customjs.js"></script>
    <script src="../public/js/custom_request.js"></script>
    <script src="../public/js/customPagination.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });


    </script>

</body>

</html>