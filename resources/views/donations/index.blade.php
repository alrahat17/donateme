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
						<strong class="card-title">Donation Table</strong>
					</div>
					<div class="card-body">
						<table id="don_table" class="table table-bordered data-table dataTable">
							<thead>
								<tr>
									<th>Sno</th>
									<th>Campaign</th>									
									<th>FullName</th>									
									<th>Email</th>
									<th>Donation</th>
									<th>Payment Type</th>
									<th>Date</th>
									<th>Mark as Complete?</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@foreach($donations as $donation)
								<tr>
									<td>{{$donation->id}}</td>
									<td>{{$donation->campaign->cam_name}}</td>
									<td>{{$donation->don_full_name}}</td>
									<td>{{$donation->user_email}}</td>
									<td>{{$donation->don_amount}}</td>
									<td>{{$donation->payment_type}}</td>
									<td>{{$donation->payment_date}}</td>
									<td>
									
									@if ($donation->payment_status==0)
								
									<a class="status" href="{{ URL::to('/com_don/'.$donation->id) }}">
										<button class="btn btn-success">Mark As Complete</i></button>
									</a></td>
											
									@endif									

									<td>
									@if ($donation->payment_status==0)
										<span class="label label-warning" style="color:#CB2027; font-weight:bold;">Pending</span>
									@else($donation->payment_status==1)
										<span class="label label-success" style="color:#0DB053; font-weight:bold;">Complete</span>
									@endif
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
    $('#don_table').DataTable();
	} );
	</script>


@endsection