@extends('layouts.auth.app')

@section('title', 'Sign Up')

@section('content')
    <div class="bg-image" style="background-image: url('codebase/src/assets/img/photos/photo22.jpg');">
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
                            <span class="font-size-xl text-primary-dark">BookBS</span>
                        </a>
                        <h1 class="h3 font-w700 mt-30 mb-10">Register New Account</h1>
                        <h2 class="h5 font-w400 text-muted mb-0">Complete This Form!</h2>
                    </div>
                    <form class="js-validation-signup px-30" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-material form-material-primary floating">
                                    <input id="signup-username" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                    <label for="signup-username">Name</label>
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-material form-material-primary floating">
                                    <input id="signup-email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                    <label for="signup-email">Email</label>

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
                                    <input id="signup-password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    <label for="signup-password">Password</label>

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
                                <div class="form-material form-material-primary floating">
                                    <input type="password" class="form-control" id="signup-password-confirm" name="password_confirmation" required>
                                    <label for="signup-password-confirm">Password Confirmation</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                                <i class="fa fa-plus mr-10"></i> Sign Up
                            </button>
                            <div class="mt-30">
                                <p class="link-effect text-muted mr-10 mb-5 d-inline-block">
                                    Already Have Account?
                                </p>
                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('login') }}">
                                    <i class="fa fa-user text-muted mr-5"></i> Sign In
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection