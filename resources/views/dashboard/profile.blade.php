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
                    <img class="card-img-top w-full" src="/global/photos/placeholder.png">
                    <div class="card-block wall-person-info">
                        <a href="javascript:void(0)" class="avatar bg-white img-bordered person-avatar" data-target="#exampleNiftyFadeScale" data-toggle="modal">
                            <img src="{{ $user->avatar_path }}">
                        </a>

                        <!-- Modal -->
                        <div class="modal fade modal-fade-in-scale-up" id="exampleNiftyFadeScale" aria-hidden="true"
                             aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-simple modal-center" style="max-width:700px">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title">Изменить фотографию профиля</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="cropper" id="cropper">
                                                    <img style="max-width:100%" src="{{ $user->avatar_path }}" alt="avatar">
                                                </div>

                                                <label class="btn btn-animate btn-animate-vertical btn-primary waves-effect waves-classic">
                                                    <input id="upload_image" style="display:none;" type="file" accept="image/*"/>
                                                    <span><i class="icon md-upload" aria-hidden="true"></i>Загрузить другое фото</span>
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <h4 class="mt-0 mb-20">Фотография профиля</h4>
                                                <div class="cropper-preview clearfix" id="simpleCropperPreview">
                                                    <div style="width:180px;height:180px" class="img-preview"></div>
                                                </div>
                                                <div class="buttons mt-30">
                                                    <button type="button" id="upload-avatar" class="btn btn-success ladda-button waves-effect waves-classic" data-style="expand-down" data-plugin="ladda">
                                                        <span class="ladda-label">Сохранить</span>
                                                    </button>
                                                    <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Отменить</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                        <h2 class="person-name">
                            <a href="javascript:void(0)">{{ $user->full_name }}</a>
                        </h2>
                        <p class="card-text">
                            {{ $user->email }}
                            <a href="{{ route('settings') }}" class="blue-grey-400 float-right">Редактировать профиль</a>
                        </p>
                    </div>
                </div>
                <div class="card card-shadow wall-posting">
                    <div class="card-block p-0">
                        <div class="form-group mb-0">
                            <input class="form-control form-control-lg" type="text" name="write" placeholder="Whats in your mind today?"
                            />
                            <div class="p-10">
                                <button class="btn btn-pure btn-default icon md-image" type="button" name="button"></button>
                                <button class="btn btn-pure btn-default icon md-tv-play" type="button" name="button"></button>
                                <button class="btn btn-pure btn-default icon md-calendar" type="button" name="button"></button>
                                <button class="btn btn-pure btn-default icon md-map" type="button" name="button"></button>
                                <button class="btn btn-primary btn-round submit float-right mr-10">
                                    Post
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-shadow">
                    <div class="card-block media clearfix p-25">
                        <div class="pr-20">
                            <a href="#" class="avatar avatar-lg">
                                <img class="img-fluid" src="/global/portraits/6.jpg">
                            </a>
                        </div>
                        <div class="media-body text-middle">
                            <h4 class="mt-0 mb-5">
                                Mallinda Hollaway
                            </h4>
                            <small>Posted on 31st Aug 2017 at 07:00</small>
                        </div>
                    </div>
                    <div class="card-block px-25  pt-0">
                        <p class="card-text mb-20">
                            Aute tempor tempor eiusmod deserunt occaecat velit. Est id incididunt adipisicing
                            ex duis. In cupidatat esse adipisicing ad amet cillum. Id id
                            officia eiusmod excepteur. Cupidatat sint deserunt aliqua est
                            mollit ut tempor anim. Laboris sunt dolor ad et irure veniam
                            culpa pariatur consectetur. Esse commodo culpa dolore do cupidatat
                            exercitation culpa amet. Esse labore mollit eu cillum velit.
                        </p>
                        <div class="row imgs-gallery mb-20 no-space">
                            <div class="col-lg-12">
                                <a href="/global/photos/placeholder.png" alt="..." class="gallery-item" data-img-id="m_1"
                                   title="view_1">
                                    <img src="/global/photos/placeholder.png" class="w-full">
                                </a>
                            </div>
                        </div>
                        <ul class="wall-attrs clearfix p-0 m-0">
                            <li class="attrs-meta float-left">
                    <span>
                      <i class="icon md-chat"></i> 36
                    </span>
                                <span class="success ml-10">
                      </if>
                                    <i class="icon md-heart"></i> 220
                    </span>
                            </li>
                            <li class="float-right">
                                <a href="#" class="avatar avatar-sm" data-paticipator-id="p_1">
                                    <img src="/global/portraits/3.jpg">
                                </a>
                                <a href="#" class="avatar avatar-sm" data-paticipator-id="p_2">
                                    <img src="/global/portraits/1.jpg">
                                </a>
                                <a href="#" class="avatar avatar-sm" data-paticipator-id="p_3">
                                    <img src="/global/portraits/2.jpg">
                                </a>
                                <a href="#" class="avatar avatar-sm" data-paticipator-id="p_4">
                                    <img src="/global/portraits/4.jpg">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer p-20">
                        <div class="wall-comment">
                            <a href="#" class="avatar avatar-md float-left">
                                <img src="/global/portraits/3.jpg">
                            </a>
                            <div class="ml-60">
                                <a href="#">Stacey Hunt</a>
                                <small class="ml-10">30th July 2017</small>
                                <p class="mt-5">
                                    Sint cupidatat deserunt adipisicing nulla in velit velit id. Fugiat cillum in officia
                                    id est nostrud sint. In aliquip incididunt est veniam proident
                                    irure ad dolor adipisicing. Aliqua sunt dolore nulla nulla
                                    cillum.
                                </p>
                            </div>
                            <div class="dropdown comment-operation">
                                <button type="button" class="btn btn-icon btn-round btn-default btn-sm" data-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="icon md-more-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem">Report</a>
                                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem">Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="wall-comment">
                            <a href="#" class="avatar avatar-md float-left">
                                <img src="/global/portraits/5.jpg">
                            </a>
                            <div class="ml-60">
                                <a href="#">Sam Anderson</a>
                                <small class="ml-10">3 mins ago...</small>
                                <p class="mt-5">
                                    Do proident aliqua labore nisi officia qui enim. Proident laborum magna Lorem ipsum
                                    elit reprehenderit aliquip. Fugiat ex sint minim commodo.
                                    Esse esse ullamco quis cupidatat est amet.
                                </p>
                            </div>
                            <div class="dropdown comment-operation">
                                <button type="button" class="btn btn-icon btn-round btn-default btn-sm" data-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="icon md-more-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem">Report</a>
                                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem">Delete</a>
                                </div>
                            </div>
                        </div>
                        <form class="wall-comment-reply">
                            <input type="text" class="form-control" placeholder="Write Something...">
                            <div class="reply-operation">
                                <button class="btn btn-sm btn-primary reply-post" type="button">POST</button>
                                <button class="btn btn-sm btn-pure btn-default reply-cancel" type="button">CANCEL</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card card-shadow">
                    <div class="card-block media clearfix p-25">
                        <div class="pr-20">
                            <a href="#" class="avatar avatar-lg">
                                <img class="img-fluid" src="/global/portraits/1.jpg">
                            </a>
                        </div>
                        <div class="media-body text-middle">
                            <h4 class="mt-0 mb-5">
                                Felix Harper
                            </h4>
                            <small>Posted on 29th Aug 2017 at 02:10</small>
                        </div>
                    </div>
                    <div class="card-block px-25  pt-0">
                        <p class="card-text mb-20">
                            Anim ex consectetur officia eiusmod non ea. Ut aute in dolore eiusmod reprehenderit
                            quis sunt tempor id. Enim laboris eu ullamco ipsum elit officia.
                            Voluptate non dolor labore sunt cillum laboris esse. Nulla ex
                            consequat consectetur sit nostrud id. Dolor ea consectetur aute
                            tempor cupidatat ad. Cillum elit aute eiusmod dolore cupidatat
                            id. Quis ad fugiat excepteur duis.
                        </p>
                        <ul class="wall-attrs clearfix p-0 m-0">
                            <li class="attrs-meta float-left">
                    <span>
                      <i class="icon md-chat"></i> 0
                    </span>
                                <span class="ml-10">
                      </if>
                                    <i class="icon md-heart"></i> 0
                    </span>
                            </li>
                            <li class="float-right">
                                <a href="#" class="avatar avatar-sm" data-paticipator-id="p_1">
                                    <img src="/global/portraits/3.jpg">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer p-20">
                        <form class="wall-comment-reply">
                            <input type="text" class="form-control" placeholder="Write Something...">
                            <div class="reply-operation">
                                <button class="btn btn-sm btn-primary reply-post" type="button">POST</button>
                                <button class="btn btn-sm btn-pure btn-default reply-cancel" type="button">CANCEL</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card card-shadow">
                    <div class="card-block media clearfix p-25">
                        <div class="pr-20">
                            <a href="#" class="avatar avatar-lg">
                                <img class="img-fluid" src="/global/portraits/5.jpg">
                            </a>
                        </div>
                        <div class="media-body text-middle">
                            <h4 class="mt-0 mb-5">
                                Johnni Schmidt
                            </h4>
                            <small>Posted on 2nd on Jul 2017 at 02:10</small>
                        </div>
                    </div>
                    <div class="card-block px-25  pt-0">
                        <p class="card-text mb-20">
                            Ea laboris aute dolor duis sunt. Ullamco ex dolor eiusmod proident culpa non eiusmod.
                            Officia ex ea consequat excepteur culpa minim. Nostrud sint in
                            commodo eiusmod consequat officia aute. Exercitation Lorem minim
                            consectetur ullamco pariatur. Ut enim duis consequat nisi. Nisi
                            ullamco commodo magna exercitation. Magna id deserunt nulla eiusmod
                            irure minim sit.
                        </p>
                        <div class="row imgs-gallery mb-20 no-space">
                            <div class="col-xl-4 col-lg-6">
                                <a href="/global/photos/placeholder.png" alt="..." class="gallery-item" data-img-id="m_1"
                                   title="view_1">
                                    <img src="/global/photos/placeholder.png" class="w-full">
                                </a>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <a href="/global/photos/placeholder.png" alt="..." class="gallery-item" data-img-id="m_2"
                                   title="view_2">
                                    <img src="/global/photos/placeholder.png" class="w-full">
                                </a>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <a href="/global/photos/placeholder.png" alt="..." class="gallery-item" data-img-id="m_3"
                                   title="view_3">
                                    <img src="/global/photos/placeholder.png" class="w-full">
                                </a>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <a href="/global/photos/placeholder.png" alt="..." class="gallery-item" data-img-id="m_4"
                                   title="view_4">
                                    <img src="/global/photos/placeholder.png" class="w-full">
                                </a>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <a href="/global/photos/placeholder.png" alt="..." class="gallery-item" data-img-id="m_5"
                                   title="view_5">
                                    <img src="/global/photos/placeholder.png" class="w-full">
                                </a>
                            </div>
                        </div>
                        <ul class="wall-attrs clearfix p-0 m-0">
                            <li class="attrs-meta float-left">
                    <span>
                      <i class="icon md-chat"></i> 2
                    </span>
                                <span class="success ml-10">
                      </if>
                                    <i class="icon md-heart"></i> 10
                    </span>
                            </li>
                            <li class="float-right">
                                <a href="#" class="avatar avatar-sm" data-paticipator-id="p_1">
                                    <img src="/global/portraits/2.jpg">
                                </a>
                                <a href="#" class="avatar avatar-sm" data-paticipator-id="p_2">
                                    <img src="/global/portraits/1.jpg">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer p-20">
                        <div class="wall-comment">
                            <a href="#" class="avatar avatar-md float-left">
                                <img src="/global/portraits/3.jpg">
                            </a>
                            <div class="ml-60">
                                <a href="#">Stacey Hunt</a>
                                <small class="ml-10">30th July 2017</small>
                                <p class="mt-5">
                                    Non exercitation sit do deserunt dolore in nulla consectetur excepteur. Minim sit
                                    qui magna voluptate excepteur. Eu non irure veniam officia
                                    ea. Cupidatat consectetur laboris veniam ea deserunt aute
                                    voluptate in.
                                </p>
                            </div>
                            <div class="dropdown comment-operation">
                                <button type="button" class="btn btn-icon btn-round btn-default btn-sm" data-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="icon md-more-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem">Report</a>
                                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem">Delete</a>
                                </div>
                            </div>
                        </div>
                        <form class="wall-comment-reply">
                            <input type="text" class="form-control" placeholder="Write Something...">
                            <div class="reply-operation">
                                <button class="btn btn-sm btn-primary reply-post" type="button">POST</button>
                                <button class="btn btn-sm btn-pure btn-default reply-cancel" type="button">CANCEL</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card card-shadow">
                    <div class="card-block media clearfix p-25">
                        <div class="pr-20">
                            <a href="#" class="avatar avatar-lg">
                                <img class="img-fluid" src="/global/portraits/3.jpg">
                            </a>
                        </div>
                        <div class="media-body text-middle">
                            <h4 class="mt-0 mb-5">
                                Tim Collins
                            </h4>
                            <small>Posted on 2nd Sep 2017 at 17:00</small>
                        </div>
                    </div>
                    <div class="card-block px-25  pt-0">
                        <p class="wall-note">Is listening to the Evernote</p>
                        <p class="card-text mb-20">
                            Nisi dolor consectetur adipisicing proident irure nisi voluptate magna. Eu nostrud
                            fugiat in officia velit ad. Veniam sunt eu eiusmod eiusmod ipsum
                            sint enim fugiat non. Lorem sint culpa officia adipisicing irure
                            eu. Fugiat irure nostrud sunt commodo enim tempor magna. Ipsum
                            ipsum Lorem aliqua officia commodo non Lorem laborum nostrud.
                            Qui magna incididunt amet irure incididunt amet culpa sunt. Veniam
                            anim consectetur anim dolore sit.
                        </p>
                        <ul class="wall-attrs clearfix p-0 m-0">
                            <li class="attrs-meta float-left">
                    <span>
                      <i class="icon md-chat"></i> 18
                    </span>
                                <span class="success ml-10">
                      </if>
                                    <i class="icon md-heart"></i> 45
                    </span>
                            </li>
                            <li class="float-right">
                                <a href="#" class="avatar avatar-sm" data-paticipator-id="p_1">
                                    <img src="/global/portraits/3.jpg">
                                </a>
                                <a href="#" class="avatar avatar-sm" data-paticipator-id="p_2">
                                    <img src="/global/portraits/1.jpg">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer p-20">
                        <div class="wall-comment">
                            <a href="#" class="avatar avatar-md float-left">
                                <img src="/global/portraits/3.jpg">
                            </a>
                            <div class="ml-60">
                                <a href="#">Stacey Hunt</a>
                                <small class="ml-10">30th July 2017</small>
                                <p class="mt-5">
                                    Non ullamco consectetur culpa magna officia do do et sunt. Laboris est labore mollit
                                    enim cillum. Id anim incididunt culpa ea irure. Et minim
                                    non magna laborum incididunt do cillum.
                                </p>
                            </div>
                            <div class="dropdown comment-operation">
                                <button type="button" class="btn btn-icon btn-round btn-default btn-sm" data-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="icon md-more-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem">Report</a>
                                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem">Delete</a>
                                </div>
                            </div>
                        </div>
                        <form class="wall-comment-reply">
                            <input type="text" class="form-control" placeholder="Write Something...">
                            <div class="reply-operation">
                                <button class="btn btn-sm btn-primary reply-post" type="button">POST</button>
                                <button class="btn btn-sm btn-pure btn-default reply-cancel" type="button">CANCEL</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-block">
                    <h4 class="card-title">About me</h4>
                    <p class="card-text">
                        Quis voluptate duis adipisicing in eu. Anim eu Lorem fugiat non proident. Deserunt
                        ipsum qui sint elit officia. Aute laborum pariatur occaecat cupidatat.
                        <a href="#">Read more...</a>
                    </p>
                </div>
                <div class="card wall-recent-comments">
                    <div class="card-header card-header-transparent">
                        <h4 class="card-title">
                            Recent Comments
                        </h4>
                        <p class="card-text">
                            Cras congue nec lorem eget posuere
                        </p>
                    </div>
                    <div class="list-group">
                        <a class="list-group-item" data-recomment-id="c_1">
                            <div class="media">
                                <div class="pr-15">
                                    <div class="avatar avatar-md">
                                        <img class="img-fluid" src="/global/portraits/6.jpg">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="list-group-item-heading mt-0 mb-5">David Belle</h5>
                                    <p class="list-group-item-text">
                                        Enim cupidatat velit anim cillum occaecat commodo esse....
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item" data-recomment-id="c_2">
                            <div class="media">
                                <div class="pr-15">
                                    <div class="avatar avatar-md">
                                        <img class="img-fluid" src="/global/portraits/7.jpg">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="list-group-item-heading mt-0 mb-5">Jonathan Morris</h5>
                                    <p class="list-group-item-text">
                                        Sit ea id eu ut fugiat nisi aliqua mollit sint....
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item" data-recomment-id="c_3">
                            <div class="media">
                                <div class="pr-15">
                                    <div class="avatar avatar-md">
                                        <img class="img-fluid" src="/global/portraits/4.jpg">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="list-group-item-heading mt-0 mb-5">Fredric Mitchell Jr.</h5>
                                    <p class="list-group-item-text">
                                        Non elit cillum consequat reprehenderit culpa....
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item" data-recomment-id="c_4">
                            <div class="media">
                                <div class="pr-15">
                                    <div class="avatar avatar-md">
                                        <img class="img-fluid" src="/global/portraits/7.jpg">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="list-group-item-heading mt-0 mb-5">Jonathan Morris</h5>
                                    <p class="list-group-item-text">
                                        Dolore aliqua laboris est aliquip esse exercitation duis....
                                    </p>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item" data-recomment-id="c_5">
                            <div class="media">
                                <div class="pr-15">
                                    <div class="avatar avatar-md">
                                        <img class="img-fluid" src="/global/portraits/4.jpg">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="list-group-item-heading mt-0 mb-5">Fredric Mitchell Jr.</h5>
                                    <p class="list-group-item-text">
                                        Velit sunt veniam sunt eu dolor laborum aliquip....
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="comments-view card-footer card-footer-transparent">
                        <a href="#">View All</a>
                    </div>
                </div>
                <div class="card p-20">
                    <h4 class="card-title">
                        Contact Information
                    </h4>
                    <p class="card-text">
                        Fusce eget dolor id justo luctus commodo vel pharetra nisi. Donec velit libero
                    </p>
                    <div class="card-block p-0">
                        <p data-info-type="phone" class="mb-10 text-nowrap">
                            <i class="icon md-account mr-10"></i>
                            <span class="text-break">00971123456789
                    <span>
                        </p>
                        <p data-info-type="email" class="mb-10 text-nowrap">
                            <i class="icon md-email mr-10"></i>
                            <span class="text-break">malinda.h@gmail.com
                    <span>
                        </p>
                        <p data-info-type="fb" class="mb-10 text-nowrap">
                            <i class="icon bd-facebook mr-10"></i>
                            <span class="text-break">malinda.hollaway
                    <span>
                        </p>
                        <p data-info-type="twitter" class="mb-10 text-nowrap">
                            <i class="icon bd-twitter mr-10"></i>
                            <span class="text-break">@malinda (twitter.com/malinda)
                    <span>
                        </p>
                        <p data-info-type="address" class="mb-10 text-nowrap">
                            <i class="icon md-pin mr-10"></i>
                            <span class="text-break">44-46 Morningside Road,Edinburgh,Scotland
                    <span>
                        </p>
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