@extends('back.app')

@section('title', 'Dashboard - Authors')

@section('dashboard-header')
<div class="row align-items-center">
    <div class="col">
      <div class="mt-5">
        <h4 class="card-title float-left mt-2">Les Auteurs</h4>
        <a
          href="{{ route('authors.create') }}"
          class="btn btn-primary float-right veiwbutton"
          >Ajouter un auteur</a
        >
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
            <table
              class="datatable table table-stripped table table-hover table-center mb-0"
            >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th class="text-right">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($authors as $author)
                <tr>
                  <td>{{ $author->id }}</td>
                  <td>
                    <h2 class="table-avatar">
                      <a
                        href="profile.html"
                        class="avatar avatar-sm mr-2"
                        ><img
                          class="avatar-img rounded-circle"
                          src="{{ asset('back_auth/assets/img/profile/'.$author->picture) }}"
                          alt="User Image"
                      /></a>
                      <a href="profile.html">{{ $author->name }}</a>
                    </h2>
                  </td>

                  <td>{{ $author->email }}</td>

                  <td class="text-right">
                    <div class="dropdown dropdown-action">
                      <a
                        href="#"
                        class="action-icon dropdown-toggle"
                        data-toggle="dropdown"
                        aria-expanded="false"
                        ><i class="fas fa-ellipsis-v ellipse_color"></i
                      ></a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('authors.edit', $author) }}"
                          ><i class="fas fa-pencil-alt m-r-5"></i>
                          Edit</a
                        >
                        <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline;">
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