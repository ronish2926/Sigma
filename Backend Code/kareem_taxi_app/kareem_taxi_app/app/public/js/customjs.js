  // picture info 
  function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-upload-wrap').hide();

            $('.file-upload-image').attr('src', e.target.result);
            $('.file-upload-content').show();

            $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
}

function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});
// screen shot image upload
function readURLS(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-upload-wrap2').hide();

            $('.file-upload-image2').attr('src', e.target.result);
            $('.file-upload-content2').show();

            $('.image-title2').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUploads();
    }
}

function removeUploads() {
    $('.file-upload-input2').replaceWith($('.file-upload-input2').clone());
    $('.file-upload-content2').hide();
    $('.image-upload-wrap2').show();
}
    //categories modal 
    function readURL3(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {
                $('.image-upload-wrap3').hide();

                $('.file-upload-image3').attr('src', e.target.result);
                $('.file-upload-content3').show();

                $('.image-title3').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload3();
        }
    }

    function removeUpload3() {
        $('.file-upload-input3').replaceWith($('.file-upload-input3').clone());
        $('.file-upload-content3').hide();
        $('.image-upload-wrap3').show();
    }
        //childcataories modal function
        function readURL4(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-upload-wrap4').hide();

                    $('.file-upload-image4').attr('src', e.target.result);
                    $('.file-upload-content4').show();

                    $('.image-title4').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);

            } else {
                removeUpload4();
            }
        }

        function removeUpload4() {
            $('.file-upload-input4').replaceWith($('.file-upload-input4').clone());
            $('.file-upload-content4').hide();
            $('.image-upload-wrap4').show();
        }


        // card 5

        function readURL5(input) {
            if (input.files && input.files[0]) {
    
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    $('.image-upload-wrap5').hide();
    
                    $('.file-upload-image5').attr('src', e.target.result);
                    $('.file-upload-content5').show();
    
                    $('.image-title5').html(input.files[0].name);
                };
    
                reader.readAsDataURL(input.files[0]);
    
            } else {
                removeUpload5();
            }
        }
    
        function removeUpload5() {
            $('.file-upload-input5').replaceWith($('.file-upload-input5').clone());
            $('.file-upload-content5').hide();
            $('.image-upload-wrap5').show();
        }

        // card 6

        function readURL6(input) {
            if (input.files && input.files[0]) {
    
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    $('.image-upload-wrap6').hide();
    
                    $('.file-upload-image6').attr('src', e.target.result);
                    $('.file-upload-content6').show();
    
                    $('.image-title6').html(input.files[0].name);
                };
    
                reader.readAsDataURL(input.files[0]);
    
            } else {
                removeUpload6();
            }
        }
    
        function removeUpload6() {
            $('.file-upload-input6').replaceWith($('.file-upload-input6').clone());
            $('.file-upload-content6').hide();
            $('.image-upload-wrap6').show();
        }
