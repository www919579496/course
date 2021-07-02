@extends('layouts.master')
@section('title','home page')
@section('content')
  @if (Auth::check())
    <div class="row">
      <div class="col-md-8">
        <section class="product_form">
          @include('product.upload.farmer')
          {{--@include('shared._status_form') --}}
        </section>
          <hr>
        <h4>Upload list</h4>
        <hr>
        @include('shared._feed')
      </div>
      <aside class="col-md-4">
        <section class="user_info">
          @include('shared._user_info', ['user' => Auth::user()])
        </section>
      </aside>
    </div>
  @else
      <a>
          current position:
      </a>
      <a href="{{route('home')}}">
          Home
      </a>
      <p>
      </p>
      <div class="row justify-content-center">
          <div class="col-md-10">
              <div class="card">
                  <div class="card-header bg-light">Lastest table</div>
                  <div class="card-body p-1">
                      <table class="table table-hover m-0">
                          <thead class="bg-success text-white">{{-- title--}}
                          <tr>
                              <th>Tracecode</th>
                              <th>Image</th>
                              <th>Product name</th>
                              <th>Upload date</th>
                              <th>Producer id</th>
                              <th>Ractopamine</th>
                              <th></th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($feed_items as $product)
                              @include('statuses._lasted_table')
                          @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
        <p>

        </p>
        <p>
            <a class="btn btn-lg btn-success " href="{{ route('register') }}" role="button">Now register</a>
        </p>
  @endif
@stop
