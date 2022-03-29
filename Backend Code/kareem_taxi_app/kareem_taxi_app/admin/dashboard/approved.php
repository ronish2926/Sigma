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

    <title>allCOurses</title>

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
                    <div class="candidate_div mb-4">
                        <h1>Approved</h1>
                       
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

                                                    <select class="form-control" style="display:none" id="city-select-id">

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
                                                <input type="text" class="form-control" id="captain-search" placeholder="Searching for.."
                                                    aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                       
                                    </div>

                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th>Driver Name</th>
                                                <th>Driver Phone</th>
                                                <th>Driver Email</th>
                                                <th>Total Trips</th>
                                                <th>Total Revenue</th>
                                                <th>Status</th>
                                                <th>Rating</th>

                                                <th>Detail page</th>
                                                <th>Live</th>
                                                 <th>Action</th>
                                                <th>Enable</th>

                                            </tr>
                                        </thead>
                                        <tbody id="captain-table-body-id">
                                            <tr>

                                                <td><img src="../public/image/person.jpg" alt=""><span>Elston Gullan</span>
                                                </td>
                                                <td>02353245252</td>
                                                <td>example@gmail.com</td>
                                                <td>45252</td>
                                                <td>$245252</td>
                                                <td><span class="span_approved">Approved</span></td>
                                                <td>4.5</td>
                                                <td><a href="driver_detail.php"><span class="span_approved">Detail</span></a></td>
                                                <td>
                                                    <div class="">
                                                      <a href="driver_detail.php?id="+n> <button data-toggle="modal" data-target="#add_payment_modal_edit" id="editmodal"
                                                                                           type="button"
                                                                                           class="btn btn-outline-white2 btn-rounded btn-sm">
                                                              <img style="width: 14px;height: 18px;margin-left: 5px;" src="../public/image/view-details.svg"></button></a>
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

                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>

                                                </td>


                                            </tr>
                                            <tr>

                                                <td><a href="driver_detail.php"><img src="../public/image/person.jpg" alt=""><span>Elston Gullan</span></a>
                                                </td>
                                                <td>02353245252</td>
                                                <td>example@gmail.com</td>
                                                <td>45252</td>
                                                <td>$245252</td>
                                                <td><span class="span_approved">Approved</span></td>
                                                <td>4.5</td>
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

                                                <td><a href="driver_detail.php"><img src="../public/image/person.jpg" alt=""><span>Elston Gullan</span></a>
                                                </td>
                                                <td>02353245252</td>
                                                <td>example@gmail.com</td>
                                                <td>45252</td>
                                                <td>$245252</td>
                                                <td><span class="span_approved">Approved</span></td>
                                                <td>4.5</td>
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

                                                <td><a href="driver_detail.php"><img src="../public/image/person.jpg" alt=""><span>Elston Gullan</span></a>
                                                </td>
                                                <td>02353245252</td>
                                                <td>example@gmail.com</td>
                                                <td>45252</td>
                                                <td>$245252</td>
                                                <td><span class="span_approved">Approved</span></td>
                                                <td>4.5</td>
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

                                                <td><a href="driver_detail.php"><img src="../public/image/person.jpg" alt=""><span>Elston Gullan</span></a>
                                                </td>
                                                <td>02353245252</td>
                                                <td>example@gmail.com</td>
                                                <td>45252</td>
                                                <td>$245252</td>
                                                <td><span class="span_approved">Approved</span></td>
                                                <td>4.5</td>
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
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Driver Name</label>
                            <input type="text" id="addpro_cat" name="driver_name" placeholder="Enter Driver Name" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Driver Phone</label>
                            <input type="text" id="addpro_cat" name="driver_no" placeholder="Enter Phone No" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Driver Email</label>
                            <input type="text" id="addpro_cat" name="driver_Email" placeholder="Enter Email" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Total Trips</label>
                            <input type="text" id="addpro_cat" name="total_trips" placeholder="Enter Trips" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Total Revenue</label>
                            <input type="text" id="addpro_cat" name="total_revenue" placeholder="Enter Revenue" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Status</label>
                            <input type="text" id="addpro_cat" name="status" placeholder="Enter Status" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Rating</label>
                            <input type="text" id="addpro_cat" name="ratings" placeholder="Enter Ratings" value=""
                                class="customer-add-input  w-100" />
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
                                                        <img src="public/image/upload.png" alt="" />
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
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Driver Name</label>
                            <input type="text" id="addpro_cat" name="driver_name" placeholder="Enter Driver Name" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Driver Phone</label>
                            <input type="text" id="addpro_cat" name="driver_no" placeholder="Enter Phone No" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Driver Email</label>
                            <input type="text" id="addpro_cat" name="driver_Email" placeholder="Enter Email" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Total Trips</label>
                            <input type="text" id="addpro_cat" name="total_trips" placeholder="Enter Trips" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Total Revenue</label>
                            <input type="text" id="addpro_cat" name="total_revenue" placeholder="Enter Revenue" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Status</label>
                            <input type="text" id="addpro_cat" name="status" placeholder="Enter Status" value=""
                                class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Rating</label>
                            <input type="text" id="addpro_cat" name="ratings" placeholder="Enter Ratings" value=""
                                class="customer-add-input  w-100" />
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
            $(".sidebar_captains").addClass("show");
            $(".sidebar_approved").addClass("active");
        </script>

        <script>

            $(document).ready(function () {
                retrieveallApprovedCaptain();
                // var str = "foo/bar/test.html";
                // var lastSlash = str.lastIndexOf("/");
                // alert(str.substring(lastSlash+1));

                function retrieveallApprovedCaptain(search = '',country_id= '',city_id='') {
                    sendRequest("?action_type=retrieve&request_type=captains&functionality_type=retrieve_all_captains", {

                        search: search,
                        country_id:country_id,
                        city_id:city_id,
                        status:0,

                    }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {
                                $(".pagination").html(data.pagination);
                                $("#captain-table-body-id").empty();
                                var list = data.listOfData;

                                for (var i = 0; i < list.length; i++) {

                                    var n = list[i].id;
                                    var name = list[i].name;
                                    var cap_pic = list[i].cap_pic;
                                    var email = list[i].email;
                                    var phone = list[i].phone;
                                    var ride_type_name = list[i].ride_type_name;
                                    var total_revenue = list[i].total_revenue;
                                    var total_trips = list[i].total_trips;
                                    var avg_rating = list[i].avg_rating;
                                    var status = list[i].status;
                                    var live = list[i].live;
                                    var enable = list[i].enable;


                                    var checked = "";
                                    if (enable == 0) {

                                        checked = "value='0'";
                                    } else {

                                        checked = "value='1'  checked";
                                    }

                                    var st_checked = "";
                                    if (live == 0) {

                                        st_checked = "value='0'";
                                    } else {

                                        st_checked = "value='1'  checked";
                                    }



                                    var text = "<tr id=\"captains-row-"+n+"\">\n" +
                                        "\n" +
                                        "                                                <td><img src=\""+cap_pic+"\" alt=\"\"><span>"+name+"</span>\n" +
                                        "                                                </td>\n" +
                                        "                                                <td>"+phone+"</td>\n" +
                                        "                                                <td>"+email+"</td>\n" +
                                        "                                                <td>"+total_trips+"</td>\n" +
                                        "                                                <td>"+total_revenue+"</td>\n" +
                                        "                                                <td><span class=\"span_approved\">Approved</span></td>\n" +
                                        "                                                <td>"+avg_rating+"</td>\n" +
                                        "                                                <td><a href=\"driver_detail.php?id="+n+"\"><span class=\"span_approved\">Detail</span></a></td>\n" +
                                        "                                                <td>\n" +
                                        "                                                    <label class=\"switch\">\n" +
                                        "                                                        <input type=\"checkbox\" data-id=\""+n+"\" class=\"captain_status\" id=\"status-switch-"+n+"\" "+st_checked+">\n" +
                                        "                                                        <span class=\"slider round\"></span>\n" +
                                        "                                                    </label>\n" +
                                        "\n" +
                                        "                                                </td>\n" +
                                        "\n" +
                                        "                                                <td>\n" +
                                        "                                                    <div class=\"\">\n" +
                                        "                                                        <button type=\"button\"\n" +
                                        "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\" onclick=\"deleteCaptain("+n+")\">\n" +
                                        "                                                            <i class=\"far fa-trash-alt fa-trash-alt2 mt-0\"></i>\n" +
                                        "                                                        </button>\n" +
                                        "                                                       \n" +
                                        "                                                    </div>\n" +
                                        "                                                </td>\n" +
                                        "                                                <td>\n" +
                                        "                                                    <label class=\"switch\">\n" +
                                        "                                                        <input type=\"checkbox\" data-id=\""+n+"\" class=\"captain_switch\" id=\"enable-switch-"+n+"\" "+checked+">\n" +
                                        "                                                        <span class=\"slider round\"></span>\n" +
                                        "                                                    </label>\n" +
                                        "\n" +
                                        "                                                </td>\n" +
                                        "\n" +
                                        "\n" +
                                        "                                            </tr>";
                                    $("#captain-table-body-id").append(text);
                                }



                            } else if (data.code == "206") {
                                console.log("Failed to Delete");
                            }

                        })
                        .catch((error) => {
                            console.log(error)
                        });
                }

                $('#captain-search').keyup(function () {
                    var search = $(this).val();
                    var country_id = $("#country-select-id").val();
                    var city_id = $("#city-select-id").val();

                    retrieveallApprovedCaptain(search,country_id,city_id);
                    // console.log(query)
                });


                $('#city-select-id').change(function () {
                    var city_id = $(this).val();
                    var country_id = $("#country-select-id").val();
                    var search = $('#captain-search').val();
                    retrieveallApprovedCaptain(search,country_id,city_id);
                    // console.log(search)
                });

                $('#country-select-id').change(function () {
                    var country_id = $(this).val();
                    var city_id = $("#city-select-id").val();
                    var search = $('#captain-search').val();
                    retrieveallApprovedCaptain(search,country_id,city_id);
                    // console.log(search)
                });

                $(document).on('change', '#country-select-id', function () {

                    var id = $(this).val();


                    sendRequest("?action_type=retrieve&request_type=ride_type&functionality_type=retrieve_all_cities", {
                        id: id,
                        // enable: enable_val,
                    }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {

                                var list = data.listOfData;
                                $("#city-select-id").show();
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

                $(document).on('change', '.captain_switch', function () {

                    var id = $(this).data('id');
                    var enable_val;
                    if ($("#enable-switch-" + id).is(':checked')) {
                        $("#enable-switch-" + id).val(1);
                        enable_val = "1";
                    } else {
                        $("#enable-switch-" + id).val(0);
                        enable_val = "0";
                    }


                    sendRequest("?action_type=update&request_type=captains&functionality_type=enable_captain", {
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

                $(document).on('change', '.captain_status', function () {

                    var id = $(this).data('id');
                    var enable_val;
                    if ($("#status-switch-" + id).is(':checked')) {
                        $("#status-switch-" + id).val(1);
                        enable_val = "1";
                    } else {
                        $("#status-switch-" + id).val(0);
                        enable_val = "0";
                    }


                    sendRequest("?action_type=update&request_type=captains&functionality_type=live_captain", {
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


            });

            function deleteCaptain(id) {
                var del_id =id;

                sendRequest("?action_type=delete&request_type=captains&functionality_type=delete_captain", {
                    id:del_id,

                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if(data.code == "202"){
                            $("#captains-row-"+del_id).remove();

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
                var search = $("#captain-search").val();
                var country_id = $("#country-select-id").val();
                var city_id = $("#city-select-id").val();

                var country=""
                if(country_id = ""){
                    country =""
                }else {
                    country = country_id;
                }

                var city=""
                if(city_id = ""){
                    city =""
                }else {
                    city = city_id;
                }

                var searchset=""
                if(search = ""){
                    searchset =""
                }else {
                    searchset = search;
                }
                sendRequest("?action_type=retrieve&request_type=captains&functionality_type=pagination", {
                    offset:offset,
                    search:search,
                    country_id:country,
                    city_id:city,
                    status:0


                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {
                            // $(".pagination").html(data.pagination);
                            // $("#paginate").html(data.htmlData);
                            $("#captain-table-body-id").empty();
                            var list = data.listOfData;

                            for (var i = 0; i < list.length; i++) {

                                var n = list[i].id;
                                var name = list[i].name;
                                var cap_pic = list[i].cap_pic;
                                var email = list[i].email;
                                var phone = list[i].phone;
                                var ride_type_name = list[i].ride_type_name;
                                var total_revenue = list[i].total_revenue;
                                var total_trips = list[i].total_trips;
                                var avg_rating = list[i].avg_rating;
                                var status = list[i].status;
                                var live = list[i].live;
                                var enable = list[i].enable;


                                var checked = "";
                                if (enable == 0) {

                                    checked = "value='0'";
                                } else {

                                    checked = "value='1'  checked";
                                }

                                var st_checked = "";
                                if (live == 0) {

                                    st_checked = "value='0'";
                                } else {

                                    st_checked = "value='1'  checked";
                                }



                                var text = "<tr id=\"captains-row-"+n+"\">\n" +
                                    "\n" +
                                    "                                                <td><img src=\""+cap_pic+"\" alt=\"\"><span>"+name+"</span>\n" +
                                    "                                                </td>\n" +
                                    "                                                <td>"+phone+"</td>\n" +
                                    "                                                <td>"+email+"</td>\n" +
                                    "                                                <td>"+total_trips+"</td>\n" +
                                    "                                                <td>"+total_revenue+"</td>\n" +
                                    "                                                <td><span class=\"span_approved\">Approved</span></td>\n" +
                                    "                                                <td>"+avg_rating+"</td>\n" +
                                    "                                                <td><a href=\"driver_detail.php?id="+n+"\"><span class=\"span_approved\">Detail</span></a></td>\n" +
                                    "                                                <td>\n" +
                                    "                                                    <label class=\"switch\">\n" +
                                    "                                                        <input type=\"checkbox\" data-id=\""+n+"\" class=\"captain_status\" id=\"status-switch-"+n+"\" "+st_checked+">\n" +
                                    "                                                        <span class=\"slider round\"></span>\n" +
                                    "                                                    </label>\n" +
                                    "\n" +
                                    "                                                </td>\n" +
                                    "\n" +
                                    "                                                <td>\n" +
                                    "                                                    <div class=\"\">\n" +
                                    "                                                        <button type=\"button\"\n" +
                                    "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\" onclick=\"deleteCaptain("+n+")\">\n" +
                                    "                                                            <i class=\"far fa-trash-alt fa-trash-alt2 mt-0\"></i>\n" +
                                    "                                                        </button>\n" +
                                    "                                                       \n" +
                                    "                                                    </div>\n" +
                                    "                                                </td>\n" +
                                    "                                                <td>\n" +
                                    "                                                    <label class=\"switch\">\n" +
                                    "                                                        <input type=\"checkbox\" data-id=\""+n+"\" class=\"captain_switch\" id=\"enable-switch-"+n+"\" "+checked+">\n" +
                                    "                                                        <span class=\"slider round\"></span>\n" +
                                    "                                                    </label>\n" +
                                    "\n" +
                                    "                                                </td>\n" +
                                    "\n" +
                                    "\n" +
                                    "                                            </tr>";
                                $("#captain-table-body-id").append(text);
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