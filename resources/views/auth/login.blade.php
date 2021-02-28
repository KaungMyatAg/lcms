@extends('layouts.app')

@section('content')
    <div class="container-fluid vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3">
                    <div class="card bg-white shadow-lg rounded-0 border-0">
                        <div class="card-header bg-white border-0">
                            <h3 class="mb-0 text-center">Welcome Back</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror rounded-0" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block rounded-0">Login</button>
                                <div class="text-center mt-3">
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        Forgot Your Password
                                    </a>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('register') }}">
                                        Create An Account?
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
