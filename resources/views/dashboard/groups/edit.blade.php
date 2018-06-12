@extends('dashboard.layouts.app')

@push('styles')
    <link rel="stylesheet" href="/global/vendor/blueimp-file-upload/jquery.fileupload.css">
    <link rel="stylesheet" href="/global/vendor/dropify/dropify.css">
@endpush


@section('content')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Настройки группы</h1>
        </div>

        <div class="page-content container-fluid">

            @if (session('updated'))
                <div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon md-check" aria-hidden="true"></i>
                    Данные группы успешно обновлены
                </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert dark alert-icon alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="icon md-alert-circle-o" aria-hidden="true"></i>
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            <form id="update-profile" action="{{ route('group.update', [$group->id]) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body container-fluid">
                                <div class="form-group form-material floating @if ($errors->has('name')) has-danger @endif"
                                     data-plugin="formMaterial">
                                    <input type="text" class="form-control" name="name"
                                           value="{{ old('name') ? old('name') : $group->name }}"/>
                                    <label class="floating-label">Название группы</label>
                                </div>

                                <div class="form-group form-material floating"
                                     data-plugin="formMaterial">
                                    <select class="form-control" name="privacy">
                                        <option value="0" @if($group->privacy==0) selected @endif>Общедоступная</option>
                                        <option value="1" @if($group->privacy==1) selected @endif>Приватная</option>
                                    </select>
                                    <label class="floating-label">Приватность группы</label>
                                </div>


                                <div class="form-group form-material floating @if ($errors->has('description')) has-danger @endif"
                                     data-plugin="formMaterial">
                                    <textarea id="textarea" class="form-control" name="description" oninput="textareaResize()">{{ old('description') ? old('description') : $group->description }}</textarea>
                                    <label class="floating-label">Описание группы</label>
                                </div>

                                <div class="col-xl-4 col-md-6">
                                    <!-- Example Default Value -->
                                        <h4 class="example-title">Изображение группы</h4>
                                        <div class="example">
                                            <input type="file" accept="image/*" id="input-file-now-custom-1" data-plugin="dropify" data-default-file="{{ $group->avatar_path }}" name="avatar"
                                            />
                                        </div>
                                    <!-- End Example Default Value -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-lg float-right">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Page -->

    <script src="/assets/js/Site.js"></script>
    <script src="/global/js/Plugin/asscrollable.js"></script>
    <script src="/global/js/Plugin/slidepanel.js"></script>
    <script src="/global/js/Plugin/switchery.js"></script>
    <script src="/global/js/Plugin/jquery-placeholder.js"></script>
    <script src="/global/js/Plugin/material.js"></script>

    <script src="/global/vendor/jquery-ui/jquery-ui.js"></script>
    <script src="/global/vendor/blueimp-tmpl/tmpl.js"></script>
    <script src="/global/vendor/blueimp-canvas-to-blob/canvas-to-blob.js"></script>
    <script src="/global/vendor/blueimp-load-image/load-image.all.min.js"></script>
    <script src="/global/vendor/blueimp-file-upload/jquery.fileupload.js"></script>
    <script src="/global/vendor/blueimp-file-upload/jquery.fileupload-process.js"></script>
    <script src="/global/vendor/blueimp-file-upload/jquery.fileupload-image.js"></script>
    <script src="/global/vendor/blueimp-file-upload/jquery.fileupload-audio.js"></script>
    <script src="/global/vendor/blueimp-file-upload/jquery.fileupload-video.js"></script>
    <script src="/global/vendor/blueimp-file-upload/jquery.fileupload-validate.js"></script>
    <script src="/global/vendor/blueimp-file-upload/jquery.fileupload-ui.js"></script>
    <script src="/global/vendor/dropify/dropify.min.js"></script>

    <script src="/global/js/Plugin/dropify.js"></script>

    <script src="/assets/examples/js/forms/uploads.js"></script>


    <script>
        // console.log('yes');
        // $(document).on('ready', function() {
        $('.form-control').bind('input propertychange', function () {
            // console.log('yes');
            // $('#count').text(this.value.length)
            $(this).parents('.form-group').removeClass('has-danger');
        });

        // console.log('yes');
        // $('.form-control').on('change', function() {
        //     console.log('yes');
        //     $(this).removeClass('has-danger');
        // })
        // })

        function textareaResize() {
            var textarea = document.getElementById('textarea');
            textarea.style.minHeight = textarea.scrollHeight + 'px';
        }
    </script>
@endpush