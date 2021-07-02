@extends('layouts.master')
@section('title','help page')


@section('content')

    <a>
        current position:
        <a href="{{route('home')}}">
            Home/
        </a>

        <a href="{{route('help')}}">
            help
        </a>
    </a>
@stop
