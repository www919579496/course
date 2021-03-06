@if ($feed_items->count() > 0)
  <ul class="list-unstyled">
    @foreach ($feed_items as $product)
      @include('statuses._status',  ['user' => $product->user])
    @endforeach
  </ul>
  <div class="mt-5">
    {!! $feed_items->render() !!}
  </div>
@else
  <p>No data！</p>
@endif

{{--现在让我们来接着定义一个微博动态流局部视图，用于渲染微博动态列表。
  在该视图中我们对微博动态数据进行了判断，当取出的微博数据不为空的时候才对视图进行渲染。--}}
