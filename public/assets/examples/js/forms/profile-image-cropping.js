$(document).ready(function () {

    var options = {
        aspectRatio: 9 / 9,
        preview: "#simpleCropperPreview >.img-preview",
        minContainerWidth: 400,
        minContainerHeight: 300,
        responsive: true,
        // movable: false,
        // zoomable: false,
        rotatable: false,
        scalable: false
    }

    var $imageCropper = $('#cropper img');

    $imageCropper.cropper(options);

    $('#upload_image').on('change', function (e) {
        var fileReader = new FileReader(),
            files = this.files,
            file;

        if (!files.length) {
            return;
        }

        file = files[0];

        if (/^image\/\w+$/.test(file.type)) {
            fileReader.readAsDataURL(file);
            fileReader.onload = function () {
                $imageCropper.cropper("reset", true).cropper("replace", this.result);
                $('#upload_image').val("");
            };
        } else {
            showMessage("Please choose an image file.");
        }
    });

    $('#upload-avatar').on('click', function(e) {
        e.preventDefault();

        var result = $imageCropper.cropper('getCroppedCanvas', { "width": 200, "height": 200 });

        if (result) {

            $.ajax(window.location.origin + '/api/user/avatar', {
                method: 'POST',
                data: {
                    image: result.toDataURL()
                },
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (html) {
                    if (html.success) {
                        $('.person-avatar').find('img').remove();
                        $('.person-avatar').append('<img src="/storage/avatars/' + html.avatar + '" alt="alt">');

                        $('.avatar-online').find('img').remove();
                        $('.avatar-online').append('<img src="/storage/avatars/' + html.avatar + '" alt="alt">');

                        $('#exampleNiftyFadeScale').modal('hide')
                    }
                },
            });
        }
    });
});