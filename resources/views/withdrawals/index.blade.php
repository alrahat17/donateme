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
						<strong class="card-title">Withdrawal Table</strong>
					</div>
					<div class="card-body">
						<table id="with_table" class="table table-bordered data-table dataTable">
							<thead>
								<tr>
									<th>Sno</th>
									<th>Campaign</th>									
									<th>UserName</th>									
									<th>Email</th>
									<th>Amount</th>
									<th>Payment Type</th>
									<th>Date</th>
									<th>Payment Details</th>
									<th>Mark as Complete?</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@foreach($withdrawals as $key => $withdrawal)
								<tr>
									<td>{{$key +1}}</td>
									<td>{{$withdrawal->cam_name}}</td>
									<td>{{$withdrawal->user_name}}</td>
									<td>{{$withdrawal->email}}</td>
									<td>{{$withdrawal->amount}}</td>
									<td>{{$withdrawal->payment_type}}</td>
									<td>{{$withdrawal->payment_date}}</td>
									<td>{{$withdrawal->payment_details}}</td>
									
									<td>
									
									@if ($withdrawal->payment_status==0)
								
									<a class="status" href="{{ URL::to('/com_payment/'.$withdrawal->id) }}">
										<button class="btn btn-success btn-sm">Mark As Complete</i></button>
									</a></td>
											
									@endif									

									<td>
									@if ($withdrawal->payment_status==0)
										<span class="label label-warning" style="color:#CB2027; font-weight:bold;">Pending</span>
									@else($withdrawal->payment_status==1)
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
    $('#with_table').DataTable();
	} );
	</script>


@endsection