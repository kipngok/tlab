@extends('layouts.app')
@section('content')


<div class="page-header">
   <div class="row">
   <div class="col-sm-10"> <h4>CODES</h4></div>
     <div class="col-sm-2">  <a href="/code/create" class="btn btn-sm btn-warning"> <i class="fa fa-plus"></i>Generate code</a></div>
  </div>
 </div>
    <div class="container">
      <div class="row">
           <div class="col-sm-8">
              </div>
        <div class="col-sm-4">
             <h3>
            <input type="search" placeholder="Filter..." class="form-control search-input" data-table="customers-list"/>
        </h3>
        </div>
    
      </div>
   
        
        <table class="table table-striped mt32 customers-list">
            <thead>
                <tr> 
        
                  <th>NO</th>
               <th>PRODUCT NAME</th>
              <th>PRODUCT CODE</th>
                <th>STATUS</th>
               <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($codes as $code)
      <tr>
            <td>{{ ++$i }}</td>
          <td>{{$code->product->product_name}}</td>
          <td>{{$code->code}}</td>
          <td>{{$code->status}}</td>
          <td><a href="/code/{{$code->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
        </tr>
        @endforeach
               
            </tbody>
        </table>
    </div>
    <script>
        (function(document) {
            'use strict';

            var TableFilter = (function(myArray) {
                var search_input;

                function _onInputSearch(e) {
                    search_input = e.target;
                    var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
                    myArray.forEach.call(tables, function(table) {
                        myArray.forEach.call(table.tBodies, function(tbody) {
                            myArray.forEach.call(tbody.rows, function(row) {
                                var text_content = row.textContent.toLowerCase();
                                var search_val = search_input.value.toLowerCase();
                                row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
                            });
                        });
                    });
                }

                return {
                    init: function() {
                        var inputs = document.getElementsByClassName('search-input');
                        myArray.forEach.call(inputs, function(input) {
                            input.oninput = _onInputSearch;
                        });
                    }
                };
            })(Array.prototype);

            document.addEventListener('readystatechange', function() {
                if (document.readyState === 'complete') {
                    TableFilter.init();
                }
            });

        })(document);
    </script>

@endsection

