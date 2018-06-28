@extends('dashboard.layouts.app')

@push('styles')
    <link rel="stylesheet" href="/global/vendor/select2/select2.css">
    <link rel="stylesheet" href="/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="/global/vendor/bootstrap-markdown/bootstrap-markdown.css">
    <link rel="stylesheet" href="/global/vendor/bootstrap-select/bootstrap-select.css">
    <link rel="stylesheet" href="/assets/examples/css/apps/forum.css">
    <link rel="stylesheet" href="/global/fonts/font-awesome/font-awesome.css">
@endpush

@section('body-class', 'app-forum page-aside-left')

@section('content')
    <div class="page bg-white">
        <!-- Forum Content Header -->
        <div class="page-header">
            <h1 class="page-title">Все обсуждения</h1>
            {{--<form class="mt-20" action="#" role="search">--}}
            {{--<div class="input-search input-search-dark">--}}
            {{--<input type="text" class="form-control w-full" placeholder="Искать..." name="">--}}
            {{--<button type="submit" class="input-search-btn">--}}
            {{--<i class="icon md-search" aria-hidden="true"></i>--}}
            {{--</button>--}}
            {{--</div>--}}
            {{--</form>--}}
        </div>

        <!-- Forum Content -->
        <div class="page-content tab-content page-content-table nav-tabs-animate mb-50">
            <div class="tab-pane animation-fade active" id="forum-newest" role="tabpanel">
                <table class="table is-indent">
                    <tbody>
                    @foreach($threads as $thread)
                        <tr>
                            <td class="pre-cell"></td>
                            <td class="cell-60 responsive-hide">
                                <a class="avatar" href="javascript:void(0)">
                                    <img class="img-fluid" src="{{ $thread->author->avatar_path }}">
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('thread', $thread->id) }}" style="color:inherit;display: block">
                                    <div class="content">
                                        <div class="title">{{ $thread->title }}</div>
                                        <div class="metas">
                                            <span class="author">{{ $thread->author->full_name }}</span>
                                            <span class="started">{{ $thread->created_at->diffForHumans() }}</span>
                                            {{--<span class="badges">Themes</span>--}}
                                        </div>
                                    </div>
                                </a>
                            </td>
                            <td class="cell-80 forum-posts">
                                @if ($thread->replies()->count())
                                    <span class="num">{{ $thread->replies()->count() }}</span>
                                    <span class="unit">{{ trans_choice('site.questions', $thread->replies()->count()) }}</span>
                                @endif
                            </td>
                            <td class="suf-cell"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{--<ul class="pagination pagination-gap">--}}
                {{--<li class="disabled page-item"><a class="page-link" href="javascript:void(0)">Previous</a></li>--}}
                {{--<li class="active page-item"><a class="page-link" href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>--}}
                {{--<li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>--}}
                {{--<li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>--}}
                {{--<li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>--}}
                {{--<li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>--}}
                {{--<li class="page-item"><a class="page-link" href="javascript:void(0)">Next</a></li>--}}
                {{--</ul>--}}
            </div>
        </div>
    </div>
    </div>

    <!-- Site Action -->
    <div class="site-action" data-target="#addTopicForm" data-toggle="modal" data-plugin="actionBtn">
        <button type="button" class="site-action-toggle btn-raised btn btn-success btn-floating">
            <i class="icon md-edit" aria-hidden="true"></i>
        </button>
    </div>
    <!-- End Site Action -->

    <!-- Add Topic Form -->
    <div class="modal fade" id="addTopicForm" aria-hidden="true" aria-labelledby="addTopicForm"
         role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Создать новое обсуждение</h4>
                </div>

                <div class="modal-body container-fluid">
                    <form action="{{ route('thread.store') }}" method="post" id="thread-form">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label mb-15" for="topicTitle">Заголовок:</label>
                            <input type="text" class="form-control" id="topicTitle" name="title" placeholder="Как..."
                            />
                        </div>
                        <div class="form-group">
                            <textarea name="body" data-provide="markdown" data-iconlibrary="fa" rows="10"></textarea>
                        </div>
                        {{--<div class="form-group">--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-sm-6">--}}
                        {{--<label class="form-control-label mb-15" for="topicCategory">Topic Category:</label>--}}
                        {{--<select id="topicCategory" data-plugin="selectpicker">--}}
                        {{--<option>PHP</option>--}}
                        {{--<option>Javascript</option>--}}
                        {{--<option>HTML</option>--}}
                        {{--<option>CSS</option>--}}
                        {{--<option>Ruby</option>--}}
                        {{--</select>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-6">--}}
                        {{--<label class="form-control-label mb-15" for="topic_tags">Topic Tags:</label>--}}
                        {{--<select id="topic_tags" data-plugin="selectpicker">--}}
                        {{--<option>PHP</option>--}}
                        {{--<option>Javascript</option>--}}
                        {{--<option>HTML</option>--}}
                        {{--<option>CSS</option>--}}
                        {{--<option>Ruby</option>--}}
                        {{--</select>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    </form>
                </div>
                <div class="modal-footer text-left">
                    <button class="btn btn-primary"
                            onclick="event.preventDefault();document.getElementById('thread-form').submit();">
                        Создать
                    </button>
                    <a class="btn btn-sm btn-white btn-flat" data-dismiss="modal" href="javascript:void(0)">Отменить</a>
                </div>

            </div>
        </div>
    </div>
    <!-- End Add Topic Form -->
@endsection

@push('scripts')
    {{--<script src="/global/vendor/slidepanel/jquery-slidePanel.js"></script>--}}
    <script src="/global/vendor/bootstrap-markdown/bootstrap-markdown.js"></script>
    <script src="/global/vendor/bootstrap-select/bootstrap-select.js"></script>
    <script src="/global/vendor/marked/marked.js"></script>
    <script src="/global/vendor/to-markdown/to-markdown.js"></script>

    <script src="/global/js/Plugin/bootstrap-select.js"></script>
    <script src="/assets/js/BaseApp.js"></script>
    <script src="/assets/js/App/Forum.js"></script>

    {{--<script src="/assets/examples/js/apps/forum.js"></script>--}}
@endpush