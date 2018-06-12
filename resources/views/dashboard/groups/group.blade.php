@extends('dashboard.layouts.app')

@push('styles')
    <link rel="stylesheet" href="/assets/examples/css/pages/profile_v3.css">
    <link rel="stylesheet" href="/global/vendor/typeahead-js/typeahead.css">
    <link rel="stylesheet" href="/global/vendor/toastr/toastr.css">
    <link rel="stylesheet" href="/assets/examples/css/advanced/toastr.css">
@endpush


@section('content')
    <?php/**@var \App\Group $group */ ?>
    <div class="page group-page" id="page" data-id="{{ $group->id }}">
        <div class="page-header">
            <h1 class="page-title text-center col-lg-8">{{ $group->name }}</h1>
            @if ($user && $user->pivot->role == 'admin')
                <div class="page-header-actions">
                    <a href="{{ route('group.edit', [$group->id]) }}" class="btn btn-sm btn-primary btn-round waves-effect waves-classic">
                        <span class="text hidden-sm-down">Настройки группы</span>
                        <i class="icon md-chevron-right" aria-hidden="true"></i>
                    </a>
                </div>
            @elseif(!$user)
                @if($pending_request)
                    <div class="page-header-actions">
                        <form action="{{ route('group.user.request.delete') }}" method="post">
                            @csrf
                            <input type="hidden" name="group_id" value="{{ $group->id }}">
                            <button type="submit" class="btn btn-primary btn-round waves-effect waves-classic">
                                <span class="text hidden-sm-down">Отменить заявку на вступление</span>
                            </button>
                        </form>
                    </div>
                @else
                    <div class="page-header-actions">
                        <form action="{{ route('group.user.add') }}" method="post">
                            @csrf
                            <input type="hidden" name="group_id" value="{{ $group->id }}">
                            <button type="submit" class="btn btn-primary btn-round waves-effect waves-classic">
                                <span class="text hidden-sm-down">Присоединиться к группе</span>
                            </button>
                        </form>
                    </div>
                @endif
            @endif
        </div>
        <div class="page-content container-fluid">

            @if (session('added'))
                <div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon md-check" aria-hidden="true"></i>
                    Вы успешно вступили в группу
                </div>
            @endif

                @if (session('request_pending'))
                <div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon md-check" aria-hidden="true"></i>
                    Ваша заявка на вступление в группу находится на рассмотрении
                </div>
            @endif
            @if (session('request_deleted'))
                <div class="alert dark alert-icon alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon md-check" aria-hidden="true"></i>
                    Ваша заявка на вступление в группу отменена
                </div>
            @endif

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <img class="card-img-top w-full" src="{{ $group->avatar_path }}">
                    </div>
                    @if ($user)
                        <div class="card card-shadow wall-posting">
                        <div class="card-block p-0">
                            <form action="{{ route('group.post.add') }}" method="post" data-group-id="{{ $group->id }}" class="publish_form">
                                <div class="form-group mb-0">
                                    <textarea class="form-control form-control-lg" name="body" id="publish_textarea"
                                           placeholder="Напишите что-нибудь..." oninput="textareaResize()" required></textarea>
                                    <div class="p-10">
                                        <button class="btn btn-pure btn-default icon md-image" type="button"
                                                name="button"></button>
                                        <button class="btn btn-pure btn-default icon md-tv-play" type="button"
                                                name="button"></button>
                                        <button class="btn btn-pure btn-default icon md-calendar" type="button"
                                                name="button"></button>
                                        <button class="btn btn-pure btn-default icon md-map" type="button"
                                                name="button"></button>
                                        <button class="btn btn-primary btn-round submit float-right mr-10" id="submitPublishForm">
                                            Опубликовать
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif

                    @if (!$group->isPrivate() || $user)
                        @foreach($group->posts as $post)
                            <div class="card card-shadow">
                                <div class="card-block media clearfix p-25">
                                    <div class="pr-20">
                                        <a href="{{ $post->author->uuid }}" class="avatar avatar-lg">
                                            <img class="img-fluid" src="{{ $post->author->avatar_path }}">
                                        </a>
                                    </div>
                                    <div class="media-body text-middle">
                                        <h4 class="mt-0 mb-5">
                                            {{ $post->author->full_name }}
                                        </h4>
                                        <small>Опубликовано {{ $post->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                                <div class="card-block px-25  pt-0">
                                    <p class="card-text mb-20">
                                       {!! $post->body !!}
                                    </p>
                                </div>
                                <div class="card-footer p-20">
                                    @foreach ($post->comments as $comment)
                                    <div class="wall-comment">
                                        <a href="#" class="avatar avatar-md float-left">
                                            <img src="{{ $comment->author->avatar_path }}">
                                        </a>
                                        <div class="ml-60">
                                            <a href="{{ route('profile.public', [$comment->author->uuid]) }}">{{ $comment->author->full_name }}</a>
                                            <small class="ml-10">{{ $comment->created_at->diffForHumans() }}...</small>
                                            <p class="mt-5">
                                                {{ $comment->body }}
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                    @if ($user)
                                        <form class="wall-comment-reply" data-post-id="{{ $post->id }}">
                                            <input type="text" class="form-control" placeholder="Напишите что-нибудь...">
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach

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
                                    <a href="/global/photos/placeholder.png" alt="..." class="gallery-item"
                                       data-img-id="m_1"
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
                                        Sint cupidatat deserunt adipisicing nulla in velit velit id. Fugiat cillum in
                                        officia
                                        id est nostrud sint. In aliquip incididunt est veniam proident
                                        irure ad dolor adipisicing. Aliqua sunt dolore nulla nulla
                                        cillum.
                                    </p>
                                </div>
                                <div class="dropdown comment-operation">
                                    <button type="button" class="btn btn-icon btn-round btn-default btn-sm"
                                            data-toggle="dropdown"
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
                                        Do proident aliqua labore nisi officia qui enim. Proident laborum magna Lorem
                                        ipsum
                                        elit reprehenderit aliquip. Fugiat ex sint minim commodo.
                                        Esse esse ullamco quis cupidatat est amet.
                                    </p>
                                </div>
                                <div class="dropdown comment-operation">
                                    <button type="button" class="btn btn-icon btn-round btn-default btn-sm"
                                            data-toggle="dropdown"
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
                                    <button class="btn btn-sm btn-pure btn-default reply-cancel" type="button">CANCEL
                                    </button>
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
                                    <a href="/global/photos/placeholder.png" alt="..." class="gallery-item"
                                       data-img-id="m_1"
                                       title="view_1">
                                        <img src="/global/photos/placeholder.png" class="w-full">
                                    </a>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <a href="/global/photos/placeholder.png" alt="..." class="gallery-item"
                                       data-img-id="m_2"
                                       title="view_2">
                                        <img src="/global/photos/placeholder.png" class="w-full">
                                    </a>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <a href="/global/photos/placeholder.png" alt="..." class="gallery-item"
                                       data-img-id="m_3"
                                       title="view_3">
                                        <img src="/global/photos/placeholder.png" class="w-full">
                                    </a>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <a href="/global/photos/placeholder.png" alt="..." class="gallery-item"
                                       data-img-id="m_4"
                                       title="view_4">
                                        <img src="/global/photos/placeholder.png" class="w-full">
                                    </a>
                                </div>
                                <div class="col-xl-6 col-lg-12">
                                    <a href="/global/photos/placeholder.png" alt="..." class="gallery-item"
                                       data-img-id="m_5"
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
                                        Non exercitation sit do deserunt dolore in nulla consectetur excepteur. Minim
                                        sit
                                        qui magna voluptate excepteur. Eu non irure veniam officia
                                        ea. Cupidatat consectetur laboris veniam ea deserunt aute
                                        voluptate in.
                                    </p>
                                </div>
                                <div class="dropdown comment-operation">
                                    <button type="button" class="btn btn-icon btn-round btn-default btn-sm"
                                            data-toggle="dropdown"
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
                                    <button class="btn btn-sm btn-pure btn-default reply-cancel" type="button">CANCEL
                                    </button>
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
                                        Non ullamco consectetur culpa magna officia do do et sunt. Laboris est labore
                                        mollit
                                        enim cillum. Id anim incididunt culpa ea irure. Et minim
                                        non magna laborum incididunt do cillum.
                                    </p>
                                </div>
                                <div class="dropdown comment-operation">
                                    <button type="button" class="btn btn-icon btn-round btn-default btn-sm"
                                            data-toggle="dropdown"
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
                                    <button class="btn btn-sm btn-pure btn-default reply-cancel" type="button">CANCEL
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-4">
                    <div class="card card-block">
                        <h4 class="card-title">Описание группы</h4>
                        <p class="card-text">{{ $group->description }}</p>
                    </div>

                    @if($user)
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Добавление участников
                                    <span class="panel-desc">Введите имя участника или его эл. адрес (если его нет на сайте) и мы вышлем ему приглашение на почту.</span>
                                </h3>
                            </div>
                            <div class="panel-body container-fluid">
                                <form autocomplete="off" action="" method="post" class="member_add_form">
                                    <input type="text" class="form-control mb-10" id="addMember"
                                           placeholder="Введите имя или эл. адрес...">
                                    <button type="submit" class="btn btn-primary" id="addMemberSubmit">Добавить</button>
                                </form>
                            </div>
                        </div>
                    @endif


                    @if (!$group->isPrivate() || $user && $members->isNotEmpty())
                    <!-- Team Panel -->
                        <div class="masonry-item members">
                            <div class="panel team-panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Участники</h3>
                                    <ul class="panel-actions panel-actions-keep">
                                        <li><a href="#" class="members__count"><span>{{ $members->count() + 1 }}</span> участников</a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    @foreach($members as $member)
                                        <div class="avatar avatar-online m-3">
                                            <a href="{{ route('profile.public', [$member->uuid]) }}"
                                               title="{{ $member->full_name }}">
                                                <img src="{{ $member->avatar_path }}"/>
                                            </a>
                                            <i></i>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- End Team Panel -->
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/global/vendor/typeahead-js/typeahead.jquery.min.js"></script>
    <script src="/global/vendor/toastr/toastr.js"></script>

    {{--<script src="/assets/examples/js/pages/profile_v3.js"></script>--}}

    <script src="{{ asset('js/groups.js') }}"></script>
@endpush