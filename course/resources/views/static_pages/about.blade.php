@extends('layouts.master')
@section('title','aboutpage')

@section('content')
    <a>
        current position:
        <a href="{{route('home')}}">
            Home/
        </a>

        <a href="{{route('about')}}">
            about
        </a>
    </a>
@stop
