@extends('layouts.master')
@section('title','result page')
@section('content')
<div class="row">
  <div class="offset-md-2 col-md-8">
    <section class="status">
        <ul class="list-unstyled">
            @foreach ($statuses as $status)
                @include('statuses._result')
            @endforeach
        </ul>
        <div class="mt-5">
          {!! $statuses->render() !!}
        </div>
    </section>
  </div>
</div>
@stop