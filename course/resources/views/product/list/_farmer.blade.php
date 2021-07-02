<li class="media mt-4 mb-4">
    <a href="{{ route('users.show', $user->id )}}">
      <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="mr-3 gravatar"/>
    </a>
    <div class="media-body">
        <h5 class="mt-0 mb-1"> {{ $user->name }}<small> / {{ $product->created_at->diffForHumans() }}</small></h5>
        <div class="fs-5">product name:{{ $product->name }}</div>
        <div class="fs-5">weight      :{{ $product->weight }}</div>
        <div class="fs-5">tracecode   :{{$product->id}}</div>
        <div class="fs-5">detail      :{{$product->detail}}</div>
        <div class="fs-5">ractopamine :
            @if($product->ractopamine==1)
                Yes
            @else
                NO
            @endif

        </div>
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
