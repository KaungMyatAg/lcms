@extends('layouts.app')

@section('content')
    <div class="container-fluid vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3">
                    <div class="card bg-white shadow-lg rounded-0 border-0">
                        <div class="card-header bg-white border-0">
                            <h3 class="mb-0 text-center">Register</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name : </label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror rounded-0" name="name" value="{{ old('name') }}" required autocomplete="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address : </label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror rounded-0" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password : </label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror rounded-0" name="password" required autocomplete="new-password">
        
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirm">Confirm Password : </label>
                                    <input id="password-confirm" type="password" class="form-control rounded-0" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <button class="btn btn-primary btn-block rounded-0">Register</button>
                                <div class="text-center mt-2">
                                    <a href="{{ route('login') }}">
                                        Already Account?Login!
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
