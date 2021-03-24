@extends('layouts.app')
@section('content')


<div class="page-header">
	 <div class="row">
    <div class="col-sm-10"> <h4>Product</h4></div>
     <div class="col-sm-2">  <a href="/product/create" class="btn btn-sm btn-warning"> <i class="fa fa-plus"></i> Batch product</a>
     </div>
  </div>
 </div>
   <div class="container">
    <div class="row" style="background-color: ">
    <div class="col-sm-4">
          <div class="form-group">

<select class="form-control" name="category_name">
        <option value="All">All</option>
          @foreach($categorys as $category)
          @if(isset($filters['category']) && $filters['category']==$category->id)
          <option value="{{$category->id}}" selected="selected">{{$category->category_name}}</option>
          @else
          <option value="{{$category->id}}">{{$category->category_name}}</option>
          @endif
          
          @endforeach
        </select>
          </div>
    </div>
     <div class="col-sm-2">
      <div class="form-group">
         <button type="submit" class="btn btn-sm btn-success btn-block">Filter</button>
      </div>
     </div>
  </div>
  </div>
<div class="row">
<div class="container"> 
  
  <table class="table responsive" id="sort">
	<thead>
		<tr>
				<th>NO</th>
					<th>PRODUCT NAME</th>
					<th>CATEGORY</th>
					<th>DESCRIPTION</th>
					<th>VOLUME</th>
					<th>COMPANY</th>
					<th>ACTION</th>
		</tr>
	</thead>
			@foreach($products as $product)
				    <td>{{ ++$i }}</td>
					<td>{{$product->product_name}}</td>
					<td>{{$product->category->category_name}}</td>
					<td>{{$product->product_desc}}</td>
					<td>{{$product->volume_size}}</td>
					<td>{{$product->company->company_name}}</td>
					<td><a href="/product/{{$product->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
				</tr>
				@endforeach
				
			</tbody>
	</tbody>
</table>
 {{$products->links()}}
</div>
</div>
<style type="text/css">
	table {
  width: 100%;
  border-collapse: collapse;
}


/* Zebra striping */

tr:nth-of-type(odd) {
  background: #f4f4f4;
}

tr:nth-of-type(even) {
  background: #fff;
}

th {
  background: #782f40;
  color: #ffffff;
  font-weight: 300;
}

td,
th {
  padding: 10px;
  border: 1px solid #ccc;
  text-align: left;
}

td:nth-of-type(1) {
  font-weight: 500 !important;
}

td {
  font-family: 'Roboto', sans-serif !important;
  font-weight: 300;
  line-height: 20px;
}

span {
  font-style: italic
}

@media only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px) {

  /* Force table to not be like tables anymore */
  table.responsive,
  .responsive thead,
  .responsive tbody,
  .responsive th,
  .responsive td,
  .responsive tr {
    display: block !important;
  }

  /* Hide table headers (but not display: none;, for accessibility) */
  .responsive thead tr {
    position: absolute !important;
    top: -9999px;
    left: -9999px;
  }

  .responsive tr {
    border: 1px solid #ccc;
  }

  .responsive td {
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee !important;
    position: relative !important;
    padding-left: 25% !important;
  }

  .responsive td:before {
    /* Now like a table header */
    position: absolute !important;
    /* Top/left values mimic padding */
    top: 6px;
    left: 6px;
    width: 45%;
    padding-right: 10px;
    white-space: nowrap !important;
    font-weight: 500 !important;
  }

  /*
	Label the data
	*/
  .responsive td:before {
    content: attr(data-table-header) !important;
  }
}
</style>

<script type="text/javascript">
	$(document).ready(function() {
   $("#sort").DataTable({
      columnDefs : [
    { type : 'date', targets : [3] }
],  
   });
});

</script>

@endsection
