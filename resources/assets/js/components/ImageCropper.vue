<template>
    <div class="row">
        <div class="col-md-8">
            <div class="cropper">
                <img ref="image" style="max-width:100%" :src="imgUrl" alt="avatar">
            </div>

            <label class="btn btn-animate btn-animate-vertical btn-primary waves-effect waves-classic">
                <input style="display:none;" type="file" accept="image/*"/>
                <span><i class="icon md-upload" aria-hidden="true"></i>Загрузить другое фото</span>
            </label>
        </div>
        <div class="col-md-4">
            <div class="cropper-preview clearfix" id="simpleCropperPreview">
                <div ref="preview" class="img-preview preview-xs"></div>
            </div>
            <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</template>

<script>
    import Cropper from 'cropperjs'

    export default {
        name: "image-cropper",
        props: ['imgUrl'],
        mounted() {
            console.log(this.$refs.image);
            console.log(document.querySelectorAll('.img-preview'));

            function each(arr, callback) {
                var length = arr.length;
                var i;
                for (i = 0; i < length; i++) {
                    callback.call(arr, arr[i], i, arr);
                }
                return arr;
            }

            // var img = this.$refs.image;
            // var cropper = new Cropper(img, {
            //     aspectRatio: 9 / 9,
            //     preview: "#simpleCropperPreview >.img-preview",
            //     minContainerWidth: 400,
            //     minContainerHeight: 300,
            //     responsive: true,
            //     movable: false,
            //     zoomable: false,
            //     rotatable: false,
            //     scalable: false
            // });

            var image = this.$refs.image;
            var preview = document.querySelectorAll('.img-preview');
            var cropper = new Cropper(image, {
                ready: function () {
                    var clone = image.cloneNode();
                    clone.className = ''
                    clone.style.cssText = (
                        'display: block;' +
                        'width: 100%;' +
                        'min-width: 0;' +
                        'min-height: 0;' +
                        'max-width: none;' +
                        'max-height: none;'
                    );
                    each(preview, function (elem) {
                        elem.appendChild(clone.cloneNode());
                    });
                },
                crop: function (e) {
                    var data = e.detail;
                    var cropper = this.cropper;
                    var imageData = cropper.getImageData();
                    var previewAspectRatio = data.width / data.height;
                    // var elem = preview;
                    each(preview, function (elem) {
                        var previewImage = elem.getElementsByTagName('img').item(0);
                        var previewWidth = elem.offsetWidth;
                        var previewHeight = previewWidth / previewAspectRatio;
                        var imageScaledRatio = data.width / previewWidth;
                        elem.style.height = previewHeight + 'px';
                        previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                        previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                        previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                        previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';
                    });
                }
            });

        },
        methods: {}
    }
</script>