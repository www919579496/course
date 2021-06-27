{{-- 我们在头部视图的文件名前面加了下划线 _，这样做是为了指定该视图文件为局部视图，
为局部视图增加前缀下划线是『约定俗成』的做法，方便了其它人快速地理解该文件的实际作用。--}}
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container ">
    <a class="navbar-brand" href="{{ route('home') }}">肉品安全追溯系統</a>

    <form action= "{{route('home')}}"  class="search-form">
      <div class="form-row">
        <div class="col-md-12">
          <div class="form-row">
            <div class="col-auto"><input type="text" class="form-control form-control-sm" name="search" placeholder="請輸入追溯碼"></div>
            <div class="col-auto"><button class="btn btn-primary btn-sm">search</button></div>
          </div>
        </div>
      </div>
    </form>  
    <ul class="navbar-nav justify-content-end">
      @if (Auth::check())  {{-- 登錄返回True,未登錄返回false--}}

        <li class="nav-item"><a class="nav-link " href="{{route('users.index')}}">用戶list</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}">個人中心</a>
            <a class="dropdown-item" href="{{ route('users.edit', Auth::user()) }}">編輯你的資料</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" id="logout" href="#">

              <form action="{{ route('logout') }}" method="POST">

                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button class="btn btn-block btn-danger" type="submit" name="button">登出</button>
              </form>
              {{--
              可以看到用户退出登录的按钮实际上是一个表单的提交按钮，在点击退出按钮之后浏览器将向 /logout 地址发送一个 POST 请求。
              但由于 RESTful 架构中会使用 DELETE 请求来删除一个资源，当用户退出时，实际上相当于删除了用户登录会话的资源，
              因此这里的退出操作需要使用 DELETE 请求来发送给服务器。由于浏览器不支持发送 DELETE 请求，
              因此我们需要使用一个隐藏域来伪造 DELETE 请求。  
              在 Blade 模板中，我们可以使用 {{ method_field('DELETE') }}方法来创建隐藏域。  
              等效於 <input type="hidden" name="_method" value="DELETE">
                --}}
            </a>
          </div>
        </li>
      @else
        <li class="nav-item"><a class="nav-link text-white" href="{{ route('help') }}">幫助</a></li>
        <li class="nav-item" ><a class="nav-link text-white" href="{{ route('login') }}">登錄</a></li>
      @endif
    </ul>
  </div>
</nav>
