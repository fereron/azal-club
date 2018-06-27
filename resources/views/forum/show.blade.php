
@extends('dashboard.layouts.app')

@push('styles')
    {{--<link rel="stylesheet" href="/global/vendor/select2/select2.css">--}}
    {{--<link rel="stylesheet" href="/global/vendor/slidepanel/slidePanel.css">--}}
    {{--<link rel="stylesheet" href="/global/vendor/bootstrap-markdown/bootstrap-markdown.css">--}}
    {{--<link rel="stylesheet" href="/global/vendor/bootstrap-select/bootstrap-select.css">--}}
    <link rel="stylesheet" href="/assets/examples/css/apps/forum.css">
    <link rel="stylesheet" href="/global/fonts/font-awesome/font-awesome.css">
@endpush

@section('body-class', 'app-forum')

@section('content')
    <div class="page bg-white">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('threads') }}">Форум</a></li>
            <li class="breadcrumb-item active">{{ $thread->title }}</li>
        </ol>
        <header class="slidePanel-header">
            <h1>{{ $thread->title }}</h1>
        </header>
        <div class="slidePanel-inner">
            <section class="slidePanel-inner-section">
                <div class="forum-header">
                    <a class="avatar" href="{{ route('profile.public', $thread->author->uuid) }}">
                        <img src="{{ $thread->author->avatar_path }}">
                    </a>
                    <span class="name">{{ $thread->author->full_name }}</span>
                    <span class="time">{{ $thread->author->created_at->diffForHumans() }}</span>
                </div>
                <div class="forum-content">
                    {!! $thread->body !!}
                </div>
                <div class="forum-metas">
                    {{--<div class="button-group tags">--}}
                        {{--Tags:--}}
                        {{--<a href="javascript: void(0)" class="badge badge-outline badge-default">Blog</a>--}}
                        {{--<a href="javascript: void(0)" class="badge badge-outline badge-default">Design</a>--}}
                        {{--<a href="javascript: void(0)" class="badge badge-outline badge-default">Cool</a>--}}
                    {{--</div>--}}
                    {{--<div class="float-right">--}}
                        {{--<button type="button" class="btn btn-icon btn-pure btn-default">--}}
                            {{--<i class="icon md-thumb-up" aria-hidden="true"></i>--}}
                            {{--<span class="num">2</span>--}}
                        {{--</button>--}}
                    {{--</div>--}}
                    {{--<div class="button-group share">--}}
                        {{--Share:--}}
                        {{--<button type="button" class="btn btn-icon btn-pure btn-default"><i class="icon bd-twitter" aria-hidden="true"></i></button>--}}
                        {{--<button type="button" class="btn btn-icon btn-pure btn-default"><i class="icon bd-facebook" aria-hidden="true"></i></button>--}}
                        {{--<button type="button" class="btn btn-icon btn-pure btn-default"><i class="icon bd-dribbble" aria-hidden="true"></i></button>--}}
                    {{--</div>--}}
                </div>
            </section>
            @foreach ($thread->replies as $key => $reply)
                @include('forum.reply')
            @endforeach
            <form class="slidePanel-comment" action="{{ route('reply.store', $thread->id) }}" method="post">
                @csrf
                <textarea class="maxlength-textarea form-control mb-sm mb-20" name="body" rows="4"></textarea>
                <button class="btn btn-primary" type="submit">Ответить</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    {{--<script src="/global/vendor/slidepanel/jquery-slidePanel.js"></script>--}}
    {{--<script src="/global/vendor/bootstrap-markdown/bootstrap-markdown.js"></script>--}}
    {{--<script src="/global/vendor/bootstrap-select/bootstrap-select.js"></script>--}}
    {{--<script src="/global/vendor/marked/marked.js"></script>--}}
    {{--<script src="/global/vendor/to-markdown/to-markdown.js"></script>--}}

    {{--<script src="/global/js/Plugin/bootstrap-select.js"></script>--}}
    {{--<script src="/assets/js/BaseApp.js"></script>--}}
    {{--<script src="/assets/js/App/Forum.js"></script>--}}

    {{--<script src="/assets/examples/js/apps/forum.js"></script>--}}
@endpush