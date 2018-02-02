@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height" style="background: #1ea5a1;justify-content: center;">
    <div class="col-sm-12 col-m-12 col-lg-5" style="position: absolute;">
    <div class="logo">
        <div class="title m-b-md center">
            Reset Password
        </div>
    </div>
        <div class="card">
            <div class="body">
                <form method="POST" action="{{ route('password.email') }}">
                    {{csrf_field()}}
                    <div class="msg">We will send your activation link to your email</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required value="{{ old('email') }}">
                        </div>

                        @if ($errors->has('email'))
                            <span class="help-block red-text">
                                <strong>*{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Send Password Reset Link</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
