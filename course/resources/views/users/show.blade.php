@extends('layouts.master')
@section('title', $user->name)

@section('content')
<div class="row">
  <div class="offset-md-2 col-md-8">
    <section class="user_info">
      @include('shared._user_info', ['user' => $user])
    </section>
    <section class="products">
      @if ($products->count() > 0)
            {{--在个人页面视图中，我们使用了 $statuses->count() 方法来判断当前页面是否存在微博动态，如果不存在则不对微博的局部视图和分页链接进行渲染：--}}
        <ul class="list-unstyled">
          @foreach ($products as $product)
            @include('product.list._farmer')
          @endforeach
        </ul>
        <div class="mt-5">
          {!! $products->render() !!}
        </div>
      @else
        <p>NO data！</p>
      @endif
    </section>
  </div>
</div>
@stop
