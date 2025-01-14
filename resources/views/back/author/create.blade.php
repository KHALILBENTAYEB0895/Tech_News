@extends('back.app')

@section('title', 'Dashboard - Add Author')

@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
        <h3 class="page-title mt-5">@if (isset($author)) Edit @else Add @endif Author</h3>
    </div>
</div>
@endsection

@section('dashboard-content')
<div class="row">
    <div class="col-lg-12">
      <form action="{{ isset($author) ? route('authors.update', $author) : route('authors.store') }}" method="POST">
        @csrf
        @if (isset($author))
          @method('PATCH')
        @endif
        <div class="row formtype">
          <div class="col-md-4">
            <div class="form-group">
              <label>Name</label>
              <input
                class="form-control"
                type="text"
                name="name"
                value="{{ isset($author) ? $author->name : '' }}"
              />
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Email</label>
              <input
                class="form-control"
                name="email"
                type="email"
                value="{{ isset($author) ? $author->email : '' }}"
              />
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary buttonedit ml-2">
            Save
        </button>
      </form>
    </div>
  </div>
@endsection