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
							<a class="create_user" href="{{URL::to('/galleries/create')}}">
								<button class="btn btn-primary">Add Image</i></button>
							</a>
						</div>	
						<strong class="card-title">Gallery Table</strong>
					</div>
					<div class="card-body">
						<table id="gal_table" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Image</th>
									<th>Title</th>
									<th>Sub Title</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($galleries as $gallery)
								<tr>
									<td><img style="height:90px;width: 120px;" src="{{$gallery->gal_img}}" /></td>
									<td>{{$gallery->title}}</td>
									<td>{{$gallery->sub_title}}</td>
									<td>
										<a class="edit" href="{{'/galleries/'.$gallery->id.'/edit' }}">
											<button class="btn btn-info">Edit</i></button>
										</a>

										<form method="post" action="{{ route('galleries.destroy', $gallery->id)}}">
											@csrf
											@method('delete')

											<a class="delete" href="{{'/galleries/'.$gallery->id}}">
												<button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure to delete?')">Delete</button>
											</a>
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
    $('#gal_table').DataTable();
	} );
	</script>

	@endsection