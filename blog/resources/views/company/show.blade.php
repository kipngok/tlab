@extends('layouts.app')
@section('content')


<div class="page-header">
   <div class="row">
    <div class="col-sm-10"> <h4>Comapny</h4></div>
  </div>
         
          
  </div>

<div class="container">
<div class="row">
  <div class="col-sm-6">
    <table class="table table-condensed table-striped table-bordered">
      <tbody>
     
      
          <th>COMPANY NAME</th>
          <td>{{$companys->company_name}}</td>
        </tr>
       
     <!--     <tr>
          <th>KRA PIN</th>
          <td>{{$companys->kra_pin}}</td>
        </tr>
         <tr>
          <th>EMAIL</th>
          <td>{{$companys->email}}</td>
        </tr> -->
         <tr>
          <th>CONTACTS</th>
          <td>{{$companys->contact}}</td>
        </tr>

         <tr>
        
      </tbody>
    </table>
    <form action="/company/{{$companys->id}}" method="POST">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE">
      <div class="btn btn-group">
        <a href="/company/{{$companys->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
        <a href="/company" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
      </div>
    </form>
  </div>
   <div class="col-sm-6">
    <table>
        <tr>
          <!-- <th>Image</th> -->
          <td><img src="{{ asset('public/images/' . $companys->image) }}" alt="image" height="230px"; width="230px"; /></td>
        </tr>
    </table>
    
  </div>
</div>
</div>
@endsection
