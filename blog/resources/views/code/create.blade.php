@extends('layouts.app')
@section('content')


<div class="page-header">
   <div class="row">
    <div class="col-sm-10"><h4>Create code</h4></div>
  </div>
 
  </div>

<div class="container">
<div class="row">
  <div class="col-sm-6">
    <form action="/code" method="POST" name="myform">
      {{csrf_field()}}
       <div class="form-group">
       
        <label>Product name</label>
        <select class="form-control" name="product_id">
          @foreach($products as $product)
          <option value="{{$product->id}}">{{$product->product_name}}</option>
          @endforeach
        </select>
      </div>
       <div class="form-group">
        <label>Quantity</label>
         <input name="quantity" type="text" size="40" class="form-control">
       </div>

     <div class="form-group">
        <label>Code</label>
         <input name="code" type="text" size="40" class="form-control" readonly="true">
      
      <!--   <div class="form-group">
        <input type="button" class="btn btn-sm btn-danger" value="Generate code" onClick="randomPassword(6);" tabindex="2">
      </div> -->
    <div class="form-group"></div>

      <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success" onClick="randomPassword(6);"
        tabindex="2" >Generate code</button>
      </div>
    </form>

  </div>
</div>
</div>
@endsection
@section('scripts')
<script>
function randomPassword(length) {
    var chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    myform.code.value = pass;
}
</script>
@endsection
