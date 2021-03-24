@extends('layouts.app')
@section('content')

<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>

<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500" rel="stylesheet"/>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/> -->
<div class="page-header">
	 <div class="row">
    <div class="col-sm-10"> <h4>Company</h4></div>
     <div class="col-sm-2">  <a href="/company/create" class="btn btn-sm btn-warning"> <i class="fa fa-plus"></i>Add company</a></div>
  </div>
 </div>
<div class="row">
<div class="container"> 
  
  <table class="table responsive" id="sort">
  <thead>
      <tr>
        <th>NO</th>
					<th>LOGO</th>
					<th>COMPANY NAME</th>
					<th>CONTACT</th>
				<!-- 	<th>EMAIL</th>
					<th>KRA PIN</th> -->

					
					<th>ACTION</th>
         

        </tr>
  </thead>
     @foreach($companys as $company)
				 <td>{{ ++$i }}</td>
				<td> <img src="{{ asset('public/images/' . $company->image) }}" alt="image" height="50px"; width="50px"; /> </td>
					<!-- <td>{{$company->logo}}</td> -->
					<td>{{$company->company_name}}</td>
					<td>{{$company->contact}}</td>
					<!-- <td>{{$company->email}}</td>
					<td>{{$company->kra_pin}}</td> -->
					<td><a href="/company/{{$company->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
				</tr>
				@endforeach
        
      </tbody>
  </tbody>
</table>

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
<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src= "https://cdn.datatables.net/plug-ins/1.10.15/sorting/stringMonthYear.js"></script> -->
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
