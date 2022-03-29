<?php
include('../../config.php');
session_start();

if(empty($_SESSION['driver_id'])){
    header("location:../driver_panel/driver_login.php");
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
    <link rel="stylesheet" href="../public/css/dropzone.css">
    <link rel="stylesheet" href="../public/css/jquery.tag.css">
    <link rel="stylesheet" href="../public/css/jquery.tagsinput-revisited.css">
    <!-- Custom styles for this template -->
    <link href="../public/css/main.css" rel="stylesheet">

</head>

<body>

    <div class="d-flex" id="wrapper">


        <?php
        $id = $_SESSION['driver_id'];
        ?>
        <input type="hidden" id="driver-detail-id" value="<?php echo $id; ?>">
        <!-- Page Content -->
        <div id="page-content-wrapper">

            <?php
            include_once ('../driver_navbar.php');
            ?>

            <div class="container profile_tabs">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active"  href="profile.php">Profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"  href="detail_table.php">All Rides</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="driver_detail.php">Detail</a>
                    </li>
                   
                </ul>

              
                <div class="mt-5">
                    <div class="container" id="Profit">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card profit_graph_card">
                                            <div class="card-body">
                                                <div class="profit-head-div">
                                                    <h1>Earnings</h1>
                                                    <div>
                                                        <div class="driver_panel_year">
                                                            <div class="form-group">
                                                                <?php
                                                                $query = "SELECT YEAR(ride_order.date_created) as year
                                                                        FROM RideOrder as ride_order 
                                                                        INNER JOIN Captain as captain on captain.id = ride_order.captain_id
                                                                        where captain.id = '$id'
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
                                                                      
                                                                                                </select>
                                                            </div>
<!--                                                            <span class="active">1 years</span>-->
<!--                                                            <span>2 years</span>-->
<!--                                                            <span>3 years</span>-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="profit_chart">

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 mb-3 mt-3">
                                        <div class="card admin_card">
                                            <div class="card-body">
                                                <div class="card_img driver_earning">
                                                    <div class="img_div">
                                                        <span><i class="fas fa-arrow-up"></i></span>
                                                    </div>
                                                    <div class="cards_details">
                                                        <h1>$6,726 <span>+2.5%</span> </h1>
                                                        <h2>Income in this Period</h2>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 mb-3 mt-3">
                                        <div class="card admin_card">
                                            <div class="card-body">
                                                <div class="card_img driver_rides">
                                                    <div class="img_div">
                                                        <span><i class="fas fa-arrow-up"></i></span>
                                                    </div>
                                                    <div class="cards_details">
                                                        <h1>$3,966 <span>+2.5%</span> </h1>
                                                        <h2>Expense in this Period</h2>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 mb-3 mt-3">
                                        <div class="card admin_card">
                                            <div class="card-body">
                                                <div class="card_img driver_cancel_ride">
                                                    <div class="img_div down">
                                                        <span class="down_span"><i class="fas fa-arrow-down"></i></span>
                                                    </div>
                                                    <div class="cards_details">
                                                        <h1>$3,966 <span class="down_span">+2.5%</span> </h1>
                                                        <h2>Expense in this Period</h2>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 mb-3 mt-3">
                                        <div class="card payment_method_card candidate">
                                            <div class="card-body">
                                                <div class="pagination_table">
                                                    <div class="results">
                                                        <h1>Payment Detail</h1>

                                                    </div>
                                                    <div class="page">
                                                        <div class="page_filter">


                                                        </div>
                                                        <span class="page_head">Results Per Page</span>
                                                        <ul class="pagination pagination-sm">
                                                            <li class="page-item"><a class="page-link page_pre" href="#"><span><i
                                                                                class="fas fa-angle-left"></i></span></a></li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">19</a></li>
                                                            <li class="page-item"><a class="page-link page_next" href="#"><span><i
                                                                                class="fas fa-angle-right"></i></span></a></li>
                                                        </ul>


                                                    </div>
                                                </div>
                                                <div class="search_product">
                                                    <form action="#">
                                                        <div class="input-group ">
                                                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                                class="fas fa-search"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" id="report-search" placeholder="Searching for.."
                                                                   aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </form>

                                                </div>


                                                <table class="table mt-3">
                                                    <thead>
                                                    <tr>


                                                        <th>Date</th>
                                                        <th>Earning</th>
                                                        <th>Total Trip</th>
                                                        <th>IBAN NO</th>



                                                    </tr>
                                                    </thead>
                                                    <tbody id="driver-payment-table-body-id">
                                                    <tr>

                                                        <td>$10/2km</td>
                                                        <td>92/con</td>
                                                        <td>category</td>
                                                        <td>pakistan</td>




                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="card profile_page_detail">
                                    <div class="card-body">
                                        <div class="user_pic">
                                            <img id="captain-pic" src="../public//image/person.jpg" alt="">
                                            <h2 id="captain-name">Austin Robertson</h2>
                                            <h3 id="captain-email">Marketing Administrator</h3>
                                            <a href="driver_panel.php"><div class="user_edit">
                                                <svg width="18px" height="18px" viewBox="0 0 24 24" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <desc>Created with Lunacy</desc>
                                                    <g id="ic_Edit">
                                                        <path
                                                            d="M18.4419 3.13399C19.186 3.87811 19.186 5.08458 18.4419 5.82871L6.45174 17.8189C6.30989 17.9607 6.12847 18.0564 5.93129 18.0933L1.17816 18.9826C0.490832 19.1112 -0.111152 18.5092 0.0174442 17.8218L0.90674 13.0687C0.943632 12.8715 1.03928 12.6901 1.18113 12.5483L13.1713 0.558095C13.9154 -0.186032 15.1219 -0.186032 15.866 0.558095L18.4419 3.13399ZM16.9757 4.48135L15.861 5.5961L13.4039 3.13904L14.5187 2.02428L16.9757 4.48135ZM11.9971 4.54581L14.4542 7.00288L5.26272 16.1943L2.24014 16.7599L2.80565 13.7373L11.9971 4.54581ZM9.9901 19L18.0099 19C19.33 19 19.33 17 18.0099 17L9.9901 17C8.66997 17 8.66997 19 9.9901 19Z"
                                                            transform="translate(2 2)" id="Shape" fill="#92929D"
                                                            fill-rule="evenodd" stroke="none" />
                                                    </g>
                                                </svg>
                                                <span>Edit Profile</span>
                                            </div></a>
                                        </div>
                                        <hr>
                                        <div class="user_detail">

                                            <span id="captain-phone-no">083-412-0411</span>

                                            <span id="captain-car-no">Senior (50k+)</span>
                                            <span id="captain-car-cat-type">Senior (50k+)</span>
                                        </div>
                                        <div class="progress_user">

                                        </div>
                                        <div class="profile_progress">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                    aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                    <span class="sr-only">70% Complete</span>
                                                </div>
                                            </div>
                                            <div class="profile_progress_detail">
                                                <span data-toggle="tooltip" data-placement="top" title="total Earning" id="captain-progres-earn" class="span_color">$362</span>
                                                <span>/</span>
                                                <span data-toggle="tooltip" data-placement="top" title="total Trips" id="captain-progres-trip" class="span_gray">$450</span>
                                            </div>
                                        </div>
                                        <div class="profile_description">
                                            <p id="captain-adress">Born and raised in Pennsylvania, Swift moved to Nashville, Tennessee, at
                                                the age of 14 to pursue a career in country music. She signed with the
                                                label Big Machine Records and became the youngest artist ever signed by
                                                the Sony/ATV Music publishing house.</p>
                                        </div>
<!--                                        <div class="profile_tag">-->
<!--                                            <span class="span_photo">Photography</span>-->
<!--                                            <span class="span_design">Design</span>-->
<!--                                            <span class="span_marketing">Marketing</span>-->
<!--                                        </div>-->


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                   
                   
                 
                    


                    <!-- /#page-content-wrapper -->

                </div>
                <!-- /#wrapper -->
            </div>
        </div>

        <!-- Bootstrap core JavaScript -->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="../public/js/jquery.tag.js"></script>
        <script src="../public/js/jquery.tagsinput-revisited.js"></script>
        <script src="../public/js/customjs.js"></script>
        <script src="../public/js/custom_request.js"></script>
        <script src="../public/js/customPagination.js"></script>


        <!-- Menu Toggle Script -->
        <script>
            var currentYear = (new Date).getFullYear();
            // var pastYear = new Date(new Date().setFullYear(new Date().getFullYear() - 1));
            // var pastYear = pastYear.getFullYear();
            //
            // alert(pastYear);
            // currentYear =String(currentYear);
            retrieveallOverView(currentYear);
            totalPaymentRequest();

            function retrieveallOverView(currentYear = '') {
                var captain_id = $("#driver-detail-id").val();

                var pastYear = new Date(new Date().setFullYear(currentYear - 1));
                var  pastYear = pastYear.getFullYear();
                // var  pastYear = "2019";


                // alert("this is past year "+pastYear);

                sendRequest(
                    "?action_type=retrieve&request_type=driver_profile&functionality_type=retrieve_all_overvew_data&panel_type=driver_panel", {
                        year: currentYear,
                        pastyear:pastYear,
                        captain_id:captain_id


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



                                var TotalNoOfRides = 0;


                                $(".driver_cancel_ride").empty();
                                $(".driver_rides").empty();
                                $(".driver_earning").empty();


                                // total no of captain code

                                TotalNoOfCancelRide = yearNoOfCaptain[0].total_rides;


                                // total no of rides code

                                TotalNoOfRides = yearnoRides[0].total_rides;
                                console.log('no rides'+TotalNoOfRides);



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

                                    var erningtext = `
                                    <div class="cards_details">
                                        <h1>${totalrevcurrency} ${totalrev} </h1>
                                        <h2>Earning in this Period</h2>

                                    </div>`;
                                    $(".driver_earning").append(erningtext);


                                // total revenue card end

                                // no of rides card code
                                // driver_rides

                                    var driver_rides_text = `
                                    <div class="cards_details">
                                        <h1>${TotalNoOfRides}</h1>
                                        <h2>Complete no of Ride</h2>

                                    </div>`;
                                    $(".driver_rides").append(driver_rides_text);

                                // driver_cancel_ride



                                // total caption card record

                                var driver_cancel_rides_text = `
                                    <div class="cards_details">
                                        <h1>${TotalNoOfCancelRide}</h1>
                                        <h2>Cancel no of  Ride</h2>

                                    </div>`;
                                $(".driver_cancel_ride").append(driver_cancel_rides_text);

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

                                chart.updateSeries([{
                                    name: 'All Revenue',
                                    data: alllistarry
                                }, {
                                    name: 'Complete Revenue',
                                    data: allcomptelearry
                                }, {
                                    name: 'Cancel Revenue',
                                    data: cancelarry
                                }]);













                            }





                        } else if (data.code == "206") {
                            console.log("Failed to Delete");
                        }

                    })
                    .catch((error) => {
                        console.log(error)
                    });
            }

            function totalPaymentRequest(search = ''){
                var captain_id = $("#driver-detail-id").val();
                sendRequest(
                    "?action_type=retrieve&request_type=driver_profile&functionality_type=retrieve_all_payment_detail&panel_type=driver_panel", {

                        captain_id:captain_id,
                        search:search,


                    }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {
                            $(".pagination").html(data.pagination);
                            $("#driver-payment-table-body-id").empty();
                            var list = data.listOfData;
                            // console.log("yeses"+alllist);
                            for (var i = 0; i < list.length; i++) {

                                var id = list[i].id;
                                var p_date = list[i].p_date;
                                var total_rides = list[i].total_rides;
                                var total_earning = list[i].total_earning;
                                var iban = list[i].iban;

                                const payment_table= ` <tr>
                                                        <td>${p_date}</td>
                                                        <td>${total_earning}</td>
                                                        <td>${total_rides}</td>
                                                        <td>${iban}</td>
                                                    </tr>`;
                                $("#driver-payment-table-body-id").append(payment_table);














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
                retrieveallOverView(year_val);
            })
            $('#report-search').keyup(function () {
                var search = $(this).val();
                var captain_id = $("#driver-detail-id").val();

                totalPaymentRequest(search);
                // console.log(query)
            });

            function pag(offset,id) {

                var offset =offset;
                var active= $(".pagination").find('.active');
                active.removeClass("active");
                $("#pag-"+id).addClass("active");
                var search = $("#report-search").val();
                var captain_id = $("#driver-detail-id").val();



                var searchset=""
                if(search = ""){
                    searchset =""
                }else {
                    searchset = search;
                }
                sendRequest("?action_type=retrieve&request_type=driver_profile&functionality_type=pagination&panel_type=driver_panel", {
                    offset:offset,
                    search:search,
                    captain_id:captain_id,


                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {
                            // $(".pagination").html(data.pagination);
                            // $("#paginate").html(data.htmlData);
                            $("#driver-payment-table-body-id").empty();
                            var list = data.listOfData;
                            // console.log("yeses"+alllist);
                            for (var i = 0; i < list.length; i++) {

                                var id = list[i].id;
                                var p_date = list[i].p_date;
                                var total_rides = list[i].total_rides;
                                var total_earning = list[i].total_earning;
                                var iban = list[i].iban;

                                const payment_table= ` <tr>
                                                        <td>${p_date}</td>
                                                        <td>${total_earning}</td>
                                                        <td>${total_rides}</td>
                                                        <td>${iban}</td>
                                                    </tr>`;
                                $("#driver-payment-table-body-id").append(payment_table);














                            }


                        }
                        else if (data.code == "206") {
                            console.log("Failed to Delete");
                        }

                    })
                    .catch((error) => {
                        console.log(error)
                    });
            }

            retrieveallSpcificCaptain();


            function retrieveallSpcificCaptain() {
                var captains_id = $("#driver-detail-id").val();
                sendRequest("?action_type=retrieve&request_type=driver_detail&functionality_type=retrieve_specific_captain&panel_type=driver_panel", {

                    captain_id: captains_id,


                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {
                            // $(".pagination").html(data.pagination);
                            // $("#captain-table-body-id").empty();
                            var list = data.listOfData;

                            for (var i = 0; i < list.length; i++) {

                                var n = list[i].id;
                                var name = list[i].name;
                                var cap_pic = list[i].cap_pic;
                                var email = list[i].email;
                                var phone = list[i].phone;
                                var address = list[i].address;
                                var car_number_plate = list[i].car_number_plate;

                                var ride_type_name = list[i].ride_type_name;
                                var ride_category = list[i].ride_category;
                                var car_brand_name = list[i].car_brand_name;
                                var car_name = list[i].car_name;




                                var total_revenue = list[i].total_revenue;
                                var total_trips = list[i].total_trips;
                                var avg_rating = list[i].avg_rating;
                                var status = list[i].status;
                                var car_colour = list[i].car_colour;
                                var bank_id = list[i].bank_id;

                                $("#bank-id").val(bank_id);


                                var driving_license = list[i].driving_license;
                                var driving_license_picture = list[i].driving_license_picture;
                                var driving_license_status = list[i].driving_license_status;
                                var driving_license_registration_no = list[i].driving_license_registration_no;
                                var driving_license_date_of_issue = list[i].driving_license_date_of_issue;
                                var driving_license_date_of_expiry = list[i].driving_license_date_of_expiry;

                                var national_identity_card = list[i].national_identity_card;
                                var national_identity_card_picture = list[i].national_identity_card_picture;
                                var national_identity_card_status = list[i].national_identity_card_status;
                                var national_identity_card_registration_no = list[i].national_identity_card_registration_no;
                                var national_identity_card_date_of_issue = list[i].national_identity_card_date_of_issue;
                                var national_identity_card_date_of_expiry = list[i].national_identity_card_date_of_expiry;

                                var car_pictures_name = list[i].car_pictures_name;
                                var car_pictures = list[i].car_pictures;
                                var car_pictures_status = list[i].car_pictures_status;
                                $("#car-pictures-status").val(car_pictures_status)

                                var car_documents = list[i].car_documents;
                                var car_documents_pictures = list[i].car_documents_pictures;
                                var car_documents_status = list[i].car_documents_status;

                                $("#car-documents-status").val(car_documents_status);


                                var bank_name = list[i].bank_name;
                                var branch_code = list[i].branch_code;
                                var account_holder_name = list[i].account_holder_name;
                                var account_no = list[i].account_no;
                                var iban_no = list[i].iban_no;
                                var cheque_picture = list[i].cheque_picture;


                                var car_docsments_id = list[i].car_docsments_id;
                                var car_pic_id = list[i].car_pic_id;
                                var driving_id = list[i].driving_id;
                                var cnic_id = list[i].cnic_id;

                                $("#captain-pic").attr('src',cap_pic);
                                $("#captain-name").text(name);
                                $("#captain-email").text(email);
                                $("#captain-phone-no").text("Phone No: "+phone);


                                $("#captain-car-no").text("Car Detail: "+car_number_plate+" , "+car_brand_name+" , "+car_name);
                                $("#captain-car-cat-type").text("Car Category: "+ride_category+" / "+ride_type_name);
                                $("#captain-progres-trip").text(total_trips +"");
                                $("#captain-progres-earn").text(" Rs "+total_revenue);
                                $("#captain-adress").text(address);





                                var date_created = list[i].date_created;
                                var enable = list[i].enable;

                                $("#cap-name").text(name);
                                $("#cap-image").attr('src',cap_pic);

                                $(".span_rat").text(avg_rating);
                                var status_text = "";
                                if(status == 1){
                                    status_text = "Pending";
                                }
                                else if(status == 0) {
                                    status_text = "Approved";
                                }
                                else {
                                    status_text = "Rejected";
                                }
                                $("#driver_detil_status").text(status_text)

                                // $("#status-caption-select-id").val(status);
                                // $("#status-caption-select-id").trigger("change");

                                for(var i = 1; i<=avg_rating; i++){
                                    // console.log("hello"+i);
                                    $(".cap_rating_"+i).addClass("checked");
                                }
                                $("#cap-phone").text(phone);

                                $("#cap-address").text(address);
                                $("#cap-trips").text(total_trips);
                                $("#cap-car-no").text(car_number_plate);
                                $("#cap-ride-category").text(ride_category);
                                $("#cap-ride-type").text(ride_type_name);

                                $("#cap-email").text(email);
                                $("#cap-total-revenue").text(total_revenue);
                                $("#cap-cnic-reg").text(national_identity_card_registration_no);
                                $("#cap-cnic-issue").text(national_identity_card_date_of_issue);
                                $("#cap-cnic-expiry").text(national_identity_card_date_of_expiry);



                                $("#cap-registration").text(driving_license_registration_no);
                                $("#cap-licence-issue").text(driving_license_date_of_issue);
                                $("#cap-lecence-expiry").text(driving_license_date_of_expiry);




                                $("#cap-bank-name").text(bank_name);
                                $("#cap-acount-no").text(account_no);
                                $("#cap-holder-name").text(account_holder_name);
                                $("#cap-bank-branch-code").text(branch_code);
                                $("#cap-iban-no").text(iban_no);

                                $("#cap-car-brand").text(car_brand_name);
                                $("#cap-car-color").text(car_colour);
                                $("#cap-car-name").text(car_name);
                                $("#cap-car-ride-type").text(ride_type_name);
                                $("#cap-car-ride-category").text(ride_category);
                                $("#cap-car-number-plate").text(car_number_plate);
                                $("#cap-car-modal").text(car_brand_name+","+car_name);

                                // docnument info attachments

                                var st_checked = "";
                                if (driving_license_status == 0) {

                                    st_checked = "";
                                } else {

                                    st_checked = "Style='background: red;'";
                                }

                                console.log(driving_license_picture[0].id);
                                $(".doc_detail_attach").empty();
                                for(var d_pic = 0; d_pic < driving_license_picture.length; d_pic++ ){
                                    var d=driving_license_picture[d_pic];
                                    var text=" <div class=\"first_attachment\" id=\"licence-pic-"+d.id+"\">\n" +
                                        "                                       <a href=\"../public/uploads/driver_panel_pic/"+d.picture+"\" id=\"licence-path-"+d.id+"\" alt=\"Image description\" target=\"_blank\">  <span class=\"span_img\" "+st_checked+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+d.picture+"</span></a>  <span class=\"span_icon\"  onclick=\"deleteDocments("+d.id+");\"><i class=\"fas fa-times\"></i></span>\n" +

                                        "                                    </div>";
                                    $(".doc_detail_attach ").append(text);
                                }

                                // Cnic info attachments

                                var national_status = "";
                                if (national_identity_card_status == 0) {

                                    national_status = "";
                                } else {

                                    national_status = "Style='background: red;'";
                                }

                                console.log(national_identity_card_picture[0].picture);
                                $(".cnic_attachment").empty();
                                for(var d_pic = 0; d_pic < national_identity_card_picture.length; d_pic++ ){
                                    var d=national_identity_card_picture[d_pic];
                                    var text=" <div class=\"first_attachment\" id=\"cnic-pic-"+d.id+"\">\n" +
                                        "                                      <a href=\"../public/uploads/driver_panel_pic/"+d.picture+"\" id=\"cnic-path-"+d.id+"\" alt=\"Image description\" target=\"_blank\">  <span class=\"span_img\" "+national_status+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+d.picture+"</span></a>  <span class=\"span_icon\" onclick=\"deleteCnic("+d.id+");\"><i class=\"fas fa-times\"></i></span>\n" +
                                        "                                    </div>";
                                    $(".cnic_attachment ").append(text);
                                }

                                // Bank detail  attachments
                                if(cheque_picture == null){
                                    $(".bankdetail_attach").empty();
                                }
                                else {
                                    $(".bankdetail_attach").empty();

                                    // var d=national_identity_card_picture[d_pic];
                                    var text="<div class=\"first_attachment\" id=\"bank-pic-"+bank_id+"\">\n" +
                                        "                                        <a href=\"../public/uploads/driver_panel_pic/"+cheque_picture+"\" class=\"check_pic\" id=\"bank-detail-path-"+bank_id+"\" alt=\"Image description\" target=\"_blank\"> <span class=\"span_img\"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+cheque_picture+"</span></a>  <span class=\"span_icon\" onclick=\"deleteBankPic("+bank_id+")\"><i class=\"fas fa-times\"></i></span>\n" +
                                        "                                    </div>";
                                    $(".bankdetail_attach").append(text);
                                }





                                // Car info attachments

                                var car_status = "";
                                if (car_pictures_status == 0) {

                                    car_status = "";
                                } else {

                                    car_status = "Style='background: red;'";
                                }

                                console.log(car_pictures[0].picture);
                                $(".car_detail_Attachments").empty();
                                for(var d_pic = 0; d_pic < car_pictures.length; d_pic++ ){
                                    var d=car_pictures[d_pic];
                                    var text="<div class=\"first_attachment\" id=\"car-pic-"+d.id+"\">\n" +
                                        "                                       <a href=\"../public/uploads/driver_panel_pic/"+d.picture+"\" id=\"car-info-path-"+d.id+"\" alt=\"Image description\" target=\"_blank\">   <span class=\"span_img\" "+car_status+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+d.picture+"</span> </a> <span class=\"span_icon\" onclick=\"deleteCardAtach("+d.id+");\"><i class=\"fas fa-times\"></i></span>\n" +
                                        "                                    </div>";
                                    $(".car_detail_Attachments ").append(text);
                                }


                                // Car doc info attachments

                                var car_doc_status = "";
                                if (car_documents_status == 0) {

                                    car_doc_status = "";
                                } else {

                                    car_doc_status = "Style='background: red;'";
                                }

                                console.log(car_documents_pictures[0].picture);
                                $(".car_doc").empty();
                                for(var d_c = 0; d_c < car_documents_pictures.length; d_c++ ){
                                    var d=car_documents_pictures[d_c];
                                    var text="<div class=\"first_attachment\" id=\"car-doc-pic-"+d.id+"\">\n" +
                                        "                                       <a href=\"../public/uploads/driver_panel_pic/"+d.picture+"\" id=\"car-doc-info-path-"+d.id+"\" alt=\"Image description\" target=\"_blank\">   <span class=\"span_img\" "+car_doc_status+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+d.picture+"</span> </a> <span class=\"span_icon\" onclick=\"deleteCardAtachdoc("+d.id+");\"><i class=\"fas fa-times\"></i></span>\n" +
                                        "                                    </div>";
                                    $(".car_doc").append(text);
                                }




                                retrieve_SpecificCaptainrides(search='',captains_id);

                                EditInfo(1);




                                // var checked = "";
                                // if (enable == 0) {
                                //
                                //     checked = "value='0'";
                                // } else {
                                //
                                //     checked = "value='1'  checked";
                                // }
                                //
                                // var st_checked = "";
                                // if (live == 0) {
                                //
                                //     st_checked = "value='0'";
                                // } else {
                                //
                                //     st_checked = "value='1'  checked";
                                // }




                                // $("#captain-table-body-id").append(text);
                            }



                        } else if (data.code == "206") {
                            console.log("Failed to Delete");
                        }

                    })
                    .catch((error) => {
                        console.log(error)
                    });
            }




            // revenue report

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
                    categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
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
                            return "Rs " + val + ""
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#profit_chart"), options);
            chart.render();

            $('#example').tagsInput({
                limit: 7,

            });

        </script>

</body>

</html>