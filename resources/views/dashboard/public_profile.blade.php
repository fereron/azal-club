@extends('dashboard.layouts.app')

@push('styles')
    <link rel="stylesheet" href="/assets/examples/css/uikit/modals.css">
    <link rel="stylesheet" href="/global/vendor/cropper/cropper.css">
    <link rel="stylesheet" href="/assets/examples/css/forms/image-cropping.css">

    <link rel="stylesheet" href="/global/vendor/ladda/ladda.css">
    <link rel="stylesheet" href="/assets/examples/css/uikit/buttons.css">
    <link rel="stylesheet" href="/assets/examples/css/pages/profile_v3.css">
@endpush


@section('content')
<div class="page">
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <img class="card-img-top w-full" src="{{ $user->cover }}">
                    <div class="card-block wall-person-info">
                        <a href="javascript:void(0)" class="avatar bg-white img-bordered person-avatar" data-target="#exampleNiftyFadeScale" data-toggle="modal">
                            <img src="{{ $user->avatar_path }}">
                        </a>

                        <h2 class="person-name">
                            <a href="javascript:void(0)">{{ $user->full_name }}</a>
                        </h2>
                        <p class="card-text">
                            {{ $user->email }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-block">
                    <h4 class="card-title">Обо мне</h4>
                    <p class="card-text">
                        {{ $user->profile->about }}
                    </p>
                </div>
                <div class="card p-20">
                    <h4 class="card-title">
                        Контактная информация
                    </h4>
                    <div class="card-block p-0">
                        <p data-info-type="phone" class="mb-10 text-nowrap">
                            <i class="icon md-phone mr-10"></i>
                            <span class="text-break">{{ $user->profile->phone_number }}
                                <span>
                        </p>
                        @if ($user->profile->facebook)
                            <p data-info-type="fb" class="mb-10 text-nowrap">
                                <i class="icon bd-facebook mr-10"></i>
                                <span class="text-break">{{ $user->profile->facebook }}<span>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="/global/vendor/cropper/cropper.min.js"></script>
    <script src="/assets/examples/js/forms/image-cropping.js"></script>
    <script src="/assets/examples/js/forms/profile-image-cropping.js"></script>

    <script src="/global/vendor/ladda/spin.min.js"></script>
    <script src="/global/vendor/ladda/ladda.min.js"></script>

    <script src="/global/js/Plugin/loading-button.js"></script>
    <script src="/global/js/Plugin/more-button.js"></script>
    <script src="/global/js/Plugin/ladda.js"></script>
@endpush