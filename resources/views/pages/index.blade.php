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
							<a class="create_page" href="{{URL::to('/pages/create')}}">
								<button class="btn btn-primary">Add Page</i></button>
							</a>
						</div>	
						<strong class="card-title">Pages Table</strong>
					</div>
					<div class="card-body">
						<table id="page_table" class="table table-bordered data-table dataTable">
							<thead>
								<tr>
									<th>Sno</th>
									<th>Heading</th>
									<th>Homepage Box</th>									
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($pages as $page)
								<tr>
									<td>{{$page->id}}</td>
									<td>{{$page->heading}}</td>
									<td>{{$page->home_box}}</td>
									<td>
										<a class="edit" href="{{'/pages/'.$page->id.'/edit' }}">
											<button class="btn btn-info">Edit</i></button>
										</a>

										<form method="post" action="{{ route('pages.destroy', $page->id)}}">
											@csrf
											@method('delete')

											<a class="delete" href="{{'/pages/'.$page->id}}">
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
    $('#page_table').DataTable();
	} );
	</script>


@endsection