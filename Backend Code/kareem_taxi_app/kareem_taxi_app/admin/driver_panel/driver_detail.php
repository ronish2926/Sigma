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

    <title>Driver Detail</title>

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
    <link href="../public/css/modal.css" rel="stylesheet">

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
                        <a class="nav-link " href="profile.php">Profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="detail_table.php">All Rides</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="driver_detail.php">Detail</a>
                    </li>

                </ul>
            </div>

            <div class="container">
                <div class="page_name_candidate">
                    <div class="candidate_div">
                        <h1>Driver Detail</h1>
                    </div>
                    <!-- <div class="select_sort_second">

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
                    </div> -->
                </div>
                <div class="card driver_detail_card">
                    <div class="card-body">
                        <div class="driver_name_detail">
                            <div class="img_detail">
                                <img id="cap-image" src="../public/image/person.jpg" alt="">
                                <div class="detail">
                                    <h1 id="cap-name">Jill Jonson <span>(Free)</span></h1>
                                    <p>
                                        <span class="span_rat">4.5</span>
                                        <span class="fa fa-star checked cap_rating_1"></span>
                                        <span class="fa fa-star checked cap_rating_2"></span>
                                        <span class="fa fa-star checked cap_rating_3"></span>
                                        <span class="fa fa-star cap_rating_4"></span>
                                        <span class="fa fa-star cap_rating_5"></span>
                                    </p>
                                </div>

                            </div>
                            <div class="detail_edit">
                                <span onclick="detail_edit_update()"><i class="far fa-edit"></i></span>
                                <!--                                <span><i class="fas fa-redo-alt"></i></span>-->
                                <!--                                <span><i class="fas fa-times"></i></span>-->
                            </div>
                        </div>
                        <div class="Completed_collapse_record">
                            <div class="start">
                                <h1>Driver Phone</h1>
                                <h2 id="cap-phone">+380-965-73-80</h2>
                            </div>
                            <div class="start">
                                <h1>Location</h1>
                                <h2 id="cap-address">UK, London</h2>
                            </div>
                            <div class="start">
                                <h1>Total Trips</h1>
                                <h2 id="cap-trips">109335598</h2>
                            </div>
                            <div class="start">
                                <h1>Car Number</h1>
                                <h2 id="cap-car-no">Do-UH-124FI</h2>
                            </div>
                            <div class="start">
                                <h1>Ride Category</h1>
                                <h2 id="cap-ride-category">Standard</h2>
                            </div>
                            <div class="start">
                                <h1>Drivers Email</h1>
                                <h2 id="cap-email">jil3455@gmail.com</h2>
                            </div>
                            <div class="start">
                                <h1>Ride Type</h1>
                                <h2 id="cap-ride-type">10 Years</h2>
                            </div>
                            <div class="start">
                                <h1>Total revenue</h1>
                                <h2 id="cap-total-revenue">$447457</h2>
                            </div>
                            <div class="start">
                                <h1>Car modal</h1>
                                <h2 id="cap-car-modal">Mersedes benz</h2>
                            </div>
                            <div class="start common">
                                <div class="form-group">
                                    <h1>Status</h1>
                                    <h2 id="driver_detil_status">Mersedes benz</h2>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="card driver_more_detail_card mt-3 mb-3">
                    <div class="card-body">
                        <div class="detail_edit">
                            <a href="#" id="new-page-link"> <span data-toggle="modal" data-id="1" id="edit-modal-span" data-target=""><i class="far fa-edit"></i></span></a>

                        </div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link  active"  onclick="EditInfo(1)" data-toggle="tab" href="#Document">Document Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" onclick="EditInfo(2)" href="#cnic_detail">CNIC info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="EditInfo(3)" data-toggle="tab" href="#bank_detail">Bank Detail</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="EditInfo(4)" data-toggle="tab" href="#Car_detail">Car Detail</a>
                            </li>



                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active container" id="Document">
                                <div class="complete_detail mt-3">
                                    <div class="docment_type">
                                        <div class="heading">
                                            <h1>Document Type</h1>
                                            <h1>Registration No</h1>
                                        </div>
                                        <div class="heading_name">
                                            <h2>Driving License Documents</h2>
                                            <h2 id="cap-registration">
                                                MA-23-342233
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="docment_type">
                                        <div class="heading">
                                            <h1>Date of Issue</h1>
                                            <h1>Date of Expiry</h1>
                                        </div>
                                        <div class="heading_name">
                                            <h2 id="cap-licence-issue">june 13,2020</h2>
                                            <h2 id="cap-lecence-expiry">
                                                june 13,2025
                                            </h2>
                                        </div>
                                    </div>

                                </div>
                                <h1 class="attch_head mt-3">Attachments</h1>
                                <div class="attachments doc_detail_attach mt-3">

                                    <div class="first_attachment">
                                        <span class="span_img"><i class="fas fa-paperclip"></i></span><span class="span_text">Dummy Document Name</span>  <span class="span_icon"><i class="fas fa-times"></i></span>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane container" id="cnic_detail">
                                <div class="complete_detail mt-3">
                                    <div class="docment_type">
                                        <div class="heading">
                                            <h1>Document Type</h1>
                                            <h1>Registration No</h1>
                                        </div>
                                        <div class="heading_name">
                                            <h2>CNIC Detail</h2>
                                            <h2 id="cap-cnic-reg">
                                                MA-23-342233
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="docment_type">
                                        <div class="heading">
                                            <h1>Date of Issue</h1>
                                            <h1>Date of Expiry</h1>
                                        </div>
                                        <div class="heading_name">
                                            <h2 id="cap-cnic-issue">june 13,2020</h2>
                                            <h2 id="cap-cnic-expiry">
                                                june 13,2025
                                            </h2 >
                                        </div>
                                    </div>

                                </div>
                                <h1 class="attch_head mt-3">Attachments</h1>
                                <div class="attachments cnic_attachment mt-3">
                                    <div class="first_attachment">
                                        <span class="span_img"><i class="fas fa-paperclip"></i></span><span class="span_text">Dummy Document Name</span>  <span class="span_icon"><i class="fas fa-times"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container" id="bank_detail">
                                <div class="complete_detail mt-3">
                                    <div class="docment_type">
                                        <div class="heading">
                                            <h1>Holder Name</h1>
                                            <h1>Account No</h1>
                                            <h1>IBAN No</h1>
                                        </div>
                                        <div class="heading_name">
                                            <h2 id="cap-holder-name">JIll jonson</h2>
                                            <h2 id="cap-acount-no">
                                                MA-23-342233
                                            </h2>
                                            <h2 id="cap-iban-no">242342-24234-23</h2>
                                        </div>
                                    </div>
                                    <div class="docment_type">
                                        <div class="heading">
                                            <h1>Bank Name</h1>
                                            <h1>Branch Code</h1>
                                        </div>
                                        <div class="heading_name">
                                            <h2 id="cap-bank-name">Allied Bank</h2>
                                            <h2 id="cap-bank-branch-code">
                                                33343
                                            </h2>
                                        </div>
                                    </div>

                                </div>
                                <h1 class="attch_head mt-3">Attachments</h1>
                                <div class="attachments bankdetail_attach mt-3">
                                    <div class="first_attachment">
                                        <span class="span_img"><i class="fas fa-paperclip"></i></span><span class="span_text">Dummy Document Name</span>  <span class="span_icon"><i class="fas fa-times"></i></span>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane container" id="Car_detail">
                                <div class="complete_detail mt-3">
                                    <div class="docment_type">
                                        <div class="heading">
                                            <h1>Brand</h1>
                                            <h1>Color</h1>
                                            <h1>Car Type</h1>
                                        </div>
                                        <div class="heading_name">
                                            <h2 id="cap-car-brand">Mercedes</h2>
                                            <h2 id="cap-car-color">
                                                black
                                            </h2>
                                            <h2 id="cap-car-ride-type">standard</h2>
                                        </div>
                                    </div>
                                    <div class="docment_type">
                                        <div class="heading">
                                            <h1>Name</h1>
                                            <h1>Number Plate</h1>
                                            <h1>Ride Category</h1>
                                        </div>
                                        <div class="heading_name">
                                            <h2 id="cap-car-name">Mercedes</h2>
                                            <h2 id="cap-car-number-plate">
                                                34
                                            </h2>
                                            <h2 id="cap-car-ride-category">Standard</h2>
                                        </div>
                                    </div>

                                </div>
                                <h1 class="attch_head mt-3">Attachments (Car Picture)</h1>
                                <div class="attachments car_detail_Attachments mt-3">

                                    <div class="first_attachment">
                                        <span class="span_img"><i class="fas fa-paperclip"></i></span><span class="span_text">Dummy Document Name</span>  <span class="span_icon"><i class="fas fa-times"></i></span>
                                    </div>
                                </div>
                                <h1 class="attch_head mt-3">Attachments (car documents)</h1>
                                <div class="attachments car_doc  mt-3">

                                    <div class="first_attachment">
                                        <span class="span_img"><i class="fas fa-paperclip"></i></span><span class="span_text">Dummy Document Name</span>  <span class="span_icon"><i class="fas fa-times"></i></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- <h1>Customer Growth</h1> -->

                    </div>
                </div>
                <div class="card payment_method_card candidate">
                    <div class="card-body ">

                        <div class="pagination_table">
                            <div class="results">
                                <h1>Driver Detail</h1>

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

                                <th>Picture</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>waiting Price</th>
                                <th>Ride Category</th>
                                <th>Country</th>
                                <th>city</th>

                                <!--                                    <th>Tagline</th>-->
                                <th>Status</th>
                                <!--                                    <th>Enable</th>-->


                            </tr>
                            </thead>
                            <tbody id="driver-detail-table-body-id">
                           <!-- <tr>
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
                            </tr>-->
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

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
                                       class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Tag</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Tags" value=""
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

        <!--        document info modal-->
        <form class="childcatagories_modal_from" id="modal-form" action="">
            <div class="modal fade" id="add-document-modal" tabindex="-1" role="dialog"
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
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Rigistration No</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Rigistration No" value=""
                                       class="customer-add-input document_info_reg  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Date Issue</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Date Issue" value=""
                                       class="customer-add-input document_info_date_issue   w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Date Exipiry</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Date Expire" value=""
                                       class="customer-add-input document_info_date_expire   w-100" />
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
                                        <div class="image-upload-wrap">
                                            <input class="file-upload-input" type="file" onchange="readURL(this);"
                                                   accept="image/*" />
                                            <div class="drag-text">
                                                <div class="card-body upload-card-body4">
                                                    <div class="upload-img">
                                                        <img src="../public/image/upload.png" alt="" />
                                                    </div>
                                                    <div class="upload-image-format4">
                                                        <p>
                                                            .PDF .JPG .PNG .DOC
                                                        </p>
                                                    </div>
                                                    <div class="upload-detail4">
                                                        <h4>You can also upload files by</h4>
                                                        <div class="upload-clicking">
                                                            <a href="#" class="">Clicking here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="file-upload-content">
                                            <img class="file-upload-image" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload()"
                                                        class="btn remove-image">
                                                    Remove
                                                    <span class="image-title" style="display: none;">Uploaded
                                                        Image</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mf">
                            <button type="button" onclick="adddocumentedit()" class="btn btn-primary">
                                <img src="../public/image/tick (1).png" alt="" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--        cnic info modal -->
        <form class="childcatagories_modal_from" id="modal-form" action="">
            <div class="modal fade" id="add-cnic-modal" tabindex="-1" role="dialog"
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
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Rigistration No</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Rigistration No" value=""
                                       class="customer-add-input cnic_doc_reg  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Date Issue</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Date Issue" value=""
                                       class="customer-add-input cnic__date_issue   w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Date Exipiry</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Date Expire" value=""
                                       class="customer-add-input cnic_date_expire   w-100" />
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
                                        <div class="image-upload-wrap">
                                            <input class="file-upload-input" type="file" onchange="readURL(this);"
                                                   accept="image/*" />
                                            <div class="drag-text">
                                                <div class="card-body upload-card-body4">
                                                    <div class="upload-img">
                                                        <img src="../public/image/upload.png" alt="" />
                                                    </div>
                                                    <div class="upload-image-format4">
                                                        <p>
                                                            .PDF .JPG .PNG .DOC
                                                        </p>
                                                    </div>
                                                    <div class="upload-detail4">
                                                        <h4>You can also upload files by</h4>
                                                        <div class="upload-clicking">
                                                            <a href="#" class="">Clicking here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="file-upload-content">
                                            <img class="file-upload-image" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload()"
                                                        class="btn remove-image">
                                                    Remove
                                                    <span class="image-title" style="display: none;">Uploaded
                                                        Image</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mf">
                            <button type="button" onclick="addcnicedit()" class="btn btn-primary">
                                <img src="../public/image/tick (1).png" alt="" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--        Bank info modal -->
        <form class="childcatagories_modal_from" id="modal-form" action="">
            <div class="modal fade" id="add-bank-modal" tabindex="-1" role="dialog"
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
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Holder Name</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Rigistration No" value=""
                                       class="customer-add-input bank_holder_name  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Bank Name</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Date Issue" value=""
                                       class="customer-add-input bank_name   w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Account No</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Date Expire" value=""
                                       class="customer-add-input bank_account_no   w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Branch Code</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Date Expire" value=""
                                       class="customer-add-input bank_branch_code   w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> IBAN No</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Date Expire" value=""
                                       class="customer-add-input bank_iban_no   w-100" />
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
                                        <div class="image-upload-wrap">
                                            <input class="file-upload-input" type="file" onchange="readURL(this);"
                                                   accept="image/*" />
                                            <div class="drag-text">
                                                <div class="card-body upload-card-body4">
                                                    <div class="upload-img">
                                                        <img src="../public/image/upload.png" alt="" />
                                                    </div>
                                                    <div class="upload-image-format4">
                                                        <p>
                                                            .PDF .JPG .PNG .DOC
                                                        </p>
                                                    </div>
                                                    <div class="upload-detail4">
                                                        <h4>You can also upload files by</h4>
                                                        <div class="upload-clicking">
                                                            <a href="#" class="">Clicking here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="file-upload-content">
                                            <img class="file-upload-image" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload()"
                                                        class="btn remove-image">
                                                    Remove
                                                    <span class="image-title" style="display: none;">Uploaded
                                                        Image</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mf">
                            <button type="button" onclick="addbankEdit()" class="btn btn-primary">
                                <img src="../public/image/tick (1).png" alt="" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--        Car info modal -->
        <form class="childcatagories_modal_from" id="modal-form" action="">
            <div class="modal fade" id="add-car-modal" tabindex="-1" role="dialog"
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
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Brand Name</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Rigistration No" value=""
                                       class="customer-add-input car_brand_edit  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Car Name</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Date Issue" value=""
                                       class="customer-add-input bank_name car_name_edit  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label">  Car Color</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Date Expire" value=""
                                       class="customer-add-input bank_account_no car_color_edit  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Number Plate</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Date Expire" value=""
                                       class="customer-add-input bank_branch_code car_number_plate_edit  w-100" />
                            </div>
                            <!--                            <div class="form-group">-->
                            <!--                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Car Type</label>-->
                            <!--                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Date Expire" value=""-->
                            <!--                                       class="customer-add-input bank_iban_no car_type_edit  w-100" />-->
                            <!--                            </div>-->
                            <!--                            <div class="form-group">-->
                            <!--                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Ride Category</label>-->
                            <!--                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Date Expire" value=""-->
                            <!--                                       class="customer-add-input bank_iban_no car_ride_edit_category  w-100" />-->
                            <!--                            </div>-->




                        </div>
                        <div class="modal-footer mf">
                            <button type="button" onclick="addcardetailEdit()" class="btn btn-primary">
                                <img src="../public/image/tick (1).png" alt="" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--        car pic  modal -->
        <form class="childcatagories_modal_from" id="modal-form" action="">
            <div class="modal fade" id="add-car-pic-modal" tabindex="-1" role="dialog"
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
                                        <div class="image-upload-wrap">
                                            <input class="file-upload-input" type="file" onchange="readURL(this);"
                                                   accept="image/*" />
                                            <div class="drag-text">
                                                <div class="card-body upload-card-body4">
                                                    <div class="upload-img">
                                                        <img src="../public/image/upload.png" alt="" />
                                                    </div>
                                                    <div class="upload-image-format4">
                                                        <p>
                                                            .PDF .JPG .PNG .DOC
                                                        </p>
                                                    </div>
                                                    <div class="upload-detail4">
                                                        <h4>You can also upload files by</h4>
                                                        <div class="upload-clicking">
                                                            <a href="#" class="">Clicking here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="file-upload-content">
                                            <img class="file-upload-image" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload()"
                                                        class="btn remove-image">
                                                    Remove
                                                    <span class="image-title" style="display: none;">Uploaded
                                                        Image</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mf">
                            <button type="button" onclick="carPictureAdd()" class="btn btn-primary">
                                <img src="../public/image/tick (1).png" alt="" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--        car pic doc  modal -->
        <form class="childcatagories_modal_from" id="modal-form" action="">
            <div class="modal fade" id="add-car-pic-doc-modal" tabindex="-1" role="dialog"
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
                                        <div class="image-upload-wrap">
                                            <input class="file-upload-input" type="file" onchange="readURL(this);"
                                                   accept="image/*" />
                                            <div class="drag-text">
                                                <div class="card-body upload-card-body4">
                                                    <div class="upload-img">
                                                        <img src="../public/image/upload.png" alt="" />
                                                    </div>
                                                    <div class="upload-image-format4">
                                                        <p>
                                                            .PDF .JPG .PNG .DOC
                                                        </p>
                                                    </div>
                                                    <div class="upload-detail4">
                                                        <h4>You can also upload files by</h4>
                                                        <div class="upload-clicking">
                                                            <a href="#" class="">Clicking here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="file-upload-content">
                                            <img class="file-upload-image" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload()"
                                                        class="btn remove-image">
                                                    Remove
                                                    <span class="image-title" style="display: none;">Uploaded
                                                        Image</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mf">
                            <button type="button" onclick="carDocPictureAdd()" class="btn btn-primary">
                                <img src="../public/image/tick (1).png" alt="" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--        driver detail info modal -->
        <form class="childcatagories_modal_from" id="modal-form" action="">
            <div class="modal fade" id="add-update-driver-modal" tabindex="-1" role="dialog"
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
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Captain Name</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Rigistration No" value=""
                                       class="customer-add-input captain_name_edit  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Email</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Date Issue" value=""
                                       class="customer-add-input captain_email_edit   w-100" />
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
                                        <div class="image-upload-wrap">
                                            <input class="file-upload-input" type="file" onchange="readURL(this);"
                                                   accept="image/*" />
                                            <div class="drag-text">
                                                <div class="card-body upload-card-body4">
                                                    <div class="upload-img">
                                                        <img src="../public/image/upload.png" alt="" />
                                                    </div>
                                                    <div class="upload-image-format4">
                                                        <p>
                                                            .PDF .JPG .PNG .DOC
                                                        </p>
                                                    </div>
                                                    <div class="upload-detail4">
                                                        <h4>You can also upload files by</h4>
                                                        <div class="upload-clicking">
                                                            <a href="#" class="">Clicking here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="file-upload-content">
                                            <img class="file-upload-image" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload()"
                                                        class="btn remove-image">
                                                    Remove
                                                    <span class="image-title" style="display: none;">Uploaded
                                                        Image</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mf">
                            <button type="button" onclick="adddriverDetailUpdate()" class="btn btn-primary">
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
                                       class="customer-add-input  w-100" />
                            </div>
                            <div class="form-group">
                                <label for="cat-name-upload" class="customer-add-input-label txt-regular upload-input-label"> Tag</label>
                                <input type="text" id="addpro_cat" name="addpro_cat" placeholder="Enter Tags" value=""
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
        <input type="hidden" id="carinput-pic-id">
        <input type="hidden" id="cardocinput-pic-id">
        <input type="hidden" id="driving-id">
        <input type="hidden" id="driving-license-status">
        <input type="hidden" id="cnic-id">
        <input type="hidden" id="national-identity-card-status">
        <input type="hidden" id="bank-id">
        <input type="hidden" id="car-pictures-status">
        <input type="hidden" id="car-documents-status">

        <!-- Bootstrap core JavaScript -->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script src="../public/js/jquery.tag.js"></script>
        <script src="../public/js/jquery.tagsinput-revisited.js"></script>
        <script src="../public/js/dropzone.js"></script>
        <script src="../public/js/custom_request.js"></script>
        <script src="../public/js/customPagination.js"></script>

        <!-- Menu Toggle Script -->
        <script>

            $(document).ready(function () {
                retrieveallSpcificCaptain();


                function retrieveallSpcificCaptain() {
                    var captains_id = $("#driver-detail-id").val();
                    sendRequest("?action_type=retrieve&request_type=driver_detail&functionality_type=retrieve_specific_captain&panel_type=driver_panel", {

                        captain_id: captains_id,
                        // country_id:country_id,
                        // city_id:city_id,
                        // status:0,

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

                                    $("#cnic-id").val(cnic_id);
                                    $("#driving-id").val(driving_id);
                                    $("#carinput-pic-id").val(car_pic_id);
                                    $("#cardocinput-pic-id").val(car_docsments_id);
                                    $("#driving-license-status").val(driving_license_status);
                                    $("#national-identity-card-status").val(national_identity_card_status);




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
                                            "                                       <a href=\"../public/uploads/driver_detail_pic/"+d.picture+"\" id=\"licence-path-"+d.id+"\" alt=\"Image description\" target=\"_blank\">  <span class=\"span_img\" "+st_checked+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+d.picture+"</span></a>  <span class=\"span_icon\"  onclick=\"deleteDocments("+d.id+");\"><i class=\"fas fa-times\"></i></span>\n" +

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
                                            "                                      <a href=\"../public/uploads/driver_detail_pic/"+d.picture+"\" id=\"cnic-path-"+d.id+"\" alt=\"Image description\" target=\"_blank\">  <span class=\"span_img\" "+national_status+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+d.picture+"</span></a>  <span class=\"span_icon\" onclick=\"deleteCnic("+d.id+");\"><i class=\"fas fa-times\"></i></span>\n" +
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
                                            "                                        <a href=\"../public/uploads/driver_detail_pic/"+cheque_picture+"\" class=\"check_pic\" id=\"bank-detail-path-"+bank_id+"\" alt=\"Image description\" target=\"_blank\"> <span class=\"span_img\"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+cheque_picture+"</span></a>  <span class=\"span_icon\" onclick=\"deleteBankPic("+bank_id+")\"><i class=\"fas fa-times\"></i></span>\n" +
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
                                            "                                       <a href=\"../public/uploads/driver_detail_pic/"+d.picture+"\" id=\"car-info-path-"+d.id+"\" alt=\"Image description\" target=\"_blank\">   <span class=\"span_img\" "+car_status+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+d.picture+"</span> </a> <span class=\"span_icon\" onclick=\"deleteCardAtach("+d.id+");\"><i class=\"fas fa-times\"></i></span>\n" +
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
                                            "                                       <a href=\"../public/uploads/driver_detail_pic/"+d.picture+"\" id=\"car-doc-info-path-"+d.id+"\" alt=\"Image description\" target=\"_blank\">   <span class=\"span_img\" "+car_doc_status+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+d.picture+"</span> </a> <span class=\"span_icon\" onclick=\"deleteCardAtachdoc("+d.id+");\"><i class=\"fas fa-times\"></i></span>\n" +
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

                function retrieve_SpecificCaptainrides(search = '',captains_id) {
                    sendRequest("?action_type=retrieve&request_type=driver_detail&functionality_type=retrieve_specific_captain_rides&panel_type=driver_panel", {

                        search: search,
                        captain_id:captains_id,


                    }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {
                                $(".pagination").html(data.pagination);
                                $("#driver-detail-table-body-id").empty();
                                var list = data.listOfData;

                                for (var i = 0; i < list.length; i++) {

                                    var n = list[i].id;
                                    var name = list[i].captain_name;
                                    var cap_pic = list[i].cap_pic;
                                    var email = list[i].captain_email;
                                    var phone = list[i].captain_phone;
                                    var from_address = list[i].from_address;
                                    var to_address = list[i].to_address;
                                    var distance = list[i].distance;
                                    var trip_time = list[i].trip_time;
                                    var fare = list[i].fare;
                                    var ride_type_name = list[i].ride_type_name;
                                    var ride_category_name = list[i].ride_category_name;
                                    var city_name = list[i].city_name;
                                    var country_name = list[i].country_name;

                                    var waiting_charges = list[i].waiting_charges;
                                    var waiting_time = list[i].waiting_time;

                                    var status = list[i].status;


                                    var status_name = "";
                                    var status_class = "";

                                    if (status == 1) {

                                        status_name = "Running";
                                        status_class = "span_running";
                                    } else  if (status == 2) {
                                        status_name = "Scheduled";
                                        status_class = "span_new";
                                    }
                                    else  if (status == 3) {
                                        status_name = "Cancel";
                                        status_class = "span_reject";
                                    }
                                    else {
                                        status_name = "Completed";
                                        status_class = "span_completed";
                                    }


                                    // var st_checked = "";
                                    // if (live == 0) {
                                    //
                                    //     st_checked = "value='0'";
                                    // } else {
                                    //
                                    //     st_checked = "value='1'  checked";
                                    // }



                                    var text = "<tr id=\"ride-type-table-row-"+n+"\">\n" +
                                        "                                                <td><img src=\""+cap_pic+"\" alt=\"\" style=\"width: 36px; height: auto;\"></td>\n" +
                                        "                                                <td><span>"+name+"</span>\n" +
                                        "                                                </td>\n" +
                                        "                                                <td>"+fare+"/"+distance+"Km</td>\n" +
                                        "                                                <td>"+waiting_charges+"/"+waiting_time+"</td>\n" +
                                        "                                                <td>"+ride_category_name+"</td>\n" +
                                        "                                                <td>"+country_name+"</td>\n" +
                                        "                                                <td>"+city_name+"</td>\n" +
                                        "<td><span class=\""+status_class+"\">"+status_name+"</span></td>\n"
                                    "                                              \n" +

                                    "\n" +
                                    "                                            </tr>";

                                    $("#driver-detail-table-body-id").append(text);
                                }



                            } else if (data.code == "206") {
                                console.log("Failed to Delete");
                            }

                        })
                        .catch((error) => {
                            console.log(error)
                        });
                }

                $('#report-search').keyup(function () {
                    var search = $(this).val();
                    var captains_id = $("#driver-detail-id").val();

                    retrieve_SpecificCaptainrides(search,captains_id);
                    // console.log(query)
                });


                $(document).on('change', '#status-caption-select-id', function () {

                    var status = $(this).val();
                    var captains_id = $("#driver-detail-id").val();


                    sendRequest("?action_type=update&request_type=driver_detail&functionality_type=change_captain_status&panel_type=driver_panel", {
                        status: status,
                        id: captains_id,
                    }, "POST")
                        .then((data) => {
                            var data = JSON.parse(data);
                            if (data.code == "202") {

                                //     var list = data.listOfData;
                                //
                                //
                                //     for (var i = 0; i < list.length; i++) {
                                //
                                //
                                //
                                //
                                //
                                //
                                //
                                //         // $("#add_payment_modal_edit").modal('show');
                                //     }
                                //
                            }


                        })
                        .catch((error) => {
                            console.log(error)
                        })

                });

            });

            function deleteDocments(id) {
                var del_id =id;
                var path = $("#licence-path-"+del_id).attr('href');

                sendRequest("?action_type=delete&request_type=driver_detail&functionality_type=delete_docments_pic&panel_type=driver_panel", {
                    id:del_id,
                    path:path,

                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if(data.code == "202"){
                            $("#licence-pic-"+del_id).remove();

                            // $("#sub_child_packages_modal_form_id").modal('hide');
                            // retrieveAllShipping(1);
                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }
            function deleteCnic(id) {
                var del_id =id;
                var path = $("#cnic-path-"+del_id).attr('href');

                sendRequest("?action_type=delete&request_type=driver_detail&functionality_type=delete_docments_pic&panel_type=driver_panel", {
                    id:del_id,
                    path:path,

                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if(data.code == "202"){
                            $("#cnic-pic-"+del_id).remove();

                            // $("#sub_child_packages_modal_form_id").modal('hide');
                            // retrieveAllShipping(1);
                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }
            function deleteCardAtach(id) {
                var del_id =id;
                var path = $("#car-info-path-"+del_id).attr('href');

                sendRequest("?action_type=delete&request_type=driver_detail&functionality_type=delete_docments_pic&panel_type=driver_panel", {
                    id:del_id,
                    path:path,

                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if(data.code == "202"){
                            $("#car-pic-"+del_id).remove();

                            // $("#sub_child_packages_modal_form_id").modal('hide');
                            // retrieveAllShipping(1);
                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }
            function deleteBankPic(id) {
                var del_id =id;
                var path = $("#bank-detail-path-"+del_id).attr('href');

                sendRequest("?action_type=delete&request_type=driver_detail&functionality_type=delete_bank_pic&panel_type=driver_panel", {
                    id:del_id,
                    path:path,

                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if(data.code == "202"){
                            $("#bank-pic-"+del_id).remove();

                            // $("#sub_child_packages_modal_form_id").modal('hide');
                            // retrieveAllShipping(1);
                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }
            function deleteCardAtachdoc(id) {
                var del_id =id;
                var path = $("#car-doc-info-path-"+del_id).attr('href');

                sendRequest("?action_type=delete&request_type=driver_detail&functionality_type=delete_docments_pic&panel_type=driver_panel", {
                    id:del_id,
                    path:path,

                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if(data.code == "202"){
                            $("#car-doc-pic-"+del_id).remove();

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
                var search = $("#report-search").val();
                var captains_id = $("#driver-detail-id").val();
                // var country_id = $("#country-select-id").val();
                // // var city_id = $("#city-select-id").val();
                //
                // var country=""
                // if(country_id = ""){
                //     country =""
                // }else {
                //     country = country_id;
                // }
                //
                // var city=""
                // if(city_id = ""){
                //     city =""
                // }else {
                //     city = city_id;
                // }

                var searchset=""
                if(search = ""){
                    searchset =""
                }else {
                    searchset = search;
                }
                sendRequest("?action_type=retrieve&request_type=driver_detail&functionality_type=pagination&panel_type=driver_panel", {
                    offset:offset,
                    search:search,
                    captain_id:captains_id,



                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {
                            // $(".pagination").html(data.pagination);
                            // $("#paginate").html(data.htmlData);
                            $("#driver-detail-table-body-id").empty();
                            var list = data.listOfData;

                            for (var i = 0; i < list.length; i++) {

                                var n = list[i].id;
                                var name = list[i].captain_name;
                                var cap_pic = list[i].cap_pic;
                                var email = list[i].captain_email;
                                var phone = list[i].captain_phone;
                                var from_address = list[i].from_address;
                                var to_address = list[i].to_address;
                                var distance = list[i].distance;
                                var trip_time = list[i].trip_time;
                                var fare = list[i].fare;
                                var ride_type_name = list[i].ride_type_name;
                                var ride_category_name = list[i].ride_category_name;
                                var city_name = list[i].city_name;
                                var country_name = list[i].country_name;

                                var waiting_charges = list[i].waiting_charges;
                                var waiting_time = list[i].waiting_time;

                                var status = list[i].status;


                                var status_name = "";
                                var status_class = "";

                                if (status == 1) {

                                    status_name = "Running";
                                    status_class = "span_running";
                                } else  if (status == 2) {
                                    status_name = "Scheduled";
                                    status_class = "span_new";
                                }
                                else  if (status == 3) {
                                    status_name = "Cancel";
                                    status_class = "span_reject";
                                }
                                else {
                                    status_name = "Completed";
                                    status_class = "span_completed";
                                }


                                // var st_checked = "";
                                // if (live == 0) {
                                //
                                //     st_checked = "value='0'";
                                // } else {
                                //
                                //     st_checked = "value='1'  checked";
                                // }



                                var text = "<tr id=\"ride-type-table-row-"+n+"\">\n" +
                                    "                                                <td><img src=\""+cap_pic+"\" alt=\"\" style=\"width: 36px; height: auto;\"></td>\n" +
                                    "                                                <td><span>"+name+"</span>\n" +
                                    "                                                </td>\n" +
                                    "                                                <td>"+fare+"/"+distance+"Km</td>\n" +
                                    "                                                <td>"+waiting_charges+"/"+waiting_time+"</td>\n" +
                                    "                                                <td>"+ride_category_name+"</td>\n" +
                                    "                                                <td>"+country_name+"</td>\n" +
                                    "                                                <td>"+city_name+"</td>\n" +
                                    "<td><span class=\""+status_class+"\">"+status_name+"</span></td>\n"
                                "                                              \n" +

                                "\n" +
                                "                                            </tr>";

                                $("#driver-detail-table-body-id").append(text);
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

            function EditInfo(id){
                if(id== 1) {
                    var reg = $("#cap-registration").text();
                    var issue = $("#cap-licence-issue").text();
                    var expire = $("#cap-lecence-expiry").text();
                    $(".caraddclass").remove();
                    $(".document_info_reg").val(reg);
                    $(".document_info_date_issue").val(issue);
                    $(".document_info_date_expire").val(expire);
                    var s = $(".doc_detail_attach").find("a");
                    $("#edit-modal-span").attr('data-target', '#add-document-modal');

                    for (var i = 0; i < s.length; i++) {

                        $(".file-upload-content4").show();
                        $(".image-upload-wrap4").hide();
                        var img = s[i];
                        if (i == 1) {
                            $(".file-upload-content").show();
                            $(".image-upload-wrap").hide();
                            $(".file-upload-image").attr("src", img);
                            break;
                        }
                        $(".file-upload-image4").attr("src", img);


                        console.log("yes" + s[i]);
                    }
                }
                else if(id == 2){
                    var reg = $("#cap-cnic-reg").text();
                    var issue = $("#cap-cnic-issue").text();
                    var expire = $("#cap-cnic-expiry").text();

                    $(".cnic_doc_reg").val(reg);
                    $(".caraddclass").remove();
                    $(".cnic__date_issue").val(issue);
                    $(".cnic_date_expire").val(expire);
                    var s = $(".cnic_attachment").find("a");
                    $("#edit-modal-span").attr('data-target', '#add-cnic-modal');
                    for(var i = 0; i<s.length; i++){

                        $(".file-upload-content4").show();
                        $(".image-upload-wrap4").hide();
                        $(".file-upload-content").hide();
                        $(".image-upload-wrap").show();
                        $(".file-upload-image").attr("src",'#');
                        var img = s[i];
                        if(i== 1){
                            $(".file-upload-content").show();
                            $(".image-upload-wrap").hide();
                            $(".file-upload-image").attr("src",img);
                            break;
                        }
                        $(".file-upload-image4").attr("src",img);


                        console.log("yes"+s[i]);
                    }
                    // alert(s.length);






                }
                else if(id == 3){
                    var holder_name = $("#cap-holder-name").text();
                    var bank_name = $("#cap-bank-name").text();
                    var branch_code = $("#cap-bank-branch-code").text();
                    var acount_no = $("#cap-acount-no").text();
                    var iban_no = $("#cap-iban-no").text();

                    $(".caraddclass").remove();
                    $(".bank_holder_name").val(holder_name);
                    $(".bank_name").val(bank_name);
                    $(".bank_account_no").val(acount_no);
                    $(".bank_branch_code").val(branch_code);
                    $(".bank_iban_no").val(iban_no);

                    var s = $(".check_pic").attr("href");
                    if(s==null){
                        $(".file-upload-content").hide();
                        $(".image-upload-wrap").show();
                        $(".file-upload-image").attr("src","#");
                    }else {
                        $(".file-upload-content").show();
                        $(".image-upload-wrap").hide();
                        $(".file-upload-image").attr("src",s);
                    }

                    $("#edit-modal-span").attr('data-target', '#add-bank-modal');

                    // alert(s.length);






                }
                else if(id == 4){
                    var cap_car_brand = $("#cap-car-brand").text();
                    var cap_car_color = $("#cap-car-color").text();
                    var cap_car_ride_type = $("#cap-car-ride-type").text();
                    var cap_car_name = $("#cap-car-name").text();
                    var cap_car_number_plate = $("#cap-car-number-plate").text();
                    var cap_car_ride_category = $("#cap-car-ride-category").text();


                    $(".car_name_edit").val(cap_car_name);
                    $(".car_brand_edit").val(cap_car_brand);
                    $(".car_color_edit").val(cap_car_color);
                    $(".car_number_plate_edit").val(cap_car_number_plate);
                    // $(".car_ride_edit_category").val(cap_car_ride_category);
                    // $(".car_type_edit").val(cap_car_ride_type);
                    var gtext = "<div class=\"span_img caraddclass\"  onclick=\"addcarpic()\" style=\"/* background: red; */height: 100%;display: inline-block;margin-right: 15px;text-align: center;width: 34px;padding: 7px;background-color: white;color: #00000020;font-size: 12px;/* margin-top: 2px; *//* margin-left: 4px; */margin-right: 5px;/* border-radius: 50%; */box-shadow: 7px;border: 1px solid dashed;border: 1px solid dotted;/* box-shadow: -1px 3px 5px 0px rgba(124, 108, 117, 0.71); */border: 2px dashed rgba(0, 0, 0, 0.125);\"><i class=\"fas fa-plus\"></i></div>\n";
                    var gtext2 = "<div class=\"span_img  caraddclass\" onclick=\"addcardoc()\" style=\"/* background: red; */height: 100%;display: inline-block;margin-right: 15px;text-align: center;width: 34px;padding: 7px;background-color: white;color: #00000020;font-size: 12px;/* margin-top: 2px; *//* margin-left: 4px; */margin-right: 5px;/* border-radius: 50%; */box-shadow: 7px;border: 1px solid dashed;border: 1px solid dotted;/* box-shadow: -1px 3px 5px 0px rgba(124, 108, 117, 0.71); */border: 2px dashed rgba(0, 0, 0, 0.125);\"><i class=\"fas fa-plus\"></i></div>\n";

                    $("#edit-modal-span").attr('data-target', '#add-car-modal');
                    $(".car_detail_Attachments div").first().before(gtext);
                    $(".car_doc div").first().before(gtext2);

                    // var link = "edit_car_detail.php?id="+captains_id+"&carid="+ca_id+"&cardoc_id="+car_doc_id;
                    //
                    // $("#new-page-link").attr('href',link);

                }

            }

            function adddocumentedit(){
                var reg= $(".document_info_reg").val();
                var issue= $(".document_info_date_issue").val();
                var expire= $(".document_info_date_expire").val();
                var front_img = $(".file-upload-image4").attr('src');
                var back_img = $(".file-upload-image").attr('src');
                var doc_id = $("#driving-id").val();
                var driving_license_status = $("#driving-license-status").val();

                sendRequest("?action_type=update&request_type=driver_detail&functionality_type=change_captain_documents&panel_type=driver_panel", {
                    reg: reg,
                    issue: issue,
                    expire: expire,
                    front_img: front_img,
                    back_img: back_img,
                    id:doc_id
                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {

                            var list = data.listOfData;
                            // console.log("yes this is"+list.id_2)


                            for (var i = 0; i < list.length; i++) {

                                var id_1 = list[i].id_1;
                                var id_2 = list[i].id_2;
                                var img1 = list[i].img1;
                                var img2 = list[i].img2;
                                // var from_address = list[i].from_address;

                                var st_checked = "";
                                if (driving_license_status == 0) {

                                    st_checked = "";
                                } else {

                                    st_checked = "Style='background: red;'";
                                }

                                if(img1 != ""){
                                    $(".doc_detail_attach").empty();

                                    // var d=driving_license_picture[d_pic];
                                    var text="<div class=\"first_attachment\" id=\"licence-pic-"+id_1+"\">\n" +
                                        "                                       <a href=\"../public/uploads/driver_detail_pic/"+img1+"\" id=\"licence-path-"+id_1+"\" alt=\"Image description\" target=\"_blank\">  <span class=\"span_img\" "+st_checked+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+img1+"</span></a>  <span class=\"span_icon\"  onclick=\"deleteDocments("+id_1+");\"><i class=\"fas fa-times\"></i></span>\n" +

                                        "                                    </div>";
                                    $(".doc_detail_attach ").append(text);


                                }

                                if(img2 != ""){
                                    // $(".doc_detail_attach").empty();

                                    // var d=driving_license_picture[d_pic];
                                    var text=" <div class=\"first_attachment\" id=\"licence-pic-"+id_2+"\">\n" +
                                        "                                       <a href=\"../public/uploads/driver_detail_pic/"+img2+"\" id=\"licence-path-"+id_2+"\" alt=\"Image description\" target=\"_blank\">  <span class=\"span_img\" "+st_checked+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+img2+"</span></a>  <span class=\"span_icon\"  onclick=\"deleteDocments("+id_2+");\"><i class=\"fas fa-times\"></i></span>\n" +

                                        "                                    </div>";
                                    $(".doc_detail_attach").append(text);


                                }
                                $("#cap-licence-issue").text(issue);
                                $("#cap-registration").text(reg);
                                $("#cap-lecence-expiry").text(expire);

                                EditInfo(1);





                                $("#add-document-modal").modal('hide');
                            }

                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }

            function addcnicedit(){
                var reg= $(".cnic_doc_reg").val();
                var issue= $(".cnic__date_issue").val();
                var expire= $(".cnic_date_expire").val();
                var front_img = $(".file-upload-image4").attr('src');
                var back_img = $(".file-upload-image").attr('src');
                var doc_id = $("#cnic-id").val();
                var national_identity_card_status = $("#national-identity-card-status").val();

                sendRequest("?action_type=update&request_type=driver_detail&functionality_type=change_captain_documents&panel_type=driver_panel", {
                    reg: reg,
                    issue: issue,
                    expire: expire,
                    front_img: front_img,
                    back_img: back_img,
                    id:doc_id
                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {

                            var list = data.listOfData;
                            // console.log("yes this is"+list.id_2)


                            for (var i = 0; i < list.length; i++) {

                                var id_1 = list[i].id_1;
                                var id_2 = list[i].id_2;
                                var img1 = list[i].img1;
                                var img2 = list[i].img2;
                                // var from_address = list[i].from_address;

                                var national_status = "";
                                if (national_identity_card_status == 0) {

                                    national_status = "";
                                } else {

                                    national_status = "Style='background: red;'";
                                }








                                if(img1 != ""){
                                    $(".cnic_attachment").empty();

                                    // var d=driving_license_picture[d_pic];
                                    var text=" <div class=\"first_attachment\" id=\"cnic-pic-"+id_1+"\">\n" +
                                        "                                      <a href=\"../public/uploads/driver_detail_pic/"+img1+"\" id=\"cnic-path-"+id_1+"\" alt=\"Image description\" target=\"_blank\">  <span class=\"span_img\" "+national_status+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+img1+"</span></a>  <span class=\"span_icon\" onclick=\"deleteCnic("+id_1+");\"><i class=\"fas fa-times\"></i></span>\n" +
                                        "                                    </div>";
                                    $(".cnic_attachment").append(text);


                                }

                                if(img2 != ""){
                                    // $(".doc_detail_attach").empty();

                                    // var d=driving_license_picture[d_pic];
                                    var text=" <div class=\"first_attachment\" id=\"cnic-pic-"+id_2+"\">\n" +
                                        "                                      <a href=\"../public/uploads/driver_detail_pic/"+img2+"\" id=\"cnic-path-"+id_2+"\" alt=\"Image description\" target=\"_blank\">  <span class=\"span_img\" "+national_status+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+img2+"</span></a>  <span class=\"span_icon\" onclick=\"deleteCnic("+id_2+");\"><i class=\"fas fa-times\"></i></span>\n" +
                                        "                                    </div>";
                                    $(".cnic_attachment").append(text);


                                }
                                $("#cap-cnic-issue").text(issue);
                                $("#cap-cnic-reg").text(reg);
                                $("#cap-cnic-expiry").text(expire);

                                EditInfo(2);





                                $("#add-cnic-modal").modal('hide');
                            }

                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }

            function addbankEdit(){
                var holder= $(".bank_holder_name").val();
                var bank_name= $(".bank_name").val();
                var bank_account_no= $(".bank_account_no").val();
                var bank_branch_code = $(".bank_branch_code").val();
                var bank_iban_no = $(".bank_iban_no").val();
                var img = $(".file-upload-image").attr('src');
                var captains_id = $("#driver-detail-id").val();
                var bank_id = $("#bank-id").val();

                sendRequest("?action_type=update&request_type=driver_detail&functionality_type=change_captain_bank_detail&panel_type=driver_panel", {
                    holder: holder,
                    bank_name: bank_name,
                    bank_account_no: bank_account_no,
                    bank_branch_code: bank_branch_code,
                    bank_iban_no: bank_iban_no,
                    img: img,
                    captains_id:captains_id
                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {

                            var list = data.listOfData;
                            // console.log("yes this is"+list.id_2)


                            for (var i = 0; i < list.length; i++) {


                                var images = list[i].image;
                                // var img2 = list[i].img2;
                                // var from_address = list[i].from_address;

                                // var national_status = "";
                                // if (national_identity_card_status == 0) {
                                //
                                //     national_status = "";
                                // } else {
                                //
                                //     national_status = "Style='background: red;'";
                                // }








                                if(images != ""){
                                    $(".bankdetail_attach").empty();

                                    // var d=national_identity_card_picture[d_pic];
                                    var text="<div class=\"first_attachment\" id=\"bank-pic-"+bank_id+"\">\n" +
                                        "                                        <a href=\"../public/uploads/driver_detail_pic/"+images+"\" class=\"check_pic\" id=\"bank-detail-path-"+bank_id+"\" alt=\"Image description\" target=\"_blank\"> <span class=\"span_img\"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+images+"</span></a>  <span class=\"span_icon\" onclick=\"deleteBankPic("+bank_id+")\"><i class=\"fas fa-times\"></i></span>\n" +
                                        "                                    </div>";
                                    $(".bankdetail_attach").append(text);


                                }

                                $("#cap-holder-name").text(holder);
                                $("#cap-acount-no").text(bank_account_no);
                                $("#cap-iban-no").text(bank_iban_no);
                                $("#cap-bank-name").text(bank_name);
                                $("#cap-bank-branch-code").text(bank_branch_code);



                                EditInfo(3);





                                $("#add-bank-modal").modal('hide');
                            }

                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }


            function addcardetailEdit(){
                var cap_car_name = $(".car_name_edit").val();
                var cap_car_brand = $(".car_brand_edit").val();
                var cap_car_color =$(".car_color_edit").val();
                var cap_car_number_plate =$(".car_number_plate_edit").val();
                var captains_id = $("#driver-detail-id").val();
                // var bank_id = $("#bank-id").val();

                sendRequest("?action_type=update&request_type=driver_detail&functionality_type=change_captain_car_detail&panel_type=driver_panel", {
                    car_name: cap_car_name,
                    cap_car_brand: cap_car_brand,
                    cap_car_color: cap_car_color,
                    cap_car_number_plate: cap_car_number_plate,
                    captains_id:captains_id
                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {

                            $("#cap-car-brand").text(cap_car_brand);
                            $("#cap-car-color").text(cap_car_color);
                            $("#cap-car-name").text(cap_car_name);
                            $("#cap-car-number-plate").text(cap_car_number_plate);
                            // $("#cap-bank-branch-code").text(bank_branch_code);


                            $(".caraddclass").remove();
                            EditInfo(4);





                            $("#add-car-modal").modal('hide');




                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }

            function addcarpic(){
                $(".file-upload-content").hide();
                $(".image-upload-wrap").show();
                $(".file-upload-image").attr("src","#");
                $("#add-car-pic-modal").modal("show");

            }


            function carPictureAdd(){

                var carinput= $("#carinput-pic-id").val();
                var back_img = $(".file-upload-image").attr('src');
                // var doc_id = $("#cnic-id").val();
                var car_pictures_status = $("#car-pictures-status").val();

                sendRequest("?action_type=create&request_type=driver_detail&functionality_type=insert_car_picture&panel_type=driver_panel", {

                    term_id: carinput,
                    car_img: back_img,

                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {

                            var list = data.listOfData;
                            // console.log("yes this is"+list.id_2)


                            for (var i = 0; i < list.length; i++) {

                                var id = list[i].id;
                                var picture = list[i].images;

                                // var from_address = list[i].from_address;

                                var car_status = "";
                                if (car_pictures_status == 0) {

                                    car_status = "";
                                } else {

                                    car_status = "Style='background: red;'";
                                }




                                var text="<div class=\"first_attachment\" id=\"car-pic-"+id+"\">\n" +
                                    "                                       <a href=\"../public/uploads/driver_detail_pic/"+picture+"\" id=\"car-info-path-"+id+"\" alt=\"Image description\" target=\"_blank\">   <span class=\"span_img\" "+car_status+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+picture+"</span> </a> <span class=\"span_icon\" onclick=\"deleteCardAtach("+id+");\"><i class=\"fas fa-times\"></i></span>\n" +
                                    "                                    </div>";
                                $(".car_detail_Attachments ").append(text);









                                // EditInfo(2);





                                $("#add-car-pic-modal").modal('hide');
                            }

                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }


            function addcardoc(){
                $(".file-upload-content").hide();
                $(".image-upload-wrap").show();
                $(".file-upload-image").attr("src","#");
                $("#add-car-pic-doc-modal").modal("show");

            }

            function carDocPictureAdd(){

                var carinput= $("#cardocinput-pic-id").val();
                var back_img = $(".file-upload-image").attr('src');
                // var doc_id = $("#cnic-id").val();
                var car_documents_status = $("#car-documents-status").val();

                sendRequest("?action_type=create&request_type=driver_detail&functionality_type=insert_car_picture&panel_type=driver_panel", {

                    term_id: carinput,
                    car_img: back_img,

                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {

                            var list = data.listOfData;
                            // console.log("yes this is"+list.id_2)


                            for (var i = 0; i < list.length; i++) {

                                var id = list[i].id;
                                var picture = list[i].images;

                                // var from_address = list[i].from_address;

                                var car_doc_status = "";
                                if (car_documents_status == 0) {

                                    car_doc_status = "";
                                } else {

                                    car_doc_status = "Style='background: red;'";
                                }




                                var text="<div class=\"first_attachment\" id=\"car-doc-pic-"+id+"\">\n" +
                                    "                                       <a href=\"../public/uploads/driver_detail_pic/"+picture+"\" id=\"car-doc-info-path-"+id+"\" alt=\"Image description\" target=\"_blank\">   <span class=\"span_img\" "+car_doc_status+"><i class=\"fas fa-paperclip\"></i></span><span class=\"span_text\">"+picture+"</span> </a> <span class=\"span_icon\" onclick=\"deleteCardAtachdoc("+id+");\"><i class=\"fas fa-times\"></i></span>\n" +
                                    "                                    </div>";
                                $(".car_doc").append(text);











                                // EditInfo(2);





                                $("#add-car-pic-doc-modal").modal('hide');
                            }

                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }

            function detail_edit_update(){
                var name= $("#cap-name").text();
                var email= $("#cap-email").text();
                var cap_img = $("#cap-image").attr('src');

                $(".captain_name_edit").val(name);
                $(".captain_email_edit").val(email);

                $(".file-upload-content").show();
                $(".image-upload-wrap").hide();
                $(".file-upload-image").attr("src",cap_img);
                $("#add-update-driver-modal").modal("show");

            }

            function adddriverDetailUpdate(){
                var captains_id = $("#driver-detail-id").val();
                var name=$(".captain_name_edit").val();
                var email=$(".captain_email_edit").val();
                var cap_img=$(".file-upload-image").attr("src");


                sendRequest("?action_type=update&request_type=driver_detail&functionality_type=driver_detail_update&panel_type=driver_panel", {

                    id: captains_id,
                    name: name,
                    email: email,
                    cap_img: cap_img,

                }, "POST")
                    .then((data) => {
                        var data = JSON.parse(data);
                        if (data.code == "202") {

                            var list = data.listOfData;
                            // console.log("yes this is"+list.id_2)


                            for (var i = 0; i < list.length; i++) {


                                var picture = list[i].image;
                                if(picture != ""){
                                    var path="../public/uploads/captainpic/";
                                    $("#cap-image").attr('src',path+picture);


                                }

                                $("#cap-name").text(name);
                                $("#cap-email").text(email);


                                // var from_address = list[i].from_address;
















                                // EditInfo(2);





                                $("#add-update-driver-modal").modal('hide');
                            }

                        }


                    })
                    .catch((error) => {
                        console.log(error)
                    })

            }


            // addbankEdit

        </script>

</body>

</html>