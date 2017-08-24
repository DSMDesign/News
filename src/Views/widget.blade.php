@foreach($articles as $article)
<div class="dash-notification">
    <div class="row">
        <div class="col-sm-12">
            <div class="news-title">
                <a href="{{ route('admin.article.show', ['id' => encrypt($article->id)]) }}">{{ $article->title }}</a>
            </div>
            <div class="article">
                {!! Useful::excerpt($article->news,100) !!}
            </div>
        </div>
    </div>
    <div class="dash-notification-footer">
        <div class="row">
            <div class="col-sm-12 text-right dash-notification-view">
                {{ $article->created_at->diffForHumans() }} by
                {{ $article->user->name }}
            </div>
        </div>
    </div>
</div>
@endforeach
