@extends('layouts.app')
@section('content')


<div class="page-header">
	 <div class="row">
    <div class="col-sm-10"> <h4>Category</h4></div>
  </div>
 
  </div>

<div class="container">
<div class="row">
	<div class="col-sm-6">
		 @if ($errors->any())
    <div class="alert alert-danger mb-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
		<form action="/category/{{$category->id}}" method="POST">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group">
				<label>Category Name</label>
				<input type="text" name="category_name" class="form-control" value="{{$category->category_name}}">
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-sm btn-success">Update</button>
				<a href="/category" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
			</div>
		</form>

	</div>
</div>
</div>
@endsection
