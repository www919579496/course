@extends('layouts.master')
@section('title','home page')

@section('content')
  @if (Auth::check())
    <div class="row">
      <div class="col-md-8">
        <section class="status_form">
          @include('shared._status_form')
        </section>
        <h4>list</h4>
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
    <div class="jumbotron">
      <p class="lead">
        Home page
      </p>
      <p>   
      </p>
      <p>
        <a class="btn btn-lg btn-success" href="{{ route('register') }}" role="button">Now register</a>
      </p>
    </div>
  @endif
@stop