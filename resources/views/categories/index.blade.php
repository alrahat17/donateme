@extends('layouts.admin_layout')
@section('admin_content')

<style type="text/css">
	.btn.btn-info {
	float: left;
}
</style>

<div class="content mt-3">
	<div class="animated fadeIn">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div align="right">
							<a class="create_category" href="{{URL::to('/categories/create')}}">
								<button class="btn btn-primary">Add Category</i></button>
							</a>
						</div>	
						<strong class="card-title">Categories</strong>
					</div>
					<div class="card-body">
						<table id="cat_table" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Sno</th>
									<th>Image</th>
									<th>Name</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody>
								@foreach($categories as $key => $category)
								<tr>
									<td>{{$key +1}}</td>
									<td><img style="height:90px;width: 120px;" src="{{$category->cat_img}}" /></td>
									<td>{{$category->cat_name}}</td>
									<td>
										<a class="edit" href="{{'/categories/'.$category->id.'/edit' }}">
											<button class="btn btn-info btn-sm">Edit</i></button>
										</a>

										<form method="post" action="{{ route('categories.destroy', $category->id)}}">
											@csrf
											@method('delete')

											<a class="delete" href="{{'/categories/'.$category->id}}">
												<button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure to delete?')">Delete</button>
											</a>
										</form>
										</td>
									</tr>
									@endforeach

								</tbody>
							</table>
						</div>
					</div>
				</div>


			</div>
		</div><!-- .animated -->
	</div><!-- .content -->

	<!-- jQuery -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
  
$(document).ready( function () {
    $('#cat_table').DataTable();
	} );
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

      @include('sweet::alert')


	@endsection