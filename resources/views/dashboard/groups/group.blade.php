@extends('dashboard.layouts.app')

@push('styles')
    <link rel="stylesheet" href="/assets/examples/css/pages/profile_v3.css">
    <link rel="stylesheet" href="/global/vendor/typeahead-js/typeahead.css">
    <link rel="stylesheet" href="/global/vendor/toastr/toastr.css">
    <link rel="stylesheet" href="/assets/examples/css/advanced/toastr.css">
@endpush


@section('content')
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
                                        <form class="wall-comment-reply" data-post-id="{{ $post->id }}" data-group-id="{{ $group->id }}">
                                            <input type="text" class="form-control" placeholder="Напишите что-нибудь...">
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
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


                    @if (!$group->isPrivate() || $user)
                        @if ($members->isNotEmpty())
                    <!-- Team Panel -->
                        <div class="masonry-item members">
                            <div class="panel team-panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Участники</h3>
                                    <ul class="panel-actions panel-actions-keep">
                                        <li><a href="#" class="members__count"><span>{{ $members->count() + 1 }}</span> {{ trans_choice('site.member', ($members->count() + 1)) }}</a></li>
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
                    @endif
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