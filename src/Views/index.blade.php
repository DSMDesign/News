@extends('layouts.app')

@section('title', 'Latest News')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div id="configuration" class="panel-container themed z-depth-1">
            <div class="panel-header">{{ str_plural('Article', $articles->count()) }}</div>
            <div class="panel-content wide">
                <div class="fixed-action-btn">
                    <a href="{{ route('admin.article.create') }}" class="btn-floating btn-large wave-effect waves-light z-depth-1 green">
                        <i class="material-icons">add</i>
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="striped thin-rows highlight responsive-table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($articles) > 0)
                                    @foreach($articles as $article)
                                        <tr>
                                            <td><a href="{{ route('admin.article.show', ['id' => encrypt($article->id)]) }}">{{ $article->title }}</a></td>
                                            <td>{{ $article->user->name }}</td>
                                            <td>{{ Useful::niceDate($article->created_at) }}</td>
                                            <td style="text-align:right;width:100px;">
                                            @if(Auth::user()->user_level > 7)
                                                <a href="{{ route('admin.article.edit', ['id' => encrypt($article->id)]) }}"><i class="material-icons">edit</i></a>&emsp;
                                            @endif
                                            <a href="{{ route('admin.article.show', ['id' => encrypt($article->id)]) }}"><i class="material-icons">search</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">No Results Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
