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
							<a class="create_user" href="{{URL::to('/users/create')}}">
								<button class="btn btn-primary">Add User</i></button>
							</a>
						</div>			
						<strong class="card-title">Users Table</strong>

						<div class="card-body">
							<table id="users_table" class="table table-bordered data-table dataTable">

							</div>
							
							<thead>
								<tr>									
									<th>Name</th>
									<th>Photo</th>			
									<th>User Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>User Type</th>
									<th>Action</th>
								</tr>
							</thead>

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
  

	$(function() {
		$('#users_table').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{!! route('get.users') !!}',
			
			
 columns: 
 		[        
          
          { data: 'name', name: 'name' },
          {
            render: function (data, type, JsonResultRow, meta) {
                return '<img src="'+JsonResultRow.photo+'">';
            }
           },    
          { data: 'user_name', name: 'user_name' },
          { data: 'email', name: 'email' },
          { data: 'phone', name: 'phone' },
          { data: 'user_type', name: 'user_type' },
          { data: 'action', name: 'action' }, 
             
        ],

  
 
 
      });
	});


</script>

@endsection