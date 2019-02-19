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
						<table id="cam_table" class="table table-bordered  table-striped table-responsive">
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
								@foreach($campaigns as $key => $campaign)
								<tr>
									<td>{{$key +1 }}</td>
									<td><img style="height:45px;width: 60px;" src="{{$campaign->cam_img}}" /></td>
									<td>{{$campaign->cam_name}}</td>
									<td>{{$campaign->cam_loc}}</td>
									<td>{{$campaign->user->name}}</td>
									<td>{{isset($campaign->category->cat_name) ? $campaign->category->cat_name : "Category removed!"}}</td>
									
									
									<td>{{$campaign->funds_raised}}</td>
									<td>{{$campaign->goal}}</td>
									<td>{{$campaign->cam_date}}</td>
									<td>
										
									@if($campaign->cam_status==0)
										<span class="label label-warning" style="color:#CB2027; font-weight:bold;">Inactive</span>
									
									@elseif($campaign->cam_status==1)
										<span class="label label-success" style="color:#0DB053; font-weight:bold;">Active</span>
									@else($campaign->cam_status==2)
										<span class="label label-danger" style="color:#CB2027; font-weight:bold;">Finalized</span>
									@endif
										
									</td>
									<td>
									@if (($campaign->cam_date)<($current_date) && $campaign->cam_status == 1))
										<a class="status" href="{{ URL::to('/finalize_cam/'.$campaign->id) }}">
										<button class="btn btn-warning btn-sm">Finalize </button>
									</a></td>
									@endif
									@if ($campaign->cam_status == 0)
										<a class="status" href="{{ URL::to('/approve_cam/'.$campaign->id) }}">
										<button class="btn btn-success btn-sm"> Approve</button>
									</a></td>
									@endif
										
									</td>
									<td>
										<a class="edit" href="{{'/campaigns/'.$campaign->id.'/edit' }}">
											<button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
										</a>

										<form method="post" action="{{ route('campaigns.destroy', $campaign->id)}}">
											@csrf
											@method('delete')

											<a class="delete" href="{{'/campaigns/'.$campaign->id}}">
												<button class="btn btn-danger btn-sm"><i class="fa fa-trash btn-danger" type="submit" onclick="return confirm('Are you sure to delete?')"></i></button>
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
    $('#cam_table').DataTable();
	} );
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

      @include('sweet::alert')



@endsection