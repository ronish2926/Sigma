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