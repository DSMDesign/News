@extends('layouts.app')

@section('title', 'Add a news article')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div id="configuration" class="panel-container themed z-depth-1">
            <div class="panel-header">Add a news article</div>
            <div class="panel-content wide">
                <form method="post" action="{{ route('admin.article.update', ['id' => encrypt($article->id)]) }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="input-field">
                                <input id="title" name="title" type="text" value="{{ old('title', $article->title) }}" class="" minlength="3" required="required" aria-required="true" />
                                <label for="title">Title</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="news">Article</label>
                            <div class="input-field">
                                <textarea id="news" name="news" class="wysiwyg" required="required" aria-required="true">{{ old('news', $article->news) }}</textarea>
                            </div>
                            <div class="input-field">
                                <button type="submit" data-imsg="Adding Article." class="btn btn-success submit">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ URL::to('assets/plugins/tinymce/tinymce.min.js') }}"></script>
@endsection

@section('js')
<script>
tinymce.init({ selector:'.wysiwyg' });
</script>
@endsection
