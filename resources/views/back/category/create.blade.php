@extends('back.app')

@section('title', 'Dashboard - Create Category')

@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
      <h3 class="page-title mt-5">
        @if (isset($category))
          Edit Category
        @else
          Create Category
        @endif
      </h3>
    </div>
  </div>
@endsection

@section('dashboard-content')
<div class="row">
    <div class="col-lg-12">
      <form action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}" method="POST">
      @csrf
      @if (isset($category))
        @method('PUT')
      @endif
        @csrf
        <div class="row formtype">
          <div class="col-md-4">
            <div class="form-group">
              <label>Nom de la categorie</label>
              <input
                class="form-control"
                type="text"
                name="name"
                value="{{ isset($category) ? $category->name : '' }}"
              />
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="form-group">
              <label>Description</label>
              <textarea
                class="form-control"
                rows="5"
                id="comment"
                name="description"
              >{{ isset($category) ? $category->description : '' }}
              </textarea>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
                <label>Activation</label>
                <select class="form-control" 
                  id="sel2" name="isActive" 
                >
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
            </div>
          </div>
        </div>
      <button type="submit" class="btn btn-primary buttonedit1">
        @if (isset($category))
          Edit Category
        @else
          Create Category
        @endif
      </button>
      </form>
    </div>
  </div>
@endsection