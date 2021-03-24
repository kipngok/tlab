@extends('layouts.app')
@section('content')

<body class="mt32">
  <div class="page-header">
   <div class="row">
   <div class="col-sm-10"> <h4>Categories</h4></div>
     <div class="col-sm-2"> <a href="/category/create" class="btn btn-sm btn-warning"> <i class="fa fa-plus"></i>Create Category</a></div>
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
      <table class="table responsive mt32 customers-list" id="sort">
  <!--  <table class="table table-striped mt32 customers-list"> -->
            <thead>
              <tr> 
              <th>NO</th>  
              <th>Name</th>
              <th>Created</th>
              <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($categorys as $category) 
            <tr>
            <td>{{ ++$i }}</td>
          <td>{{$category->category_name}}</td>
           <td>{{$category->created_at->format('d-m-Y')}}</td>
          <td><a href="/category/{{$category->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
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
</body>

@endsection

