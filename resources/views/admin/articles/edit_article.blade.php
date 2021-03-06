@extends('admin.layouts.master')

@section('title', ' | Edit Article')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/libs/trumbowyg/dist/ui/trumbowyg.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/libs/select2/css/select2.min.css') }}">
@endsection @section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="lead">Edit Article</div>

        @include('admin.partials.req_article')
        <form action="{{ url('admin/articles/'.$article->id.'/edit') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div id="title" class="form-group">
                <label for="title">Article Title:</label>
                <input name="title" type="text" class="form-control" id="title" value="{{ $article->title }}">
            </div>

            <div id="description" class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ $article->description }}</textarea>
            </div>

            {{-- Category --}}
            <div id="category" class="form-group">
                <label for="categories">Category:</label>
                <select name="categories[]" class="form-control select2-multi" multiple="multiple" required>
                    @foreach($article->categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach                           
                </select>
            </div>

            {{-- Tag --}}
            <div id="tag" class="form-group">
                <label for="tags">Tag:</label>
                <select name="tags[]" class="form-control select2-multi" multiple="multiple" required>
                    @foreach($article->tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach                           
                </select>
            </div>

            <div id="_content" class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" id="editor" for="content" class="form-control">{{ $article->content }}</textarea>
            </div>

            <div id="image" class="form-group">
                <label for="ImageFile">Image:</label>
                <input name="Imagefile" type="file" id="ImageFile">
                <p class="help-block">The file under validation must be an image (jpeg, png, bmp, gif, or svg).</p>
            </div>

            <button type="submit" class="btn btn-success pull-right">Update Article</button>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/libs/trumbowyg/dist/trumbowyg.min.js') }}"></script>
    <script src="{{ asset('admin/libs/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
            $(document).ready(function(){
                $('#editor').trumbowyg();
                $('.select2-multi').select2();
            });
        </script>
@endsection