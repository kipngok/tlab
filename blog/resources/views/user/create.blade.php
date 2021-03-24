@extends('layouts.app')
@section('content')


<div class="page-header">
	 <div class="row">
    <div class="col-sm-10"><h4>Create user</h4></div>
  </div>
 
  </div>

<div class="container">
<div class="row">
	<div class="col-sm-6">
		<form action="/user" method="POST">
			{{csrf_field()}}
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-check form-check-inline">
  			<input class="form-check-input" type="checkbox" value="1" name="is_admin">
  			<label class="form-check-label">is admin</label>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-sm btn-success">Save</button>
			</div>
		</form>

	</div>
</div>
</div>
@endsection
