@extends('back.app')

@section('title', 'Dashboard - Create Article')

@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
        <h3 class="page-title mt-5">
            @if (isset($article))
            Edit Article
             @else
            Add Article
            @endif
        </h3>
    </div>
</div>
@endsection

@section('dashboard-content')
<div class="row">
    <div class="col-lg-12">
        <form action=" {{ isset($article) ? route('articles.update', $article) : route('articles.store') }} "
         method="POST" enctype="multipart/form-data"
        >
        @csrf
        @if (isset($article))
            @method('PUT')
        @endif
            <div class="row formtype">
                @if (@isset($article))
                <div class="col-12">
                    <img class="w-25" src="{{ $article->imageUrl() }}" alt="">
                    <p>{{ $article->image }}</p>
                </div>
                @endif
                <div class="col-md-4">
                    <div class="form-group">
                    <label>Article title</label>
                    <input
                        class="form-control"
                        type="text"
                        name="title"
                        value="{{ isset($article) ? old('title', $article->title) : '' }}"
                    />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label>Categorie</label>
                    <select class="form-control" id="sel1" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                    <label>Upload an image</label>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="customFile" name="image"/>
                        <label class="custom-file-label" for="customFile"
                        >Choose an image</label
                        >
                    </div>
                    </div>
                </div>

                <textarea
                    class="form-control"
                    rows="5"
                    id="comment"
                    name="description"
                >
                    {{ isset($article) ? old('description', $article->description) : '' }}
                </textarea>

                @if(isset($article))
                    <div class="col-md-12">
                        @foreach ($article->tags as $tag)
                            <label class="label label-info btn btn-primary"> {{ $tag->name }}</label>
                        @endforeach
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="tags"
                         name="tags"
                          value="{{ isset($article) ? old('tags', $article->tags->pluck('name')->implode(',')) : '' }}"
                         placeholder="Enter tags separated by commas"
                        >
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                    <label>Publication</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="article_active" name="isActive" value="1" checked>
                    <label class="form-check-label" for="article_active">Publish</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="article_inactive" name="isActive" value="0">
                    <label class="form-check-label" for="article_inactive">Do not publish</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                    <label>Shares</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="article_share_active" name="isSharable" value="1" checked>
                    <label class="form-check-label" for="article_share_active">Shareable</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="article_share_inactive" name="isSharable" value="0">
                    <label class="form-check-label" for="article_share_inactive">Not Shareable</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Comment</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="article_comment_active" name="isComment" value="1" checked>
                        <label class="form-check-label" for="article_comment_active">Allowed</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="article_comment_inactive" name="isComment" value="0">
                        <label class="form-check-label" for="article_comment_inactive">Not allowed</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">Save the article</button>  
            </div>
        </form>
    </div>
</div>
@endsection