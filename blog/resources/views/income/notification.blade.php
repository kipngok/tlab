@extends('layouts.app')
@section('content')
<div class="page-header">
   <div class="row">
    <div class="col-sm-10"> <h4>Notifications</h4></div>
   
    <div class="col-sm-2">
    
        <form action="/file-import" method="POST" enctype="multipart/form-data">
            @csrf
            <a class="btn btn-warning" href="/file-exportinc">Export data</a>
        </form>


    </div>
  </div>
 </div>
<div class="row">
<div class="container"> 
  
  <table class="table responsive" id="sort">
  <thead>
      <tr>
        <th>NO</th>
        <th>DATE</th>
         <th>RECIPIENT</th>
          <th>INVALID CODES</th> 
         

        </tr>
  </thead>
     @foreach($incomes as $income)
        <tr>
         <td>{{ ++$i }}</td>
          <td>{{$income->created_at}}</td>
          <td>{{$income->consumed_by}}</td>
          <td>{{$income->invalid_code}}</td>  
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
