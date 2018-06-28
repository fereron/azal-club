<section class="slidePanel-inner-section">
    <div class="forum-header">
        <div class="float-right">#
            <span class="floor">{{ $key + 1 }}</span>
        </div>
        <a class="avatar" href="{{ route('profile.public', $reply->owner->uuid) }}">
            <img src="{{ $reply->owner->avatar_path }}">
        </a>
        <span class="name">{{ $reply->owner->full_name }}</span>
        <span class="time">{{ $reply->created_at->diffForHumans() }}</span>
    </div>
    <div class="forum-content">
        <p>{{ $reply->body }}</p>
        {{--<div class="float-right">--}}
        {{--<button type="button" class="btn btn-icon btn-pure btn-default">--}}
        {{--<i class="icon md-thumb-up" aria-hidden="true"></i>--}}
        {{--<span class="num">2</span>--}}
        {{--</button>--}}
        {{--</div>--}}
    </div>
</section>