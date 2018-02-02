@extends('layouts.app')
@section('content')

<div class="flex-center position-ref full-height">
    <div class="col-sm-12 col-m-12 col-lg-5 p-r-100" style="position: absolute;">
    <div class="logo">
        <div class="title m-b-md center">
            LOGIN
        </div>
    </div>
        <div class="card">
            <div class="body">
                <form method="POST" action="{{ route('login') }}">
                    {{csrf_field()}}
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required value="{{ old('email') }}">
                        </div>

                        @if ($errors->has('email'))
                            <span class="font-bold col-pink">
                                <strong>*{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>

                        @if ($errors->has('password'))
                            <span class="font-bold col-pink">
                                <strong>*{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="{{url('/')}}">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
