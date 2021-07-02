@extends('layouts.master')
@section('title','search result page')
@section('content')
    <a>
        current position:
        <a href="{{route('home')}}">
            Home/
        </a>

        <a>
            search result
        </a>
    </a>
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <section class="products">
                <ul class="list-unstyled">
                    @foreach ($products as $product)
                        @include('statuses._search_product')
                    @endforeach
                </ul>
                <div class="mt-5">
                {!! $products->render() !!}
                </div>
            </section>
        </div>
    </div>
@stop
