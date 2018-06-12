@extends('dashboard.layouts.app')

@push('styles')
    <link rel="stylesheet" href="/global/vendor/blueimp-file-upload/jquery.fileupload.css">
    <link rel="stylesheet" href="/global/vendor/dropify/dropify.css">
@endpush


@section('content')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Редактировать профиль</h1>
        </div>

        <div class="page-content container-fluid">

            @if (session('updated'))
                <div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon md-check" aria-hidden="true"></i>
                    Ваши данные успешно обновлены
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

            <form id="update-profile" action="{{ route('profile.update') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Основная информация</h3>
                            </div>
                            <div class="panel-body container-fluid">
                                <div class="form-group form-material floating @if ($errors->has('first_name')) has-danger @endif" data-plugin="formMaterial">
                                    <input type="text" class="form-control" name="first_name"
                                           value="{{ old('first_name') ? old('first_name') : $user->first_name }}"/>
                                    <label class="floating-label">Имя</label>
                                </div>
                                <div class="form-group form-material floating @if ($errors->has('last_name')) has-danger @endif" data-plugin="formMaterial">
                                    <input type="text" class="form-control" name="last_name"
                                           value="{{ old('last_name') ? old('last_name') : $user->last_name }}"/>
                                    <label class="floating-label">Фамилия</label>
                                </div>
                                <div class="form-group form-material floating @if ($errors->has('position')) has-danger @endif" data-plugin="formMaterial">
                                    <input type="text" class="form-control" name="position"
                                           value="{{ old('position') ? old('position') : $user->position }}"/>
                                    <label class="floating-label">Должность</label>
                                </div>
                                    <h4 class="example-title">Обложка профиля</h4>
                                    <div class="example col-xl-8 col-md-10">
                                        <input type="file" accept="image/*" id="input-file-now-custom-1" data-plugin="dropify" data-default-file="{{ $user->cover }}" name="cover" />
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Дополнительная информация</h3>
                            </div>
                            <div class="panel-body container-fluid">
                                <div class="form-group form-material floating" data-plugin="formMaterial">
                                    <input type="text" class="form-control" name="phone_number"
                                           value="{{ old('phone_number') ? old('phone_number') : $user->profile->phone_number }}"/>
                                    <label class="floating-label">Номер телефона</label>
                                </div>
                                <div class="form-group form-material floating" data-plugin="formMaterial">
                                    <textarea class="form-control" rows="4"
                                              name="about">{{ old('about') ? old('about') : $user->profile->about }}</textarea>
                                    <label class="floating-label">Обо мне</label>
                                </div>
                                <div class="form-group form-material floating" data-plugin="formMaterial">
                                    <input type="text" class="form-control" name="facebook"
                                           value="{{ old('facebook') ? old('facebook') : $user->profile->facebook }}"/>
                                    <label class="floating-label">Ссылка на профиль facebook</label>
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
        $('.form-control').bind('input propertychange', function() {
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
    </script>
@endpush