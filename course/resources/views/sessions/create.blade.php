@extends('layouts.master')
@section('title', '登录')

@section('content')
<div class="offset-md-2 col-md-8">
    <div class="card ">
        <div class="card-header">
            <h5>登錄</h5>
        </div>
        <div class="card-body">
            @include('shared._errors')

            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email">郵箱：</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">密碼：（<a href="{{ route('password.request') }}">忘記密碼?</a>）</label>
                    <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                </div>
        
                <div class="form-group">
                    <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">記住me</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">登錄</button>
            </form>
            <hr>
            <p>沒有賬號？<a href="{{ route('register') }}">點擊注冊</a></p>
        </div>
    </div>
</div>
@stop