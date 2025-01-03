@extends('back.app')

@section('title', 'Dashboard - Create Article')

@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
        <h3 class="page-title mt-5">Modifier un article</h3>
    </div>
</div>
@endsection

@section('dashboard-content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ isset($article) ? route('articles.update', $article) : route('articles.store') }}" method="POST">
        @csrf
        @if (isset($article))
            @method('PUT')
        @endif
            <div class="row formtype">
                <div class="col-md-4">
                    <div class="form-group">
                    <label>Titre de l'article</label>
                    <input
                        class="form-control"
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                    />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label>Categorie</label>
                    <select class="form-control" id="sel1" name="category_id">
                        <option>Categorie 1</option>
                        <option>Categorie 2</option>
                        <option>Categorie 3</option>
                        <option>Categorie 4</option>
                    </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                    <label>Uploader une image</label>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="customFile" name="image"/>
                        <label class="custom-file-label" for="customFile"
                        >Choisir une image</label
                        >
                    </div>
                    </div>
                </div>

                <textarea
                        class="form-control"
                        rows="5"
                        id="comment"
                        name="description">   
                </textarea>

                <div class="col-md-4">
                    <div class="form-group">
                    <label>Publication</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" type="radio" id="article_active" name="isActive" value="1" checked>
                    <label class="form-check-label" for="article_active">Publier</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" type="radio" id="article_inactive" name="isActive" value="0">
                    <label class="form-check-label" for="article_inactive">Ne pas publier</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                    <label>Partages</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" type="radio" id="article_share_active" name="isSharable" value="1" checked>
                    <label class="form-check-label" for="article_share_active">Partageable</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" type="radio" id="article_share_inactive" name="isSharable" value="0">
                    <label class="form-check-label" for="article_share_inactive">Non Partageable</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Commentaires</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" type="radio" id="article_comment_active" name="isComment" value="1" checked>
                        <label class="form-check-label" for="article_comment_active">Autorise</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" type="radio" id="article_comment_inactive" name="isComment" value="0">
                        <label class="form-check-label" for="article_comment_inactive">Non autorise</label>
                    </div>
                </div>
                <button type="button" class="btn btn-primary buttonedit1">Enregistrer l'article</button>  
            </div>
        </form>
    </div>
</div>
@endsection