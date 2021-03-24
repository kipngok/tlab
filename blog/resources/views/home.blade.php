@extends('layouts.app')

@section('content')
    
<div class="container" >
    <div class="row mt-3">
        <div class="col-sm-6">
            <div class="alert alert-info mt-3"> You are logged in as {{Auth::user()->name}}</div>
        </div>
    </div>

        <div class="row">
            <div class="col-sm-6">
                
                @if(Auth::user()->is_admin ==1)
        <div class="card mt-3">
            <div class="card-header"><h4>Summary</h4></div>
             <div class="card-body">
            <table class="table table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Total Income</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                            
                            <td>KSH.{{$totalamount}}</td>
                        </tr>
                        
                    </tbody>
                </table>
        </div>
       </div>
       @endif
   </div>
   <div class="col-sm-4">
       <div class="card mt-3">
        <div class="card-header">
          <h4>Total Product</h4></div>
        <div class="card-body">
            <table class="table table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Products</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$totalproducts}}</td>
                        </tr>
                        
                    </tbody>
                </table>
        </div>
       </div>
   </div>
</div>
</div>
@endsection

