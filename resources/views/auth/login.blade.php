@extends('_layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="login-content">
        <div class="login-logo">
            <a href="#">
                <img src="{{ asset('cool-admin/images/icon/logo.png') }}" alt="CoolAdmin">
            </a>
        </div>
        <div class="login-form">
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible">
                    {{ session('error') }}
                    <button class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-danger alert-dismissible">
                    {{ session('success') }}
                    <button class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Username</label>
                    <input class="au-input au-input--full form-control @error('username') is-invalid @enderror" type="text" name="username" placeholder="Username" value="{{ old('username') }}" autofocus>

                    @error('username')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="au-input au-input--full form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="login-checkbox">
                    <label>
                        <input type="checkbox" name="remember">Remember Me
                    </label>
                </div>
                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
            </form>
        </div>
    </div>
@endsection