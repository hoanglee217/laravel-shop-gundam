@extends('layouts.library')
@section('title','Login')
@section('content')
<div id="wrapper">
    @if (Session::has('message'))

    <div class="alert alert-danger alert-dismissible" style="text-align: center">
        {{ Session::get('message') }}
    </div>

    @endif
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">

            <div class="auth-box ">

                <div class="left">
                    <div class="content">
                        <div class="header">
                            <div class="logo text-center"><img src="{{ asset('img/logo-dark.png')}}"
                                    alt="Klorofil Logo"></div>
                            <p class="lead">Login to your account</p>
                        </div>
                        <form class="form-auth-small" method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="signin-email" class="control-label sr-only">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Email" required
                                    autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="signin-password" class="control-label sr-only">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group clearfix">
                                <label class=" element-left">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                {{ __('Login') }}
                            </button>
                            <div class="bottom">
                                Tạo tài khoản!
                                <span class="helper-text"><i class="fa fa-user"></i> <a
                                        href="{{ route('register') }}">{{ __('Register') }}</a></span>
                                <br>
                                @if (Route::has('password.request'))
                                <span class="helper-text"><i class="fa fa-lock"></i><a
                                        href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></span>
                                @endif

                            </div>
                        </form>
                    </div>
                </div>
                <div class="right">
                    <div class="overlay" style="overflow: hidden">
                        <img src="https://wallpaperboat.com/wp-content/uploads/2020/04/gundam-wallpaper-full-hd.jpg"
                            alt="" style="margin-left: -115px;" height="100%">
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@endsection
