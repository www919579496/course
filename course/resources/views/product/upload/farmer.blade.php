<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header bg-success text-white">
      <h5>product upload</h5>
    </div>
    <div class="card-body">

      @include('shared._errors')

      <form method="POST" action="{{ route('product.store') }}">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="Product_name">Product name：</label>
            <input type="string" name="name" class="form-control" value="{{ old('name') }}">
          </div>

          <div class="form-group">
            <label for="weight">weight：</label> <label class="text-secondary">Kg</label>
            <input type="float" name="weight" class="form-control" value="{{ old('weight') }}">
          </div>

          <div class="form-group">
            <label for="detail">detail：</label>
            <input type="text" name="detail" class="form-control" value="{{ old('detail') }}">
          </div>

          <div class="form-group">
            <label for="RactopamineFormControlSelect">Ractopamine is used:</label>
            <select name="ractopamine" multiple class="form-control" id="RactopamineFormControlSelect">
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">upload</button>
      </form>
    </div>
  </div>
</div>
