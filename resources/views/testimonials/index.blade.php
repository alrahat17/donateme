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
							<a class="create_user" href="{{URL::to('/testimonials/create')}}">
								<button class="btn btn-primary">Add Testimonial</i></button>
							</a>
						</div>	
						<strong class="card-title">Testimonials</strong>
					</div>
					<div class="card-body">
						<table id="test_table" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Sno</th>
									<th>Image</th>
									<th>Name</th>
									<th>Description</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($testimonials as $key => $testimonial)
								<tr>
									<td>{{$key +1}}</td>
									<td><img style="height:45px;width: 60px;" src="{{$testimonial->test_img}}" /></td>
									<td>{{$testimonial->name}}</td>
									<td>{{$testimonial->test_des}}</td>
									<td>
										<a class="edit" href="{{'/testimonials/'.$testimonial->id.'/edit' }}">
											<button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
										</a>
										<br><br>
										<form method="post" action="{{ route('testimonials.destroy', $testimonial->id)}}">
											@csrf
											@method('delete')

											<a class="delete" href="{{'/testimonials/'.$testimonial->id}}">
												<button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></button>
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
			$('#test_table').DataTable();
		} );
	</script>
	 

	@endsection