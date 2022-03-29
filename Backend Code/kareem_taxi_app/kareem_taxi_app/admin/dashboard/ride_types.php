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

    <title>Ride Types</title>

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
                        <h1>Ride Types</h1>
                       
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
                                                <input type="text" class="form-control" id="ride-type-search" placeholder="Searching for.."
                                                    aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                       
                                    </div>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                               
                                                <th>Picture</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>waiting Price</th>
                                                <th>Ride Category</th>
                                                <th>Country</th>
                                                <th>city</th>
                                               
                                                <th>Tagline</th>
                                                <th>Action</th>
                                                <th>Enable</th>


                                            </tr>
                                        </thead>
                                        <tbody id="ride-type-table-body-id">
                                            <tr>
                                                <td><img src="../public/image/person.jpg" alt=""></td>
                                                <td><span>Elston Gullan</span>
                                                </td>
                                                <td>$10/2km</td>
                                                <td>92/con</td>
                                                <td>category</td>
                                                <td>pakistan</td>
                                                <td>fsd</td>
                                              
                                                <td>tag</td>

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

                                                <td><img src="../public/image/person.jpg" alt=""></td>
                                                <td><span>Elston Gullan</span>
                                                </td>
                                                <td>$10/2km</td>
                                                <td>92/con</td>
                                                <td>category</td>
                                                <td>pakistan</td>
                                                <td>fsd</td>
                                              
                                                <td>tag</td>
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

                                                <td><img src="../public/image/person.jpg" alt=""></td>
                                                <td><span>Elston Gullan</span>
                                                </td>
                                                <td>$10/2km</td>
                                                <td>92/con</td>
                                                <td>category</td>
                                                <td>pakistan</td>
                                                <td>fsd</td>
                                              
                                                <td>tag</td>
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

                                                <td><img src="../public/image/person.jpg" alt=""></td>
                                                <td><span>Elston Gullan</span>
                                                </td>
                                                <td>$10/2km</td>
                                                <td>92/con</td>
                                                <td>category</td>
                                                <td>pakistan</td>
                                                <td>fsd</td>
                                              
                                                <td>tag</td>
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

                                                <td><img src="../public/image/person.jpg" alt=""></td>
                                                <td><span>Elston Gullan</span>
                                                </td>
                                                <td>$10/2km</td>
                                                <td>92/con</td>
                                                <td>category</td>
                                                <td>pakistan</td>
                                                <td>fsd</td>
                                              
                                                <td>tag</td>
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
                                class="customer-add-input ride_type_name_add  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Price/Distance</label>
                            <input type="text" id="addpro_cat" name="pri_dis" placeholder="Enter Price and distance" value=""
                                class="customer-add-input ride_price_distance_add  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Waiting price/Condition</label>
                            <input type="text" id="addpro_cat" name="pri_con" placeholder="Enter Waiting Price and Condition" value=""
                                class="customer-add-input ride_watting_condition_add w-100" />
                            </div>

                            <div class="form-group">
                                <?php
                                ///include_once ('../config.php');
                                $query="SELECT * FROM RideCategory";
                                $result =queryRunner($query);
                                ?>
                                <label for="ride-category-select-id" class="customer-add-input-label txt-regular upload-input-label">Ride Category</label>

                                <select class="form-control city_select" id="ride-category-select-id">
                                    <option value="">Select Ride Category</option>
                                    <?php while($row=rowRetriever($result)){
                                        ?>

                                        <option value="<?=$row['id']; ?>"><?=$row['name']; ?></option>
                                        <?php

                                    }

                                    ?>
                                </select>
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
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Tagline</label>
                            <input type="text" id="addpro_cat" name="tagline" placeholder="Enter  tagline" value=""
                                class="customer-add-input ride_tagline_add  w-100" />
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
                            <button type="button"  class="btn btn-primary ride_type_add_button">
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
                                class="customer-add-input ride_name_edit  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Price/Distance</label>
                            <input type="text" id="addpro_cat" name="pri_dis" placeholder="Enter Price and distance" value=""
                                class="customer-add-input price_distance_edit  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Waiting price/Condition</label>
                            <input type="text" id="addpro_cat" name="pri_con" placeholder="Enter Waiting Price and Condition" value=""
                                class="customer-add-input wating_price_condition_edit  w-100" />
                            </div>
                            <div class="form-group">
                                <?php
                                ///include_once ('../config.php');
                                $query="SELECT * FROM RideCategory";
                                $result =queryRunner($query);
                                ?>
                                <label for="ride-category-select-id" class="customer-add-input-label txt-regular upload-input-label">Ride Category</label>

                                <select class="form-control city_select" id="ride-category-select-edit-id">
                                    <option value="">Select Ride Category</option>
                                    <?php while($row=rowRetriever($result)){
                                        ?>

                                        <option value="<?=$row['id']; ?>"><?=$row['name']; ?></option>
                                        <?php

                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="form-group">


                                <?php
                                //include_once ('../config.php');
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
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Tagline</label>
                            <input type="text" id="addpro_cat" name="tagline" placeholder="Enter  tagline" value=""
                                class="customer-add-input tagline_edit w-100" />
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
                            <button type="button"  class="btn btn-primary ride_type_edit_button">
                                <img src="../public/image/tick (1).png" alt="" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
<input type="hidden" id="ride-type-id">
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
            $(".sidebar_ride_type").addClass("active");
        </script>

        <script>

            $(document).ready(function () {
                retrieveallRideTypes();
                // var str = "foo/bar/test.html";
                // var lastSlash = str.lastIndexOf("/");
                // alert(str.substring(lastSlash+1));

                function retrieveallRideTypes(search = '',country_id= '',city_id='') {
                    sendRequest("?action_type=retrieve&request_type=ride_type&functionality_type=retrieve_all_ride_types", {

                            search: search,
                            country_id:country_id,
                            city_id:city_id,

                        }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {
                                $(".pagination").html(data.pagination);
                                $("#ride-type-table-body-id").empty();
                                var list = data.listOfData;

                                for (var i = 0; i < list.length; i++) {

                                    var n = list[i].id;
                                    var name = list[i].name;
                                    var ride_category = list[i].ride_category;
                                    var tagline = list[i].tagline;
                                    var city_name = list[i].city_name;
                                    var picture = list[i].picture;
                                    var country_name = list[i].country_name;
                                    var currency_symbol = list[i].currency_symbol;
                                    var price = list[i].price;
                                    var waiting_charges = list[i].waiting_charges;
                                    var waiting_time = list[i].waiting_time;

                                    var distance_condition = list[i].distance_condition;
                                    var enable = list[i].enable;


                                    var checked = "";
                                    if (enable == 0) {

                                        checked = "value='0'";
                                    } else {

                                        checked = "value='1'  checked";
                                    }



                                    var text = "<tr id=\"ride-type-table-row-"+n+"\">\n" +
                                        "                                                <td class=\"payment_td\"><img src=\""+picture+"\" alt=\"\"></td>\n" +
                                        "                                                <td><span>"+name+"</span>\n" +
                                        "                                                </td>\n" +
                                        "                                                <td>"+currency_symbol+""+price+"/"+distance_condition+"Km</td>\n" +
                                        "                                                <td>"+waiting_charges+"/"+waiting_time+"</td>\n" +
                                        "                                                <td>"+ride_category+"</td>\n" +
                                        "                                                <td>"+country_name+"</td>\n" +
                                        "                                                <td>"+city_name+"</td>\n" +
                                        "                                              \n" +
                                        "                                                <td>"+tagline+"</td>\n" +
                                        "\n" +
                                        "                                                <td>\n" +
                                        "                                                    <div class=\"\">\n" +
                                        "                                                        <button data-toggle=\"modal\" data-id=\""+n+"\"  id=\"editmodal\"\n" +
                                        "                                                            type=\"button\"\n" +
                                        "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\">\n" +
                                        "                                                            <i class=\"fas fa-pencil-alt fa-pencil-alt2 mt-0\"></i>\n" +
                                        "                                                        </button>\n" +
                                        "                                                        <button type=\"button\"\n" +
                                        "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\" onclick=\"deleteRideType("+n+")\">\n" +
                                        "                                                            <i class=\"far fa-trash-alt fa-trash-alt2 mt-0\"></i>\n" +
                                        "                                                        </button>\n" +
                                        "                                                    </div>\n" +
                                        "                                                </td>\n" +
                                        "                                                <td>\n" +
                                        "                                                    <label class=\"switch\">\n" +
                                        "                                                        <input type=\"checkbox\" data-id=\""+n+"\" class=\"Ride_type_switch\" id=\"enable-switch-"+n+"\" "+checked+">\n" +
                                        "                                                        <span class=\"slider round\"></span>\n" +
                                        "                                                    </label>\n" +
                                        "\n" +
                                        "                                                </td>\n" +
                                        "\n" +
                                        "\n" +
                                        "                                            </tr>";
                                    $("#ride-type-table-body-id").append(text);
                                }



                            } else if (data.code == "206") {
                                console.log("Failed to Delete");
                            }

                        })
                        .catch((error) => {
                            console.log(error)
                        });
                }

                $('#ride-type-search').keyup(function () {
                    var search = $(this).val();
                    var country_id = $("#country-select-id").val();
                    var city_id = $("#city-select-id").val();

                    retrieveallRideTypes(search,country_id,city_id);
                    // console.log(query)
                });


                $('#city-select-id').change(function () {
                    var city_id = $(this).val();
                    var country_id = $("#country-select-id").val();
                    var search = $('#city-search').val();
                    retrieveallRideTypes(search,country_id,city_id);
                    // console.log(search)
                });

                $('#country-select-id').change(function () {
                    var country_id = $(this).val();
                    var city_id = $("#city-select-id").val();
                    var search = $('#city-search').val();
                    retrieveallRideTypes(search,country_id,city_id);
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

                $(document).on('change', '.Ride_type_switch', function () {

                    var id = $(this).data('id');
                    var enable_val;
                    if ($("#enable-switch-" + id).is(':checked')) {
                        $("#enable-switch-" + id).val(1);
                        enable_val = "1";
                    } else {
                        $("#enable-switch-" + id).val(0);
                        enable_val = "0";
                    }


                    sendRequest("?action_type=update&request_type=ride_type&functionality_type=enable_ride_type", {
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


                    sendRequest("?action_type=retrieve&request_type=ride_type&functionality_type=retrieve_edit_all_ride_type", {
                        id: id,
                        // enable: enable_val,
                    }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {

                                var list = data.listOfData;

                                for (var i = 0; i < list.length; i++) {

                                    var n = list[i].id;
                                    var name = list[i].name;
                                    var ride_category = list[i].ride_category;
                                    var tagline = list[i].tagline;
                                    var city_name = list[i].city_name;
                                    var picture = list[i].picture;
                                    var country_name = list[i].country_name;
                                    var currency_symbol = list[i].currency_symbol;
                                    var price = list[i].price;
                                    var waiting_charges = list[i].waiting_charges;
                                    var waiting_time = list[i].waiting_time;
                                    var ride_cat_id = list[i].ride_cat_id;
                                    var cou_id = list[i].cou_id;
                                    var loc_id = list[i].loc_id;

                                    var distance_condition = list[i].distance_condition;
                                    var enable = list[i].enable;
                                    $("#ride-type-id").val(n);
                                    $(".ride_name_edit").val(name);
                                    $(".tagline_edit").val(tagline);
                                    $(".price_distance_edit").val(price +"/"+distance_condition);
                                    $(".wating_price_condition_edit").val(waiting_charges +"/"+waiting_time);


                                    $("#ride-category-select-edit-id").val(ride_cat_id);
                                    $("#ride-category-select-edit-id").trigger('change');

                                    $("#ride-edit-country-select-id").val(cou_id);
                                    $("#ride-edit-country-select-id").trigger('change');
                                    setTimeout(function(){
                                        $("#ride-edit-city-select-id").val(loc_id);
                                        $("#ride-edit-city-select-id").trigger('click');
                                    }, 500);
                                    $(".image-upload-wrap4").hide();
                                    $(".file-upload-content4").show();
                                    $(".file-upload-image4").attr('src',picture);



                                    $("#add_payment_modal_edit").modal('show');
                                }

                            }


                        })
                        .catch((error) => {
                            console.log(error)
                        })

                });

                $(document).on('click', '.ride_type_edit_button', function () {

                   var id = $("#ride-type-id").val();
                   var name =  $(".ride_name_edit").val();
                   var tagline = $(".tagline_edit").val();
                  var ride_category_id= $("#ride-category-select-edit-id").val();
                  var country_id =$("#ride-edit-country-select-id").val();
                    var city_id= $("#ride-edit-city-select-id").val();
                    var imges=$(".file-upload-image4").attr('src');
                    var str = $(".price_distance_edit").val();

                    var lastSlash = str.indexOf("/");
                    var price ="";
                    var distance="";
                    var watting_price="";
                    var watting_time="";

                    if(lastSlash == lastSlash){
                        price = str.substring(0, lastSlash);
                        // alert(price);
                        distance = str.substring(lastSlash+1, str.length);
                        // alert(distance);
                    }

                    var str2= $(".wating_price_condition_edit").val();
                    var lastSlash2 = str2.indexOf("/");
                    if(lastSlash2 == lastSlash2){
                        watting_price = str2.substring(0, lastSlash2);
                        // alert(watting_price);
                        watting_time = str2.substring(lastSlash2+1, str2.length);
                        // alert(watting_time);
                    }



                    sendRequest("?action_type=update&request_type=ride_type&functionality_type=update_ride_type", {
                        id: id,
                        country_id:country_id,
                        ride_type_name:name,
                        ride_type_tagline:tagline,
                        ride_type_price:price,
                        ride_type_condition:distance,
                        ride_type_category_id:ride_category_id,
                        ride_type_city_id:city_id,
                        watting_price:watting_price,
                        watting_time:watting_time,
                        images:imges


                    }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {
                                $("#add_payment_modal_edit").modal('hide');
                                retrieveallRideTypes();
                                $(".image-upload-wrap4").show();
                                $(".file-upload-content4").hide();

                            }


                        })
                        .catch((error) => {
                            console.log(error)
                        })

                });

                $(document).on('click', '.ride_type_add_button', function () {


                    var name =  $(".ride_type_name_add").val();
                    var tagline = $(".ride_tagline_add").val();
                    var ride_category_id= $("#ride-category-select-id").val();
                    var country_id =$("#ride-add-country-select-id").val();
                    var city_id= $("#ride-add-city-select-id").val();
                    var imges=$(".file-upload-image4").attr('src');
                    var str = $(".ride_price_distance_add").val();

                    var lastSlash = str.indexOf("/");
                    var price ="";
                    var distance="";
                    var watting_price="";
                    var watting_time="";

                    if(lastSlash == lastSlash){
                        price = str.substring(0, lastSlash);
                        // alert(price);
                        distance = str.substring(lastSlash+1, str.length);
                        // alert(distance);
                    }

                    var str2= $(".ride_watting_condition_add").val();
                    var lastSlash2 = str2.indexOf("/");
                    if(lastSlash2 == lastSlash2){
                        watting_price = str2.substring(0, lastSlash2);
                        // alert(watting_price);
                        watting_time = str2.substring(lastSlash2+1, str2.length);
                        // alert(watting_time);
                    }

                    sendRequest("?action_type=create&request_type=ride_type&functionality_type=insert_ride_type", {
                        country_id:country_id,
                        ride_type_name:name,
                        ride_type_tagline:tagline,
                        ride_type_price:price,
                        ride_type_condition:distance,
                        ride_type_category_id:ride_category_id,
                        ride_type_city_id:city_id,
                        watting_price:watting_price,
                        watting_time:watting_time,
                        images:imges

                    }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {
                                $("#add_payment_modal").modal('hide');
                                retrieveallRideTypes();
                                $(".image-upload-wrap4").show();
                                $(".file-upload-content4").hide();

                            }


                        })
                        .catch((error) => {
                            console.log(error)
                        })

                });
            });

            function deleteRideType(id) {
                var del_id =id;

                sendRequest("?action_type=delete&request_type=ride_type&functionality_type=delete_ride_type", {
                    id:del_id,




                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if(data.code == "202"){
                            $("#ride-type-table-row-"+del_id).remove();

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
                var search = $("#ride-type-search").val();
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
                sendRequest("?action_type=retrieve&request_type=ride_type&functionality_type=pagination", {
                    offset:offset,
                    search:search,
                    country_id:country,
                    city_id:city,


                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {
                            // $(".pagination").html(data.pagination);
                            // $("#paginate").html(data.htmlData);
                            $("#ride-type-table-body-id").empty();
                            var list = data.listOfData;

                            for (var i = 0; i < list.length; i++) {

                                var n = list[i].id;
                                var name = list[i].name;
                                var ride_category = list[i].ride_category;
                                var tagline = list[i].tagline;
                                var city_name = list[i].city_name;
                                var picture = list[i].picture;
                                var country_name = list[i].country_name;
                                var currency_symbol = list[i].currency_symbol;
                                var price = list[i].price;
                                var waiting_charges = list[i].waiting_charges;
                                var waiting_time = list[i].waiting_time;

                                var distance_condition = list[i].distance_condition;
                                var enable = list[i].enable;


                                var checked = "";
                                if (enable == 0) {

                                    checked = "value='0'";
                                } else {

                                    checked = "value='1'  checked";
                                }



                                var text = "<tr id=\"ride-type-table-row-"+n+"\">\n" +
                                    "                                                <td class=\"payment_td\"><img src=\""+picture+"\" alt=\"\"></td>\n" +
                                    "                                                <td><span>"+name+"</span>\n" +
                                    "                                                </td>\n" +
                                    "                                                <td>"+currency_symbol+""+price+"/"+distance_condition+"Km</td>\n" +
                                    "                                                <td>"+waiting_charges+"/"+waiting_time+"</td>\n" +
                                    "                                                <td>"+ride_category+"</td>\n" +
                                    "                                                <td>"+country_name+"</td>\n" +
                                    "                                                <td>"+city_name+"</td>\n" +
                                    "                                              \n" +
                                    "                                                <td>"+tagline+"</td>\n" +
                                    "\n" +
                                    "                                                <td>\n" +
                                    "                                                    <div class=\"\">\n" +
                                    "                                                        <button data-toggle=\"modal\" data-id=\""+n+"\"  id=\"editmodal\"\n" +
                                    "                                                            type=\"button\"\n" +
                                    "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\">\n" +
                                    "                                                            <i class=\"fas fa-pencil-alt fa-pencil-alt2 mt-0\"></i>\n" +
                                    "                                                        </button>\n" +
                                    "                                                        <button type=\"button\"\n" +
                                    "                                                            class=\"btn btn-outline-white2 btn-rounded btn-sm\" onclick=\"deleteRideType("+n+")\">\n" +
                                    "                                                            <i class=\"far fa-trash-alt fa-trash-alt2 mt-0\"></i>\n" +
                                    "                                                        </button>\n" +
                                    "                                                    </div>\n" +
                                    "                                                </td>\n" +
                                    "                                                <td>\n" +
                                    "                                                    <label class=\"switch\">\n" +
                                    "                                                        <input type=\"checkbox\" data-id=\""+n+"\" class=\"Ride_type_switch\" id=\"enable-switch-"+n+"\" "+checked+">\n" +
                                    "                                                        <span class=\"slider round\"></span>\n" +
                                    "                                                    </label>\n" +
                                    "\n" +
                                    "                                                </td>\n" +
                                    "\n" +
                                    "\n" +
                                    "                                            </tr>";
                                $("#ride-type-table-body-id").append(text);
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