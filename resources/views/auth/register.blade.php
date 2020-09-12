@extends('layouts.library')
@section('title','Register')
@section('content')
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box">
                <div class="left">
                    <div class="content">
                        <div class="header">
                            <div class="logo text-center"><img src="{{ asset('img/logo-dark.png')}}"
                                    alt="Klorofil Logo"></div>
                            <p class="lead">Register a new account</p>
                        </div>
                        <form class="form-auth-small" method="post" action="{{ route('register') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="signup-Name" class="control-label sr-only">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" placeholder="Name" required
                                    autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
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
                            <div class="form-group">
                                <label for="signin-password" class="control-label sr-only">Password Confirm</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" placeholder="Password Confirm" required
                                    autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label for="signin-file" class="control-label sr-only">Users Image</label>
                                <input id="image" type="file" class="form-control" name="image" autocomplete="image">
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                {{ __('Register') }}
                            </button>
                            <div class="button">
                                Bạn đã có tài khoản?
                                <span class="helper-text"><i class="fa fa-user"></i> <a
                                        href="{{ route('login') }}">{{ __('login') }}</a></span>
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
