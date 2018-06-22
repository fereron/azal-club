@extends('dashboard.layouts.app')

@push('styles')
    <link rel="stylesheet" href="/global/vendor/jquery-selective/jquery-selective.css">
    <link rel="stylesheet" href="/assets/examples/css/apps/projects.css">
    <link rel="stylesheet" href="/global/vendor/typeahead-js/typeahead.css">
@endpush


@section('content')
    <div class="page app-projects">
        <div class="page-header">
            <h1 class="page-title">Группы</h1>
            <div class="page-header-actions">
                <form action="{{ route('groups.search') }}" method="post">
                    @csrf
                    <div class="form-group" style="width:250px">
                        <div class="input-search input-search-dark">
                            <button type="submit" class="input-search-btn" style="cursor:pointer;width: 35px;height: 35px;z-index: 100;"><i class="icon md-search" aria-hidden="true"></i></button>
                            <input type="text" id="search" class="form-control" name="query" placeholder="Искать группы..." required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="page-content">
            @if($groups->count())
                {{--<div class="projects-sort">--}}
                    {{--<span class="projects-sort-label">Сортировать по : </span>--}}
                    {{--<div class="inline-block dropdown">--}}
            {{--<span id="projects-menu" data-toggle="dropdown" aria-expanded="false" role="button" style="cursor:pointer">--}}
              {{--Названию проекта--}}
              {{--<i class="icon md-chevron-down" aria-hidden="true"></i>--}}
            {{--</span>--}}
                        {{--<div class="dropdown-menu animation-scale-up animation-top-left animation-duration-250"--}}
                             {{--aria-labelledby="projects-menu" role="menu">--}}
                            {{--<a class="dropdown-item" href="javascript:void(0)" role="menuitem" tabindex="-1">Sort--}}
                                {{--One</a>--}}
                            {{--<a class="active dropdown-item" href="javascript:void(0)" role="menuitem" tabindex="-1">Sort--}}
                                {{--Two</a>--}}
                            {{--<a class="dropdown-item" href="javascript:void(0)" role="menuitem" tabindex="-1">Sort--}}
                                {{--Three</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            @else
                <h2>Вы не состоите ни в одной группе</h2>
            @endif
            <div class="projects-wrap">
                <ul class="blocks blocks-100 blocks-xxl-5 blocks-lg-4 blocks-md-3 blocks-sm-2"
                    data-plugin="animateList" data-child=">li">

                    <?php /**@var \App\Group $group */ ?>
                    @foreach ($groups as $group)
                        <li>
                            <div class="panel">
                                <figure class="overlay overlay-hover animation-hover">
                                    <img class="caption-figure overlay-figure" src="{{ $group->avatar_path }}">
                                    <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                                        @if(auth()->user()->isAdmin($group->id))
                                            <div class="btn-group">
                                                    <button type="button" class="btn btn-icon btn-pure btn-default"
                                                            title="Delete"
                                                            data-tag="project-delete"
                                                            data-group-id="{{ $group->id }}"
                                                            data-group-name="{{ $group->name }}">
                                                        <i class="icon md-delete" aria-hidden="true"></i>
                                                    </button>
                                            </div>
                                        @endif
                                        <a href="{{ route('group.show', [$group->id]) }}"
                                           class="btn btn-inverse project-button">Перейти в группу
                                        </a>
                                    </figcaption>
                                </figure>
                                <div class="friends-harmonic text-center">
                                    <a class="title" href="{{ route('group.show', [$group->id]) }}"><h5
                                                class="my-5 font-size-16">{{ $group->name }}</h5></a>

                                    <ul class="my-10">
                                        @foreach($group->preloader_members as $member)
                                            <li>
                                                <a href="{{ route('profile.public', [$member->uuid]) }}"
                                                   title="{{ $member->full_name }}">
                                                    <img src="{{ $member->avatar_path }}" alt="">
                                                </a>
                                            </li>
                                        @endforeach
                                        @if($group->preloader_members->count() > 6)
                                            <li>
                                                <a class="bg-blue-100 all-users"
                                                   href="#">+{{ $group->members()->count() - 6 }}</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{--@if($groups->count())--}}
                {{--<nav>--}}
                    {{--<ul class="pagination pagination-no-border">--}}
                        {{--<li class="disabled page-item">--}}
                            {{--<a class="page-link" href="javascript:void(0)" aria-label="Previous">--}}
                                {{--<span aria-hidden="true">&laquo;</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="active page-item"><a class="page-link" href="javascript:void(0)">1 <span--}}
                                        {{--class="sr-only">(current)</span></a>--}}
                        {{--</li>--}}
                        {{--<li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>--}}
                        {{--<li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>--}}
                        {{--<li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>--}}
                        {{--<li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>--}}
                        {{--<li class="page-item">--}}
                            {{--<a class="page-link" href="javascript:void(0)" aria-label="Next">--}}
                                {{--<span aria-hidden="true">&raquo;</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</nav>--}}
            {{--@endif--}}
        </div>
    </div>

    <!-- Site Action -->
    <div class="site-action" data-target="#addProjectForm" data-toggle="modal" data-plugin="actionBtn">
        <button type="button" data-action="add" class="site-action-toggle btn-raised btn btn-success btn-floating">
            <i class="icon md-plus" aria-hidden="true"></i>
        </button>
    </div>
    <!-- End Site Action -->

    <!-- Add Project Form -->
    <div class="modal fade" id="addProjectForm" aria-hidden="true" aria-labelledby="addProjectForm"
         role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple">
            <div class="modal-content">
                <form action="{{ route('group.create') }}" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Создать новую группу</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label mb-15" for="name">Название группы:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Название группы"
                                   required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label mb-15" for="description">Описание группы:</label>
                            <textarea class="form-control mb-sm" id="description" name="description"
                                      placeholder="Описание группы" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label mb-15" for="avatar">Изображение группы:</label><br>
                            <input type="file" id="avatar" name="avatar">
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="submit" class="btn btn-primary">Создать</button>
                        <a class="btn btn-sm btn-white btn-pure" data-dismiss="modal"
                           href="javascript:void(0)">Отменить</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Add Project Form -->
@endsection

@push('scripts')
    <!-- Page -->

    <script src="/global/vendor/jquery-selective/jquery-selective.min.js"></script>
    <script src="/global/vendor/bootbox/bootbox.js"></script>
    <script src="/global/vendor/typeahead-js/typeahead.jquery.min.js"></script>

    <script src="/global/js/Plugin/animate-list.js"></script>
    <script src="/global/js/Plugin/bootbox.js"></script>
    <script src="/assets/js/Site.js"></script>
    <script src="/assets/js/App/Projects.js"></script>

    <script src="/assets/examples/js/apps/projects.js"></script>


    <script>
        //TODO display if empty query
        $(document).ready(function () {
            $('#search').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 2
                },
                {
                    limit: 10,
                    async: true,
                    source: function (query, processSync, processAsync) {
                        return $.ajax({
                            url: "/api/groups",
                            type: 'GET',
                            data: {q: query},
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            dataType: 'json',
                            success: function (json) {
                                return processAsync(json.groups);
                            }
                        });
                    },
                    templates: {
                        suggestion: function (obj) {
                            return '<div>' + obj.name + '</div>';
                        }
                    },
                    displayKey: 'name',
                });
        });
    </script>
@endpush