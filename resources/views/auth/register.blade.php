@extends('layout.auth')
@section('title', 'Register')
@section('content')
    <div class="row w-100">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                    <img src="{{ asset('assets/images/logo.svg') }} ">
                </div>
                @include('layout.partials.messages')
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form class="pt-3" action="{{ route('auth.register') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control form-control-lg" placeholder="Name">
                        @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control form-control-lg"
                            placeholder="Password Confirmation">
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="file" name="avatar" class="form-control form-control-lg" placeholder="Avatar">
                        @if ($errors->has('avatar'))
                            <span class="text-danger text-left">{{ $errors->first('avatar') }}</span>
                        @endif
                    </div>
                    <div class="mb-4">
                        <div class="form-check">
                            <label class="form-check-label text-muted">
                                <input type="checkbox" class="form-check-input">
                                I agree to all Terms & Conditions
                            </label>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit"
                            class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN
                            UP</button>
                    </div>
                    <div class="text-center mt-4 font-weight-light">
                        Already have an account? <a href="{{ route('auth.login') }}" class="text-primary">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
