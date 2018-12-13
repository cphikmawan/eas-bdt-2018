@extends('layouts.auth.app')

@section('title', 'Sign In')

@section('content')
    <div class="bg-image" style="background-image: url('codebase/src/assets/img/photos/photo26.jpg');">
        <div class="row mx-0 bg-black-op">
            <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                <div class="p-30 invisible" data-toggle="appear">
                    <p class="font-size-h3 font-w600 text-white">
                            “A person is but the product of their thoughts. What they think, they become.”
                    </p>
                    <p class="font-size-h5 text-white">
                        - Mahatma Gandhi -
                    </p>
                    <p class="font-italic text-white-op">
                        Coded with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="https://github.com/cphikmawan" target="_blank">Wayang Corp</a>
                    </p>
                </div>
            </div>
            <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                <div class="content content-full">
                    {{-- <!-- Header --> --}}
                    <div class="px-30 py-10">
                        <a class="link-effect font-w700" href="/">
                            <i class="fa fa-handshake-o"></i>
                            <span class="font-size-xl text-primary-dark">Book Storage</span>
                        </a>
                        <h1 class="h3 font-w700 mt-30 mb-10">Welcome</h1>
                        <h2 class="h5 font-w400 text-muted mb-0">Sign In to Continue</h2>
                    </div>

                    <form method="POST" class="js-validation-signin px-30" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-material form-material-primary floating">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    <label for="login-username">Email</label>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-material form-material-primary floating">
                                    <input id="login-password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    <label for="login-password">Password</label>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="login-remember-me" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    <label class="custom-control-label" for="login-remember-me"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button onclick="check(this.form)" type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                                <i class="si si-login mr-10"></i> Sign In
                            </button>
                            <div class="mt-30">
                                <p class="link-effect text-muted mr-10 mb-5 d-inline-block">
                                    Don't Have Account?
                                </p>
                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('register') }}">
                                    <i class="fa fa-plus mr-5"></i> Sign Up
                                </a>
                                {{-- <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('password.request') }}">
                                    <i class="fa fa-warning mr-5"></i> {{ __('Forgot Your Password?') }}
                                </a> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection