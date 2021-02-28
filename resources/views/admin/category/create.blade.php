@extends('layouts.admin')

@section('content')
    <div class="container">
          <div class="row">
               <div class="col-12 col-lg-8">
                    <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Create New Category</li>
                         </ol>
                    </nav>
                    <div class="card border-0 bg-white shadow-lg">
                         <div class="card-header">
                              <h5 class="card-title mb-0 font-weight-bold">Create New Category</h5>
                         </div>
                         <form action="{{ route('category.store') }}" method="POST">
                              @csrf
                              <div class="card-body">
                                   <div class="form-group">
                                        <label for="category_name">Category Name : </label>
                                        <input type="text" class="form-control rounded-0 @error('category_name') is-invalid @enderror" name="category_name" id="category_name" value="{{ old('category_name') }}">
                                        @error('category_name') <span class="text-danger">{{ $message }}</span>@enderror
                                   </div>
                              </div>
                              <div class="card-footer">
                                   <button type="submit" class="btn btn-primary btn-block rounded-0">Submit</button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
    </div>
@endsection