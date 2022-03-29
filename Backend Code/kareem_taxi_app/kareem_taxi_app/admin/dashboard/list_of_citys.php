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

    <title>List of Citys</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Kufam:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">

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
            include_once ('../navbar_admin.php');

            ?>

            <div class="container">
                <div class="page_name_candidate">
                    <div class="candidate_div">
                        <h1>List Of Cities</h1>
                       
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
                                <div class="card-body">
                                    <div class="pagination_table">
                                        <div class="results">
                                            <!-- <div class="form-group">
                                                <select class="form-control" id="country">
                                                  <option>Country</option>
                                                  <option>1 years</option>
                                                  <option>2 years</option>
                                                  <option>4</option>
                                                  <option>5</option>
                                                </select>
                                              </div> -->
                                        </div>
                                        <div class="page">
                                            <div class="page_filter">
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
<!--                                                        <option>3</option>-->
<!--                                                        <option>4</option>-->
<!--                                                        <option>5</option>-->
                                                    </select>
                                                </div>
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
                                        <form action="#">
                                            <div class="input-group ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-search"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="city-search" placeholder="Searching for.."
                                                    aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                       
                                    </div>

                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th>Name of Cities</th>
                                                <th>Country</th>
                                                <th>Action</th>
                                                <th>Enable</th>


                                            </tr>
                                        </thead>
                                        <tbody id="city-table-body-id">
                                            <tr>

                                                <td><span>Elston Gullan</span></td>
                                                <td>Pakistan</td>
                                               
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
                                                <td>Pakistan</td>
                                               
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
                                                <td>Pakistan</td>
                                                
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
                                                <td>Pakistan</td>
                                                
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
                                                <td>Pakistan</td>
                                                
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
                            <button type="button" class="close closmodel" data-dismiss="modal" aria-label="Close"
                                onclick="colsemodel()">
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
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">City Name</label>
                            <input type="text" id="addpro_cat" name="city_name" placeholder="Enter City Name" value=""
                                class="customer-add-input city_name_add w-100" />
                            </div>



                            <div class="form-group form_select">
                                <?php
                                ///include_once ('../config.php');
                                $query="SELECT * FROM Country";
                                $result =queryRunner($query);
                                ?>
                                <label for="select_author">Country</label>

                                <select class="form-control city_select" id="country-select-add-id">
                                    <option value="">Country</option>
                                    <?php while($row=rowRetriever($result)){
                                        ?>

                                        <option value="<?=$row['id']; ?>"><?=$row['name']; ?></option>
                                        <?php

                                    }

                                    ?>
                                    <!--                                                        <option>3</option>-->
                                    <!--                                                        <option>4</option>-->
                                    <!--                                                        <option>5</option>-->
                                </select>
                            </div>
                           
                               
                           
                        </div>
                        <div class="modal-footer mf">
                            <button type="button"  class="btn btn-primary city_add_button">
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
                            <button type="button" class="close closmodel" data-dismiss="modal" aria-label="Close"
                                onclick="colsemodel()">
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
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">City Name</label>
                            <input type="text" id="addpro_cat" name="city_name" placeholder="Enter City Name" value=""
                                class="customer-add-input city_name_edit w-100" />
                            </div>

                            <div class="form-group form_select">
                                <?php
                                ///include_once ('../config.php');
                                $query="SELECT * FROM Country";
                                $result =queryRunner($query);
                                ?>
                                <label for="select_author">Country</label>

                                <select class="form-control city_select" id="country-select-edit-id">
                                    <option value="">Country</option>
                                    <?php while($row=rowRetriever($result)){
                                        ?>

                                        <option value="<?=$row['id']; ?>"><?=$row['name']; ?></option>
                                        <?php

                                    }

                                    ?>
                                    <!--                                                        <option>3</option>-->
                                    <!--                                                        <option>4</option>-->
                                    <!--                                                        <option>5</option>-->
                                </select>
                            </div>
                           
                               
                           
                        </div>
                        <div class="modal-footer mf">
                            <button type="button"  class="btn btn-primary city_edit_button">
                                <img src="../public/image/tick (1).png" alt="" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <input type="hidden" id="city-id"

        <!-- Bootstrap core JavaScript -->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <script src="../public/js/customjs.js"></script>
        <script src="../public/js/custom_request.js"></script>
        <script src="../public/js/customPagination.js"></script>
        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
            $(".sidebar_city").addClass("active");

        </script>

        <script>

            $(document).ready(function () {
                retrieveallCities();

                function retrieveallCities(search = '',country_id= '') {
                    sendRequest(
                        "?action_type=retrieve&request_type=city&functionality_type=retrieve_all_cities", {
                            page: 1,
                            search: search,
                            country_id:country_id,

                        }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {
                                $(".pagination").html(data.pagination);
                                $("#city-table-body-id").empty();
                                var list = data.listOfData;

                                for (var i = 0; i < list.length; i++) {

                                    var n = list[i].id;
                                    // var picture = list[i].picture;
                                    var name = list[i].name;
                                    var cou_name = list[i].cou_name;
                                    // var currency_symbol = list[i].currency_symbol;
                                    var enable = list[i].enable;


                                    var checked = "";
                                    if (enable == 0) {

                                        checked = "value='0'";
                                    } else {

                                        checked = "value='1'  checked";
                                    }



                                    var text = "<tr id=\"city-table-row-"+n+"\">\n" +
                                        "\n" +
                                        "                                                <td><span>"+name+"</span></td>\n" +
                                        "                                                <td>"+cou_name+"</td>\n" +

                                        "                                                <td>\n" +
                                        "                                                    <div class=\"\">\n" +
                                        "                                                        <button data-toggle=\"modal\" data-id=\""+n+"\" id=\"editmodal\"  id=\"editmodal\"\n" +
                                        "                                                            type=\"button\"\n" +
                                        "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\">\n" +
                                        "                                                            <i class=\"fas fa-pencil-alt fa-pencil-alt2 mt-0\"></i>\n" +
                                        "                                                        </button>\n" +
                                        "                                                        <button type=\"button\"\n" +
                                        "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\" onclick=\"deleteCity("+n+")\">\n" +
                                        "                                                            <i class=\"far fa-trash-alt fa-trash-alt2 mt-0\"></i>\n" +
                                        "                                                        </button>\n" +
                                        "                                                    </div>\n" +
                                        "                                                </td>\n" +
                                        "                                                <td>\n" +
                                        "                                                    <label class=\"switch\">\n" +
                                        "                                                        <input type=\"checkbox\" data-id=\""+n+"\" id=\"enable-switch-"+n+"\" class=\"city_switch\" "+checked+">\n" +
                                        "                                                        <span class=\"slider round\"></span>\n" +
                                        "                                                    </label>\n" +
                                        "\n" +
                                        "                                                </td>\n" +
                                        "\n" +
                                        "\n" +
                                        "                                            </tr>";
                                    $("#city-table-body-id").append(text);
                                }



                            } else if (data.code == "206") {
                                console.log("Failed to Delete");
                            }

                        })
                        .catch((error) => {
                            console.log(error)
                        });
                }

                $('#city-search').keyup(function () {
                    var search = $(this).val();
                    var country_id = $("#country-select-id").val();
                    retrieveallCities(search,country_id);
                    // console.log(query)
                });

                $('#country-select-id').change(function () {
                    var country_id = $(this).val();
                    var search = $('#city-search').val();
                    retrieveallCities(search,country_id);
                    // console.log(search)
                });

                $(document).on('change', '.city_switch', function () {

                    var id = $(this).data('id');
                    var enable_val;
                    if ($("#enable-switch-" + id).is(':checked')) {
                        $("#enable-switch-" + id).val(1);
                        enable_val = "1";
                    } else {
                        $("#enable-switch-" + id).val(0);
                        enable_val = "0";
                    }


                    sendRequest("?action_type=update&request_type=city&functionality_type=enable_city", {
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


                    sendRequest("?action_type=retrieve&request_type=city&functionality_type=retrieve_edit_all_cities", {
                        id: id,
                        // enable: enable_val,
                    }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {

                                var list = data.listOfData;

                                for (var i = 0; i < list.length; i++) {

                                    var n = list[i].id;
                                    // var picture = list[i].picture;
                                    var name = list[i].name;
                                    var cou_id = list[i].cou_id;
                                    // var currency_symbol = list[i].currency_symbol;
                                    var enable = list[i].enable;
                                    $("#city-id").val(n);
                                    $(".city_name_edit").val(name);
                                    $("#country-select-edit-id").val(cou_id);
                                    $("#country-select-edit-id").trigger('click');




                                    $("#add_payment_modal_edit").modal('show');
                                }

                            }


                        })
                        .catch((error) => {
                            console.log(error)
                        })

                });

                $(document).on('click', '.city_edit_button', function () {

                   var id =  $("#city-id").val();
                    var name = $(".city_name_edit").val();
                   var cou_id= $("#country-select-edit-id").val();
                    // $(".image-upload-wrap4").hide();
                    // $(".file-upload-content4").show();
                    // var img = $(".file-upload-image4").attr('src');
                    // var fd = new FormData($("#fileinfo"));
                    // console.log(fd);


                    sendRequest("?action_type=update&request_type=city&functionality_type=update_city", {
                        id: id,
                        city_name:name,
                        country_id:cou_id,


                    }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {
                                $("#add_payment_modal_edit").modal('hide');
                                retrieveallCities();
                                // $(".image-upload-wrap4").show();
                                // $(".file-upload-content4").hide();

                            }


                        })
                        .catch((error) => {
                            console.log(error)
                        })

                });

                $(document).on('click', '.city_add_button', function () {

                    // var id= $("#country-id").val();
                    var name = $(".city_name_add").val();
                    var cou_id = $("#country-select-add-id").val();
                    // $(".image-upload-wrap4").hide();
                    // $(".file-upload-content4").show();
                    // var img = $(".file-upload-image4").attr('src');


                    sendRequest("?action_type=create&request_type=city&functionality_type=insert_city", {
                        // id: id,
                        city_name:name,
                        country_id:cou_id,

                    }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {
                                $("#add_payment_modal").modal('hide');
                                retrieveallCities();
                                // $(".image-upload-wrap4").show();
                                // $(".file-upload-content4").hide();

                            }


                        })
                        .catch((error) => {
                            console.log(error)
                        })

                });
            });

            function deleteCity (id) {
                var del_id =id;

                sendRequest("?action_type=delete&request_type=city&functionality_type=delete_city", {
                    id:del_id,




                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if(data.code == "202"){
                            $("#city-table-row-"+del_id).remove();

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
                var search = $("#payment-search").val();
                var country_id = $("#country-select-id").val();

                var category=""
                if(country_id = ""){
                    category =""
                }else {
                    category = country_id;
                }
                var searchset=""
                if(search = ""){
                    searchset =""
                }else {
                    searchset = search;
                }
                sendRequest("?action_type=retrieve&request_type=city&functionality_type=pagination", {
                    offset:offset,
                    search:search,
                    country_id:category,


                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {
                            // $(".pagination").html(data.pagination);
                            // $("#paginate").html(data.htmlData);
                            $("#city-table-body-id").empty();
                            var list = data.listOfData;

                            for (var i = 0; i < list.length; i++) {

                                var n = list[i].id;
                                // var picture = list[i].picture;
                                var name = list[i].name;
                                var cou_name = list[i].cou_name;
                                // var currency_symbol = list[i].currency_symbol;
                                var enable = list[i].enable;


                                var checked = "";
                                if (enable == 0) {

                                    checked = "value='0'";
                                } else {

                                    checked = "value='1'  checked";
                                }



                                var text = "<tr id=\"city-table-row-"+n+"\">\n" +
                                    "\n" +
                                    "                                                <td><span>"+name+"</span></td>\n" +
                                    "                                                <td>"+cou_name+"</td>\n" +

                                    "                                                <td>\n" +
                                    "                                                    <div class=\"\">\n" +
                                    "                                                        <button data-toggle=\"modal\" data-id=\""+n+"\" id=\"editmodal\"  id=\"editmodal\"\n" +
                                    "                                                            type=\"button\"\n" +
                                    "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\">\n" +
                                    "                                                            <i class=\"fas fa-pencil-alt fa-pencil-alt2 mt-0\"></i>\n" +
                                    "                                                        </button>\n" +
                                    "                                                        <button type=\"button\"\n" +
                                    "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\" onclick=\"deleteCity("+n+")\">\n" +
                                    "                                                            <i class=\"far fa-trash-alt fa-trash-alt2 mt-0\"></i>\n" +
                                    "                                                        </button>\n" +
                                    "                                                    </div>\n" +
                                    "                                                </td>\n" +
                                    "                                                <td>\n" +
                                    "                                                    <label class=\"switch\">\n" +
                                    "                                                        <input type=\"checkbox\" data-id=\""+n+"\" id=\"enable-switch-"+n+"\" class=\"city_switch\" "+checked+">\n" +
                                    "                                                        <span class=\"slider round\"></span>\n" +
                                    "                                                    </label>\n" +
                                    "\n" +
                                    "                                                </td>\n" +
                                    "\n" +
                                    "\n" +
                                    "                                            </tr>";
                                $("#city-table-body-id").append(text);
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