<li class="media mt-4 mb-4">

  <a href="{{ route('users.show', $user->id )}}">
    <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="mr-3 gravatar"/>
  </a>
  <div class="media-body">
    <h5 class="mt-0 mb-1">{{$user->name}}  <small> / {{ $product->created_at->diffForHumans() }}</small></h5>
    {{ $product->name }}
  </div>

  {{-- @can('destroy', $status) --}}
    {{--这一行简单 Javascript 代码，即可实现我们想要的功能。刷新页面后再次点击删除按钮，可以看到确认框：--}}
    {{-- <form action="{{ route('statuses.destroy', $status->id) }}" method="POST" onsubmit="return confirm('Are u sure to delete?');">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
    </form>
  @endcan
    --}}
</li>

  {{--
    $status 实例代表的是单条微博的数据，$user 实例代表的是该微博发布者的数据。
    $status->created_at->diffForHumans()    该方法的作用是将日期进行友好化处理，
    --}}

