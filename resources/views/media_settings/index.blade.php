@extends('layouts.admin_layout')
@section('admin_content')

<div class="content mt-3">
	<div class="animated fadeIn">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">Media Settings </strong>
						
					</div>
					<div class="card-body">
						<table id="gen_st_table" class="table table-striped table-bordered">
							@foreach($media_setting as $media)
							<div align="right">
							<a class="edit" href="{{'/media_settings/'.$media->id.'/edit' }}">
							<button class="btn btn-primary">Edit Media Settings</i></button>
							</a>
							</div>
							<tr>
								<th>Image Upload Size:</th>
								<td>{{$media->img_upload_size}}</td>
							</tr>
							<tr>
								<th>Image Upload Type:</th>
								<td>{{$media->img_upload_type}}</td>
							</tr>
							<tr>
								<th>Mp3 Upload Size:</th>
								<td>{{$media->mp3_upload_size}}</td>
							</tr>
							@endforeach
    
							</table>
						</div>
					</div>
				</div>


			</div>
		</div><!-- .animated -->
	</div><!-- .content -->


  




@endsection