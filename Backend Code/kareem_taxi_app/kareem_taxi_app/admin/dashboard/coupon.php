<?php
include('../../config.php');
session_start();

if (empty($_SESSION['adminid'])) {
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

    <title>Coupon</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Kufam:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../public/css/main.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


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
        include_once('../navbar_admin.php');
        ?>

        <div class="container">
            <div class="page_name_candidate">
                <div class="candidate_div">
                    <h1>Coupon</h1>

                </div>
                <div class="select_sort_second">

                    <div class="sort_btn">


                        <a href="" data-toggle="modal" data-target="#add_payment_modal"><span class="span_btn"><svg
                                        width="12px" height="12px" viewBox="0 0 18 18" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                        <desc>Created with Lunacy</desc>
                                        <path
                                                d="M10 8L17 8C17.5523 8 18 8.44772 18 9C18 9.55229 17.5523 10 17 10L10 10L10 17C10 17.5523 9.55229 18 9 18C8.44772 18 8 17.5523 8 17L8 10L1 10C0.447715 10 0 9.55229 0 9C0 8.44772 0.447715 8 1 8L8 8L8 1C8 0.447715 8.44772 0 9 0C9.55229 0 10 0.447715 10 1L10 8Z"
                                                id="Path" fill="#FFFFFF" stroke="none"/>
                                    </svg></span>Add</a>

                    </div>
                </div>


            </div>

            <div class="cards">
                <div class="row">
                    <div class="col-xl-12 mt-3 mb-3">
                        <div class="card payment_method_card candidate">
                            <div class="card-body ">
                                <div class="pagination_table">
                                    <div class="results">

                                    </div>
                                    <div class="page">
                                        <div class="page_filter">
                                            <!--                                                <div class="form-group mr-3">-->
                                            <!--                                                    <label for="exampleFormControlSelect1">Sort by:</label>-->
                                            <!--                                                    <select class="form-control" id="exampleFormControlSelect1">-->
                                            <!--                                                        <option>Rating</option>-->
                                            <!--                                                        <option>2</option>-->
                                            <!--                                                        <option>3</option>-->
                                            <!--                                                        <option>4</option>-->
                                            <!--                                                        <option>5</option>-->
                                            <!--                                                    </select>-->
                                            <!--                                                </div>-->
                                            <!--                                                <div class="form-group mr-3">-->
                                            <!--                                                    <label for="exampleFormControlSelect1">Show:</label>-->
                                            <!--                                                    <select class="form-control" id="exampleFormControlSelect1">-->
                                            <!--                                                        <option>20</option>-->
                                            <!--                                                        <option>2</option>-->
                                            <!--                                                        <option>3</option>-->
                                            <!--                                                        <option>4</option>-->
                                            <!--                                                        <option>5</option>-->
                                            <!--                                                    </select>-->
                                            <!--                                                </div>-->
                                        </div>

                                        <span class="page_head">Results Per Page</span>
                                        <ul class="pagination pagination-sm">
                                            <!--                                                <li class="page-item"><a class="page-link page_pre" href="#"><span><i-->
                                            <!--                                                                class="fas fa-angle-left"></i></span></a></li>-->
                                            <!--                                                <li class="page-item"><a class="page-link" href="#">1</a></li>-->
                                            <!--                                                <li class="page-item"><a class="page-link" href="#">2</a></li>-->
                                            <!--                                                <li class="page-item"><a class="page-link" href="#">...</a></li>-->
                                            <!--                                                <li class="page-item"><a class="page-link" href="#">19</a></li>-->
                                            <!--                                                <li class="page-item"><a class="page-link page_next" href="#"><span><i-->
                                            <!--                                                                class="fas fa-angle-right"></i></span></a></li>-->
                                        </ul>

                                    </div>
                                </div>
                                <div class="search_product">

                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                                class="fas fa-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="country-search"
                                               placeholder="Searching for.."
                                               aria-label="Username" aria-describedby="basic-addon1">
                                    </div>


                                </div>

                                <table class="table">
                                    <thead>
                                    <tr>

                                        <th>City Name</th>
                                        <th>Coupon Code</th>
                                        <th>Coupon Reward</th>
                                        <th>Coupon Limit</th>
                                        <th>Srart Date</th>
                                        <th>End Date</th>
                                        <th>Enable</th>
                                        <th class="text-center">Action</th>


                                    </tr>
                                    </thead>
                                    <tbody id="all-coupon-table-body">
                                    <tr>

                                        <td><span>Elston Gullan</span></td>
                                        <td>92</td>
                                        <td>$</td>
                                        <td>20%</td>
                                        <td>paypal</td>
                                        <td>
                                            <div class="">
                                                <button data-toggle="modal" data-target="#add_payment_modal_edit"
                                                        id="editmodal"
                                                        type="button"
                                                        class="btn btn-outline-white2 btn-rounded btn-sm">
                                                    <i class="fas fa-pencil-alt fa-pencil-alt2 mt-0"></i>
                                                </button>
                                                <button type="button"
                                                        class="btn btn-outline-white2 btn-rounded btn-sm">
                                                    <i class="far fa-trash-alt fa-trash-alt2 mt-0"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round"></span>
                                            </label>

                                        </td>


                                    </tr>
                                    <tr>

                                        <td><span>Elston Gullan</span></td>
                                        <td>92</td>
                                        <td>$</td>
                                        <td>20%</td>
                                        <td>paypal</td>
                                        <td>
                                            <div class="">
                                                <button data-toggle="modal" data-target="#add_payment_modal_edit"
                                                        id="editmodal"
                                                        type="button"
                                                        class="btn btn-outline-white2 btn-rounded btn-sm">
                                                    <i class="fas fa-pencil-alt fa-pencil-alt2 mt-0"></i>
                                                </button>
                                                <button type="button"
                                                        class="btn btn-outline-white2 btn-rounded btn-sm">
                                                    <i class="far fa-trash-alt fa-trash-alt2 mt-0"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round"></span>
                                            </label>

                                        </td>


                                    </tr>
                                    <tr>

                                        <td><span>Elston Gullan</span></td>
                                        <td>92</td>
                                        <td>$</td>
                                        <td>20%</td>
                                        <td>paypal</td>
                                        <td>
                                            <div class="">
                                                <button data-toggle="modal" data-target="#add_payment_modal_edit"
                                                        id="editmodal"
                                                        type="button"
                                                        class="btn btn-outline-white2 btn-rounded btn-sm">
                                                    <i class="fas fa-pencil-alt fa-pencil-alt2 mt-0"></i>
                                                </button>
                                                <button type="button"
                                                        class="btn btn-outline-white2 btn-rounded btn-sm">
                                                    <i class="far fa-trash-alt fa-trash-alt2 mt-0"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round"></span>
                                            </label>

                                        </td>


                                    </tr>
                                    <tr>

                                        <td><span>Elston Gullan</span></td>
                                        <td>92</td>
                                        <td>$</td>
                                        <td>20%</td>
                                        <td>paypal</td>
                                        <td>
                                            <div class="">
                                                <button data-toggle="modal" data-target="#add_payment_modal_edit"
                                                        id="editmodal"
                                                        type="button"
                                                        class="btn btn-outline-white2 btn-rounded btn-sm">
                                                    <i class="fas fa-pencil-alt fa-pencil-alt2 mt-0"></i>
                                                </button>
                                                <button type="button"
                                                        class="btn btn-outline-white2 btn-rounded btn-sm">
                                                    <i class="far fa-trash-alt fa-trash-alt2 mt-0"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round"></span>
                                            </label>

                                        </td>


                                    </tr>
                                    <tr>

                                        <td><span>Elston Gullan</span></td>
                                        <td>92</td>
                                        <td>$</td>
                                        <td>20%</td>
                                        <td>paypal</td>
                                        <td>
                                            <div class="">
                                                <button data-toggle="modal" data-target="#add_payment_modal_edit"
                                                        id="editmodal"
                                                        type="button"
                                                        class="btn btn-outline-white2 btn-rounded btn-sm">
                                                    <i class="fas fa-pencil-alt fa-pencil-alt2 mt-0"></i>
                                                </button>
                                                <button type="button"
                                                        class="btn btn-outline-white2 btn-rounded btn-sm">
                                                    <i class="far fa-trash-alt fa-trash-alt2 mt-0"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round"></span>
                                            </label>

                                        </td>


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
    <!-- modals -->
    <!-- add modal -->
    <form class="childcatagories_modal_from" id="modal-form" action="">
        <div class="modal fade" id="add_payment_modal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header mh">
                        <button type="button" class="close closmodel" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mb">
                        <div>
                            <div class="cat-folder-img">
                                <i class="fa fa-folder" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="form-group">


                            <?php
                            ///include_once ('../config.php');
                            $query="SELECT * FROM Country";
                            $result =queryRunner($query);
                            ?>
                            <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Country</label>

                            <select class="form-control city_select" id="ride-add-country-select-id">
                                <option value="">Select Country</option>
                                <?php while($row=rowRetriever($result)){
                                    ?>

                                    <option value="<?=$row['id']; ?>"><?=$row['name']; ?></option>
                                    <?php

                                }

                                ?>
                            </select>
                        </div>

                        <div class="form-group add_ride_city" style="display:none">
                            <label for="ride-edit-city-select-id" class="customer-add-input-label txt-regular upload-input-label">City</label>


                            <select class="form-control city_select" id="ride-add-city-select-id">

                            </select>

                        </div>

                        <div class="form-group">
                            <label for="cat-name-upload"
                                   class="customer-add-input-label txt-regular upload-input-label">Coupon Code</label>
                            <input type="text" id="addpro_cat" name="c_name" placeholder="Enter Coupon code" value=""
                                   class="customer-add-input coupon_code_add  w-100"/>
                        </div>
                        <div class="form-group">
                            <label for="cat-name-upload"
                                   class="customer-add-input-label txt-regular upload-input-label">Coupon Reward</label>
                            <input type="text" id="addpro_cat" name="c_code" placeholder="Enter Coupon Reward" value=""
                                   class="customer-add-input coupon_reward_add w-100"/>
                        </div>
                        <div class="form-group">
                            <label for="cat-name-upload"
                                   class="customer-add-input-label txt-regular upload-input-label">Coupon Limit</label>
                            <input type="text" id="addpro_cat" name="currency" placeholder="Enter Coupon Limit" value=""
                                   class="customer-add-input coupon_limit_add w-100"/>
                        </div>
                        <div class="form-group">
                            <label for="cat-name-upload"
                                   class="customer-add-input-label txt-regular upload-input-label">Start Date</label>
                            <input type="date" id="addpro_cat" name="c_percent" placeholder="Enter date" value=""
                                   class="customer-add-input start_date_add  w-100"/>
                        </div>
                        <div class="form-group">
                            <label for="cat-name-upload"
                                   class="customer-add-input-label txt-regular upload-input-label">End Date</label>
                            <input type="date" id="addpro_cat" name="c_percent" placeholder="Enter End date" value=""
                                   class="customer-add-input end_date_add  w-100"/>
                        </div>

                        <!--                            <div class="form-group form_select">-->
                        <!--                                <label for="select_author">Payment Methods</label>-->
                        <!--                                <select class="form-control selectpicker" -->
                        <!--                                    id="select_payment">-->
                        <!--                                    <option >Paypal</option>-->
                        <!--                                    <option >Bill Gordon</option>-->
                        <!--                                    <option >Elizabeth Warren</option>-->
                        <!--                                    <option >Mario Flores</option>-->
                        <!--                                    <option >Don Young</option>-->
                        <!--                                    <option  disabled="disabled">Marvin-->
                        <!--                                        Martinez</option>-->
                        <!--                                </select>-->
                        <!--                            </div>-->


                    </div>
                    <div class="modal-footer mf">
                        <button type="button" class="btn btn-primary coupon_add_button">
                            <img src="../public/image/tick (1).png" alt=""/>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- edit modal -->
    <form class="childcatagories_modal_from" id="modal-form" action="">
        <div class="modal fade" id="add_payment_modal_edit" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header mh">
                        <button type="button" class="close closmodel" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mb">
                        <div>
                            <div class="cat-folder-img">
                                <i class="fa fa-folder" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="form-group">


                            <?php
                            ////include_once ('../config.php');
                            $query="SELECT * FROM Country";
                            $result =queryRunner($query);
                            ?>
                            <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Country</label>

                            <select class="form-control city_select" id="ride-edit-country-select-id">
                                <option value="">Select Country</option>
                                <?php while($row=rowRetriever($result)){
                                    ?>

                                    <option value="<?=$row['id']; ?>"><?=$row['name']; ?></option>
                                    <?php

                                }

                                ?>
                            </select>
                        </div>
                        <div class="form-group edit_ride_city" style="display:none">
                            <label for="ride-edit-city-select-id" class="customer-add-input-label txt-regular upload-input-label">City</label>


                            <select class="form-control city_select" id="ride-edit-city-select-id">

                            </select>

                        </div>

                        <div class="form-group">
                            <label for="cat-name-upload"
                                   class="customer-add-input-label txt-regular upload-input-label">Coupon Code</label>
                            <input type="text" id="addpro_cat" name="c_name" placeholder="Enter Coupon code" value=""
                                   class="customer-add-input coupon_code_edit  w-100"/>
                        </div>
                        <div class="form-group">
                            <label for="cat-name-upload"
                                   class="customer-add-input-label txt-regular upload-input-label">Coupon Reward</label>
                            <input type="text" id="addpro_cat" name="c_code" placeholder="Enter Coupon Reward" value=""
                                   class="customer-add-input coupon_reward_edit w-100"/>
                        </div>
                        <div class="form-group">
                            <label for="cat-name-upload"
                                   class="customer-add-input-label txt-regular upload-input-label">Coupon Limit</label>
                            <input type="text" id="addpro_cat" name="currency" placeholder="Enter Coupon Limit" value=""
                                   class="customer-add-input coupon_limit_edit w-100"/>
                        </div>
                        <div class="form-group">
                            <label for="cat-name-upload"
                                   class="customer-add-input-label txt-regular upload-input-label">Start Date</label>
                            <input type="date" id="addpro_cat" name="c_percent" placeholder="Enter date" value=""
                                   class="customer-add-input start_date_edit  w-100"/>
                        </div>
                        <div class="form-group">
                            <label for="cat-name-upload"
                                   class="customer-add-input-label txt-regular upload-input-label">End Date</label>
                            <input type="date" id="addpro_cat" name="c_percent" placeholder="Enter End date" value=""
                                   class="customer-add-input end_date_edit  w-100"/>
                        </div>

                        <!--                            <div class="form-group form_select">-->
                        <!--                                <label for="select_author">Payment Methods</label>-->
                        <!--                                <select class="form-control selectpicker" -->
                        <!--                                    id="select_payment">-->
                        <!--                                    <option >Paypal</option>-->
                        <!--                                    <option >Bill Gordon</option>-->
                        <!--                                    <option >Elizabeth Warren</option>-->
                        <!--                                    <option >Mario Flores</option>-->
                        <!--                                    <option >Don Young</option>-->
                        <!--                                    <option  disabled="disabled">Marvin-->
                        <!--                                        Martinez</option>-->
                        <!--                                </select>-->
                        <!--                            </div>-->


                    </div>
                    <div class="modal-footer mf">
                        <button type="button" class="btn btn-primary coupon_edit_button">
                            <img src="../public/image/tick (1).png" alt=""/>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <input type="hidden" id="country-id">
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="../public/js/customjs.js"></script>
    <script src="../public/js/custom_request.js"></script>
    <script src="../public/js/customPagination.js"></script>
    <input type="hidden" id="coupon_id">
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $(".sidebar_coupon").addClass("active");
    </script>
    <script>

        $(document).ready(function () {
            retrieveallCoupon();


            function retrieveallCoupon(search = '') {
                sendRequest(
                    "?action_type=retrieve&request_type=all_coupon&functionality_type=retrieve_all_coupon", {
                        page: 1,
                        search: search,

                    }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {
                            $(".pagination").html(data.pagination);
                            $("#all-coupon-table-body").empty();
                            var list = data.listOfData;

                            for (var i = 0; i < list.length; i++) {

                                var n = list[i].id;
                                var city_name = list[i].city_name;
                                var coupon_code = list[i].coupon_code;
                                var coupon_reward = list[i].coupon_reward;
                                var coupon_limit = list[i].coupon_limit;
                                var coupon_from_date = list[i].coupon_from_date;
                                var coupon_to_date = list[i].coupon_to_date;
                                var enable = list[i].enable;


                                var checked = "";
                                if (enable == 0) {

                                    checked = "value='0'";
                                } else {

                                    checked = "value='1'  checked";
                                }


                                var text = `<tr id="coupon-row-${n}" >

                                                <td>${city_name}
                                                </td>
                                                <td >${coupon_code}</td>
                                                <td >${coupon_reward}</td>
                                                <td>${coupon_limit} </td>

                                                 <td>${coupon_from_date}</td>
                                                <td>${coupon_to_date}</td>

                                                <td class="resandunres">

                                                    <label class="switch">
                                                        <input type="checkbox" data-id="${n}" id="enable-switch-${n}" class="coupon_switch" ${checked}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td class="text-center">

                                                    <div class="">
                                                        <button data-id="${n}" id="editmodal" type="button" class="btn btn-outline-white2 btn-rounded btn-sm">
                                                            <i class="fas fa-pencil-alt fa-pencil-alt2 mt-0"></i>
                                                        </button>
                                                        <button type="button" onclick="DeleteCoupon(${n});" class="btn btn-outline-white2 btn-rounded btn-sm">
                                                            <i class="far fa-trash-alt fa-trash-alt2 mt-0"></i>
                                                        </button>


                                                    </div>
                                                </td>




                                            </tr>`;
                                $("#all-coupon-table-body").append(text);
                            }


                        } else if (data.code == "206") {
                            console.log("Failed to Delete");
                        }

                    })
                    .catch((error) => {
                        console.log(error)
                    });
            }


            $('#country-search').keyup(function () {
                var search = $(this).val();
                retrieveallCoupon(search);
                // console.log(query)
            });

            $(document).on('change', '.coupon_switch', function () {

                var id = $(this).data('id');
                var enable_val;
                if ($("#enable-switch-" + id).is(':checked')) {
                    $("#enable-switch-" + id).val(1);
                    enable_val = "1";
                } else {
                    $("#enable-switch-" + id).val(0);
                    enable_val = "0";
                }


                sendRequest("?action_type=update&request_type=all_coupon&functionality_type=enable_coupon", {
                    id: id,
                    enable: enable_val,
                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {

                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })

            });

            $(document).on('change', '#ride-add-country-select-id', function () {

                var id = $(this).val();


                sendRequest("?action_type=retrieve&request_type=ride_type&functionality_type=retrieve_all_cities", {
                    id: id,
                    // enable: enable_val,
                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {

                            var list = data.listOfData;
                            $(".add_ride_city").show();
                            $("#ride-add-city-select-id").empty();
                            var text1="<option id=\"city-name\" value=\"\">Select City</option>";
                            $("#ride-add-city-select-id").append(text1);
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

            $(document).on('change', '#ride-edit-country-select-id', function () {

                var id = $(this).val();


                sendRequest("?action_type=retrieve&request_type=ride_type&functionality_type=retrieve_all_cities", {
                    id: id,
                    // enable: enable_val,
                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {

                            var list = data.listOfData;
                            $(".edit_ride_city").show();
                            $("#ride-edit-city-select-id").empty();
                            var text1="<option id=\"city-name\" value=\"\">Select City</option>";
                            $("#ride-edit-city-select-id").append(text1);
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

            $(document).on('click', '#editmodal', function () {

                var id = $(this).data('id');


                sendRequest("?action_type=retrieve&request_type=all_coupon&functionality_type=retrieve_edit_coupon", {
                    id: id,
                    // enable: enable_val,
                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {

                            var list = data.listOfData;

                            for (var i = 0; i < list.length; i++) {

                                var n = list[i].id;
                                var city_name = list[i].city_name;
                                var city_id = list[i].city_id;
                                var country_id = list[i].country_id;
                                var coupon_code = list[i].coupon_code;
                                var coupon_reward = list[i].coupon_reward;
                                var coupon_limit = list[i].coupon_limit;
                                var coupon_from_date = list[i].coupon_from_date;
                                var coupon_to_date = list[i].coupon_to_date;
                                $("#coupon_id").val(n);

                                $("#ride-edit-country-select-id").val(country_id);
                                $("#ride-edit-country-select-id").trigger('change');
                                setTimeout(function(){
                                    $("#ride-edit-city-select-id").val(city_id);
                                    $("#ride-edit-city-select-id").trigger('click');
                                }, 500);


                                $(".coupon_code_edit").val(coupon_code);
                                $(".coupon_reward_edit").val(coupon_reward);
                                $(".coupon_limit_edit").val(coupon_limit);
                                $(".start_date_edit").val(coupon_from_date);
                                $(".end_date_edit").val(coupon_to_date);


                                // var checked = "";
                                // if (enable == 0) {
                                //
                                //     checked = "value='0'";
                                // } else {
                                //
                                //     checked = "value='1'  checked";
                                // }


                                $("#add_payment_modal_edit").modal('show');
                            }

                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })

            });

            $(document).on('click', '.coupon_edit_button', function () {

                var id = $("#coupon_id").val();
                var coupon_code =  $(".coupon_code_edit").val();
               var coupon_reward = $(".coupon_reward_edit").val();
               var coupon_limit = $(".coupon_limit_edit").val();
                var coupon_from_date = $(".start_date_edit").val();
                var coupon_to_date = $(".end_date_edit").val();
                var city_id = $("#ride-edit-city-select-id").val();

                sendRequest("?action_type=update&request_type=all_coupon&functionality_type=update_coupon", {
                    id: id,
                    coupon_code: coupon_code,
                    coupon_reward: coupon_reward,
                    coupon_limit: coupon_limit,
                    coupon_from_date: coupon_from_date,
                    coupon_to_date: coupon_to_date,
                    city_id: city_id,

                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {
                            $("#add_payment_modal_edit").modal('hide');
                            retrieveallCoupon();

                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })

            });

            $(document).on('click', '.coupon_add_button', function () {

                // var id= $("#country-id").val();
                var city_id = $("#ride-add-city-select-id").val();
                var coupon_code = $(".coupon_code_add").val();
                var coupon_reward = $(".coupon_reward_add").val();
                var coupon_limit = $(".coupon_limit_add").val();
                var start_date = $(".start_date_add").val();
                var end_date = $(".end_date_add").val();


                sendRequest("?action_type=create&request_type=all_coupon&functionality_type=insert_coupon", {
                    // id: id,
                    city_id: city_id,
                    coupon_code: coupon_code,
                    coupon_reward: coupon_reward,
                    coupon_limit: coupon_limit,
                    start_date: start_date,
                    end_date: end_date,

                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {
                            $("#add_payment_modal").modal('hide');
                            retrieveallCoupon();

                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })

            });
        });

        function DeleteCoupon(id) {
            var del_id = id;

            sendRequest("?action_type=delete&request_type=all_coupon&functionality_type=delete_coupon", {
                id: del_id,


            }, "POST")
                .then((data) => {
                    var data = JSON.parse(data);
                    if (data.code == "202") {
                        $("#coupon-row-" + del_id).remove();

                        // $("#sub_child_packages_modal_form_id").modal('hide');
                        // retrieveAllShipping(1);
                    }


                })
                .catch((error) => {
                    console.log(error)
                })
        }

        function pag(offset, id) {

            var offset = offset;
            var active = $(".pagination").find('.active');
            active.removeClass("active");
            $("#pag-" + id).addClass("active");
            var search = $("#country-search").val();
            // var category_id = $("#category-select-id").val();

            // var category=""
            // if(category_id = ""){
            //     category =""
            // }else {
            //     category = category_id;
            // }
            var searchset = "";
            if (search = "") {
                searchset = ""
            } else {
                searchset = search;
            }
            sendRequest("?action_type=retrieve&request_type=all_coupon&functionality_type=pagination", {
                offset: offset,
                search: search,


            }, "POST")
                .then((data) => {
                    var data = JSON.parse(data);
                    if (data.code == "202") {
                        // $(".pagination").html(data.pagination);
                        $("#all-coupon-table-body").empty();
                        var list = data.listOfData;

                        for (var i = 0; i < list.length; i++) {

                            var n = list[i].id;
                            var city_name = list[i].city_name;
                            var coupon_code = list[i].coupon_code;
                            var coupon_reward = list[i].coupon_reward;
                            var coupon_limit = list[i].coupon_limit;
                            var coupon_from_date = list[i].coupon_from_date;
                            var coupon_to_date = list[i].coupon_to_date;
                            var enable = list[i].enable;


                            var checked = "";
                            if (enable == 0) {

                                checked = "value='0'";
                            } else {

                                checked = "value='1'  checked";
                            }


                            var text = `<tr id="coupon-row-${n}" >

                                                <td>${city_name}
                                                </td>
                                                <td >${coupon_code}</td>
                                                <td >${coupon_reward}</td>
                                                <td>${coupon_limit} </td>

                                                 <td>${coupon_from_date}</td>
                                                <td>${coupon_to_date}</td>

                                                <td class="resandunres">

                                                    <label class="switch">
                                                        <input type="checkbox" data-id="${n}" id="enable-switch-${n}" class="coupon_switch" ${checked}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td class="text-center">

                                                    <div class="">
                                                        <button data-id="${n}" id="editmodal" type="button" class="btn btn-outline-white2 btn-rounded btn-sm">
                                                            <i class="fas fa-pencil-alt fa-pencil-alt2 mt-0"></i>
                                                        </button>
                                                        <button type="button" onclick="DeleteCoupon(${n});" class="btn btn-outline-white2 btn-rounded btn-sm">
                                                            <i class="far fa-trash-alt fa-trash-alt2 mt-0"></i>
                                                        </button>


                                                    </div>
                                                </td>




                                            </tr>`;
                            $("#all-coupon-table-body").append(text);
                        }


                    } else if (data.code == "206") {
                        console.log("Failed to Delete");
                    }

                })
                .catch((error) => {
                    console.log(error)
                });
        }

    </script>

</body>

</html>