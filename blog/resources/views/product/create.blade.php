@extends('layouts.app')
@section('content')


<div class="page-header">
   <div class="row">
    <div class="col-sm-10"><h4>Create Product</h4></div>
  </div>
  </div>
<div class="container">
<div class="row">
  <div class="col-sm-6">
    <form action="/product" method="POST">
      {{csrf_field()}}
      <div class="form-group">
        <label>Product name</label>
        <input type="text" name="product_name" class="form-control">
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
        <label>Product description</label>
        <input type="text" name="product_desc" class="form-control">
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
        <label>Product volume</label>
        <input type="text" name="volume_size" class="form-control">
      </div>


      <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success">Save</button>
      </div>
    </form>

  </div>
</div>
</div>
@endsection
