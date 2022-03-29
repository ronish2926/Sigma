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

    <title>Countries</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Kufam:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../public/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<style>
    .bootstrap-select>.dropdown-toggle {
        height: 34px;
        padding: 8px;
        font-size: 10px;
        border-radius: 11px;
    }
    .form-group .bootstrap-select {
        border-radius: 11px;
        border: solid 1px #d8d8d8;
    }
    .bootstrap-select:hover {
        background-color: white !important;
    }
    .show>.btn-light.dropdown-toggle {
        background-color: white !important;
        border-color: #fff !important;
    }
    .bootstrap-select>.dropdown-toggle.bs-placeholder:hover {
        background-color: white !important;
        border-color: #fff !important;
    }

</style>

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
           include_once ('../navbar_admin.php');
           ?>

            <div class="container">
                <div class="page_name_candidate">
                    <div class="candidate_div">
                        <h1>Countries</h1>
                       
                    </div>
                    <div class="select_sort_second">
                       
                        <div class="sort_btn">
                           

                            <a href="" data-toggle="modal" data-target="#add_payment_modal"><span class="span_btn"><svg
                                        width="12px" height="12px" viewBox="0 0 18 18" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                        <desc>Created with Lunacy</desc>
                                        <path
                                            d="M10 8L17 8C17.5523 8 18 8.44772 18 9C18 9.55229 17.5523 10 17 10L10 10L10 17C10 17.5523 9.55229 18 9 18C8.44772 18 8 17.5523 8 17L8 10L1 10C0.447715 10 0 9.55229 0 9C0 8.44772 0.447715 8 1 8L8 8L8 1C8 0.447715 8.44772 0 9 0C9.55229 0 10 0.447715 10 1L10 8Z"
                                            id="Path" fill="#FFFFFF" stroke="none" />
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
                                                <input type="text" class="form-control" id="country-search" placeholder="Searching for.."
                                                    aria-label="Username" aria-describedby="basic-addon1">
                                            </div>

                                       
                                    </div>

                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th>Currency Code</th>
                                                <th>Currency</th>
                                                <th>&nbsp; %&nbsp;&nbsp;&nbsp;&nbsp; </th>
<!--                                                <th>Payment Method</th>-->
                                                <th>Action</th>
                                                <th>Enable</th>


                                            </tr>
                                        </thead>
                                        <tbody id="all-counry-table-body">
                                            <tr>

                                                <td><span>Elston Gullan</span></td>
                                                <td>92</td>
                                                <td>$</td>
                                                <td>20%</td>
                                                <td>paypal</td>
                                                <td>
                                                    <div class="">
                                                        <button data-toggle="modal" data-target="#add_payment_modal_edit" id="editmodal"
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
                                                        <button data-toggle="modal" data-target="#add_payment_modal_edit" id="editmodal"
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
                                                        <button data-toggle="modal" data-target="#add_payment_modal_edit" id="editmodal"
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
                                                        <button data-toggle="modal" data-target="#add_payment_modal_edit" id="editmodal"
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
                                                        <button data-toggle="modal" data-target="#add_payment_modal_edit" id="editmodal"
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
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Payment Method</label>
                                <select class="selectpicker w-100 customer-add-input" id="payment-method-multiple" multiple >
                                    <option>Mustard</option>
                                    <option>Ketchup</option>
                                    <option>Relish</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Country Name</label>
                            <input type="text" id="addpro_cat" name="c_name" placeholder="Enter Country Name" value=""
                                class="customer-add-input country_name_add  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Currency Code</label>
                            <input type="text" id="addpro_cat" name="c_code" placeholder="Enter Currency code" value=""
                                class="customer-add-input currency_code_add w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Currency Symbol</label>
                            <input type="text" id="addpro_cat" name="currency" placeholder="Enter Currency" value=""
                                class="customer-add-input currency_symbol_add w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Percent</label>
                            <input type="text" id="addpro_cat" name="c_percent" placeholder="Enter percent" value=""
                                class="customer-add-input percent_add  w-100" />
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
                            <button type="button" class="btn btn-primary country_add_button">
                                <img src="../public/image/tick (1).png" alt="" />
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
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Payment Method</label>
                                <select class="selectpicker w-100 customer-add-input" id="payment-method-multiple_edit" multiple >
                                    <option>Mustard</option>
                                    <option>Ketchup</option>
                                    <option>Relish</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Country Name</label>
                            <input type="text" id="addpro_cat" name="c_name" placeholder="Enter Country Name" value=""
                                class="customer-add-input country_name_edit w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Currency Code</label>
                            <input type="text" id="addpro_cat" name="c_code" placeholder="Enter Currency code" value=""
                                class="customer-add-input currency_code_edit  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Currency Symbol</label>
                            <input type="text" id="addpro_cat" name="currency" placeholder="Enter Currency symbol" value=""
                                class="customer-add-input currency_symbol_edit w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Percent</label>
                            <input type="text" id="addpro_cat" name="c_percent" placeholder="Enter percent" value=""
                                class="customer-add-input percent_edit  w-100" />
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
                            <button type="button"  class="btn btn-primary county_edit_button">
                                <img src="../public/image/tick (1).png" alt="" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
<input type="hidden" id="country-id" >
        <!-- Bootstrap core JavaScript -->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <script src="../public/js/customjs.js"></script>
        <script src="../public/js/custom_request.js"></script>
        <script src="../public/js/customPagination.js"></script>

        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

         $(".sidebar_country").addClass("active");
        </script>
        <script>

            $(document).ready(function () {
                retrieveallCountries();
                retrieveallPaymentMethods();

                function retrieveallCountries(search = '') {
                    sendRequest(
                        "?action_type=retrieve&request_type=country&functionality_type=retrieve_all_countries", {
                            page: 1,
                            search: search,

                        }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {
                                $(".pagination").html(data.pagination);
                                $("#all-counry-table-body").empty();
                                var list = data.listOfData;

                                for (var i = 0; i < list.length; i++) {

                                    var n = list[i].id;
                                    var percentage = list[i].percentage;
                                    var name = list[i].name;
                                    var currency_name = list[i].currency_name;
                                    var currency_symbol = list[i].currency_symbol;
                                    var enable = list[i].enable;


                                    var checked = "";
                                    if (enable == 0) {

                                        checked = "value='0'";
                                    } else {

                                        checked = "value='1'  checked";
                                    }



                                    var text = "<tr id=\"country-table-row-"+n+"\">\n" +
                                        "\n" +
                                        "                                                <td><span>"+name+"</span></td>\n" +
                                        "                                                <td>"+currency_name+"</td>\n" +
                                        "                                                <td>"+currency_symbol+"</td>\n" +
                                        "                                                <td>"+percentage+"</td>\n" +
                                        // "                                                <td>paypal</td>\n" +
                                        "                                                <td>\n" +
                                        "                                                    <div class=\"\">\n" +
                                        "                                                        <button data-toggle=\"modal\" data-id=\""+n+"\" id=\"editmodal\"  id=\"editmodal\"\n" +
                                        "                                                            type=\"button\"\n" +
                                        "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\">\n" +
                                        "                                                            <i class=\"fas fa-pencil-alt fa-pencil-alt2 mt-0\"></i>\n" +
                                        "                                                        </button>\n" +
                                        "                                                        <button type=\"button\"\n" +
                                        "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\" onclick=\"deleteCountry("+n+")\">\n" +
                                        "                                                            <i class=\"far fa-trash-alt fa-trash-alt2 mt-0\"></i>\n" +
                                        "                                                        </button>\n" +
                                        "                                                    </div>\n" +
                                        "                                                </td>\n" +
                                        "                                                <td>\n" +
                                        "                                                    <label class=\"switch\">\n" +
                                        "                                                        <input type=\"checkbox\" data-id=\""+n+"\" id=\"enable-switch-"+n+"\" class=\"country_switch\" "+checked+">\n" +
                                        "                                                        <span class=\"slider round\"></span>\n" +
                                        "                                                    </label>\n" +
                                        "\n" +
                                        "                                                </td>\n" +
                                        "\n" +
                                        "\n" +
                                        "                                            </tr>";
                                    $("#all-counry-table-body").append(text);
                                }



                            } else if (data.code == "206") {
                                console.log("Failed to Delete");
                            }

                        })
                        .catch((error) => {
                            console.log(error)
                        });
                }

                function retrieveallPaymentMethods(search = '') {
                    sendRequest(
                        "?action_type=retrieve&request_type=payment_method&functionality_type=retrieve_all_payment_method", {
                            page: 1,
                            search: search,

                        }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {
                                $(".pagination").html(data.pagination);
                                $("#payment-method-multiple").empty();
                                $("#payment-method-multiple_edit").empty();
                                var list = data.listOfData;

                                for (var i = 0; i < list.length; i++) {

                                    var n = list[i].id;
                                    var picture = list[i].picture;
                                    var name = list[i].name;
                                    var tag = list[i].tag;
                                    // var currency_symbol = list[i].currency_symbol;
                                    var enable = list[i].enable;




                                    var text = `<option value="${n}">${name}</option>`;
                                    $("#payment-method-multiple").append(text);
                                    $("#payment-method-multiple_edit").append(text);
                                }
                                $("#payment-method-multiple").selectpicker("refresh");
                                $("#payment-method-multiple_edit").selectpicker("refresh");





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
                    retrieveallCountries(search);
                    // console.log(query)
                });

                $(document).on('change', '.country_switch', function () {

                    var id = $(this).data('id');
                    var enable_val;
                    if ($("#enable-switch-" + id).is(':checked')) {
                        $("#enable-switch-" + id).val(1);
                        enable_val = "1";
                    } else {
                        $("#enable-switch-" + id).val(0);
                        enable_val = "0";
                    }


                    sendRequest("?action_type=update&request_type=country&functionality_type=enable_country", {
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

                $(document).on('click', '#editmodal', function () {

                    var id = $(this).data('id');


                    sendRequest("?action_type=retrieve&request_type=country&functionality_type=retrieve_edit_countries", {
                        id: id,
                        // enable: enable_val,
                    }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {

                                var list = data.listOfData;

                                for (var i = 0; i < list.length; i++) {

                                    var n = list[i].id;
                                    var percentage = list[i].percentage;
                                    var name = list[i].name;
                                    var currency_name = list[i].currency_name;
                                    var currency_symbol = list[i].currency_symbol;
                                    var payment_type = list[i].payment_type;
                                    var enable = list[i].enable;
                                    var pay_array = [];
                                    // console.log("this is array is" +payment_type);
                                    for(var j = 0; j < payment_type.length; j++){
                                        var pay_id = payment_type[j].payment_method_id;
                                        // $("#payment-method-multiple_edit").val(pay_id);
                                        // console.log("this is" +pay_id);
                                        pay_array.push(pay_id);
                                    }
                                    // alert(pay_array)
                                    // console.log("this is array is" +pay_array);
                                    $("#payment-method-multiple_edit").selectpicker('val', pay_array);
                                    // $("#payment-method-multiple_edit").selectpicker('render');
                                    $("#country-id").val(n);
                                    $(".country_name_edit").val(name);
                                    $(".currency_code_edit").val(currency_name);
                                    $(".currency_symbol_edit").val(currency_symbol);
                                    $(".percent_edit").val(percentage);


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

                $(document).on('click', '.county_edit_button', function () {

                   var id= $("#country-id").val();
                   var c_name= $(".country_name_edit").val();
                   var currenc_code= $(".currency_code_edit").val();
                    var cur_symbol= $(".currency_symbol_edit").val();
                   var percent= $(".percent_edit").val();
                    var payment_method = $("#payment-method-multiple_edit").val();

                    sendRequest("?action_type=update&request_type=country&functionality_type=update_country", {
                        id: id,
                        country_name:c_name,
                        country_percentage:percent,
                        currency_name:currenc_code,
                        currency_symbol:cur_symbol,
                        payment_method:payment_method,

                    }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {
                                $("#add_payment_modal_edit").modal('hide');
                                retrieveallCountries();

                            }


                        })
                        .catch((error) => {
                            console.log(error)
                        })

                });

                $(document).on('click', '.country_add_button', function () {

                    // var id= $("#country-id").val();
                    var c_name= $(".country_name_add").val();
                    var currenc_code= $(".currency_code_add").val();
                    var cur_symbol= $(".currency_symbol_add").val();
                    var percent= $(".percent_add").val();
                    var pay_method = $("#payment-method-multiple").val();


                    sendRequest("?action_type=create&request_type=country&functionality_type=insert_country", {
                        // id: id,
                        country_name:c_name,
                        country_percentage:percent,
                        currency_name:currenc_code,
                        currency_symbol:cur_symbol,
                        pay_method:pay_method,

                    }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {
                                $("#add_payment_modal").modal('hide');
                                retrieveallCountries();

                            }


                        })
                        .catch((error) => {
                            console.log(error)
                        })

                });
            });

            function deleteCountry (id) {
                var del_id =id;

                sendRequest("?action_type=delete&request_type=country&functionality_type=delete_country", {
                    id:del_id,




                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if(data.code == "202"){
                            $("#country-table-row-"+del_id).remove();

                            // $("#sub_child_packages_modal_form_id").modal('hide');
                            // retrieveAllShipping(1);
                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }

            function pag(offset,id) {

                var offset =offset;
                var active= $(".pagination").find('.active');
                active.removeClass("active");
                $("#pag-"+id).addClass("active");
                var search = $("#country-search").val();
                // var category_id = $("#category-select-id").val();

                // var category=""
                // if(category_id = ""){
                //     category =""
                // }else {
                //     category = category_id;
                // }
                var searchset=""
                if(search = ""){
                    searchset =""
                }else {
                    searchset = search;
                }
                sendRequest("?action_type=retrieve&request_type=country&functionality_type=pagination", {
                    offset:offset,
                    search:search,


                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {
                            // $(".pagination").html(data.pagination);
                            // $("#paginate").html(data.htmlData);
                            $("#all-counry-table-bodyd").empty();
                            var list = data.listOfData;

                            for (var i = 0; i < list.length; i++) {

                                var n = list[i].id;
                                var percentage = list[i].percentage;
                                var name = list[i].name;
                                var currency_name = list[i].currency_name;
                                var currency_symbol = list[i].currency_symbol;
                                var enable = list[i].enable;


                                var checked = "";
                                if (enable == 0) {

                                    checked = "value='0'";
                                } else {

                                    checked = "value='1'  checked";
                                }



                                var text = "<tr id=\"country-table-row-"+n+"\">\n" +
                                    "\n" +
                                    "                                                <td><span>"+name+"</span></td>\n" +
                                    "                                                <td>"+currency_name+"</td>\n" +
                                    "                                                <td>"+currency_symbol+"</td>\n" +
                                    "                                                <td>"+percentage+"</td>\n" +
                                    // "                                                <td>paypal</td>\n" +
                                    "                                                <td>\n" +
                                    "                                                    <div class=\"\">\n" +
                                    "                                                        <button data-toggle=\"modal\" data-id=\""+n+"\" id=\"editmodal\"  id=\"editmodal\"\n" +
                                    "                                                            type=\"button\"\n" +
                                    "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\">\n" +
                                    "                                                            <i class=\"fas fa-pencil-alt fa-pencil-alt2 mt-0\"></i>\n" +
                                    "                                                        </button>\n" +
                                    "                                                        <button type=\"button\"\n" +
                                    "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\" onclick=\"deleteCountry("+n+")\">\n" +
                                    "                                                            <i class=\"far fa-trash-alt fa-trash-alt2 mt-0\"></i>\n" +
                                    "                                                        </button>\n" +
                                    "                                                    </div>\n" +
                                    "                                                </td>\n" +
                                    "                                                <td>\n" +
                                    "                                                    <label class=\"switch\">\n" +
                                    "                                                        <input type=\"checkbox\" data-id=\""+n+"\" id=\"enable-switch-"+n+"\" class=\"country_switch\" "+checked+">\n" +
                                    "                                                        <span class=\"slider round\"></span>\n" +
                                    "                                                    </label>\n" +
                                    "\n" +
                                    "                                                </td>\n" +
                                    "\n" +
                                    "\n" +
                                    "                                            </tr>";
                                $("#all-counry-table-body").append(text);
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

        </script>

</body>

</html>