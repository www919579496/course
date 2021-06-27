@extends('layouts.master')
@section('title', 'register')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>注冊</h5>
    </div>
    <div class="card-body">

      @include('shared._errors')
      
      <form method="POST" action="{{ route('users.store') }}">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="name">名稱：</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
          </div>

          <div class="form-group">
            <label for="email">郵箱：</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
          </div>

          <div class="form-group">
            <label for="password">密碼：</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
          </div>

          <div class="form-group">
            <label for="password_confirmation">確認密碼：</label>
            <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
          </div>

          <button type="submit" class="btn btn-primary">點擊注冊</button>
      </form>
    </div>
  </div>
</div>
@stop

{{-- Laravel 提供了全局辅助函数 old 来帮助我们在 Blade 模板中显示旧输入数据。这样当我们信息填写错误，
    页面进行重定向访问时，输入框将自动填写上最后一次输入过的数据。--}}