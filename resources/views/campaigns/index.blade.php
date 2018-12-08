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
              				<a class="create_campaign" href="{{URL::to('/campaigns/create')}}">
                		<button class="btn btn-primary">Add Campaign</i></button>
              				</a>
           				 </div>  
						<strong class="card-title">Campaign Table</strong>
					</div>
					<div class="card-body">
						<table id="cam_table" class="table table-bordered  table-striped">
							<thead>
								<tr>
									<th>Sno</th>
									<th>Image</th>
									<th>Name</th>
									<th>Location</th>									
									<th>Username</th>
									<th>Category</th>
									<th>Funds Raised</th>
									<th>Goal</th>
									<th>Date</th>
									<th>Status</th>
									<th>Approve Campaign?</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($campaigns as $campaign)
								<tr>
									<td>{{$campaign->id}}</td>
									<td><img style="height:90px;width: 120px;" src="{{$campaign->cam_img}}" /></td>
									<td>{{$campaign->cam_name}}</td>
									<td>{{$campaign->cam_loc}}</td>
									<td>{{$campaign->user->name}}</td>
									<td>{{$campaign->category->cat_name}}</td>
									<td>{{$campaign->funds_raised}}</td>
									<td>{{$campaign->goal}}</td>
									<td>{{$campaign->created_at}}</td>
									<td>{{$campaign->cam_status}}</td>
									<td>{{$campaign->approve_cam}}</td>
									<td>
										<a class="edit" href="{{'/campaigns/'.$campaign->id.'/edit' }}">
											<button class="btn btn-info"><i class="fa fa-edit"></i></button>
										</a>

										<form method="post" action="{{ route('campaigns.destroy', $campaign->id)}}">
											@csrf
											@method('delete')

											<a class="delete" href="{{'/campaigns/'.$campaign->id}}">
												<button class="btn btn-danger"><i class="fa fa-trash btn-danger" type="submit" onclick="return confirm('Are you sure to delete?')"></i></button>
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
    $('#cam_table').DataTable();
	} );
	</script>


@endsection