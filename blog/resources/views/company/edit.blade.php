@extends('layouts.app')
@section('content')


<div class="page-header">
   <div class="row">
    <div class="col-sm-10"> <h4>Create user</h4></div>
  </div>
 
  </div>

<div class="container">
<div class="row">
  <div class="col-sm-6">
    <form action="/company/{{$companys->id}}" method="POST">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="PUT">
      <div class="form-group">
        <label>Company name</label>
        <input type="text" name="product_name" class="form-control" value="{{$companys->company_name}}">
      </div>
       <div class="form-group">
        <label>Contacts</label>
        <input type="text" name="contact" class="form-control" value="{{$companys->contact}}">
      </div>
   <!--    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{$companys->email}}">
      </div>
      <div class="form-group">
        <label>KRA pin</label>
        <input type="text" name="kra_pin" class="form-control"  value="{{$companys->kra_pin}}">
      </div> -->
      <div class="form-group">
        <label>Location</label>
        <input type="text" name="location" class="form-control" value="{{$companys->location}}">
      </div>
     <div class="form-group">
        <label>Company logo</label>
        <input type="file" name="image" class="form-control" value="{{$companys->image}}" >
      </div>
     
      <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success">Update</button>
      </div>
    </form>

  </div>
</div>
</div>
@endsection
