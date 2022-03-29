<!doctype html>
<html lang="en">

<head>
    <title>Become Captain</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="public/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="public/css/dropzone.css">

</head>

<body>

<?php

include_once ('web_header.php');

?>




    <section class="become_captain_header">

        <div class="container">
            <div class="row">
                <div class="col-md-7 my-auto">
                    <div class="header-left"><span class="tagline"> Your time. Your day. <br> Your life. </span>
                        <h1> Drive with Kareem and be a Captain </h1>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <!-- multistep form -->
    <section class="multistep_form" id="sign_up">
        <div class="container-fluid" id="grad1">
            <div class="row justify-content-center mt-0">
                <div class="col-11 col-sm-9 col-md-7 col-lg-8 text-center p-0 mt-3 mb-2">
                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                        <h2>Create a new account</h2>
                        <p>Fill all form field to go to next step</p>
                        <div class="row">
                            <div class="col-md-12 mx-0">
                                <form id="msform" method="post" enctype="multipart/form-data">
                                    <input type="hidden" id="random-no1" name="random-no1" value="<?= rand(); ?>">
                                    <input type="hidden" id="random-no2" name="random-no2" value="<?= rand(); ?>">
                                    <!-- progressbar -->
                                    <ul id="progressbar">
                                       
                                        <li class="active" id="personal"><strong>Personal</strong></li>
                                        <li id="document"><strong>Document</strong></li>
                                        <li id="cnic"><strong>Cnic</strong></li>
                                        <li id="payment"><strong>Payment</strong></li>
                                        <li id="car_detail"><strong>Car</strong></li>

                                        <li id="confirm"><strong>Finish</strong></li>
                                    </ul> <!-- fieldsets -->
                                   
                                    <fieldset>
                                        <div class="form-card">
                                            <h3 class="fs-title">Personal Information</h3>
                                           
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-3">
                                                            <label for="fname">First Name</label>
                                                            <input type="text" name="fname" id="fname" class="form-control"
                                                                placeholder="Enter First Name" aria-describedby="helpId">
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-3">
                                                            <label for="lname">Last Name</label>
                                                            <input type="text" name="lname" id="lname" class="form-control"
                                                                placeholder="Enter Last Name" aria-describedby="helpId">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phno">Phone</label>
                                                            <input type="text" name="phno" id="phno" class="form-control"
                                                                placeholder="Enter Phone No" aria-describedby="helpId">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" name="email" id="email" class="form-control"
                                                                placeholder="Enter Email" aria-describedby="helpId">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="pass">Password</label>
                                                            <input type="password" name="pass" id="pass" class="form-control"
                                                                placeholder="Enter Password" aria-describedby="helpId">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="pass">confirm Password</label>
                                                            <input type="password" name="con_pass" id="con_pass" class="form-control"
                                                                placeholder="Enter Password" aria-describedby="helpId">
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="adress">Permanant Address</label>
                                                            <input type="text" name="per_address" id="per_address"
                                                                class="form-control" placeholder="Enter Permanent Address"
                                                                aria-describedby="helpId">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="cou">Country</label>
                                                            <?php

                                                            $query="SELECT * FROM Country";
                                                            $result =queryRunner($query);
                                                            ?>

                                                            <select class="form-control" name="country" id="country-select-id">
                                                                <option value="">Country</option>
                                                                <?php while($row=rowRetriever($result)){
                                                                    ?>

                                                                    <option value="<?=$row['id']; ?>"><?=$row['name']; ?></option>
                                                                    <?php

                                                                }

                                                                ?>
                                                            </select>

<!--                                                            <select class="form-control" name="cou" id="cou">-->
<!--                                                                <option>Select Country</option>-->
<!--                                                                <option></option>-->
<!--                                                                <option></option>-->
<!--                                                            </select>-->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group city_input" style="display:none">
                                                            <label for="city">City</label>

                                                            <select class="form-control" name="city" id="city-select-id">
                                                                <option>Select City</option>
                                                                <option></option>
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12  profile_picture">
                                                        <!-- <div class="">
                                                           
                                                            <h4 class="picture_heading">Cover Photo <span class="recmend_size">(
                                                                    Recmended size 600 X 200 )</span> </h4>
                                                        </div> -->
                                                        <label for="">Upload Profile Picture</label>
                                                        <div class="card text-center uload-card upload_pic_card6">
                                                            <div class="file-upload6">
                                                                <div class="image-upload-wrap6">
                                                                    <input class="file-upload-input6" name="profile_pic" type="file"
                                                                        onchange="readURL6(this);" accept="image/*" />

                                                                    <div class="drag-text6">
                                                                        <div class="card-body upload-card-body6">
                                                                            <div class="upload-img6">
                                                                                <img src="public/image/upload.png" alt="" />
                                                                            </div>
                                                                            <div class="upload-image-format4">
                                                                                <p>
                                                                                    .JPG .PNG
                                                                                </p>
                                                                            </div>
                                                                            <div class="upload-detail6">
                                                                                <h4>You can also upload files by</h4>
                                                                                <div class="upload-clicking6">
                                                                                    <a href="#" class="">Clicking here</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="file-upload-content6">
                                                                    <img class="file-upload-image6" name="brand_cover_photo" src="#"
                                                                        alt="your image" />
                                                                    <input type="hidden" name="brand_cover_photo"
                                                                        id="brand-cover-photo">
                                                                    <div class="image-title-wrap6">
                                                                        <button type="button" onclick="removeUpload6()"
                                                                            class="btn remove-image6">
                                                                            Remove
                                                                            <span class="image-title6"
                                                                                style="display: none;">Uploaded
                                                                                Image</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                            
                                           
                                            
                                           
                                            

                                           
                                            <!-- <input type="text" name="fname" placeholder="First Name" />
                                            <input type="text" name="lname" placeholder="Last Name" />
                                            <input type="text" name="phno" placeholder="Contact No." />
                                            <input type="text" name="per_address" placeholder="Permanent Address" /> -->
                                            <!-- <input type="text" name="phno_2" placeholder="Alternate Contact No." /> -->
                                        </div>
                                        <!-- <input type="button" name="previous" class="previous action-button-previous"
                                            value="Previous" /> -->
                                            <button type="button" class="next action-button">
                                                <img src="public/image/right-arrow.svg" alt="">
                                            </button>
                                        <!-- <input type="button" name="next" class="next action-button" value="Next Step" /> -->
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h3 class="fs-title">Driving License Documents </h3>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mt-3">
                                                        <label for="reg">Registration No</label>
                                                        <input type="text" name="reg" id="reg" class="form-control"
                                                            placeholder="Enter Registration NO" aria-describedby="helpId">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="reg">Issue Date</label>
                                                        <input type="text" name="date_issue" id="date_issue"
                                                            class="form-control" placeholder="Enter Issue Date:2020/08/12"
                                                            aria-describedby="helpId">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="reg">Expire Date</label>
                                                        <input type="text" name="date_expire" id="date_expire"
                                                            class="form-control" placeholder="Enter Expire Date:2020/08/12"
                                                            aria-describedby="helpId">
                                                    </div>
                                                </div>
                                                <div class="col-md-6  front_licence">
                                                    <!-- <div class="">
                                                       
                                                        <h4 class="picture_heading">Cover Photo <span class="recmend_size">(
                                                                Recmended size 600 X 200 )</span> </h4>
                                                    </div> -->
                                                    <label for="">Licence Front Image</label>
                                                    <div class="card text-center uload-card upload_pic_card4">
                                                        <div class="file-upload4">
                                                            <div class="image-upload-wrap4">
                                                                <input class="file-upload-input4" name="licence_frontimage" type="file"
                                                                    onchange="readURL4(this);" accept="image/*" />

                                                                <div class="drag-text4">
                                                                    <div class="card-body upload-card-body4">
                                                                        <div class="upload-img4">
                                                                            <img src="public/image/upload.png" alt="" />
                                                                        </div>
                                                                        <div class="upload-image-format4">
                                                                            <p>
                                                                               .JPG .PNG
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
                                                                <img class="file-upload-image4" name="brand_cover_photo" src="#"
                                                                    alt="your image" />
                                                                <input type="hidden" name="brand_cover_photo"
                                                                    id="brand-cover-photo">
                                                                <div class="image-title-wrap4">
                                                                    <button type="button" onclick="removeUpload4()"
                                                                        class="btn remove-image4">
                                                                        Remove
                                                                        <span class="image-title4"
                                                                            style="display: none;">Uploaded
                                                                            Image</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 back_image_licence">
                                                    <label for="">Licence Back Image</label>
                                                    <div class="card text-center uload-card">
                                                      <div class="file-upload">
                                                        <div class="image-upload-wrap">
                                                          <input class="file-upload-input" type="file" name="licence_backimage" onchange="readURL(this);"
                                                            accept="image/*" />
                                                          <div class="screen-text">
                                                            <div class="card-body upload-card-body">
                                                              <div class="upload-img">
                                                                <img src="public/image/upload.png" alt="" />
                                                              </div>
                                                              <div class="upload-image-format">
                                                                <p>
                                                                  .JPG .PNG
                                                                </p>
                                                              </div>
                                                              <div class="upload-detail">
                                                               
                                                                <h4>You can also upload files by</h4>
                                                                <div class="upload-clicking">
                                                                  <a href="#" class="">Clicking here</a>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="file-upload-content">
                                                          <img class="file-upload-image"  src="#" alt="your image" />
                                                          <input type="hidden" name="brand_logo" id="brand-logo">
                                                          <div class="image-title-wrap">
                                                            <button type="button" onclick="removeUpload()" class="btn remove-image">
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
                                           
                                        </div>
                                        <button type="button" class="previous action-button-previous">
                                            <img src="public/image/left-arrow.svg" alt="">
                                        </button>
                                            <button type="button" class="next action-button">
                                                <img src="public/image/right-arrow.svg" alt="">
                                            </button>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h3 class="fs-title">Cnic Documents</h3>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mt-3">
                                                        <label for="cnic_reg">Cnic Registration</label>
                                                        <input type="text" name="cnic_reg" id="cnic_reg" class="form-control"
                                                            placeholder="Enter Registration NO" aria-describedby="helpId">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cnic_date_issue">Issue Date</label>
                                                        <input type="text" name="cnic_date_issue" id="cnic_date_issue"
                                                            class="form-control" placeholder="Enter Issue Date:2020/08/12"
                                                            aria-describedby="helpId">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cnic_date_expire">Expire Date</label>
                                                        <input type="text" name="cnic_date_expire" id="cnic_date_expire"
                                                            class="form-control" placeholder="Enter Expire Date:2020/08/12"
                                                            aria-describedby="helpId">
                                                    </div>
                                                </div>
                                                <div class="col-md-6  front_cnic_licence">
                                                    <!-- <div class="">
                                                       
                                                        <h4 class="picture_heading">Cover Photo <span class="recmend_size">(
                                                                Recmended size 600 X 200 )</span> </h4>
                                                    </div> -->
                                                    <label for="">Cnic Front Image</label>
                                                    <div class="card text-center uload-card upload_pic_card3">
                                                        <div class="file-upload3">
                                                            <div class="image-upload-wrap3">
                                                                <input class="file-upload-input3" name="cnic_frontimage" type="file"
                                                                    onchange="readURL3(this);" accept="image/*" />
                                                                <input type="hidden" id="cimagecimage" name="cover_image">
                                                                <div class="drag-text3">
                                                                    <div class="card-body upload-card-body3">
                                                                        <div class="upload-img3">
                                                                            <img src="public/image/upload.png" alt="" />
                                                                        </div>
                                                                        <div class="upload-image-format3">
                                                                            <p>
                                                                                .JPG .PNG
                                                                            </p>
                                                                        </div>
                                                                        <div class="upload-detail3">
                                                                            <h4>You can also upload files by</h4>
                                                                            <div class="upload-clicking3">
                                                                                <a href="#" class="">Clicking here</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="file-upload-content3">
                                                                <img class="file-upload-image3" name="brand_cover_photo" src="#"
                                                                    alt="your image" />
                                                                <input type="hidden" name="brand_cover_photo"
                                                                    id="brand-cover-photo">
                                                                <div class="image-title-wrap3">
                                                                    <button type="button" onclick="removeUpload3()"
                                                                        class="btn remove-image3">
                                                                        Remove
                                                                        <span class="image-title3"
                                                                            style="display: none;">Uploaded
                                                                            Image</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 back_cnic_image">
                                                    <label for="">Cnic Back Image</label>
                                                    <div class="card text-center uload-card upload_pic_card2">
                                                        <div class="file-upload2">
                                                            <div class="image-upload-wrap2">
                                                                <input class="file-upload-input2" name="cnic_backimage" type="file"
                                                                    onchange="readURLS(this);" accept="image/*" />
                                                                <input type="hidden" id="cimagecimage" name="cover_image">
                                                                <div class="drag-text2">
                                                                    <div class="card-body upload-card-body2">
                                                                        <div class="upload-img2">
                                                                            <img src="public/image/upload.png" alt="" />
                                                                        </div>
                                                                        <div class="upload-image-format2">
                                                                            <p>
                                                                                .JPG .PNG
                                                                            </p>
                                                                        </div>
                                                                        <div class="upload-detail2">
                                                                            <h4>You can also upload files by</h4>
                                                                            <div class="upload-clicking2">
                                                                                <a href="#" class="">Clicking here</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="file-upload-content2">
                                                                <img class="file-upload-image2" name="brand_cover_photo" src="#"
                                                                    alt="your image" />
                                                                <input type="hidden" name="brand_cover_photo"
                                                                    id="brand-cover-photo">
                                                                <div class="image-title-wrap2">
                                                                    <button type="button" onclick="removeUploads()"
                                                                        class="btn remove-image2">
                                                                        Remove
                                                                        <span class="image-title2"
                                                                            style="display: none;">Uploaded
                                                                            Image</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                   
                              
                                                  </div>
                                            </div>
                                           

                                           

                                            
                                            
                                        </div>
                                        <button type="button" class="previous action-button-previous">
                                            <img src="public/image/left-arrow.svg" alt="">
                                        </button>
                                            <button type="button" class="next action-button">
                                                <img src="public/image/right-arrow.svg" alt="">
                                            </button>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h3 class="fs-title">Payment Information</h3>
                                            <!-- <div class="radio-group">
                                                <div class='radio' data-value="credit"><img
                                                        src="https://i.imgur.com/XzOzVHZ.jpg" width="200px"
                                                        height="100px">
                                                </div>
                                                <div class='radio' data-value="paypal"><img
                                                        src="https://i.imgur.com/jXjwZlj.jpg" width="200px"
                                                        height="100px">
                                                </div> <br>
                                            </div> -->
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Hodler Name</label>
                                                        <input type="text" name="holder_name" id="holder_name"
                                                            class="form-control" placeholder="Enter Hoder name"
                                                            aria-describedby="helpId">

                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Bank Name</label>
                                                        <input type="text" name="bank_name" id="bank_name"
                                                            class="form-control" placeholder="Enter Bank name"
                                                            aria-describedby="helpId">

                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Account No</label>
                                                        <input type="text" name="account_no" id="account_no"
                                                            class="form-control" placeholder="Enter Account No"
                                                            aria-describedby="helpId">

                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Branch Code</label>
                                                        <input type="text" name="branch_code" id="branch_code"
                                                            class="form-control" placeholder="Enter Branch Code"
                                                            aria-describedby="helpId">

                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">IBAN NO</label>
                                                        <input type="text" name="iban_no" id="iban_no"
                                                            class="form-control" placeholder="Enter IBAN No"
                                                            aria-describedby="helpId">

                                                    </div>
                                                </div>
                                                <div class="col-md-12 bank_checque_pic">
                                                    <label for="">Bank Cheque Picture</label>
                                                    <div class="card text-center uload-card upload_pic_card5">
                                                        <div class="file-upload5">
                                                            <div class="image-upload-wrap5">
                                                                <input class="file-upload-input5" name="bank_chequeimage" type="file"
                                                                    onchange="readURL5(this);" accept="image/*" />
                                                                <input type="hidden" id="cimagecimage" name="cover_image">
                                                                <div class="drag-text5">
                                                                    <div class="card-body upload-card-body5">
                                                                        <div class="upload-img5">
                                                                            <img src="public/image/upload.png" alt="" />
                                                                        </div>
                                                                        <div class="upload-image-format5">
                                                                            <p>
                                                                                .JPG .PNG
                                                                            </p>
                                                                        </div>
                                                                        <div class="upload-detail5">
                                                                            <h4>You can also upload files by</h4>
                                                                            <div class="upload-clicking5">
                                                                                <a href="#" class="">Clicking here</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="file-upload-content5">
                                                                <img class="file-upload-image5" name="brand_cover_photo" src="#"
                                                                    alt="your image" />
                                                                <input type="hidden" name="brand_cover_photo"
                                                                    id="brand-cover-photo">
                                                                <div class="image-title-wrap5">
                                                                    <button type="button" onclick="removeUpload5()"
                                                                        class="btn remove-image5">
                                                                        Remove
                                                                        <span class="image-title5"
                                                                            style="display: none;">Uploaded
                                                                            Image</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                   
                              
                                                  </div>
                                            </div>


                                        </div> 
                                        <button type="button" class="previous action-button-previous">
                                            <img src="public/image/left-arrow.svg" alt="">
                                        </button>
                                            <button type="button" class="next action-button">
                                                <img src="public/image/right-arrow.svg" alt="">
                                            </button>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h3 class="fs-title">Car Detail</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-3">
                                                        <label for="car_brand">Car Brand</label>
                                                        <input type="text" name="car_brand" id="car_brand"
                                                            class="form-control" placeholder="Enter Car Brand"
                                                            aria-describedby="helpId">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-3">
                                                        <label for="car_name">Car Name</label>
                                                        <input type="text" name="car_name" id="car_name"
                                                            class="form-control" placeholder="Enter Car Name"
                                                            aria-describedby="helpId">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="car_color">Car Color</label>
                                                        <input type="text" name="car_color" id="car_color"
                                                            class="form-control" placeholder="Enter Car Color"
                                                            aria-describedby="helpId">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label for="car_no">Car Number</label>
                                                        <input type="text" name="car_no" id="car_no"
                                                            class="form-control" placeholder="Enter Car Number"
                                                            aria-describedby="helpId">
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-12">
                                                    <div class="form-group ">
                                                        <label for=""></label>
                                                        <input type="text" name="car_no" id="car_no"
                                                            class="form-control" placeholder="Enter Car Number"
                                                            aria-describedby="helpId">
                                                    </div>
                                                </div> -->
                                                <div class="col-md-12">
                                                    <div class="form-group ">
                                                        <label for="car_category">Car Category</label>
                                                        <?php

                                                        $query="SELECT * FROM RideCategory";
                                                        $result =queryRunner($query);
                                                        ?>

                                                        <select class="form-control" name="car_category" id="car_category">
                                                            <option value="">Select Car Category</option>
                                                            <?php while($row=rowRetriever($result)){
                                                                ?>

                                                                <option value="<?=$row['id']; ?>"><?=$row['name']; ?></option>
                                                                <?php

                                                            }

                                                            ?>
                                                        </select>

                                                        <!--                                                        <select class="form-control" name="car_category" id="car_category">-->
                                                        <!--                                                            <option>Select Car Category</option>-->
                                                        <!--                                                            <option></option>-->
                                                        <!--                                                            <option></option>-->
                                                        <!--                                                        </select>-->
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group ride_type_car " style="display: none">
                                                        <label for="car_type">Car Type</label>
<!--                                                        --><?php
//
//                                                        $query="SELECT * FROM ridetype";
//                                                        $result =queryRunner($query);
//                                                        ?>

                                                        <select class="form-control" name="car_type" id="car_type">
                                                            <option value="">Select Car Type</option>
                                                            <?php while($row=rowRetriever($result)){
                                                                ?>

                                                                <option value="<?=$row['id']; ?>"><?=$row['name']; ?></option>
                                                                <?php

                                                            }

                                                            ?>
                                                        </select>
<!--                                                        <select class="form-control" name="car_type" id="car_type">-->
<!--                                                            <option>Select Car Type</option>-->
<!--                                                            <option></option>-->
<!--                                                            <option></option>-->
<!--                                                        </select>-->
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <h3 class="picture_head">Add Car Pictures</h3>
                                                </div>
                                                <div class="col-md-12 certificates_pics">
                                                    <div class="addpro_main_head_second">
                                                        <!-- <h4>Adtional Images</h4> -->
        
                                                        <div class="uload-card">
                                                            <div>
        
                                                                <!--<div class="fallback">
                                                                <input name="file" type="file" multiple/>
                                                            </div>-->
        
                                                                <div class="dropzone needsclick dz-clickable" id="car_1">
        
        
                                                                    <div class="dz-message needsclick">
        
        
                                                                        <div class="card-body upload-card-body dz-button">
                                                                            <div class="upload-img">
                                                                                <img name="imagess" src="public/image/upload.png" alt="" />
                                                                            </div>
                                                                            <div class="upload-image-format">
                                                                                <p>
                                                                                    .JPG .PNG
                                                                                </p>
                                                                            </div>
                                                                            <div class="upload-detail">
                                                                                <h4
                                                                                    style="font-size: 12px;font-weight: 300;margin-top: -16px;font-family:'Raleway';">
                                                                                    You can also upload files by
                                                                                </h4>
                                                                                <div class="upload-clicking class=" note
                                                                                    needsclick "">
                                                                                    <a href="#" class="">Clicking here</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
        
        
                                                                    </div>
        
                                                                </div>
                                                            </div>
        
                                                        </div>
        
        
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <h3 class="picture_head">Add Documents Pictures</h3>
                                                </div>
                                                <!-- <div class="col-12">

                                                    <div class="images">
                                                        <div class="pic">
                                                            <span><i class="fas fa-cloud-upload-alt"></i></span>
                                                            <p>
                                                                .PDF .JPG .PNG .DOC
                                                            </p>
                                                            <h4>You can also upload files by</h4>
                                                            <div class="upload-click">
                                                                <a href="#" class="">Clicking here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <h3 class="picture_head">Add Car Documents picture</h3>
                                                </div> -->
                                                <div class="col-md-12 certificates_pics">
                                                    <div class="addpro_main_head_second">
                                                        <!-- <h4>Adtional Images</h4> -->
        
                                                        <div class="uload-card">
                                                            <div>
        
                                                                <!--<div class="fallback">
                                                                <input name="file" type="file" multiple/>
                                                            </div>-->
        
                                                                <div class="dropzone needsclick dz-clickable" id="doc_1">
        
        
                                                                    <div class="dz-message needsclick">
        
        
                                                                        <div class="card-body upload-card-body dz-button">
                                                                            <div class="upload-img">
                                                                                <img name="imagess"
                                                                                    src="public/image/upload.png" alt="" />
                                                                            </div>
                                                                            <div class="upload-image-format">
                                                                                <p>
                                                                                    .JPG .PNG
                                                                                </p>
                                                                            </div>
                                                                            <div class="upload-detail">
                                                                                <h4
                                                                                        style="font-size: 12px;font-weight: 300;margin-top: -16px;font-family:'Raleway';">
                                                                                    You can also upload files by
                                                                                </h4>
                                                                                <div class="upload-clicking class=" note
                                                                                    needsclick "">
                                                                                    <a href="#" class="">Clicking here</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
        
        
                                                                    </div>
        
                                                                </div>
                                                            </div>
        
                                                        </div>
        
        
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <button type="button" class="previous action-button-previous">
                                            <img src="public/image/left-arrow.svg" alt="">
                                        </button>
                                            <button type="submit" class="submit next action-button">
                                                <img src="public/image/right-arrow.svg" alt="">
                                            </button>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title text-center">Success !</h2> <br><br>
                                            <div class="row justify-content-center">
                                                <div class="col-3"> <img
                                                        src="public/image/check.svg"
                                                        class="fit-image"> </div>
                                            </div> <br><br>
                                            <div class="row justify-content-center">
                                                <div class="col-7 text-center">
                                                    <h5>You Have Successfully Signed Up</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- multistep form End -->

    <!-- why become a captain start -->
    <section class="captain-content">
        <div class="container">
            <h2 class="text-center"> Why become a captain? </h2>
            <div class="row text-center">
                <div class="col-lg-4">
                    <img src="public/image/calendar.svg" alt="">
                    <h4> Be your own boss </h4>
                    <p> Full time? Part time? With <br> Kareem you work on your own time. </p>
                </div>
                <div class="col-lg-4">
                    <img src="public/image/cash-payment.svg" alt="">
                    <h4> Make your own money </h4>
                    <p> You decide how much money you <br> make and when you make it. </p>
                </div>
                <div class="col-lg-4">
                    <img src="public/image/relax.svg" alt="">
                    <h4> Control your own life </h4>
                    <p> Take charge and achieve what you're <br> working for, on your own terms. </p>
                </div>

            </div>
        </div>


    </section>
    <!-- why become a captain end -->

    <!-- requirement section start -->
    <section class="requirement-content">
        <div class="requirent-cont">
            <div class="req-img">
                <img src="public/image/section3.jpg" alt="">
            </div>
            <div class="container">
                <div class="req">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Requirements</h2>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="med">
                                <div class="med-left">
                                    <span class="med-object">
                                     <img width="60px" src="public/image/age.svg">
                                    </span>
                                </div>
                                <div class="med-body">
                                    <h5 class="mt-0">Age</h5>
                                    You have to be over 18 years of age with  <br>
                                    a valid driver’s license to drive with
                                    Kareem.
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="med">
                                <div class="med-left">
                                    <span class="med-object">
                                          <img width="60px" src="public/image/smartphone.svg">
                                         </span>
                                </div>
                                <div class="med-body">
                                    <h5 class="mt-0"> Smartphone </h5>
                                    You will need an Android device to <br> receive bookings on our app.
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="med">
                                <div class="med-left">
                                    <span class="med-object">
                                        <img width="60px" src="public/image/car.svg">
                                    </span>
                                </div>
                                <div class="med-body">
                                    <h5 class="mt-0"> Car </h5>
                                    Depending on the city you want to work in, <br> your car must meet some requirements.
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="med">
                                <div class="med-left">
                                    <span class="med-object">
                                         <img width="60px" src="public/image/glass.svg">
                                    </span>

                                </div>
                                <div class="med-body">
                                    <h5 class="mt-0"> Screening </h5>
                                    The screening process may include drug tests, <br> police reports, credit checks etc.
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- requirement section end -->

    <!-- signup section -->
    <section class="capt-content">
        <div class="container">
            <h4> Have you got what it takes to be a Kareem Captain? </h4>
            <div><span><a href="#sign_up" class="btn  scrollToTop"> Sign up now </a></span></div>
        </div>
    </section>
    <!-- signup section end -->

    <section class="capt-get-started">
        <div class="container">
            <h1>How to get started</h1>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="main">
                        <div class="number">
                            <span>1</span>
                        </div>
                        <div class="text">
                            <h5>Register</h5>
                            Complete the form at the top and apply to become a Kareem Captain.
                        </div>
                    </div>
                    <div class="main">
                        <div class="number">
                            <span>2</span>
                        </div>
                        <div class="text">
                            <h5>Train</h5>
                            After reviewing your application we’ll invite you for a training session.
                        </div>
                    </div>
                    <div class="main">
                        <div class="number">
                            <span>3</span>
                        </div>
                        <div class="text">
                            <h5>Ride</h5>
                            When training is complete, you can start to earn money!
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-md-6 d-none d-md-block">
                    <img src="public/image/section5.jpg" alt="">
                </div>

            </div>
        </div>
        <!-- <div class="carousel-wrapper scrollelement-how-it-works">
            <div class="container">
                <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="slider-txt">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2> How Careem works </h2>
                                <ol class="carousel-indicators visible-lg" *ngif="!isMobile">
                                    <li data-target="#carousel" data-slide-to="0" class="">1</li>
                                    <li data-target="#carousel" data-slide-to="1" class="active">2</li>
                                    <li data-target="#carousel" data-slide-to="2" class="">3</li>
                                    <li data-target="#carousel" data-slide-to="3" class="">4</li>
                                    <li data-target="#carousel" data-slide-to="4" class="">5</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-sm-6 visible-lg">
                                    <div class="second-col">
                                        <h5> Download and sign in </h5>
                                        <p> Once you have completed the training and you are a certified Captain, you will
                                            download the driving app and sign in with your unique credentials </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="first-col">
                                        <div class="slider-wrapper"><img src="public/image/cap-1.jpg"
                                                alt="Careem Login"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-lg d-md-none .d-lg-none hidden-md">
                                    <div class="second-col">
                                        <h5> Download and sign in </h5>
                                        <p> Once you have completed the training and you are a certified Captain, you will
                                            download the driving app and sign in with your unique credentials </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-sm-6 visible-lg">
                                    <div class="second-col">
                                        <h5> Receive ride bookings </h5>
                                        <p> Once in the app, tap on "Go Online". You are now ready to receive bookings! When
                                            you get a ride booking, you'll see the pickup location and choose to accept or
                                            reject it based on your availability. </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="first-col">
                                        <div class="slider-wrapper"><img src="public/image/cap-2.jpg"
                                                alt="Careem Ride Booking"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-lg d-md-none .d-lg-none">
                                    <div class="second-col">
                                        <h5> Receive ride bookings </h5>
                                        <p> Once in the app, tap on "Go Online". You are now ready to receive bookings! When
                                            you get a ride booking, you'll see the pickup location and choose to accept or
                                            reject it based on your availability. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-sm-6 visible-lg">
                                    <div class="second-col">
                                        <h5> Pick up customers </h5>
                                        <p> If you have accepted a booking, the app will guide you to the pick-up location.
                                            Tap "Arrived for pickup" when you have reached the Customer </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="first-col">
                                        <div class="slider-wrapper"><img src="public/image/cap-3.jpg"
                                                alt="Careem Pickup Customer"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-lg d-md-none .d-lg-none">
                                    <div class="second-col">
                                        <h5> Pick up customers </h5>
                                        <p> If you have accepted a booking, the app will guide you to the pick-up location.
                                            Tap "Arrived for pickup" when you have reached the Customer </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-sm-6 visible-lg ">
                                    <div class="second-col">
                                        <h5> Complete the ride </h5>
                                        <p> The app supports Google navigation to guide you to the Customer’s destination.
                                            The customer could also guide you to the destination. </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="first-col">
                                        <div class="slider-wrapper"><img src="public/image/cap-4.jpg"
                                                alt="Careem Complete ride"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-lg d-md-none .d-lg-none">
                                    <div class="second-col">
                                        <h5> Complete the ride </h5>
                                        <p> The app supports Google navigation to guide you to the Customer’s destination.
                                            The customer could also guide you to the destination. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-sm-6 visible-lg">
                                    <div class="second-col">
                                        <h5> Earn money </h5>
                                        <p> Yay! Once you have dropped off the Customer your ride is complete and your
                                            earnings are reflected directly in the Captain Portal. You can collect cash for
                                            some rides, while for card or wallet-based payments, Careem will pay you for the
                                            ride. </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="first-col">
                                        <div class="slider-wrapper"><img src="public/image/cap-5.jpg"
                                                alt="Careem Earn Money"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-lg d-md-none .d-lg-none">
                                    <div class="second-col">
                                        <h5> Earn money </h5>
                                        <p> Yay! Once you have dropped off the Customer your ride is complete and your
                                            earnings are reflected directly in the Captain Portal. You can collect cash for
                                            some rides, while for card or wallet-based payments, Careem will pay you for the
                                            ride. </p>
                                    </div>
                                </div>
                            </div>
                        </div><a class="left carousel-control" href="#carousel" data-slide="prev"><span
                                class="left-ico"></span> </a><a class="right carousel-control" href="#carousel"
                            data-slide="next"><span class="right-ico"></span></a>
                        <ol class="carousel-indicators  hidden-lg d-md-none .d-lg-none" *ngif="isMobile">
                            <li data-target="#carousel" data-slide-to="0" class="">1</li>
                            <li data-target="#carousel" data-slide-to="1">2</li>
                            <li data-target="#carousel" data-slide-to="2">3</li>
                            <li data-target="#carousel" data-slide-to="3">4</li>
                            <li data-target="#carousel" data-slide-to="4">5</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div> -->

    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="logo">
                        <div class="im">
                            <h2>K</h2>
                        </div>
                        <div class="logo_name">
                            <h1>Kareem App</h1>
                        </div>
                    </div>
                    <div class="app_store">
                        <h1><span><i class="fab fa-apple"></i></span> App Store</h1>
                    </div>
                    <div class="google_store">
                        <h1><span><i class="fab fa-google"></i></span> Google Store</h1>
                    </div>
                    <div class="icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-twitter"></i></span>
                       <span><i class="fab fa-linkedin"></i></span>
                    </div>
        
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <h1 class="main_head">NAVIGATION</h1>
                    <ul>
                        <li>Contact</li>
                        <li>About Us</li>
                        <li>Blog</li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <h1 class="main_head">ABOUT US</h1>
                    <ul>
                        <li>FAQ</li>
                        <li>Contact</li>
                        <li>Feature</li>
                        <li>Client</li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <h1 class="main_head">CONTACT</h1>
                    <ul>
                        <li>2223424</li>
                        <li>hello@app</li>
                        
                    </ul>
                </div>
                <div class="col-xl-12">
                    <h1 class="footer_copy text-center">
                        © Copyright 2020 apartrent
                    </h1>
                </div>
            </div>
        </div>
        
            </footer>


    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <!-- jQuery easing plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript">
    </script>





    <!-- <script src="public/assets/jquery.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="public/assets/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="public/assets/owl.carousel.min.js"></script>
    <script src="public/js/customjs.js"></script>
    <script src="public/js/dropzone.js"></script>
    <script src="public/js/custom_request.js"></script>



   <script>
       var dresult;
       var dresult2;
       Dropzone.autoDiscover = false;
        var myDropzoneTheFirst = new Dropzone(
        //id of drop zone element 1
        '#car_1', {
                url: '../admin/framework/main_action.php?action_type=create&request_type=be_captain&functionality_type=insert_picture&panel_type=Web&id=' +
                    $("#random-no1").val(),
                uploadMultiple: true,
                parallelUploads: 5,
                maxFiles: 5,
                // maxFilesize: 1,
                addRemoveLinks: true,
                acceptedFiles: 'image/*',
            previewTemplate: `<div class="dz-preview dz-file-preview">

<div class="dz-image"><img data-dz-thumbnail /></div>
<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>

<div class="dz-error-message"><span data-dz-errormessage></span></div>
<div class="dz-error-message"><i class="fa fa-warning">&nbsp;</i><span data-dz-errormessage></span></div>
<div class="dz-filename"><span data-dz-name></span></div>
<div class="dz-progress">
  <span class="dz-upload" data-dz-uploadprogress></span>
</div>
<div class="dz-remove">
<div>
  <a href="javascript:undefined;" data-dz-remove=""style="color:red;" >Delete</a>
  </div>
 </div>
</div>
  `,
                init: function () {
                    dzClosure = this;

                    dzClosure.on("success", function (file, response) {

                        var _this = this;
                        // console.log("sucesso" + response + " file  data:" + file.name);
                        var data = JSON.parse(response);
                        dresult = data.listOfData;
                        console.log(dresult);

                    });
                    dzClosure.on("removedfile", function (file) {

                        console.log("File REmoved Successfully = " + file.name + " file = " + file.id);


                        for (var i = 0; i < dresult.length; i++) {


                            var n = dresult[i].id;
                            var name = dresult[i].name;
                            if (file.name == name) {
                                console.log("Data  Id = " + dresult[i].id + " Name = " + dresult[i].name);
                                sendRequest(
                                    "?action_type=delete&request_type=be_captain&functionality_type=delete_products_picture&panel_type=Web", {
                                        id: n,


                                    }, "POST")
                                    .then((data) => {
                                        console.log(data)
                                        var data = JSON.parse(data);
                                        console.log("Successfully Delete " + data);


                                    })
                                    .catch((error) => {
                                        console.log(error)
                                    })

                            }


                        }



                    });
                }

        }
    );

var myDropzoneTheSecond = new Dropzone(
        //id of drop zone element 2
        '#doc_1', {
        url: '../admin/framework/main_action.php?action_type=create&request_type=be_captain&functionality_type=insert_picture&panel_type=Web&id=' +
            $("#random-no2").val(),
            uploadMultiple: true,
            parallelUploads: 5,
            maxFiles: 5,
            // maxFilesize: 1,
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            previewTemplate: `<div class="dz-preview dz-file-preview">

<div class="dz-image"><img data-dz-thumbnail /></div>
<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>

<div class="dz-error-message"><span data-dz-errormessage></span></div>
<div class="dz-error-message"><i class="fa fa-warning">&nbsp;</i><span data-dz-errormessage></span></div>
<div class="dz-filename"><span data-dz-name></span></div>
<div class="dz-progress">
  <span class="dz-upload" data-dz-uploadprogress></span>
</div>
<div class="dz-remove">
<div>
  <a href="javascript:undefined;" data-dz-remove=""style="color:red;" >Delete</a>
  </div>
 </div>
</div>
  `,
        init: function () {
            dzClosure = this;

            dzClosure.on("success", function (file, response) {

                var _this = this;
                // console.log("sucesso" + response + " file  data:" + file.name);
                var data = JSON.parse(response);
                dresult2 = data.listOfData;
                console.log(dresult2);

            });
            dzClosure.on("removedfile", function (file) {

                console.log("File REmoved Successfully = " + file.name + " file = " + file.id);


                for (var i = 0; i < dresult2.length; i++) {


                    var n = dresult2[i].id;
                    var name = dresult2[i].name;
                    if (file.name == name) {
                        console.log("Data  Id = " + dresult2[i].id + " Name = " + dresult2[i].name);
                        sendRequest(
                            "?action_type=delete&request_type=be_captain&functionality_type=delete_products_picture&panel_type=Web", {
                                id: n,


                            }, "POST")
                            .then((data) => {
                                console.log(data)
                                var data = JSON.parse(data);
                                console.log("Successfully Delete " + data);


                            })
                            .catch((error) => {
                                console.log(error)
                            })

                    }


                }



            });
        }

            // success:function(file,response){
        //     var _this = this;
        //     console.log("sucesso" + response + " file  data:" + file.name);
        //     var data = JSON.parse(response);
        //     dresult = data.listOfData;
        //     console.log(dresult);
        //
        // }
        }
    );

   </script>

    <script>
        $("form#msform").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: '../admin/framework/main_action.php?action_type=create&request_type=be_captain&functionality_type=insert_captain&panel_type=Web',
                type: 'POST',
                data: formData,
                success: function (data) {
                    // alert(data)
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
     
        $(document).ready(function () {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function () {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });

            $(".previous").click(function () {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function () {
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });

            $(".submit").click(function () {
                // var form = $("#msform").serialize();


                // $.ajax({
                //
                //     url: "../Admin_dashboard/framework/main_action.php?action_type=create&request_type=be_captain&functionality_type=insert_captain&panel_type=Web",
                //     // type: json_type,
                //     method:"Post",
                //     data: form,
                //     success: function (data) {
                //         console.log("Send Request : "+data);
                //         // resolve(data)
                //     },
                //     error: function (error) {
                //         console.log("Send Request error : "+error);
                //         // reject(error)
                //     },
                // })
                //

                // alert("hello");
                // return false;
            })

        });






        uploadImage();
        uploadImage2();

        function uploadImage() {
            var button = $('.images .pic')
            var uploader = $('<input type="file" accept="image/*" />')
            var images = $('.images')

            button.on('click', function () {
                uploader.click()
            })

            uploader.on('change', function () {
                var reader = new FileReader()
                reader.onload = function (event) {
                    images.prepend('<div class="img" style="background-image: url(\'' + event.target
                        .result + '\');" rel="' + event.target.result + '"><span>remove</span></div>')
                }
                reader.readAsDataURL(uploader[0].files[0]);

            })

            images.on('click', '.img', function () {
                $(this).remove()
            })

        }

        function uploadImage2() {
            var button = $('.images2 .pic2')
            var uploader = $('<input type="file" accept="image/*" />')
            var images = $('.images2')

            button.on('click', function () {
                uploader.click()
            })

            uploader.on('change', function () {
                var reader = new FileReader()
                reader.onload = function (event) {
                    images.prepend('<div class="img2" style="background-image: url(\'' + event.target
                        .result + '\');" rel="' + event.target.result + '"><span>remove</span></div>')
                }
                reader.readAsDataURL(uploader[0].files[0]);

            })

            images.on('click', '.img2', function () {
                $(this).remove()
            })

        }
    </script>

<script>
    $(document).on('change', '#country-select-id', function () {

        var id = $(this).val();
        alert(id);


        sendRequest("?action_type=retrieve&request_type=all_reports&functionality_type=retrieve_all_cities&panel_type=Panel", {
            id: id,
            // enable: enable_val,
        }, "POST")
            .then((data) => {
                var data = JSON.parse(data);
                if (data.code == "202") {

                    var list = data.listOfData;
                    $(".city_input").show();
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

    $(document).on('change', '#car_category', function () {

        var id = $(this).val();


        sendRequest("?action_type=retrieve&request_type=be_captain&functionality_type=get_ride_type&panel_type=Web", {
            id: id,
            // enable: enable_val,
        }, "POST")
            .then((data) => {
                var data = JSON.parse(data);
                if (data.code == "202") {

                    var list = data.listOfData;
                    $(".ride_type_car").show();
                    $("#car_type").empty();
                    var text1="<option id=\"type-name\" value=\"\">Select City</option>";
                    $("#car_type").append(text1);
                    for (var i = 0; i < list.length; i++) {


                        var n = list[i].id;
                        // var picture = list[i].picture;
                        var name = list[i].name;
                        var text="<option  value=\""+n+"\">"+name+"</option>";

                        $("#type-name").after(text);




                        // $("#add_payment_modal_edit").modal('show');
                    }

                }


            })
            .catch((error) => {
                console.log(error)
            })

    });
</script>

</body>

</html>