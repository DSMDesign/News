@extends('layouts.app')

@section('title', 'Viewing an article')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div id="configuration" class="panel-container themed z-depth-1">
            <div class="panel-header">{{ $article->title }}
            @if(Auth::user()->user_level > 7)
                <a href="{{ route('admin.article.edit', ['id' => encrypt($article->id)]) }}" class="pull-right"><i class="material-icons">edit</i></a>&emsp;
            @endif
            </div>
            <div class="panel-content wide">
                <div class="row">
                    <div class="col-sm-12">
                        {!! $article->news !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

