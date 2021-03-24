@extends('layouts.app')
@section('content')


<div class="page-header">
    <div class="row">
    <div class="col-sm-10"> <h4>CODES</h4></div>
     <div class="col-sm-2">  <a href="/code/create" class="btn btn-sm btn-warning"> <i class="fa fa-plus"></i>Generate code</a></div>
  </div>

  
  <form action="/process" method="POST">
  	{{csrf_field()}}
  	<input type="hidden" name="url" value="product">
  <div class="row">
  	<div class="col-sm-3 half">
  		<label>Select product</label>
  		<select class="form-control" name="product">
  		  <option value="All">All</option>
          @foreach($products as $product)
          @if(isset($filters['product']) && $filters['product']==$product->id)
          <option value="{{$product->id}}" selected="selected">{{$product->product_name}}</option>
          @else
          <option value="{{$product->id}}">{{$product->product_name}}</option>
          @endif
          
          @endforeach
        </select>
  	</div>
 
  
  	<div class="col-sm-3 half">
  		<button type="submit" class="btn btn-sm btn-success btn-block" style="margin-top:35px;">Filter</button>
  	</div>
  </div>
  </form>
  </div>

<div class="container" style="margin-left: -10px;">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-striped">
			<thead>
			<tr>	
				    <th>NO</th>
					<th>PRODUCT NAME</th>
					<th>PRODUCT CODE</th>
					<th>STATUS</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($codes as $code)
				    <td>{{ ++$i }}</td>
				 	<td>{{$code->product->product_name}}</td>
					<td>{{$code->code}}</td>
					<td>{{$code->status}}</td>
					<td><a href="/code/{{$code->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
				</tr>
				@endforeach
				
			</tbody>
		</table>
		{{$products->links()}}
	</div>
</div>
</div>
@endsection
