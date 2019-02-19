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
							<a class="create_user" href="{{URL::to('/blogs/create')}}">
								<button class="btn btn-primary">Add Post</i></button>
							</a>
						</div>	
						<strong class="card-title">Blog Table</strong>
					</div>
					<div class="card-body">
						<table id="blog_table" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Sno</th>
									<th>Title</th>
									<th>Comment</th>
									<th>Media</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($blogs as $key => $blog)
								<tr>
									<td>{{$key +1}}</td>
									<td>{{$blog->title}}</td>
									<td><a href="/blog_comments/{{$blog->id}}">{{$blog->comment->count()}} Comment/s</a></td>
									<td><img style="height:45px;width: 60px;" src="{{$blog->media}}" /></td>
									
									
									
									<td>
										<a class="edit" href="{{'/blogs/'.$blog->id.'/edit' }}">
											<button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
										</a>

										<form method="post" action="{{ route('blogs.destroy', $blog->id)}}">
											@csrf
											@method('delete')

											<a class="delete" href="{{'/blogs/'.$blog->id}}">
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
		$('#blog_table').DataTable();
	} );
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

@include('sweet::alert')


@endsection