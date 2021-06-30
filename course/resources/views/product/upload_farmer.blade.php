@extends('layouts.master')
@section('title', 'register')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>product upload</h5>
    </div>
    <div class="card-body">

      @include('shared._errors')
      
      <form method="POST" action="{{ route('users.store') }}">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="Product_name">Product name：</label>
            <input type="string" name="name" class="form-control" value="{{ old('name') }}">
          </div>

          <div class="form-group">
            <label for="weight">weight：</label>
            <input type="float" name="weight" class="form-control" value="{{ old('weight') }}">
          </div>

          <div class="form-group">
            <label for="Production_date">Production date：</label>
            <input type="timestamp" name="created_at" class="form-control" value="{{ old('created_at') }}">
          </div>

          <div class="form-group">
            <label for="detail">detail：</label>
            <input type="text" name="detail" class="form-control" value="{{ old('detail') }}">
          </div>
         
          <div class="form-group">
            <label for="RactopamineFormControlSelect">Ractopamine is used:</label>
            <select name="ractopmine" multiple class="form-control" id="RactopaminFormControlSelect">
              <option value="Yes">Yes</option>
              <option value="NO">No</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">clickt o register</button>
      </form>
    </div>
  </div>
</div>
@stop
