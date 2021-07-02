<!DOCTYPE html>
<html>
  <head>
    <title>肉品安全追溯系統 - @yield('title') </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>

  <body>
    @include('layouts._header')

    <div class="container">
      <div class="offset-md-1 col-md-10">
        @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
      </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
  </body>
</html>


{{-- <title>@yield('title', 'Weibo App')</title> --}}
{{-- 我们给 @yield 传了两个参数，第一个参数是该区块的变量名称，
    第二个参数是默认值，表示当指定变量的值为空值时，使用 Weibo 来作为默认值。--}}