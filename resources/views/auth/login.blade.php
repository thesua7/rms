@extends('layouts.auth')

@section('content')
    <div class="p-2">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customControlInline" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="customControlInline">Remember me</label>
            </div>

            <div class="mt-3">
                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
            </div>



            <div class="mt-4 text-center">
                <h5 class="font-size-14 mb-3">Sign in with</h5>

                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="javaScript:void(0);" class="social-list-item bg-primary text-white border-primary">
                            <i class="mdi mdi-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javaScript:void(0);" class="social-list-item bg-info text-white border-info">
                            <i class="mdi mdi-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javaScript:void(0);" class="social-list-item bg-danger text-white border-danger">
                            <i class="mdi mdi-google"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="mt-4 text-center">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                @endif
            </div>
        </form>
    </div>
@endsection
@section('auth-js')
    hello
@endsection
