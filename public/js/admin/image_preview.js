function setImagePreview(input, id, extensions, size, validWidth, validHeight, proportion) {

    $('#' + id + '_error').hide();
    $('#' + id + '_error_lrv').hide();
    //$('#preview_' + id).hide();
    $('#' + id).removeClass('is-invalid');

    if (input.files && input.files[0]) {

        var imageName = $('#' + id).val();
        var imageExt = imageName.substring(imageName.lastIndexOf('.') + 1).toLowerCase();

        if (!extensions.includes(imageExt) || input.files[0].size > size) {
            showError();
            return false;
        }

        var reader = new FileReader();

        reader.onload = function (e) {

            var image = new Image();
            image.src = e.target.result;

            image.onload = function () {
                //console.log(this.width + ' x ' + this.height);
                if (this.width != validWidth || this.height != validHeight) {
                    showError();
                    //return false;
                } else { 
                    $('#preview_' + id).css("padding-top", 0);
                    $('#preview_' + id).html('<img id="image_preview" src="' + image.src + '" alt="" class="img-fluid image_preview">');
                    
                }
                
                //$('#preview_' + id).show();
            };

        };

        reader.readAsDataURL(input.files[0]);
    }

    function showError() {
        $('#' + id + '_error').show();
        $('#' + id).addClass('is-invalid');
        $('#' + id).val('');
        $('#preview_' + id).html('');
        $('#preview_' + id).css("padding-top", proportion + "%");
    }
}