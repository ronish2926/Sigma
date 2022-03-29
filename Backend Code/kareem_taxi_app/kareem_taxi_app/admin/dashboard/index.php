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

    <title>DashBoard</title>

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
    <!-- Sidebar -->
    <?php
    require_once ("../admin_sidebar.php");
    ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <?php
            include ('../navbar_admin.php');
        ?>

        <div class="container">
            <div class="page_name">
                <h1>Administration</h1>
                <div class="years">
                    <div class="form-group">
                        <?php
                        $query = "SELECT YEAR(ride_order.date_created) as year
        FROM RideOrder as ride_order 
        GROUP BY YEAR(ride_order.date_created) 
        ORDER BY YEAR(ride_order.date_created) DESC ";
                        $result =queryRunner($query);

                        ?>

                        <select class="form-control" id="years">
                            <option value="<?php echo date("Y"); ?>"><?php echo date("Y"); ?></option>
                            <?php
                            while($row=rowRetriever($result)) {
                                if($row['year'] == date("Y")){
                                    continue;

                                }
                                else {
                                    $year = $row['year'];
                                    echo "<option value='$year'>$year</option>";

                                }
                                ?>
                                <?php
                            }
                            ?>
<!--                            <option>1 years</option>-->
<!--                            <option>2 years</option>-->
<!--                            <option>4</option>-->
<!--                            <option>5</option>-->
                        </select>
                    </div>

                </div>

            </div>
            <div class="cards">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 mt-3 mb-3">
                        <div class="card admin_card">
                            <div class="card-body">
                                <div class="card_img earning_this_period">
                                    <div class="img_div">
                                        <span><i class="fas fa-arrow-up"></i></span>
                                    </div>
                                    <div class="cards_details">
                                        <h1>$6,726 <span>+2.5%</span> </h1>
                                        <h2>Earning in this Period</h2>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mt-3 mb-3">
                        <div class="card admin_card">
                            <div class="card-body">
                                <div class="card_img No_of_rides_this_period">
                                    <div class="img_div">
                                        <span><i class="fas fa-arrow-up"></i></span>
                                    </div>
                                    <div class="cards_details">
                                        <h1>$3,966 <span>+2.5%</span> </h1>
                                        <h2>Complete no of Ride</h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mt-3 mb-3">
                        <div class="card admin_card">
                            <div class="card-body">
                                <div class="card_img No_of_captain_Period">
                                    <div class="img_div down">
                                        <span class="down_span"><i class="fas fa-arrow-down"></i></span>
                                    </div>
                                    <div class="cards_details">
                                        <h1>$3,966 <span class="down_span">+2.5%</span> </h1>
                                        <h2>No of Captains</h2>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 mt-3 mb-3">
                        <div class="card admin_card">
                            <div class="card-body">
                                <div class="card_img " id="No_of_user_period">
                                    <div class="img_div down">
                                        <span class="down_span"><i class="fas fa-arrow-down"></i></span>
                                    </div>
                                    <div class="cards_details">
                                        <h1>$3,966 <span class="down_span">+2.5%</span> </h1>
                                        <h2>No of Users</h2>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 mt-3 mb-3">
                        <div class="card customer_growth_card">
                            <div class="card-body">
                                <ul class="nav nav-tabs">
<!--                                    <li class="nav-item">-->
<!--                                        <a class="nav-link active" data-toggle="tab" href="#Revenue">Yearly Revenue</a>-->
<!--                                    </li>-->
<!--                                    <li class="nav-item">-->
<!--                                        <a class="nav-link" data-toggle="tab" href="#Trip">Trip</a>-->
<!--                                    </li>-->
<!--                                    <li class="nav-item">-->
<!--                                        <a class="nav-link" data-toggle="tab" href="#captain">Captain</a>-->
<!--                                    </li>-->
<!--                                    <li class="nav-item">-->
<!--                                        <a class="nav-link" data-toggle="tab" href="#Users">Users</a>-->
<!--                                    </li>-->


                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="Revenue">
                                        <h1>Yearly Earning</h1>
                                        <div id="chart">

                                        </div>
                                    </div>
<!--                                    <div class="tab-pane" id="Trip">-->
<!--                                        <div id="tripchart">-->
<!---->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="tab-pane" id="captain">-->
<!--                                        <div id="captainchart">-->
<!---->
<!--                                        </div>-->
<!--                                    </div>-->
                                </div>
                                <!-- <h1>Customer Growth</h1> -->

                            </div>
                        </div>

                    </div>
                    <div class="col-xl-4 mt-3 mb-3">
                        <div class="card polar_card">
                            <div class="card-body">
                                <div id="polarchart">

                                </div>

                            </div>
                        </div>
                        <div class="card radar_card">
                            <div class="card-body">
                                <div id="radarcharts">

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-8 mt-3 mb-3 month_chart">
                        <div class="card col_chart_card">
                            <div class="card-body">
                                <h1>Monthly Earning</h1>
                                <div id="colchart">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 mt-3 mb-3 wekkly_chart">
                        <div class="card customer_growth_card">
                            <div class="card-body">
                                <h1>Weekly Growth</h1>
                                <div id="weeklychart">

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-12 mt-3 mb-3">
                        <div class="card geo_graph_card">
                            <div class="card-body">
                                <h1>Conntry Wise Earning</h1>
                                <div id="regions_div">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 mt-3 mb-3">
                        <div class="card top_ten_authors city_wise_card" style="height: 359px">
                            <div class="card-body ">
                                <div class="filter_table">
                                    <h1>City Wise Earning</h1>
                                    <div class="catgory_form">
<!--                                        <div class="form-group">-->
<!---->
<!--                                            <select class="form-control" id="city">-->
<!--                                                <option>city</option>-->
<!--                                                <option>2</option>-->
<!--                                                <option>3</option>-->
<!--                                                <option>4</option>-->
<!--                                                <option>5</option>-->
<!--                                            </select>-->
<!--                                        </div>-->
                                        <div class="form-group ml-2">


                                            <select class="form-control" id="country-select">
                                                <?php
                                                $query = "SELECT * FROM Country";
                                                $result= queryRunner($query);
                                                while($row=rowRetriever($result)) {

                                                    ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                    <?php
                                                }
                                                ?>
<!--                                                <option>2</option>-->
<!--                                                <option>3</option>-->
<!--                                                <option>4</option>-->
<!--                                                <option>5</option>-->
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <table class="table">
                                    <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Total Trips</th>
                                        <th>Total Earning</th>
                                        <th>Total cars</th>

                                    </tr>
                                    </thead>
                                    <tbody id="city-wise-earning-table-body-id">
                                    <tr>
                                        <td scope="row">jill Jonson</td>
                                        <td>364</td>
                                        <td>$89</td>
                                        <td>300</td>

                                    </tr>
                                    <tr>
                                        <td scope="row">jill Jonson</td>
                                        <td>364</td>
                                        <td>$89</td>
                                        <td>300</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">jill Jonson</td>
                                        <td>364</td>
                                        <td>$89</td>
                                        <td>300</td>

                                    </tr>
                                    <tr>
                                        <td scope="row">jill Jonson</td>
                                        <td>364</td>
                                        <td>$89</td>
                                        <td>300</td>

                                    </tr>
                                    <tr>
                                        <td scope="row">jill Jonson</td>
                                        <td>364</td>
                                        <td>$89</td>
                                        <td>300</td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 mt-3 mb-3">
                        <div class="card top_ten_authors" style="height: 359px">
                            <div class="card-body ">
                                <h1>Top Earning Regions</h1>
                                <table class="table">
                                    <thead>
                                    <tr>

                                        <th>Country Name</th>
                                        <th>Earning</th>
                                        <!-- <th>Sale</th>
                                        <th>Rating</th> -->

                                    </tr>
                                    </thead>
                                    <tbody id="top-earning-rigions-table-body">
                                    <tr>

                                        <td>Elston Gullan</td>
                                        <td>$10,000</td>


                                    </tr>
                                    <tr>

                                        <td>Elston Gullan</td>
                                        <td>$10,000</td>


                                    </tr>
                                    <tr>

                                        <td>Elston Gullan</td>
                                        <td>$10,000</td>


                                    </tr>
                                    <tr>

                                        <td>Elston Gullan</td>
                                        <td>$10,000</td>


                                    </tr>
                                    <tr>

                                        <td>Elston Gullan</td>
                                        <td>$10,000</td>


                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 mt-3 mb-3">
                        <div class="card top_ten_authors ">
                            <div class="card-body ">
                                <div class="filter_table">
                                    <h1>Total Rides</h1>
                                    <div class="catgory_form">
                                        <div class="form-group city_slct mr-3 " style="display:none">

                                            <select class="form-control"  id="city-select-id">

                                            </select>
                                        </div>
                                        <div class="form-group mr-3">
                                            <?php

                                            $query="SELECT * FROM Country";
                                            $result =queryRunner($query);
                                            ?>

                                            <select class="form-control" id="country-select-id">
                                                <option value="">Country</option>
                                                <?php while($row=rowRetriever($result)){
                                                    ?>

                                                    <option value="<?=$row['id']; ?>"><?=$row['name']; ?></option>
                                                    <?php

                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <table class="table">
                                    <thead>
                                    <tr>

                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Earning</th>
                                        <th>Sale</th>
                                        <th>Rating</th>

<!--                                        <th>#ID</th>-->
                                        <!-- <th>Action</th>
                                            <th></th> -->


                                    </tr>
                                    </thead>
                                    <tbody id="top-rides-table-body-id">
                                    <tr>

                                        <td><img src="../public/image/person.jpg" alt=""><span>Elston Gullan</span>
                                        </td>
                                        <td>$10,000</td>
                                        <td>40</td>
                                        <td>4.3</td>
                                        <td>$10,000</td>
                                        <td>40</td>
                                    </tr>
                                    <tr>

                                        <td><img src="../public/image/person.jpg" alt=""><span>Elston Gullan</span>
                                        </td>
                                        <td>$10,000</td>
                                        <td>40</td>
                                        <td>4.3</td>
                                        <td>$10,000</td>
                                        <td>40</td>
                                    </tr>
                                    <tr>

                                        <td><img src="../public/image/person.jpg" alt=""><span>Elston Gullan</span>
                                        </td>
                                        <td>$10,000</td>
                                        <td>40</td>
                                        <td>4.3</td>
                                        <td>$10,000</td>
                                        <td>40</td>
                                    </tr>
                                    <tr>

                                        <td><img src="../public/image/person.jpg" alt=""><span>Elston Gullan</span>
                                        </td>
                                        <td>$10,000</td>
                                        <td>40</td>
                                        <td>4.3</td>
                                        <td>$10,000</td>
                                        <td>40</td>
                                    </tr>
                                    <tr>

                                        <td><img src="../public/image/person.jpg" alt=""><span>Elston Gullan</span>
                                        </td>
                                        <td>$10,000</td>
                                        <td>40</td>
                                        <td>4.3</td>
                                        <td>$10,000</td>
                                        <td>40</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
</div>


<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="../public/js/customjs.js"></script>
<script src="../public/js/custom_request.js"></script>
<script src="../public/js/customPagination.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $(".sidebar_overview").addClass("active");
    function numFormatter(num) {
        if(num > 999 && num < 1000000){
            return (num/1000).toFixed(1) + 'K'; // convert to K for number from > 1000 < 1 million
        }else if(num > 1000000){
            return (num/1000000).toFixed(1) + 'M'; // convert to M for number from > 1 million
        }else if(num < 900){
            return num; // if value < 1000, nothing to do
        }
    }



    var currentYear = (new Date).getFullYear();
    // var pastYear = new Date(new Date().setFullYear(new Date().getFullYear() - 1));
    // var pastYear = pastYear.getFullYear();
    //
    // alert(pastYear);
    // currentYear =String(currentYear);
    retrieveallOverView(currentYear);
    // retrieveallOverView();

    function retrieveallOverView(currentYear = '',country = '',city = '') {

        var pastYear = new Date(new Date().setFullYear(currentYear - 1));
            var  pastYear = pastYear.getFullYear();


        // alert("this is past year "+pastYear);

        sendRequest(
            "?action_type=retrieve&request_type=overview&functionality_type=retrieve_all_overvew_data", {
                year: currentYear,
                country:country,
                city: city,
                pastyear:pastYear
                // country_id:country_id,
                // city_id:city_id,

            }, "POST")
            .then((data) => {
                var data = JSON.parse(data);
                if (data.code == "202") {
                    // $(".pagination").html(data.pagination);
                    // $("#report-table-body-id").empty();
                    var list = data.listOfData;
                    // console.log("yeses"+alllist);
                    for (var i = 0; i < list.length; i++) {

                            var allyear = list[i].yearlyEarningStats;
                            var compeleteyear = list[i].yearCompleteEarningStats;
                            var cancelyear = list[i].yearCancelEarningStats;
                            var paymentmethod = list[i].yearlyPaymentMethodStats;
                            var countryEarning = list[i].yearlyCountryEarningStats;
                            var category = list[i].yearlyRideCategoriesStats;
                            var topcountry = list[i].yearTopRegionEarningStats;
                            var weeklyEarning = list[i].yearlyWeeklyEarningStats;
                            var citywiseEarning = list[i].yearlyMonthlyEarningStats;
                            var yearrides = list[i].yearRidesEarningstats;
                            var yearEarning = list[i].yearEarning;
                            var yearEarningpast = list[i].yearEarningpast;
                            var yearnoRidespast = list[i].yearnoRidespast;
                            var yearnoRides = list[i].yearnoRides;
                            var yearNoOfCaptain = list[i].yearNoOfCaptain;
                            var yearNoOfCaptainpast = list[i].yearNoOfCaptainpast;
                            var yearNoOfUsers = list[i].yearNoOfUsers;
                            var yearNoOfUserspast = list[i].yearNoOfUserspast;
                            var useryear = yearNoOfUsers[0].total_user;
                            var userpast = yearNoOfUserspast[0].total_userpast;

                            var TotalNoOfRides = 0;
                            var TotalNoOfCaptain = 0;
                            var TotalNoOfUsers = 0;
                            $("#No_of_user_period").empty();
                            $(".No_of_captain_Period").empty();
                            $(".No_of_rides_this_period").empty();
                            $(".earning_this_period").empty();

                        // total no of Users code

                        TotalNoOfUsers = useryear - userpast;
                        TotalNoOfUsers = TotalNoOfUsers / userpast;
                        TotalNoOfUsers = TotalNoOfUsers *100;
                        TotalNoOfUsers = Math.round(TotalNoOfUsers);

                        console.log('total Users '+TotalNoOfUsers);

                        //  total no of Users code end

                            // total no of captain code

                        TotalNoOfCaptain = yearNoOfCaptain[0].total_captain - yearNoOfCaptainpast[0].total_captainpast;
                        TotalNoOfCaptain = TotalNoOfCaptain / yearNoOfCaptainpast[0].total_captainpast;
                        TotalNoOfCaptain = TotalNoOfCaptain *100;
                        TotalNoOfCaptain = Math.round(TotalNoOfCaptain);

                            // total no of rides code

                        TotalNoOfRides = yearnoRides[0].total_rides - yearnoRidespast[0].total_ridespast;
                        TotalNoOfRides = TotalNoOfRides / yearnoRidespast[0].total_ridespast;
                        TotalNoOfRides = TotalNoOfRides *100;
                        TotalNoOfRides = Math.round(TotalNoOfRides);
                        console.log('no rides'+TotalNoOfRides);

                        // total Users card record

                        if(TotalNoOfUsers == "Infinity"){
                                const text2 = `<div class="img_div">
                                        <span><i class="fas fa-arrow-up"></i></span>
                                    </div>
                                    <div class="cards_details">
                                        <h1>${useryear}</h1>
                                        <h2>No of Users</h2>

                                    </div>`;
                                $("#No_of_user_period").append(text2);

                        }
                        else if(parseInt(userpast) < parseInt(useryear)){

                            const text2 = `<div class="img_div">
                                        <span><i class="fas fa-arrow-up"></i></span>
                                    </div>
                                    <div class="cards_details">
                                        <h1>${useryear}<span>+${TotalNoOfUsers}%</span> </h1>
                                        <h2>No of Users</h2>

                                    </div>`;
                            $("#No_of_user_period").append(text2);
                        }
                        else {
                            var text2 = ` <div class="img_div down">
                                         <span class="down_span"><i class="fas fa-arrow-down"></i></span>
                                    </div>
                                    <div class="cards_details">
                                        <h1>${useryear}<span class="down_span">${TotalNoOfUsers}%</span> </h1>
                                        <h2>No of Users</h2>

                                    </div>`;
                            $("#No_of_user_period").append(text2);
                        }

                        // total Users card record end

            // total revuneue in this period
                        var totalrev=0;
                        var totalrevcurrency='';
                        for (var i = 0; i < yearEarning.length; i++) {
                            var y = yearEarning[i].total_revenue;
                            var cur = yearEarning[i].currency_symbol;
                            totalrev+=y;
                            totalrevcurrency = cur;
                        }
                        console.log("total rev :"+totalrev);


                        // total past year revenue
                        var totalpastrev=0;
                        for (var i = 0; i < yearEarningpast.length; i++) {
                            var y = yearEarningpast[i].total_revenue;
                            var cur = yearEarningpast[i].currency_symbol;
                            totalpastrev+=y;

                        }

                        console.log("total past :"+totalpastrev);
                        var cabEarning = totalrev - totalpastrev;
                       cabEarning = cabEarning / totalpastrev;
                        cabEarning = Math.round(cabEarning);
                        console.log("total cab :"+cabEarning);

                        if(cabEarning == "Infinity"){

                            var text = ` <div class="img_div">
                                        <span><i class="fas fa-arrow-up"></i></span>
                                    </div>
                                    <div class="cards_details">
                                        <h1>${totalrevcurrency} ${totalrev}</h1>
                                        <h2>Earning in this Period</h2>

                                    </div>`;
                            $(".earning_this_period").append(text);

                        }
                        else if(totalrev > totalpastrev ){
                            var text = ` <div class="img_div">
                                        <span><i class="fas fa-arrow-up"></i></span>
                                    </div>
                                    <div class="cards_details">
                                        <h1>${totalrevcurrency} ${totalrev} <span>+${cabEarning}%</span> </h1>
                                        <h2>Earning in this Period</h2>

                                    </div>`;
                            $(".earning_this_period").append(text);
                        }
                        else {
                            var text = ` <div class="img_div down">
                                         <span class="down_span"><i class="fas fa-arrow-down"></i></span>
                                    </div>
                                    <div class="cards_details">
                                        <h1>${totalrevcurrency} ${totalrev} <span class="down_span" >${cabEarning}%</span> </h1>
                                        <h2>Earning in this Period</h2>

                                    </div>`;
                            $(".earning_this_period").append(text);
                        }
                        // total revenue card end

                        // no of rides card code

                        if(TotalNoOfRides == "Infinity"){
                            var text = ` <div class="img_div">
                                        <span><i class="fas fa-arrow-up"></i></span>
                                    </div>
                                    <div class="cards_details">
                                        <h1>${yearnoRides[0].total_rides}</h1>
                                        <h2>Complete no of Ride</h2>

                                    </div>`;
                            $(".No_of_rides_this_period").append(text);

                        }
                       else if(yearnoRides[0].total_rides > yearnoRidespast[0].total_ridespast){
                            var text = ` <div class="img_div">
                                        <span><i class="fas fa-arrow-up"></i></span>
                                    </div>
                                    <div class="cards_details">
                                        <h1>${yearnoRides[0].total_rides} <span>+${TotalNoOfRides}%</span> </h1>
                                        <h2>Complete no of Ride</h2>

                                    </div>`;
                            $(".No_of_rides_this_period").append(text);
                        }
                        else {
                            var text = ` <div class="img_div down">
                                         <span class="down_span"><i class="fas fa-arrow-down"></i></span>
                                    </div>
                                    <div class="cards_details">
                                        <h1>${yearnoRides[0].total_rides} <span class="down_span" >${TotalNoOfRides}%</span> </h1>
                                        <h2>Complete no of Ride</h2>

                                    </div>`;
                            $(".No_of_rides_this_period").append(text);
                        }

                        // total caption card record


                        if(TotalNoOfCaptain == "Infinity"){
                            var text = ` <div class="img_div">
                                        <span><i class="fas fa-arrow-up"></i></span>
                                    </div>
                                    <div class="cards_details">
                                        <h1>${yearNoOfCaptain[0].total_captain}</h1>
                                        <h2>No of Captains</h2>

                                    </div>`;
                            $(".No_of_captain_Period").append(text);

                        }
                        else if(yearNoOfCaptain[0].total_captain > yearNoOfCaptainpast[0].total_captainpast ){
                            var text = ` <div class="img_div">
                                        <span><i class="fas fa-arrow-up"></i></span>
                                    </div>
                                    <div class="cards_details">
                                        <h1>${yearNoOfCaptain[0].total_captain} <span>+${TotalNoOfCaptain}%</span> </h1>
                                        <h2>No of Captains</h2>

                                    </div>`;
                            $(".No_of_captain_Period").append(text);
                        }
                        else {
                            var text = ` <div class="img_div down">
                                         <span class="down_span"><i class="fas fa-arrow-down"></i></span>
                                    </div>
                                    <div class="cards_details">
                                        <h1>${yearNoOfCaptain[0].total_captain}<span class="down_span" >${TotalNoOfCaptain}%</span> </h1>
                                        <h2>No of Captains</h2>

                                    </div>`;
                            $(".No_of_captain_Period").append(text);
                        }

                        // total caption card record end







                        // top country for loop
                        $("#top-earning-rigions-table-body").empty();

                        for (var i = 0; i < topcountry.length; i++) {
                            var t = topcountry[i].total_income;
                            var name = topcountry[i].name;
                            var currency_symbol = topcountry[i].currency_symbol;
                            var text = "<tr><td>"+name+"</td>\n" +
                                "                                        <td>"+currency_symbol+""+t+"</td><\tr>";
                            $("#top-earning-rigions-table-body").append(text);


                        }

                        // top country for loop end


                        var alllistarry = [];
                        var allcomptelearry = [];
                        var cancelarry = [];

                        for (var all = 0; all < allyear.length; all++) {
                            var t = allyear[all].total_revenue;
                            alllistarry.push(t);
                        }
                        for (var comp = 0; comp < compeleteyear.length; comp++) {
                            var c = compeleteyear[comp].Complete_revenue;
                            allcomptelearry.push(c);
                        }
                        for (var c = 0; c < cancelyear.length; c++) {
                            var can = cancelyear[c].Cancel_revenue;
                            cancelarry.push(can);
                        }
                        console.log("allaryya"+cancelarry);
                        // CUSTOMER GROWTH CHART

                        revenuechart.updateSeries([{
                            name: 'All Revenue',
                            data: alllistarry
                        }, {
                            name: 'Complete Revenue',
                            data: allcomptelearry
                        }, {
                            name: 'Cancel Revenue',
                            data: cancelarry
                        }]);



                        // CUSTOMER GROWTH CHART End

                        // column chart
                        // montlychart

                        montlychart.updateSeries([{
                            name: 'Complete',
                            type: 'column',
                            data: allcomptelearry
                        }, {
                            name: 'All',
                            type: 'area',
                            data: alllistarry
                        }, {
                            name: 'Cancel',
                            type: 'line',
                            data: cancelarry
                        }]);



                        // column chart End
                        var total_cash = 0;
                        for (var c = 0; c < paymentmethod.length; c++) {
                            var t_p = paymentmethod[c].t_payment;
                            var t_name = paymentmethod[c].payment_name;
                            total_cash+=parseInt(t_p);
                            // paymenttotalarry.push(t_p);
                            // paymentnamearry.push(t_name);
                        }
                        console.log("total_loop" +total_cash );

                        var paymenttotalarry = [];
                        var paymentnamearry = [];
                        for (var c = 0; c < paymentmethod.length; c++) {
                            var t_p = paymentmethod[c].t_payment;
                            var t_name = paymentmethod[c].payment_name;
                            var total = parseInt(t_p)/total_cash;
                            total = total * 100;
                            total = Math.ceil(total);

                            paymenttotalarry.push(total);
                            paymentnamearry.push(t_name);
                        }
                        // polar chart

                        paymentChart.updateOptions({
                            labels: paymentnamearry,
                            series: paymenttotalarry,
                        });

                        // polar chart end
                        var categoryarry = [];
                        var categorynamearry = [];
                        for (var c = 0; c < category.length; c++) {
                            var t_p = category[c].total_category;
                            var t_name = category[c].name;
                            categoryarry.push(t_p);
                            categorynamearry.push(t_name);
                        }

                        // radar charts
                        radarchart.updateOptions({
                            labels: categorynamearry,
                            series: categoryarry,
                        });

                        // country chart
                        var countryarryouter = [["Country", "Rides"]];
                        for (var c = 0; c < countryEarning.length; c++) {

                            var countryarryinner = [];
                            var t_p = countryEarning[c].total_user;
                            var t_name = countryEarning[c].country_name;
                            countryarryinner.push(t_name,t_p);
                            countryarryouter.push(countryarryinner);
                        }

                        console.log("yesh this is array: "+ countryarryouter);
                        // this is country graph
                        google.charts.load("current", {
                            packages: ["geochart"],
                            // Note: you will need to get a mapsApiKey for your project.
                            // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
                            mapsApiKey: "AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY",
                        });
                        google.charts.setOnLoadCallback(drawRegionsMap);

                        // abc = [ "bac",25 ];

                        function drawRegionsMap() {
                               var data = google.visualization.arrayToDataTable(countryarryouter);



                            var options = {
                                // tooltip: {isHtml: true},
                                // title:'hello',
                            };

                            var chart = new google.visualization.GeoChart(
                                document.getElementById("regions_div")
                            );

                            chart.draw(data, options);
                        }

                        // country graph is end
                        var Weeklyarry = [];
                        for (var c = 0; c < weeklyEarning.length; c++) {
                            var total_earning = weeklyEarning[c].total_revenue;
                            total_earning = numFormatter(total_earning);

                            Weeklyarry.push(total_earning);
                        }
                        console.log("weekly : "+Weeklyarry);

                        // WEEKLY CHART

                        weeklychart.updateSeries([{
                            name: 'Revenue',
                            data: Weeklyarry
                        }]);

                        // city wise earning table

                        $("#city-wise-earning-table-body-id").empty();

                        for (var i = 0; i < citywiseEarning.length; i++) {
                            let city_name = citywiseEarning[i].city_name;
                            var total_trp = citywiseEarning[i].total_trips;
                            let total_cars = citywiseEarning[i].total_cars;
                            let order_price = citywiseEarning[i].order_price;
                            let currency_symbol = citywiseEarning[i].currency_symbol;
                            let text = `<tr>
                                        <td scope="row">${city_name}</td>
                                        <td>${total_trp}</td>
                                        <td>${currency_symbol} ${order_price}</td>
                                        <td>${total_cars}</td>

                                    </tr>`;
                            $("#city-wise-earning-table-body-id").append(text);


                        }

                        // RideWise record in table

                        $("#top-rides-table-body-id").empty();

                        for (var i = 0; i < yearrides.length; i++) {
                            let name = yearrides[i].name;
                            var picture = yearrides[i].picture;
                            let category_name = yearrides[i].category_name;
                            let price = yearrides[i].price;
                            let sale = yearrides[i].sale;
                            let rating = yearrides[i].rating;
                            let path = "../public/uploads/Ridetype/";

                            let currency_symbol = yearrides[i].currency_symbol;
                            let text = ` <tr>
                                        <td class="payment_td" ><img src="${picture}" alt=""></td>
                                        <td>${name}</td>
                                        <td>${category_name}</td>
                                        <td>${currency_symbol} ${price}</td>
                                        <td>${sale}</td>
                                        <td>${rating}</td>

                                    </tr>`;
                            $("#top-rides-table-body-id").append(text);


                        }






                    }





                } else if (data.code == "206") {
                    console.log("Failed to Delete");
                }

            })
            .catch((error) => {
                console.log(error)
            });
    }

    $("#years").change(function(){
       var year_val = $(this).val();
        var currentYear = (new Date).getFullYear();
        if(currentYear == year_val){
            $(".wekkly_chart").show();
            $(".month_chart").addClass("col-xl-8");

            $(".month_chart").removeClass("col-xl-12");
        }else {
            $(".wekkly_chart").hide();
            $(".month_chart").removeClass("col-xl-8");

            $(".month_chart").addClass("col-xl-12");
        }
       // alert(year_val);
        retrieveallOverView(year_val,"");
    })

    $("#country-select").change(function(){
        var country = $(this).val();
        var currentYear = $("#years").val();

        // alert(year_val);
        retrieveallOverView(currentYear,country);
    })

    $('#city-select-id').change(function () {
        var city_id = $(this).val();
        var country_id = $("#country-select-id").val();
        var years = $('#years').val();
        retrieveallOverView(years,country_id,city_id);
        // console.log(search)
    });

    $('#country-select-id').change(function () {
        var id = $(this).val();


        sendRequest("?action_type=retrieve&request_type=all_reports&functionality_type=retrieve_all_cities", {
            id: id,
            // enable: enable_val,
        }, "POST")
            .then((data) => {
                var data = JSON.parse(data);
                if (data.code == "202") {

                    var list = data.listOfData;
                    $(".city_slct").show();
                    $("#city-select-id").empty();
                    var text1="<option id=\"city-name\" value=\"\">Select City</option>";
                    $("#city-select-id").append(text1);
                    for (var i = 0; i < list.length; i++) {


                        var n = list[i].id;
                        // var picture = list[i].picture;
                        var name = list[i].name;
                        var text="<option  value=\""+n+"\">"+name+"</option>";

                        $("#city-name").after(text);




                        // $("#add_payment_modal_edit").modal('show');
                    }

                }


            })
            .catch((error) => {
                console.log(error)
            })
    });






    // CUSTOMER GROWTH CHART
    var options = {
        series: [],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ['jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
        },
        yaxis: {
            title: {
                // text: '$ (thousands)'
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return "$ " + val + " thousands"
                }
            }
        }
    };

    var revenuechart = new ApexCharts(document.querySelector("#chart"), options);
    revenuechart.render();


    // // WEEKLY CHART

    var options = {
        series: [],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '35%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ['1-w', '2-w', '3-w', '4-w', '5-w'],
        },
        yaxis: {
            title: {
                // text: '$ (thousands)'
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {

                    return "$ " + numFormatter(val)  + " thousands"
                }
            }
        }
    };

    var weeklychart = new ApexCharts(document.querySelector("#weeklychart"), options);
    weeklychart.render();



    //  trip chart
    var options = {
        series: [{
            name: 'TEAM A',
            type: 'column',
            data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
        }, {
            name: 'TEAM B',
            type: 'area',
            data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
        }, {
            name: 'TEAM C',
            type: 'line',
            data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
        }],
        chart: {
            height: 300,
            type: 'line',
            stacked: false,
        },
        stroke: {
            width: [0, 2, 5],
            curve: 'smooth'
        },
        plotOptions: {
            bar: {
                columnWidth: '50%'
            }
        },

        fill: {
            opacity: [0.85, 0.25, 1],
            gradient: {
                inverseColors: false,
                shade: 'light',
                type: "vertical",
                opacityFrom: 0.85,
                opacityTo: 0.55,
                stops: [0, 100, 100, 100]
            }
        },
        labels: ['01/01/2003', '02/01/2003', '03/01/2003', '04/01/2003', '05/01/2003', '06/01/2003', '07/01/2003',
            '08/01/2003', '09/01/2003', '10/01/2003', '11/01/2003'
        ],
        markers: {
            size: 0
        },
        xaxis: {
            type: 'datetime'
        },
        yaxis: {
            title: {
                // text: 'Points',
            },
            min: 0
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function (y) {
                    if (typeof y !== "undefined") {
                        return y.toFixed(0) + " points";
                    }
                    return y;

                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#tripchart"), options);
    chart.render();
    // // polar chart

    var options = {
        series: [],
        chart: {
            // width: 380,
            type: 'pie',
            height: 150,
        },
        labels: [],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var paymentChart = new ApexCharts(document.querySelector("#polarchart"), options);
    paymentChart.render();

    // // radar charts
    var options = {
        series: [],
        chart: {
            height: 250,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                offsetY: 0,
                startAngle: 0,
                endAngle: 270,
                hollow: {
                    margin: 3,
                    size: '20%',
                    background: 'transparent',
                    image: undefined,
                },
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        show: false,
                    }
                }
            }
        },
        colors: ['#1ab7ea', '#0084ff', '#39539E', '#0077B5'],
        labels: [],
        legend: {
            show: true,
            floating: true,
            fontSize: '9px',
            position: 'left',
            offsetX: 10,
            offsetY: -20,
            labels: {
                useSeriesColors: true,
            },
            markers: {
                size: 0
            },
            formatter: function(seriesName, opts) {
                return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
            },
            itemMargin: {
                vertical: 2
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                    show: false
                }
            }
        }]
    };

    var radarchart = new ApexCharts(document.querySelector("#radarcharts"), options);
    radarchart.render();
    // var options = {
    //     series: [{
    //         name: 'Series 256',
    //         data: [80],
    //     }, {
    //         name: 'Series 2698',
    //         data: [20, 30, 40, 80],
    //     }],
    //     chart: {
    //         height: 175,
    //         type: 'radar',
    //         dropShadow: {
    //             enabled: true,
    //             blur: 1,
    //             left: 1,
    //             top: 1
    //         }
    //     },
    //     title: {
    //         // text: 'Radar Chart - Multi Series'
    //     },
    //     stroke: {
    //         width: 2
    //     },
    //     fill: {
    //         opacity: 0.5
    //     },
    //     markers: {
    //         size: 0
    //     },
    //     legend: {
    //         position: 'right'
    //     },
    //     xaxis: {
    //         categories: ['Standard', 'Premium']
    //     }
    // };
    //
    // var chart = new ApexCharts(document.querySelector("#radarcharts"), options);
    // chart.render();
    // // column chart
    var options = {
        series: [],
        chart: {
            height: 350,
            type: 'line',
            stacked: false,
            toolbar: {
                show: false
            },
        },

        stroke: {
            width: [0, 2, 5],
            curve: 'smooth'
        },
        plotOptions: {
            bar: {
                columnWidth: '50%'
            }
        },

        fill: {
            opacity: [0.85, 0.25, 1],
            gradient: {
                inverseColors: false,
                shade: 'light',
                type: "vertical",
                opacityFrom: 0.85,
                opacityTo: 0.55,
                stops: [0, 100, 100, 100]
            }
        },
        labels: ['jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul',
            'Aug', 'Sep', 'oct', 'Nov', 'Dec'
        ],
        markers: {
            size: 0
        },
        // xaxis: {
        //     type: 'datetime'
        // },
        yaxis: {
            title: {
                // text: 'Points',
            },
            min: 0
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function (y) {
                    if (typeof y !== "undefined") {
                        return y.toFixed(0) + "Rs";
                    }
                    return y;

                }
            }
        }
    };

    var montlychart = new ApexCharts(document.querySelector("#colchart"), options);
    montlychart.render();
    // captain chart

    var options = {
        series: [{
            name: 'TEAM A',
            type: 'column',
            data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
        }, {
            name: 'TEAM B',
            type: 'area',
            data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
        }, {
            name: 'TEAM C',
            type: 'line',
            data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
        }],
        chart: {
            height: 350,
            type: 'line',
            stacked: false,
        },
        stroke: {
            width: [0, 2, 5],
            curve: 'smooth'
        },
        plotOptions: {
            bar: {
                columnWidth: '50%'
            }
        },

        fill: {
            opacity: [0.85, 0.25, 1],
            gradient: {
                inverseColors: false,
                shade: 'light',
                type: "vertical",
                opacityFrom: 0.85,
                opacityTo: 0.55,
                stops: [0, 100, 100, 100]
            }
        },
        labels: ['01/01/2003', '02/01/2003', '03/01/2003', '04/01/2003', '05/01/2003', '06/01/2003', '07/01/2003',
            '08/01/2003', '09/01/2003', '10/01/2003',
        ],
        markers: {
            size: 0
        },
        xaxis: {
            type: 'datetime'
        },
        yaxis: {
            title: {
                // text: 'Points',
            },
            min: 0
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function (y) {
                    if (typeof y !== "undefined") {
                        return y.toFixed(0) + " points";
                    }
                    return y;

                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#captainchart"), options);
    chart.render();

    // google.charts.load("current", {
    //     packages: ["geochart"],
    //     // Note: you will need to get a mapsApiKey for your project.
    //     // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
    //     mapsApiKey: "AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY",
    // });
    // google.charts.setOnLoadCallback(drawRegionsMap);
    //
    // function drawRegionsMap() {
    //     var data = google.visualization.arrayToDataTable([
    //         ["Country", "Popularity"],
    //         ["Germany", 200],
    //         ["United States", 300],
    //         ["Brazil", 400],
    //         ["Canada", 500],
    //         ["Pakistan", 600],
    //         ["RU", 700],
    //     ]);
    //
    //     var options = {};
    //
    //     var chart = new google.visualization.GeoChart(
    //         document.getElementById("regions_div")
    //     );
    //
    //     chart.draw(data, options);
    // }
</script>

<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        retrieveallOverView();-->
<!---->
<!--        function retrieveallOverView() {-->
<!--            sendRequest(-->
<!--                "?action_type=retrieve&request_type=overview&functionality_type=retrieve_all_overvew_data", {-->
<!--                    page: 1,-->
<!--                    // search: search,-->
<!--                    // country_id:country_id,-->
<!--                    // city_id:city_id,-->
<!---->
<!--                }, "POST")-->
<!--                .then((data) => {-->
<!--                    var data = JSON.parse(data);-->
<!--                    if (data.code == "202") {-->
<!--                        // $(".pagination").html(data.pagination);-->
<!--                        // $("#report-table-body-id").empty();-->
<!--                        // var list = data.listOfData;-->
<!---->
<!--                        // for (var i = 0; i < list.length; i++) {-->
<!--                        //-->
<!--                        //     var n = list[i].id;-->
<!--                        //     var captain_name = list[i].captain_name;-->
<!--                        //     var captain_phone = list[i].captain_phone;-->
<!--                        //     var captain_email = list[i].captain_email;-->
<!--                        //     var customer_name = list[i].customer_name;-->
<!--                        //     var customer_phone = list[i].customer_phone;-->
<!--                        //     var customer_email = list[i].customer_email;-->
<!--                        //     var from_address = list[i].from_address;-->
<!--                        //     var to_address = list[i].to_address;-->
<!--                        //     var distance = list[i].distance;-->
<!--                        //     var trip_time = list[i].trip_time;-->
<!--                        //     var fare = list[i].fare;-->
<!--                        //     var date_time = list[i].date_time;-->
<!--                        //     var ride_type_name = list[i].ride_type_name;-->
<!--                        //     var ride_category_name = list[i].ride_category_name;-->
<!--                        //     var payment_method_name = list[i].payment_method_name;-->
<!--                        //     var ride_rating = list[i].ride_rating;-->
<!--                        //     var status = list[i].status;-->
<!--                        //     var enable = list[i].enable;-->
<!--                        //-->
<!--                        //-->
<!--                        //     var checked = "";-->
<!--                        //     if (enable == 0) {-->
<!--                        //-->
<!--                        //         checked = "value='0'";-->
<!--                        //     } else {-->
<!--                        //-->
<!--                        //         checked = "value='1'  checked";-->
<!--                        //     }-->
<!--                        //-->
<!--                        //-->
<!--                        //-->
<!--                        //     var text = " <tr id=\"report-table-row-"+n+"\"> \n" +-->
<!--                        //         "\n" +-->
<!--                        //         "                                                <td>"+customer_name+"\n" +-->
<!--                        //         "                                                </td>\n" +-->
<!--                        //         "                                                <td data-toggle=\"collapse\" data-target=\"#report-"+n+"\" class=\"accordion-toggle\">"+captain_name+"</td>\n" +-->
<!--                        //         "                                                <td>"+ride_type_name+"</td>\n" +-->
<!--                        //         "                                                <td>"+ride_category_name+"</td>\n" +-->
<!--                        //         "                                                <td>"+fare+"</td>\n" +-->
<!--                        //         "                                                <td>"+ride_rating+"</td>\n" +-->
<!--                        //         "                                                <td class=\"resandunres\">\n" +-->
<!--                        //         "                                                   \n" +-->
<!--                        //         "                                                    <label class=\"switch\">\n" +-->
<!--                        //         "                                                        <input type=\"checkbox\" data-id=\""+n+"\" class=\"report_switch\" id=\"enable-switch-"+n+"\">\n" +-->
<!--                        //         "                                                        <span class=\"slider round\"></span>\n" +-->
<!--                        //         "                                                    </label>\n" +-->
<!--                        //         "                                                </td>\n" +-->
<!--                        //         "                                                <td>\n" +-->
<!--                        //         "                                                    <div class=\"\">\n" +-->
<!--                        //         "                                                        <button type=\"button\"\n" +-->
<!--                        //         "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\" onclick=\"deleteReport("+n+")\">\n" +-->
<!--                        //         "                                                            <i class=\"far fa-trash-alt fa-trash-alt2 mt-0\"></i>\n" +-->
<!--                        //         "                                                        </button>\n" +-->
<!--                        //         "                                                    </div>\n" +-->
<!--                        //         "                                                </td>\n" +-->
<!--                        //         "                                               \n" +-->
<!--                        //         "                                            </tr>\n" +-->
<!--                        //         "                                            <tr >\n" +-->
<!--                        //         "                                            <td colspan=\"11\" class=\"hiddenRow\">\n" +-->
<!--                        //         "                                            <div class=\"accordian-body collapse\" id=\"report-"+n+"\">\n" +-->
<!--                        //         "                                                    \n" +-->
<!--                        //         "                                                <div class=\"Completed_collapse_record\">\n" +-->
<!--                        //         "                                                    <div class=\"start h-100\" style=\"width: 5%;display: grid;\">\n" +-->
<!--                        //         "                                                        <svg height=\"16px\" viewBox=\"0 0 480 480\" width=\"16px\" xmlns=\"http://www.w3.org/2000/svg\">\n" +-->
<!--                        //         "                                                            <path\n" +-->
<!--                        //         "                                                                d=\"m432 240c0 106.039062-85.960938 192-192 192s-192-85.960938-192-192 85.960938-192 192-192 192 85.960938 192 192zm0 0\"\n" +-->
<!--                        //         "                                                                fill=\"#cfd2fc\" />\n" +-->
<!--                        //         "                                                            <path\n" +-->
<!--                        //         "                                                                d=\"m240 480c-132.546875 0-240-107.453125-240-240s107.453125-240 240-240 240 107.453125 240 240c-.148438 132.484375-107.515625 239.851562-240 240zm0-464c-123.710938 0-224 100.289062-224 224s100.289062 224 224 224 224-100.289062 224-224c-.140625-123.652344-100.347656-223.859375-224-224zm0 0\"\n" +-->
<!--                        //         "                                                                fill=\"#8690fa\" />\n" +-->
<!--                        //         "                                                            <path\n" +-->
<!--                        //         "                                                                d=\"m352 240c0 61.855469-50.144531 112-112 112s-112-50.144531-112-112 50.144531-112 112-112 112 50.144531 112 112zm0 0\"\n" +-->
<!--                        //         "                                                                fill=\"#5153ff\" />\n" +-->
<!--                        //         "                                                        </svg>\n" +-->
<!--                        //         "                                                        <svg version=\"1.1\" id=\"Capa_1\" xmlns=\"http://www.w3.org/2000/svg\" height=\"45px\" width=\"50px\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"\n" +-->
<!--                        //         "\t                                                                 viewBox=\"0 0 270 270\" style=\"enable-background:new 0 0 270 270;\" xml:space=\"preserve\">\n" +-->
<!--                        //         "                                                                <g id=\"XMLID_508_\" fill=\"#3f51b5b3\">\n" +-->
<!--                        //         "\t                                                                <rect id=\"XMLID_509_\" x=\"22\" y=\"50\" width=\"20\" height=\"20\"/>\n" +-->
<!--                        //         "\t                                                                <rect id=\"XMLID_510_\" x=\"22\" y=\"100\" width=\"20\" height=\"20\"/>\n" +-->
<!--                        //         "\t                                                                <rect id=\"XMLID_511_\" x=\"22\" y=\"150\" width=\"20\" height=\"20\"/>\n" +-->
<!--                        //         "\t                                                                <rect id=\"XMLID_512_\" x=\"22\" y=\"200\" width=\"20\" height=\"20\"/>\n" +-->
<!--                        //         "\t                                                                <rect id=\"XMLID_515_\" x=\"22\" y=\"250\" width=\"20\" height=\"20\"/>\n" +-->
<!--                        //         "                                                                </g>\n" +-->
<!--                        //         "\n" +-->
<!--                        //         "                                                        </svg>\n" +-->
<!--                        //         "                                                        <svg height=\"16px\" style=\"margin-top:10px\" viewBox=\"0 0 480 480\" width=\"16px\" xmlns=\"http://www.w3.org/2000/svg\">\n" +-->
<!--                        //         "                                                                    <path\n" +-->
<!--                        //         "                                                                        d=\"m432 240c0 106.039062-85.960938 192-192 192s-192-85.960938-192-192 85.960938-192 192-192 192 85.960938 192 192zm0 0\"\n" +-->
<!--                        //         "                                                                        fill=\"#cfd2fc\" />\n" +-->
<!--                        //         "                                                                    <path\n" +-->
<!--                        //         "                                                                        d=\"m240 480c-132.546875 0-240-107.453125-240-240s107.453125-240 240-240 240 107.453125 240 240c-.148438 132.484375-107.515625 239.851562-240 240zm0-464c-123.710938 0-224 100.289062-224 224s100.289062 224 224 224 224-100.289062 224-224c-.140625-123.652344-100.347656-223.859375-224-224zm0 0\"\n" +-->
<!--                        //         "                                                                        fill=\"#4caf5087\" />\n" +-->
<!--                        //         "                                                                    <path\n" +-->
<!--                        //         "                                                                        d=\"m352 240c0 61.855469-50.144531 112-112 112s-112-50.144531-112-112 50.144531-112 112-112 112 50.144531 112 112zm0 0\"\n" +-->
<!--                        //         "                                                                        fill=\"#4CAF50\" />\n" +-->
<!--                        //         "                                                        </svg>\n" +-->
<!--                        //         "                                                    </div>\n" +-->
<!--                        //         "                                                      <div class=\"start\">\n" +-->
<!--                        //         "                                                          <h1>(Start Point)</h1>\n" +-->
<!--                        //         "                                                          <h2 data-toggle=\"tooltip\" data-placement=\"left\" title=\""+from_address+"\">"+from_address+"</h2>\n" +-->
<!--                        //         "                                                      </div>\n" +-->
<!--                        //         "                                                      <div class=\"start\">\n" +-->
<!--                        //         "                                                        <h1>Driver</h1>\n" +-->
<!--                        //         "                                                        <h2>"+captain_name+"</h2>\n" +-->
<!--                        //         "                                                    </div>\n" +-->
<!--                        //         "                                                     <div class=\"start\">\n" +-->
<!--                        //         "                                                        <h1>Rider</h1>\n" +-->
<!--                        //         "                                                        <h2>"+customer_name+"</h2>\n" +-->
<!--                        //         "                                                    </div>\n" +-->
<!--                        //         "                                                     <div class=\"start\">\n" +-->
<!--                        //         "                                                        <h1>Rider status</h1>\n" +-->
<!--                        //         "                                                        <h2>"+status+"</h2>\n" +-->
<!--                        //         "                                                    </div> \n" +-->
<!--                        //         "                                                    <div class=\"start\">\n" +-->
<!--                        //         "                                                        <h1>Arival Time</h1>\n" +-->
<!--                        //         "                                                        <h2>"+trip_time+"</h2>\n" +-->
<!--                        //         "                                                    </div> \n" +-->
<!--                        //         "                                                    <div class=\"start\">\n" +-->
<!--                        //         "                                                        <h1>(Finish point)</h1>\n" +-->
<!--                        //         "                                                        <h2 data-toggle=\"tooltip\" data-placement=\"left\" title=\""+to_address+"\">"+to_address+"</h2>\n" +-->
<!--                        //         "                                                    </div> \n" +-->
<!--                        //         "                                                    <div class=\"start\">\n" +-->
<!--                        //         "                                                        <h1>Drivers Phone</h1>\n" +-->
<!--                        //         "                                                        <h2>"+captain_phone+"</h2>\n" +-->
<!--                        //         "                                                    </div>\n" +-->
<!--                        //         "                                                     <div class=\"start\">\n" +-->
<!--                        //         "                                                        <h1>Riders Phone</h1>\n" +-->
<!--                        //         "                                                        <h2>"+customer_phone+"</h2>\n" +-->
<!--                        //         "                                                    </div>\n" +-->
<!--                        //         "                                                    <div class=\"start\">\n" +-->
<!--                        //         "                                                        <h1>Payment methods</h1>\n" +-->
<!--                        //         "                                                        <h2>"+payment_method_name+"</h2>\n" +-->
<!--                        //         "                                                    </div>\n" +-->
<!--                        //         "                                                    <div class=\"start\">\n" +-->
<!--                        //         "                                                        <h1>Distance</h1>\n" +-->
<!--                        //         "                                                        <h2>"+distance+"</h2>\n" +-->
<!--                        //         "                                                    </div>\n" +-->
<!--                        //         "                                                </div>\n" +-->
<!--                        //         "                                                     \n" +-->
<!--                        //         "                                            </div>\n" +-->
<!--                        //         "                                             </td>\n" +-->
<!--                        //         "                                            </tr>";-->
<!--                        //     $("#report-table-body-id").append(text);-->
<!--                        // }-->
<!---->
<!---->
<!---->
<!--                    } else if (data.code == "206") {-->
<!--                        console.log("Failed to Delete");-->
<!--                    }-->
<!---->
<!--                })-->
<!--                .catch((error) => {-->
<!--                    console.log(error)-->
<!--                });-->
<!--        }-->
<!---->
<!--        $('#report-search').keyup(function () {-->
<!--            var search = $(this).val();-->
<!--            var country_id = $("#country-select-id").val();-->
<!--            var city_id = $("#city-select-id").val();-->
<!---->
<!--            retrieveallReport(search,country_id,city_id);-->
<!--            // console.log(query)-->
<!--        });-->
<!---->
<!---->
<!--        $('#city-select-id').change(function () {-->
<!--            var city_id = $(this).val();-->
<!--            var country_id = $("#country-select-id").val();-->
<!--            var search = $('#city-search').val();-->
<!--            retrieveallReport(search,country_id,city_id);-->
<!--            // console.log(search)-->
<!--        });-->
<!---->
<!--        $('#country-select-id').change(function () {-->
<!--            var country_id = $(this).val();-->
<!--            var city_id = $("#city-select-id").val();-->
<!--            var search = $('#city-search').val();-->
<!--            retrieveallReport(search,country_id,city_id);-->
<!--            // console.log(search)-->
<!--        });-->
<!---->
<!--        $(document).on('change', '#country-select-id', function () {-->
<!---->
<!--            var id = $(this).val();-->
<!---->
<!---->
<!--            sendRequest("?action_type=retrieve&request_type=all_reports&functionality_type=retrieve_all_cities", {-->
<!--                id: id,-->
<!--                // enable: enable_val,-->
<!--            }, "POST")-->
<!--                .then((data) => {-->
<!--                    var data = JSON.parse(data);-->
<!--                    if (data.code == "202") {-->
<!---->
<!--                        var list = data.listOfData;-->
<!--                        $("#city-select-id").show();-->
<!--                        $("#city-select-id").empty();-->
<!--                        var text1="<option id=\"city-name\" value=\"\">Select City</option>";-->
<!--                        $("#city-select-id").append(text1);-->
<!--                        for (var i = 0; i < list.length; i++) {-->
<!---->
<!---->
<!--                            var n = list[i].id;-->
<!--                            // var picture = list[i].picture;-->
<!--                            var name = list[i].name;-->
<!--                            var text="<option  value=\""+n+"\">"+name+"</option>";-->
<!---->
<!--                            $("#city-name").after(text);-->
<!---->
<!---->
<!---->
<!---->
<!--                            // $("#add_payment_modal_edit").modal('show');-->
<!--                        }-->
<!---->
<!--                    }-->
<!---->
<!---->
<!--                })-->
<!--                .catch((error) => {-->
<!--                    console.log(error)-->
<!--                })-->
<!---->
<!--        });-->
<!---->
<!--        $(document).on('change', '.report_switch', function () {-->
<!---->
<!--            var id = $(this).data('id');-->
<!--            var enable_val;-->
<!--            if ($("#enable-switch-" + id).is(':checked')) {-->
<!--                $("#enable-switch-" + id).val(1);-->
<!--                enable_val = "1";-->
<!--            } else {-->
<!--                $("#enable-switch-" + id).val(0);-->
<!--                enable_val = "0";-->
<!--            }-->
<!---->
<!---->
<!--            sendRequest("?action_type=update&request_type=all_reports&functionality_type=enable_ride", {-->
<!--                id: id,-->
<!--                enable: enable_val,-->
<!--            }, "POST")-->
<!--                .then((data) => {-->
<!--                    var data = JSON.parse(data);-->
<!--                    if (data.code == "202") {-->
<!---->
<!--                    }-->
<!---->
<!---->
<!--                })-->
<!--                .catch((error) => {-->
<!--                    console.log(error)-->
<!--                })-->
<!---->
<!--        });-->
<!---->
<!--        $(document).on('click', '#editmodal', function () {-->
<!---->
<!--            var id = $(this).data('id');-->
<!---->
<!---->
<!--            sendRequest("?action_type=retrieve&request_type=city&functionality_type=retrieve_edit_all_cities", {-->
<!--                id: id,-->
<!--                // enable: enable_val,-->
<!--            }, "POST")-->
<!--                .then((data) => {-->
<!--                    var data = JSON.parse(data);-->
<!--                    if (data.code == "202") {-->
<!---->
<!--                        var list = data.listOfData;-->
<!---->
<!--                        for (var i = 0; i < list.length; i++) {-->
<!---->
<!--                            var n = list[i].id;-->
<!--                            // var picture = list[i].picture;-->
<!--                            var name = list[i].name;-->
<!--                            var cou_id = list[i].cou_id;-->
<!--                            // var currency_symbol = list[i].currency_symbol;-->
<!--                            var enable = list[i].enable;-->
<!--                            $("#city-id").val(n);-->
<!--                            $(".city_name_edit").val(name);-->
<!--                            $("#country-select-edit-id").val(cou_id);-->
<!--                            $("#country-select-edit-id").trigger('click');-->
<!---->
<!---->
<!---->
<!---->
<!--                            $("#add_payment_modal_edit").modal('show');-->
<!--                        }-->
<!---->
<!--                    }-->
<!---->
<!---->
<!--                })-->
<!--                .catch((error) => {-->
<!--                    console.log(error)-->
<!--                })-->
<!---->
<!--        });-->
<!---->
<!--        $(document).on('click', '.city_edit_button', function () {-->
<!---->
<!--            var id =  $("#city-id").val();-->
<!--            var name = $(".city_name_edit").val();-->
<!--            var cou_id= $("#country-select-edit-id").val();-->
<!--            // $(".image-upload-wrap4").hide();-->
<!--            // $(".file-upload-content4").show();-->
<!--            // var img = $(".file-upload-image4").attr('src');-->
<!--            // var fd = new FormData($("#fileinfo"));-->
<!--            // console.log(fd);-->
<!---->
<!---->
<!--            sendRequest("?action_type=update&request_type=city&functionality_type=update_city", {-->
<!--                id: id,-->
<!--                city_name:name,-->
<!--                country_id:cou_id,-->
<!---->
<!---->
<!--            }, "POST")-->
<!--                .then((data) => {-->
<!--                    var data = JSON.parse(data);-->
<!--                    if (data.code == "202") {-->
<!--                        $("#add_payment_modal_edit").modal('hide');-->
<!--                        retrieveallCities();-->
<!--                        // $(".image-upload-wrap4").show();-->
<!--                        // $(".file-upload-content4").hide();-->
<!---->
<!--                    }-->
<!---->
<!---->
<!--                })-->
<!--                .catch((error) => {-->
<!--                    console.log(error)-->
<!--                })-->
<!---->
<!--        });-->
<!---->
<!--        $(document).on('click', '.city_add_button', function () {-->
<!---->
<!--            // var id= $("#country-id").val();-->
<!--            var name = $(".city_name_add").val();-->
<!--            var cou_id = $("#country-select-add-id").val();-->
<!--            // $(".image-upload-wrap4").hide();-->
<!--            // $(".file-upload-content4").show();-->
<!--            // var img = $(".file-upload-image4").attr('src');-->
<!---->
<!---->
<!--            sendRequest("?action_type=create&request_type=city&functionality_type=insert_city", {-->
<!--                // id: id,-->
<!--                city_name:name,-->
<!--                country_id:cou_id,-->
<!---->
<!--            }, "POST")-->
<!--                .then((data) => {-->
<!--                    var data = JSON.parse(data);-->
<!--                    if (data.code == "202") {-->
<!--                        $("#add_payment_modal").modal('hide');-->
<!--                        retrieveallCities();-->
<!--                        // $(".image-upload-wrap4").show();-->
<!--                        // $(".file-upload-content4").hide();-->
<!---->
<!--                    }-->
<!---->
<!---->
<!--                })-->
<!--                .catch((error) => {-->
<!--                    console.log(error)-->
<!--                })-->
<!---->
<!--        });-->
<!--    });-->
<!--</script>-->

</body>

</html>
