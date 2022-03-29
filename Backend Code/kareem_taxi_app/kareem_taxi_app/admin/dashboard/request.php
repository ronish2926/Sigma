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

    <title>Request</title>

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
           include_once ('../navbar_admin.php')
           ?>

            <div class="container">
                <div class="page_name_candidate">
                    <div class="candidate_div mb-4">
                        <h1>Request</h1>
                       
                    </div>
                    <div class="select_sort_second">
                       
                        <div class="sort_btn">
                           



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
                                                <div class="form-group mr-3">

                                                    <select class="form-control" id="status-select-id">
                                                        <option value="0">pending</option>
                                                        <option value="1">Paid</option>

                                                    </select>
                                                </div>
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
                                                <input type="text" class="form-control" id="request-search" placeholder="Searching for.."
                                                    aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                       
                                    </div>

                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th>Rider Name</th>
                                                <th>Total Trips</th>
                                                <th>Total Revenue</th>
                                                <th>Bank Name</th>
                                                <th>IBAN No</th>
                                                <th>Paid</th>
                                                


                                            </tr>
                                        </thead>
                                        <tbody id="request-table-body-id">
                                            <tr > 

                                                <td>Johnson
                                                </td>
                                                <td>300</td>
                                                <td>$400</td>
                                                <td>Allied Bank</td>
                                                <td>41442212241</td>
                                                <td class="resandunres">
                                                   
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                
                                               
                                            </tr>
                                            
                                            <tr>

                                                <td>Johnson
                                                </td>
                                                <td>300</td>
                                                <td>$400</td>
                                                <td>Allied Bank</td>
                                                <td>41442212241</td>
                                                <td class="resandunres">
                                                   
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>

                                            </tr>
                                            
                                            <tr>

                                                <td>Johnson
                                                </td>
                                                <td>300</td>
                                                <td>$400</td>
                                                <td>Allied Bank</td>
                                                <td>41442212241</td>
                                                <td class="resandunres">
                                                   
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>


                                            </tr>
                                            <tr>

                                                <td>Johnson
                                                </td>
                                                <td>300</td>
                                                <td>$400</td>
                                                <td>Allied Bank</td>
                                                <td>41442212241</td>
                                                <td class="resandunres">
                                                   
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>Johnson
                                                </td>
                                                <td>300</td>
                                                <td>$400</td>
                                                <td>Allied Bank</td>
                                                <td>41442212241</td>
                                                <td class="resandunres">
                                                   
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
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">S.No</label>
                            <input type="text" id="addpro_cat" name="driver_name" placeholder="Enter Serial No" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Date & Time</label>
                            <input type="datetime-local" id="addpro_cat" name="driver_no" placeholder="Enter Phone No" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Rider Name</label>
                            <input type="text" id="addpro_cat" name="driver_Email" placeholder="Enter Rider Name" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Driver Name</label>
                            <input type="text" id="addpro_cat" name="total_trips" placeholder="Enter driver name" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Fare</label>
                            <input type="text" id="addpro_cat" name="total_revenue" placeholder="Enter Fare" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group form_select">
                                <label for="select_author">Vechile Category</label>
                                <select class="form-control selectpicker" 
                                    id="select_payment">
                                    <option >Luxury</option>
                                    <option >Bill Gordon</option>
                                    <option >Elizabeth Warren</option>
                                    <option >Mario Flores</option>
                                    <option >Don Young</option>
                                    <option  disabled="disabled">Marvin
                                        Martinez</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Status</label>
                            <input type="text" id="addpro_cat" name="status" placeholder="Enter Status" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Ride Now</label>
                            <input type="text" id="addpro_cat" name="ratings" placeholder="Enter Ridings" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Pre-bookings</label>
                            <input type="text" id="addpro_cat" name="ratings" placeholder="Enter bookings" value=""
                                class="customer-add-input  w-100" />
                            </div>
                           
                               
                            <!-- <div>
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
                            </div> -->
                        </div>
                        <div class="modal-footer mf">
                            <button type="button" onclick="addproductfield()" class="btn btn-primary">
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
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">S.No</label>
                            <input type="text" id="addpro_cat" name="driver_name" placeholder="Enter Serial No" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Date & Time</label>
                            <input type="datetime-local" id="addpro_cat" name="driver_no" placeholder="Enter Phone No" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Rider Name</label>
                            <input type="text" id="addpro_cat" name="driver_Email" placeholder="Enter Rider Name" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Driver Name</label>
                            <input type="text" id="addpro_cat" name="total_trips" placeholder="Enter driver name" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Fare</label>
                            <input type="text" id="addpro_cat" name="total_revenue" placeholder="Enter Fare" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group form_select">
                                <label for="select_author">Vechile Category</label>
                                <select class="form-control selectpicker" 
                                    id="select_payment">
                                    <option >Luxury</option>
                                    <option >Bill Gordon</option>
                                    <option >Elizabeth Warren</option>
                                    <option >Mario Flores</option>
                                    <option >Don Young</option>
                                    <option  disabled="disabled">Marvin
                                        Martinez</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Status</label>
                            <input type="text" id="addpro_cat" name="status" placeholder="Enter Status" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Ride Now</label>
                            <input type="text" id="addpro_cat" name="ratings" placeholder="Enter Ridings" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Pre-bookings</label>
                            <input type="text" id="addpro_cat" name="ratings" placeholder="Enter bookings" value=""
                                class="customer-add-input  w-100" />
                            </div>
                           
                           
                               
                            <!-- <div>
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
                            </div> -->
                        </div>
                        <div class="modal-footer mf">
                            <button type="button" onclick="addproductfield()" class="btn btn-primary">
                                <img src="../public/image/tick (1).png" alt="" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

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
            $(".sidebar_request").addClass("active");
            // $('.accordian-body').on('show.bs.collapse', function () {
            //     $(this).closest("table")
            //     .find(".collapse.in")
            //     .not(this)
            //     .collapse('hide')
            // });
            // $(document).ready(function())
            // $('.collapse').on('show.bs.collapse', function () {
            //     $('.collapse.in').collapse('hide');
            // });
        </script>

        <script>

            $(document).ready(function () {
                retrieveallRequest();

                function retrieveallRequest(search = '',status = '') {
                    sendRequest(
                        "?action_type=retrieve&request_type=request&functionality_type=retrieve_all_request", {
                            search: search,
                            status: status,

                        }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {
                                $(".pagination").html(data.pagination);
                                $("#request-table-body-id").empty();
                                var list = data.listOfData;
                                for (var i = 0; i < list.length; i++) {

                                    var n = list[i].id;
                                    var captain_name = list[i].name;
                                    var total_rides = list[i].total_rides;
                                    var total_earning = list[i].total_earning;
                                    var bank_name = list[i].bank_name;
                                    var iban = list[i].iban;

                                    var status = list[i].status;


                                    var checked = "";
                                    if (status == 0) {

                                        checked = "value='0'";
                                    } else {

                                        checked = "value='1'  checked";
                                    }



                                   var text = ` <tr>
                                                <td>${captain_name}</td>
                                                <td>${total_rides}</td>
                                                <td>${total_earning}</td>
                                                <td>${bank_name}</td>
                                                <td>${iban}</td>
                                                <td class="resandunres">
                                                    <label class="switch">
                                                        <input type="checkbox" data-id="${n}" class="request_switch" id="enable-switch-${n}" ${checked}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                            </tr>`;
                                    $("#request-table-body-id").append(text);
                                }



                            } else if (data.code == "206") {
                                console.log("Failed to Delete");
                            }

                        })
                        .catch((error) => {
                            console.log(error)
                        });
                }

                $('#request-search').keyup(function () {
                    var search = $(this).val();
                    var status = $("#status-select-id").val();


                    retrieveallRequest(search,status);
                    // console.log(query)
                });


                $('#status-select-id').change(function () {
                    var status = $(this).val();

                    var search = $('#report-search').val();
                    retrieveallRequest(search,status);
                    // console.log(search)
                });

                $(document).on('change', '.request_switch', function () {

                    var id = $(this).data('id');
                    var enable_val;
                    if ($("#enable-switch-" + id).is(':checked')) {
                        $("#enable-switch-" + id).val(1);
                        enable_val = "1";
                    } else {
                        $("#enable-switch-" + id).val(0);
                        enable_val = "0";
                    }


                    sendRequest("?action_type=update&request_type=request&functionality_type=enable_request", {
                        id: id,
                        status: enable_val,
                    }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {
                                retrieveallRequest();
                            }


                        })
                        .catch((error) => {
                            console.log(error)
                        })

                });


            });



            function pag(offset,id) {

                var offset =offset;
                var active= $(".pagination").find('.active');
                active.removeClass("active");
                $("#pag-"+id).addClass("active");
                var search = $("#request-search").val();
                var status = $("#status-select-id").val();


                var statuss=""
                if(status = ""){
                    statuss =""
                }else {
                    statuss = status;
                }


                var searchset=""
                if(search = ""){
                    searchset =""
                }else {
                    searchset = search;
                }
                sendRequest("?action_type=retrieve&request_type=request&functionality_type=pagination", {
                    offset:offset,
                    search:search,
                    status:statuss,


                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {
                            // $(".pagination").html(data.pagination);
                            // $("#paginate").html(data.htmlData);
                            $("#request-table-body-id").empty();
                            var list = data.listOfData;
                            for (var i = 0; i < list.length; i++) {

                                var n = list[i].id;
                                var captain_name = list[i].name;
                                var total_rides = list[i].total_rides;
                                var total_earning = list[i].total_earning;
                                var bank_name = list[i].bank_name;
                                var iban = list[i].iban;

                                var status = list[i].status;


                                var checked = "";
                                if (status == 0) {

                                    checked = "value='0'";
                                } else {

                                    checked = "value='1'  checked";
                                }



                                var text = ` <tr>
                                                <td>${captain_name}</td>
                                                <td>${total_rides}</td>
                                                <td>${total_earning}</td>
                                                <td>${bank_name}</td>
                                                <td>${iban}</td>
                                                <td class="resandunres">
                                                    <label class="switch">
                                                        <input type="checkbox" data-id="${n}" class="request_switch" id="enable-switch-${n}" ${checked}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                            </tr>`;
                                $("#request-table-body-id").append(text);
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