@extends('layouts.app')

@section('content')
<div class="container-fluid vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 offset-lg-3">
                <div class="card bg-white shadow-lg rounded-0 border-0">
                    <div class="card-header bg-white border-0">
                        <h3 class="text-center mb-0">Reset Password</h3>
                    </div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email Address : </label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror rounded-0" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button class="btn btn-primary btn-block rounded-0">Send Password Reset Link</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
