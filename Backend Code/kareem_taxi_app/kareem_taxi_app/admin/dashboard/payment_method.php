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

    <title>Payment Methods</title>

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
            include_once ('../navbar_admin.php');

            ?>

            <div class="container">
                <div class="page_name_candidate">
                    <div class="candidate_div">
                        <h1>Payment Method</h1>
                       
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
                                        <form action="#">
                                            <div class="input-group ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-search"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="payment-search" placeholder="Searching for.."
                                                    aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                       
                                    </div>

                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th>Payment Name</th>
                                                <th>Tag</th>

                                                <th>Action</th>
                                                <th>Enable</th>


                                            </tr>
                                        </thead>
                                        <tbody id="payment-table-body-id">
                                            <tr>

                                                <td><img src="../public/image/person.jpg" alt=""><span>Elston Gullan</span>
                                                </td>
                                                <td>$10,000</td>

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

                                                <td><img src="../public/image/person.jpg" alt=""><span>Elston Gullan</span>
                                                </td>
                                                <td>$10,000</td>
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

                                                <td><img src="../public/image/person.jpg" alt=""><span>Elston Gullan</span>
                                                </td>
                                                <td>$10,000</td>
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

                                                <td><img src="../public/image/person.jpg" alt=""><span>Elston Gullan</span>
                                                </td>
                                                <td>$10,000</td>
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

                                                <td><img src="../public/image/person.jpg" alt=""><span>Elston Gullan</span>
                                                </td>
                                                <td>$10,000</td>
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
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Name</label>
                            <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Payment Name" value=""
                                class="customer-add-input payment_name_add  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Tag</label>
                            <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Tags" value=""
                                class="customer-add-input tag_add w-100" />
                            </div>
                           
                               
                            <div>
                                <div>
                                    <div class="upload-text-heading">
                                        <h5 class="coupon-code-main-heading txt-regular">
                                            Upload Picture
                                        </h5>
                                    </div>
                                    <div>
                                        <p class="upload-main-paragraph txt-label2">
                                            Drag and drop your files here
                                        </p>
                                    </div>
                                </div>
                                <div class="card text-center uload-card">
                                    <div class="file-upload4">
                                        <div class="image-upload-wrap4">
                                            <form id="fileinfo" enctype="multipart/form-data" method="post" name="fileinfo">
                                            <input class="file-upload-input4" type="file" onchange="readURL4(this);"
                                                accept="image/*" />
                                            </form>
                                            <div class="drag-text4">
                                                <div class="card-body upload-card-body4">
                                                    <div class="upload-img4">
                                                        <img src="../public/image/upload.png" alt="" />
                                                    </div>
                                                    <div class="upload-image-format4">
                                                        <p>
                                                            .PDF .JPG .PNG .DOC
                                                        </p>
                                                    </div>
                                                    <div class="upload-detail4">
                                                        <h4>You can also upload files by</h4>
                                                        <div class="upload-clicking4">
                                                            <a href="#" class="">Clicking here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="file-upload-content4">
                                            <img class="file-upload-image4" src="#" alt="your image" />
                                            <div class="image-title-wrap4">
                                                <button type="button" onclick="removeUpload4()"
                                                    class="btn remove-image4">
                                                    Remove
                                                    <span class="image-title4" style="display: none;">Uploaded
                                                        Image</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mf">
                            <button type="button" class="btn btn-primary payment_add_button">
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
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Name</label>
                            <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Payment Name" value=""
                                class="customer-add-input payment_name_edit  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Tag</label>
                            <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Tags" value=""
                                class="customer-add-input tag_edit  w-100" />
                            </div>
                           
                               
                            <div>
                                <div>
                                    <div class="upload-text-heading">
                                        <h5 class="coupon-code-main-heading txt-regular">
                                            Upload Picture
                                        </h5>
                                    </div>
                                    <div>
                                        <p class="upload-main-paragraph txt-label2">
                                            Drag and drop your files here
                                        </p>
                                    </div>
                                </div>
                                <div class="card text-center uload-card">
                                    <div class="file-upload4">
                                        <div class="image-upload-wrap4">
                                            <input class="file-upload-input4" type="file" onchange="readURL4(this);"
                                                accept="image/*" />
                                            <div class="drag-text4">
                                                <div class="card-body upload-card-body4">
                                                    <div class="upload-img4">
                                                        <img src="../public/image/upload.png" alt="" />
                                                    </div>
                                                    <div class="upload-image-format4">
                                                        <p>
                                                            .PDF .JPG .PNG .DOC
                                                        </p>
                                                    </div>
                                                    <div class="upload-detail4">
                                                        <h4>You can also upload files by</h4>
                                                        <div class="upload-clicking4">
                                                            <a href="#" class="">Clicking here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="file-upload-content4">
                                            <img class="file-upload-image4" src="#" alt="your image" />
                                            <div class="image-title-wrap4">
                                                <button type="button" onclick="removeUpload4()"
                                                    class="btn remove-image4">
                                                    Remove
                                                    <span class="image-title4" style="display: none;">Uploaded
                                                        Image</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mf">
                            <button type="button"  class="btn btn-primary payment_edit_button">
                                <img src="../public/image/tick (1).png" alt="" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
<input type="hidden" id="payment-id">
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
            $(".sidebar_payment").addClass("active");
        </script>

        <script>

            $(document).ready(function () {
                retrieveallPaymentMethods();

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
                                $("#payment-table-body-id").empty();
                                var list = data.listOfData;

                                for (var i = 0; i < list.length; i++) {

                                    var n = list[i].id;
                                    var picture = list[i].picture;
                                    var name = list[i].name;
                                    var tag = list[i].tag;
                                    // var currency_symbol = list[i].currency_symbol;
                                    var enable = list[i].enable;


                                    var checked = "";
                                    if (enable == 0) {

                                        checked = "value='0'";
                                    } else {

                                        checked = "value='1'  checked";
                                    }



                                    var text = "<tr id=\"payment-table-row-"+n+"\">\n" +
                                        "\n" +
                                        "                                                <td class=\"payment_td\"><img src=\""+picture+"\"><span>"+name+"</span></td>\n" +
                                        "                                                <td>"+tag+"</td>\n" +

                                        "                                                <td>\n" +
                                        "                                                    <div class=\"\">\n" +
                                        "                                                        <button data-toggle=\"modal\" data-id=\""+n+"\" id=\"editmodal\"  id=\"editmodal\"\n" +
                                        "                                                            type=\"button\"\n" +
                                        "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\">\n" +
                                        "                                                            <i class=\"fas fa-pencil-alt fa-pencil-alt2 mt-0\"></i>\n" +
                                        "                                                        </button>\n" +
                                        "                                                        <button type=\"button\"\n" +
                                        "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\" onclick=\"deletePayment("+n+")\">\n" +
                                        "                                                            <i class=\"far fa-trash-alt fa-trash-alt2 mt-0\"></i>\n" +
                                        "                                                        </button>\n" +
                                        "                                                    </div>\n" +
                                        "                                                </td>\n" +
                                        "                                                <td>\n" +
                                        "                                                    <label class=\"switch\">\n" +
                                        "                                                        <input type=\"checkbox\" data-id=\""+n+"\" id=\"enable-switch-"+n+"\" class=\"payment_switch\" "+checked+">\n" +
                                        "                                                        <span class=\"slider round\"></span>\n" +
                                        "                                                    </label>\n" +
                                        "\n" +
                                        "                                                </td>\n" +
                                        "\n" +
                                        "\n" +
                                        "                                            </tr>";
                                    $("#payment-table-body-id").append(text);
                                }



                            } else if (data.code == "206") {
                                console.log("Failed to Delete");
                            }

                        })
                        .catch((error) => {
                            console.log(error)
                        });
                }

                $('#payment-search').keyup(function () {
                    var search = $(this).val();
                    retrieveallPaymentMethods(search);
                    // console.log(query)
                });

                $(document).on('change', '.payment_switch', function () {

                    var id = $(this).data('id');
                    var enable_val;
                    if ($("#enable-switch-" + id).is(':checked')) {
                        $("#enable-switch-" + id).val(1);
                        enable_val = "1";
                    } else {
                        $("#enable-switch-" + id).val(0);
                        enable_val = "0";
                    }


                    sendRequest("?action_type=update&request_type=payment_method&functionality_type=enable_payment", {
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


                    sendRequest("?action_type=retrieve&request_type=payment_method&functionality_type=retrieve_edit_payment_method", {
                        id: id,
                        // enable: enable_val,
                    }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {

                                var list = data.listOfData;

                                for (var i = 0; i < list.length; i++) {

                                    var n = list[i].id;
                                    var picture = list[i].picture;
                                    var name = list[i].name;
                                    var tag = list[i].tag;
                                    $("#payment-id").val(n);
                                    $(".payment_name_edit").val(name);
                                    $(".tag_edit").val(tag);
                                    $(".image-upload-wrap4").hide();
                                    $(".file-upload-content4").show();
                                    $(".file-upload-image4").attr('src',picture);
                                    // $(".percent_edit").val(percentage);


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

                $(document).on('click', '.payment_edit_button', function () {

                    var id = $("#payment-id").val();
                    var name = $(".payment_name_edit").val();
                    var tag = $(".tag_edit").val();
                    // $(".image-upload-wrap4").hide();
                    // $(".file-upload-content4").show();
                    var img = $(".file-upload-image4").attr('src');
                    // var fd = new FormData($("#fileinfo"));
                    // console.log(fd);


                    sendRequest("?action_type=update&request_type=payment_method&functionality_type=update_payment_method", {
                        id: id,
                        payment_method_name:name,
                        payment_method_tag:tag,
                        payment_img:img,
                        // fd:fd,

                    }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {
                                $("#add_payment_modal_edit").modal('hide');
                                retrieveallPaymentMethods();
                                $(".image-upload-wrap4").show();
                                $(".file-upload-content4").hide();

                            }


                        })
                        .catch((error) => {
                            console.log(error)
                        })

                });

                $(document).on('click', '.payment_add_button', function () {

                    // var id= $("#country-id").val();
                    var name = $(".payment_name_add").val();
                    var tag = $(".tag_add").val();
                    // $(".image-upload-wrap4").hide();
                    // $(".file-upload-content4").show();
                    var img = $(".file-upload-image4").attr('src');


                    sendRequest("?action_type=create&request_type=payment_method&functionality_type=insert_payment_method", {
                        // id: id,
                        payment_method_name:name,
                        payment_method_tag:tag,
                        payment_img:img,

                    }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {
                                $("#add_payment_modal").modal('hide');
                                retrieveallPaymentMethods();
                                $(".image-upload-wrap4").show();
                                $(".file-upload-content4").hide();

                            }


                        })
                        .catch((error) => {
                            console.log(error)
                        })

                });
            });

            function deletePayment (id) {
                var del_id =id;

                sendRequest("?action_type=delete&request_type=payment_method&functionality_type=delete_payment_method", {
                    id:del_id,




                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if(data.code == "202"){
                            $("#payment-table-row-"+del_id).remove();

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
                sendRequest("?action_type=retrieve&request_type=payment_method&functionality_type=pagination", {
                    offset:offset,
                    search:search,


                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {
                            // $(".pagination").html(data.pagination);
                            // $("#paginate").html(data.htmlData);
                            $("#payment-table-body-id").empty();
                            var list = data.listOfData;

                            for (var i = 0; i < list.length; i++) {

                                var n = list[i].id;
                                var picture = list[i].picture;
                                var name = list[i].name;
                                var tag = list[i].tag;
                                // var currency_symbol = list[i].currency_symbol;
                                var enable = list[i].enable;


                                var checked = "";
                                if (enable == 0) {

                                    checked = "value='0'";
                                } else {

                                    checked = "value='1'  checked";
                                }



                                var text = "<tr id=\"payment-table-row-"+n+"\">\n" +
                                    "\n" +
                                    "                                                <td class=\"payment_td\"><img src=\""+picture+"\"><span>"+name+"</span></td>\n" +
                                    "                                                <td>"+tag+"</td>\n" +

                                    "                                                <td>\n" +
                                    "                                                    <div class=\"\">\n" +
                                    "                                                        <button data-toggle=\"modal\" data-id=\""+n+"\" id=\"editmodal\"  id=\"editmodal\"\n" +
                                    "                                                            type=\"button\"\n" +
                                    "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\">\n" +
                                    "                                                            <i class=\"fas fa-pencil-alt fa-pencil-alt2 mt-0\"></i>\n" +
                                    "                                                        </button>\n" +
                                    "                                                        <button type=\"button\"\n" +
                                    "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\" onclick=\"deletePayment("+n+")\">\n" +
                                    "                                                            <i class=\"far fa-trash-alt fa-trash-alt2 mt-0\"></i>\n" +
                                    "                                                        </button>\n" +
                                    "                                                    </div>\n" +
                                    "                                                </td>\n" +
                                    "                                                <td>\n" +
                                    "                                                    <label class=\"switch\">\n" +
                                    "                                                        <input type=\"checkbox\" data-id=\""+n+"\" id=\"enable-switch-"+n+"\" class=\"payment_switch\" "+checked+">\n" +
                                    "                                                        <span class=\"slider round\"></span>\n" +
                                    "                                                    </label>\n" +
                                    "\n" +
                                    "                                                </td>\n" +
                                    "\n" +
                                    "\n" +
                                    "                                            </tr>";
                                $("#payment-table-body-id").append(text);
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