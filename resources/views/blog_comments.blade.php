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
						<strong class="card-title">Comment Table</strong>
					</div>
					<div class="card-body">
						<table id="comment_table" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Sno</th>
									<th>Name</th>
									<th>Email</th>
									<th>Message</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($comments as $key => $comment)
								<tr>
									<td>{{$key +1}}</td>
									<td>{{$comment->user->name}}</td>
									<td>{{$comment->user->email}}</td>
									<td>{{$comment->message}}</td>
									<td>
										@if($comment->status ==0)
										<span class="label label-warning" style="color:#CB2027; font-weight:bold;">Deactive</span>
										@else($comment->status==1)
										<span class="label label-success" style="color:#0DB053; font-weight:bold;">Active</span>
										@endif
									</td>									
									<td>
										@if($comment->status == 0)
										<a class="status" href="{{ URL::to('/active_com/'.$comment->id) }}">
											<button class="btn btn-success btn-sm">Active</i></button>
										</a>
										@else($comment->status == 1)
										<a class="status" href="{{ URL::to('/deactive_com/'.$comment->id) }}">
											<button class="btn btn-warning btn-sm">Deactive</i></button>
										</a>
										@endif
										<a class="delete" href="{{'/delete_comment/'.$comment->id}}">
											<button class="btn btn-danger btn-sm">Delete</i></button>
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
		$('#comment_table').DataTable();
	} );
</script>

@endsection