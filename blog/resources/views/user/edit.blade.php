@extends('layouts.app')
@section('content')


<div class="page-header">
	 <div class="row">
    <div class="col-sm-10"> <h4>Create user</h4></div>
  </div>
 
  </div>

<div class="container">
<div class="row">
	<div class="col-sm-6">
		<form action="/user/{{$user->id}}" method="POST">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="{{$user->name}}">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" value="{{$user->email}}">
			</div>
			<div class="form-group">
				<label>Password <small>Leave blank to retain previous password</small></label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-check form-check-inline">
			<input type="hidden" name="is_admin" value="0">
  			<input class="form-check-input" type="checkbox" value="1" name="is_admin">
  			<label class="form-check-label">is admin</label>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-sm btn-success">Update</button>
			</div>
		</form>

	</div>
</div>
</div>
@endsection
