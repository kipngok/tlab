@extends('layouts.app')
@section('content')


<div class="page-header">
   <div class="row">
    <div class="col-sm-10"> <h4>Product</h4></div>
  </div>
         
          
  </div>

<div class="container">
<div class="row">
  <div class="col-sm-6">
    <table class="table table-condensed table-striped table-bordered">
      <tbody>
        <tr>
          <th>Name</th>
          <td>{{$product->product_name}}</td>
        </tr>
          <th>Volume</th>
          <td>{{$product->volume_size}}</td>
        </tr>
        <tr>
          <th>Product description</th>
          <td>{{$product->product_desc}}</td>
        </tr>
         <tr>
        
      </tbody>
    </table>
    <form action="/product/{{$product->id}}" method="POST">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE">
      <div class="btn btn-group">
        <a href="/product/{{$product->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
         <a href="/product" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
      </div>
    </form>
  </div>
</div>
</div>
@endsection
