@extends('layouts.app')
@section('content')

<div class="flex-center position-ref full-height">
    <div class="col-sm-12 col-m-12 col-lg-5 p-r-100" style="position: absolute;
    bottom: 0;">
    <div class="logo">
        <div class="title m-b-md center">
            Register
        </div>
    </div>
        @include('auth.register')
    </div>
</div>
@stop
