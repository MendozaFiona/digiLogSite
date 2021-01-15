@extends('layouts.app')

@section('content')

<div class="main">
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">{{ __('Login') }}</h2>
                    <form method="POST" class="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username" class="@error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            </div>
                            
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                            
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        
                        </div>

                        <div class="form-group form-button text-right">
                            <button type="submit" class="form-submit">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('register') }}" class="signup-image-link">No account yet? Register here.</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
