@extends('layouts.app')
@section('content')


<div class="page-header">
	 <div class="row">
    <div class="col-sm-8"><h4>Users</h4></div>
    <div class="col-sm-2">
    
        <form action="/file-import" method="POST" enctype="multipart/form-data">
            @csrf
            <a class="btn btn-success" href="/file-exports">Export data</a>
        </form>


    </div>
     <div class="col-sm-2">
     <a href="/user/create" class="btn btn-sm btn-warning"> <i class="fa fa-plus"></i> Add new</a></div>
  </div>
 
 
  </div>

<div class="container">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
			<thead>
				<tr><th>NO</th>
					<th>Name</th>
					<th>Email</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr> <td>{{ ++$i }}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td><a href="/user/{{$user->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
				</tr>
				@endforeach
				
			</tbody>
		</table>
		{{$users->links()}}
	</div>
</div>
</div>
@endsection
