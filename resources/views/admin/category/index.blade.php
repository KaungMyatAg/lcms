@extends('layouts.admin')

@section('content')
    <div class="container">
          <div class="row">
               <div class="col-12 col-lg-8">
                    <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
                              <li class="breadcrumb-item active" aria-current="page">View All Category</li>
                         </ol>
                    </nav>
                    @if(session('Success'))
                    <div class="alert alert-success" role="alert">
                         {{ session('Success') }}
                    </div>
                    @endif
                    @if(count($categories) > 0)
                    <div class="card border-0 bg-white shadow-lg">
                         <div class="card-header">
                              <h5 class="card-title mb-0 font-weight-bold">View All Categories</h5>
                         </div>
                         <div class="card-body">
                              <table class="table table-md-responsive table-hover">
                                   <thead>
                                        <tr>
                                             <th>Id</th>
                                             <th>Category Name</th>
                                             <th>Edit</th>
                                             <th>Delete</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        @foreach($categories as $category)
                                             <tr>
                                                  <td>{{ $category->id }}</td>
                                                  <td>{{ $category->name }}</td>
                                                  <td>
                                                       <a href="{{ url("category/$category->id/edit") }}" class="btn btn-primary btn-sm rounded-0">Edit</a>
                                                  </td>
                                                  <td>
                                                       <form action="{{ url("category/$category->id") }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm rounded-0" onclick="return confirm('Are You Sure To Delete?')">Delete</button>
                                                       </form>
                                                  </td>
                                             </tr>
                                        @endforeach
                                   </tbody>
                              </table>
                         </div>
                         <div class="card-footer">
                              <a href="{{ route('category.create') }}" class="btn btn-primary btn-block rounded-0">Add New Category</a>
                         </div>
                    </div>
                    @endif
               </div>
          </div>
    </div>
@endsection