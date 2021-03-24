@extends('layouts.app')
@section('content')


<div class="page-header">
   <div class="row">
    <div class="col-sm-10"> <h4>Update product</h4></div>
  </div>
 
  </div>

<div class="container">
<div class="row">
  <div class="col-sm-6">
    <form action="/product/{{$product->id}}" method="POST">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="PUT">
      <div class="form-group">
        <label>Product name</label>
        <input type="text" name="product_name" class="form-control" value="{{$product->product_name}}">
      </div>
        <div class="form-group">
          <label>Category</label>
          <!-- <select class="form-control" name="category_id"> -->
           <select class="form-control" name="category_id">
          @foreach($categorys as $category)
          <option value="{{$category->id}}">{{$category->category_name}}</option>
          @endforeach
          </select>
          </div>
       <div class="form-group">
        <label>Description</label>
        <input type="text" name="product_desc" class="form-control" value="{{$product->product_desc}}">
      </div>
         <div class="form-group">
       
        <label>Company</label>
        <select class="form-control" name="company_id">
          @foreach($companys as $company)
          <option value="{{$company->id}}">{{$company->company_name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Volume</label>
        <input type="text" name="volume_size" class="form-control" value="{{$product->volume_size}}">
      </div>
     
      <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success">Update</button>
      </div>
    </form>

  </div>
</div>
</div>
@endsection
