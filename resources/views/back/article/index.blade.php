@extends('back.app')

@section('title', 'Dashboard - Article Page')

@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
        <div class="mt-5">
            <h4 class="card-title float-left mt-2">Articles</h4>
            <a href="{{ route('articles.create') }}" class="btn btn-primary float-right veiwbutton ">Add an article</a>
        </div>
    </div>
</div>
@endsection

@section('dashboard-content')
<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body booking_card">
                <div class="table-responsive">
                    <table class="datatable table table-stripped table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>ID Article</th>
                                <th>Picture</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Publication</th>
                                <th>Share</th>
                                <th>Comment</th>
                                <th>Author</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td><img class=" w-75" src="{{ $article->imageUrl() }}" alt="Article Image"></td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->category->name }}</td>
                                <td>21-03-2020</td>
                                <td>
                                    <div class="actions"> <a href="#" class="btn btn-sm bg-success-light mr-2">{{ $article->isActive ? 'activated' : 'disabled' }}</a> </div>
                                </td>
                                <td>
                                <div class="actions"> <a href="#" class="btn btn-sm bg-success-light mr-2">{{ $article->isSharable ? 'Published' : 'Not published' }}</a> </div>
                                </td>
                                <td>
                                <div class="actions"> <a href="#" class="btn btn-sm bg-success-light mr-2">{{ $article->isComment ? 'Commented' : 'Uncommented' }}</a> </div>
                                </td>
                                <td>
                                    <h2 class="table-avatar">
                                    <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{ asset('back_auth/assets/profile/'.$article->author->picture) }}" alt="User Image"></a>
                                    <a href="profile.html">{{ $article->author->name }} <span>{{ $article->author->id }}</span></a>
                                    </h2>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action"> 
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v ellipse_color"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right"> 
                                            <a class="dropdown-item" href="{{ route('articles.show', $article) }}">
                                                <i class="fas fa-pencil-alt m-r-5"></i> See
                                            </a>
                                            <a class="dropdown-item" href="{{ route('articles.edit', $article) }}">
                                                <i class="fas fa-pencil-alt m-r-5"></i> Edit
                                            </a> 
                                            <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i class="fas fa-trash-alt m-r-5"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection