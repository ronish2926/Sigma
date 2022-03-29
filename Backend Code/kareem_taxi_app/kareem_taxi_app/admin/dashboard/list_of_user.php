
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>List of Users</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Kufam:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../public/css/main.css" rel="stylesheet">
    <style>
        .addpro_cat {
            border-radius: 8px;
            border: solid 1px #d8d8d8;
            /* border: 1px solid #d9e1ec; */
            height: 34px;
            padding: 10px;
            font-size: 10px;
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


            <div class="cards">
                <div class="row" id="main-section-page">

                    <div class="col-md-12">
                        <div class="page_name_candidate d-flex justify-content-center">
                            <div class="candidate_div">
                                <h1 id="city-heading-left">List Of User</h1>

                            </div>
                            <div class="select_sort_second mt-4">

                                <div class="sort_btn">


                                    <!--<a href="" id="add-buttons-top"  data-toggle="modal" data-target="#add_payment_modal"><span
                                            class="span_btn"><svg width="12px" height="12px" viewBox="0 0 18 18"
                                                                  version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                  xmlns="http://www.w3.org/2000/svg">
                                    <desc>Created with Lunacy</desc>
                                    <path
                                        d="M10 8L17 8C17.5523 8 18 8.44772 18 9C18 9.55229 17.5523 10 17 10L10 10L10 17C10 17.5523 9.55229 18 9 18C8.44772 18 8 17.5523 8 17L8 10L1 10C0.447715 10 0 9.55229 0 9C0 8.44772 0.447715 8 1 8L8 8L8 1C8 0.447715 8.44772 0 9 0C9.55229 0 10 0.447715 10 1L10 8Z"
                                        id="Path" fill="#FFFFFF" stroke="none" />
                                </svg></span>Add</a>-->

                                </div>
                            </div>



                        </div>
                    </div>

                    <div class="col-xl-12  mt-3 mb-3">
                        <div class="card payment_method_card candidate">
                            <div class="card-body ">
                                <div class="pagination_table">
                                    <div class="results mb-3">

                                    </div>
                                    <div class="page">
                                        <div class="page_filter">

                                        </div>

                                        <span class="page_head">Results Per Page</span>
                                        <ul class="pagination pagination-sm">
                                        </ul>

                                    </div>
                                </div>
                                <div class="search_product">

                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fas fa-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="user-search"
                                               placeholder="Searching for.." aria-label="Username"
                                               aria-describedby="basic-addon1">
                                    </div>


                                </div>

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                        <th>Enable</th>


                                    </tr>
                                    </thead>
                                    <tbody id="all-city-table-body">
                                    <tr>

                                        <td><span>Elston Gullan</span></td>
                                        <td>92</td>
                                        <td>$</td>
                                        <td>20%</td>
                                        <td>paypal</td>
                                        <td>
                                            <div class="">
                                                <button data-toggle="modal"
                                                        data-target="#add_payment_modal_edit" id="editmodal"
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
                                                <button data-toggle="modal"
                                                        data-target="#add_payment_modal_edit" id="editmodal"
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
                                                <button data-toggle="modal"
                                                        data-target="#add_payment_modal_edit" id="editmodal"
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
                                                <button data-toggle="modal"
                                                        data-target="#add_payment_modal_edit" id="editmodal"
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
                                                <button data-toggle="modal"
                                                        data-target="#add_payment_modal_edit" id="editmodal"
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
    <form class="childcatagories_modal_from"  action="">
        <div class="modal fade" id="add_payment_modal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header mh">
                        <button type="button" class="close closmodel" data-dismiss="modal" aria-label="Close"
                        >
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
                            <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">First Name</label>
                            <input type="text" placeholder="Enter First Name" value=""
                                   class="customer-add-input user_first_name_add addpro_cat w-100" />
                        </div>
                        <div class="form-group">
                            <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Last Name</label>
                            <input type="text" placeholder="Enter Last Name" value=""
                                   class="customer-add-input user_last_name_add addpro_cat w-100" />
                        </div>
                        <div class="form-group">
                            <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Password</label>
                            <input type="password" placeholder="Enter Password" value=""
                                   class="customer-add-input user_password_add addpro_cat w-100" />
                        </div>
                        <div class="form-group">
                            <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Email</label>
                            <input type="email" placeholder="Enter Email" value=""
                                   class="customer-add-input user_email_add addpro_cat w-100" />
                        </div>

                        <div class="form-group">
                            <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Phone No</label>
                            <input type="text" placeholder="Enter Phone No" value=""
                                   class="customer-add-input user_phone_no_add addpro_cat w-100" />
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
                        <button type="button" class="btn btn-primary payment_add_button">
                            <img src="../public/image/tick (1).png" alt="" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- edit modal -->
    <form class="childcatagories_modal_from" action="">
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
                            <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">First Name</label>
                            <input type="text" placeholder="Enter First Name" value=""
                                   class="customer-add-input user_first_name_edit addpro_cat w-100" />
                        </div>
                        <div class="form-group">
                            <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Last Name</label>
                            <input type="text" placeholder="Enter Last Name" value=""
                                   class="customer-add-input user_last_name_edit addpro_cat w-100" />
                        </div>
                        <div class="form-group">
                            <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Password</label>
                            <input type="password" placeholder="Enter Password" value=""
                                   class="customer-add-input user_password_edit addpro_cat w-100" />
                        </div>
                        <div class="form-group">
                            <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Email</label>
                            <input type="email" placeholder="Enter Email" value=""
                                   class="customer-add-input user_email_edit addpro_cat w-100" />
                        </div>

                        <div class="form-group">
                            <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">Phone No</label>
                            <input type="text" placeholder="Enter Phone No" value=""
                                   class="customer-add-input user_phone_no_edit addpro_cat w-100" />
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
                        <button type="button"  class="btn btn-primary city_edit_button">
                            <img src="../public/image/tick (1).png" alt="" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <input type="hidden" id="country-id">
    <input type="hidden" id="user-id">
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
        $(".sidebar_user").addClass("active");
    </script>

    <script>

        $(document).ready(function () {
            retriveUserList();
            function retriveUserList(search= ""){



                sendRequest("?action_type=retrieve&request_type=all_user&functionality_type=retrieve_all_users", {
                    search: search,

                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {
                            $(".pagination").html(data.pagination);
                            $("#all-city-table-body").empty();
                            var list = data.listOfData;

                            for (var i = 0; i < list.length; i++) {

                                var n = list[i].id;
                                var first_name = list[i].first_name;
                                var last_name = list[i].last_name;
                                var phone = list[i].phone;
                                var email = list[i].email;
                                var image = list[i].image;
                                var enable = list[i].enable;


                                var checked = "";
                                if (enable == 0) {

                                    checked = "value='0'";
                                } else {

                                    checked = "value='1'  checked";
                                }



/*<img src="${image}" alt="">*/

                                const text = `<tr id="user-row-${n}" >

                                                    <td><span>${first_name} ${last_name}</span></td>
                                                    <td>${email}</td>
                                                     <td>${phone}</td>

                                                    <td>

                                                        <div class="">
                                                            <button  data-id ="${n}" id="editmodal" type="button" class="btn btn-outline-white2 btn-rounded btn-sm">
                                                                <i class="fas fa-pencil-alt fa-pencil-alt2 mt-0"></i>
                                                            </button>
                                                            <button type="button" onclick="DeleteUser(${n});" class="btn btn-outline-white2 btn-rounded btn-sm">
                                                                <i class="far fa-trash-alt fa-trash-alt2 mt-0"></i>
                                                            </button>

                                                        </div>
                                                    </td>

                                                <td class="resandunres">

                                                    <label class="switch">
                                                        <input type="checkbox" data-id="${n}" id="enable-switch-${n}" class="user_switch" ${checked}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>





                                            </tr>`;
                                $("#all-city-table-body").append(text);
                            }



                        } else if (data.code == "206") {
                            console.log("Failed to Delete");
                        }

                    })
                    .catch((error) => {
                        console.log(error)
                    });

            }


            $('#user-search').keyup(function () {
                var search = $(this).val();

                retriveUserList(search);
                // console.log(query)
            });

            $("#add-buttons-top").click(function(){
                $(".image-upload-wrap4").show();
                $(".file-upload-content4").hide();
            });


            $(document).on('change', '.user_switch', function () {

                var id = $(this).data('id');
                var enable_val;
                if ($("#enable-switch-" + id).is(':checked')) {
                    $("#enable-switch-" + id).val(1);
                    enable_val = "1";
                } else {
                    $("#enable-switch-" + id).val(0);
                    enable_val = "0";
                }


                sendRequest("?action_type=update&request_type=all_user&functionality_type=enable_user", {
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

            $(document).on('change', '#country_selector_modal', function () {

                var id = $(this).val();
                $('.city_clas').show();
                // alert(id);


                sendRequest(
                    adminAllCitiesUrl, {
                        countryId: id,
                    }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {

                            $("#city_selector_modal").empty();
                            var list = data.listOfData;

                            for (var i = 0; i < list.length; i++) {

                                var n = list[i].id;
                                var city_name = list[i].city_name;
                                // var country_name = list[i].country_detail.country_name;
                                var enable = list[i].enable;


                                var checked = "";
                                if (enable == 0) {

                                    checked = "value='0'";
                                } else {

                                    checked = "value='1'  checked";
                                }

                                if(i == 0){
                                    const text = `<option value="">Select City</option>`;
                                    $("#city_selector_modal").append(text);
                                }
                                const text = `<option value="${n}">${city_name}</option>`;
                                $("#city_selector_modal").append(text);



                            }

                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })

            });

            $(document).on('change', '#country_selector_modal_edit', function () {

                var id = $(this).val();
                $('.city_clas_edit').show();
                // alert(id);


                sendRequest(
                    adminAllCitiesUrl, {
                        countryId: id,
                    }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {

                            $("#city_selector_modal_edit").empty();
                            var list = data.listOfData;

                            for (var i = 0; i < list.length; i++) {

                                var n = list[i].id;
                                var city_name = list[i].city_name;
                                // var country_name = list[i].country_detail.country_name;
                                var enable = list[i].enable;


                                var checked = "";
                                if (enable == 0) {

                                    checked = "value='0'";
                                } else {

                                    checked = "value='1'  checked";
                                }

                                if(i == 0){
                                    const text = `<option value="">Select City</option>`;
                                    $("#city_selector_modal_edit").append(text);
                                }
                                const text = `<option value="${n}">${city_name}</option>`;
                                $("#city_selector_modal_edit").append(text);



                            }

                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })

            });

            $(document).on('click', '#editmodal', function () {

                var id = $(this).data('id');


                sendRequest("?action_type=retrieve&request_type=all_user&functionality_type=retrieve_edit_single_user", {
                        id: id,
                        // enable: enable_val,
                    }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {

                            var list = data.listOfData;

                            for (var i = 0; i < list.length; i++) {

                                var n = list[i].id;
                                var first_name = list[i].first_name;
                                var last_name = list[i].last_name;
                                var phone = list[i].phone;
                                var password = list[i].password;
                                var email = list[i].email;
                                var image = list[i].image;
                                var enable = list[i].enable;

                                $("#user-id").val(n);
                                $(".user_first_name_edit").val(first_name);
                                $(".user_last_name_edit").val(last_name);
                                $(".user_phone_no_edit").val(phone);
                                $(".user_email_edit").val(email);
                                $(".user_password_edit").val(password);



                                $(".image-upload-wrap4").hide();
                                $(".file-upload-content4").show();
                                var img = $(".file-upload-image4").attr('src',image);





                                $("#add_payment_modal_edit").modal('show');


                            }



                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })

            });

            $(document).on('click', '.city_edit_button', function () {

                var id = $("#user-id").val();

                var first_name = $(".user_first_name_edit").val();
                var last_name = $(".user_last_name_edit").val();
                var password = $(".user_password_edit").val();
                var email = $(".user_email_edit").val();
                var phone_no = $(".user_phone_no_edit").val();
                $(".image-upload-wrap4").hide();
                $(".file-upload-content4").show();
                var img = $(".file-upload-image4").attr('src');

                sendRequest("?action_type=update&request_type=all_user&functionality_type=update_user_detail", {
                        id: id,
                        first_name: first_name,
                        password:password,
                        last_name: last_name,
                        email: email,
                        phone_no: phone_no,
                        image: img,


                    }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {
                            $("#add_payment_modal_edit").modal('hide');
                            retriveUserList();
                            // $(".image-upload-wrap4").show();
                            // $(".file-upload-content4").hide();

                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })

            });

            $(document).on('click', '.payment_add_button', function () {

                // var id= $("#country-id").val();


                var first_name = $(".user_first_name_add").val();
                var last_name = $(".user_last_name_add").val();
                var password = $(".user_password_add").val();
                var email = $(".user_email_add").val();
                var phone_no = $(".user_phone_no_add").val();
                $(".image-upload-wrap4").hide();
                $(".file-upload-content4").show();
                var img = $(".file-upload-image4").attr('src');


                sendRequest("?action_type=create&request_type=all_user&functionality_type=add_user", {
                        first_name: first_name,
                        password:password,
                        last_name: last_name,
                        email: email,
                        phone_no: phone_no,
                        image: img,



                    }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {
                            $("#add_payment_modal").modal('hide');
                            retriveUserList();
                            $(".user_first_name_add").val("");
                            $(".user_last_name_add").val("");
                            $(".user_email_add").val("");
                            $(".user_phone_no_add").val("");
                            $(".image-upload-wrap4").show();
                            $(".file-upload-content4").hide();

                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })

            });
        });




        function DeleteUser (id) {
            var del_id =id;

            sendRequest("?action_type=delete&request_type=all_user&functionality_type=delete_user", {
                id:del_id,




            }, "POST")
                .then((data) => {
                    var data = JSON.parse(data);
                    if(data.code == "202"){
                        $("#user-row-"+del_id).remove();

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
            var search = $("#user-search").val();


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
            sendRequest("?action_type=retrieve&request_type=all_user&functionality_type=pagination", {
                offset:offset,
                search: search,

            }, "POST")
                .then((data) => {
                    var data = JSON.parse(data);
                    if (data.code == "202") {
                        // $(".pagination").html(data.pagination);
                        $("#all-city-table-body").empty();
                        var list = data.listOfData;

                        for (var i = 0; i < list.length; i++) {

                            var n = list[i].id;
                            var first_name = list[i].first_name;
                            var last_name = list[i].last_name;
                            var phone = list[i].phone;
                            var email = list[i].email;
                            var image = list[i].image;
                            var enable = list[i].enable;


                            var checked = "";
                            if (enable == 0) {

                                checked = "value='0'";
                            } else {

                                checked = "value='1'  checked";
                            }



                            const text = `<tr id="user-row-${n}" >

                                                    <td><img src="${image}" alt=""><span>${first_name} ${last_name}</span></td>
                                                    <td>${email}</td>
                                                     <td>${phone}</td>

                                                    <td>

                                                        <div class="">
                                                            <button  data-id ="${n}" id="editmodal" type="button" class="btn btn-outline-white2 btn-rounded btn-sm">
                                                                <i class="fas fa-pencil-alt fa-pencil-alt2 mt-0"></i>
                                                            </button>
                                                            <button type="button" onclick="DeleteUser(${n});" class="btn btn-outline-white2 btn-rounded btn-sm">
                                                                <i class="far fa-trash-alt fa-trash-alt2 mt-0"></i>
                                                            </button>

                                                        </div>
                                                    </td>

                                                <td class="resandunres">

                                                    <label class="switch">
                                                        <input type="checkbox" data-id="${n}" id="enable-switch-${n}" class="user_switch" ${checked}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>





                                            </tr>`;
                            $("#all-city-table-body").append(text);
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