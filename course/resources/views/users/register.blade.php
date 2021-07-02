@extends('layouts.master')
@section('title', 'register')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header bg-success text-white">
      <h5>Register</h5>
    </div>
    <div class="card-body">

      @include('shared._errors')

      <form method="POST" action="{{ route('users.store') }}">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="name">Name：</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
          </div>

          <div class="form-group">
            <label for="email">Email：</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
          </div>

          <div class="form-group">
            <label for="password">Password：</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
          </div>

          <div class="form-group">
            <label for="password_confirmation">confirm password：</label>
            <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
          </div>

          <div class="form-group">
            <label for="location">country/area：</label>
            <input type="string" name="location" class="form-control" value="{{ old('location') }}">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect2">please select your user type:</label>
            <select name="type_id" multiple class="form-control" id="usertype_FormControlSelect">
              <option value="1">Farmer</option>
              <option value="2">Food Industry</option>
              <option value="3">merchant</option>
              <option value="4">constomer</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">click to register</button>
      </form>
    </div>
  </div>
</div>
@stop

{{-- Laravel 提供了全局辅助函数 old 来帮助我们在 Blade 模板中显示旧输入数据。这样当我们信息填写错误，
    页面进行重定向访问时，输入框将自动填写上最后一次输入过的数据。--}}
