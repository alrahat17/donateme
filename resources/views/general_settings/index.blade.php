@extends('layouts.admin_layout')
@section('admin_content')

<div class="content mt-3">
	<div class="animated fadeIn">
		<div class="row">

			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<strong class="card-title">General Settings Table</strong>
						
					</div>
					<div class="card-body">
						<table id="gen_st_table" class="table table-striped table-bordered">
							@foreach($general_setting as $gen)
							<div align="right">
							<a class="edit" href="{{'/general_settings/'.$gen->id.'/edit' }}">
							<button class="btn btn-primary">Edit General Settings</i></button>
							</a>
							</div>
							<tr>
								<th>Site Name:</th>
								<td>{{$gen->site_name}}</td>
							</tr>
							<tr>
								<th>Site Description:</th>
								<td>{{$gen->site_des}}</td>
							</tr>
							<tr>
								<th>Site Keyword:</th>
								<td>{{$gen->site_keyword}}</td>
							</tr>
							<tr>
								<th>Blog Advertisement:</th>
								<td>{{$gen->blog_adv}}</td>
							</tr>
							<tr>
								<th>Site Address:</th>
								<td>{{$gen->site_address}}</td>
							</tr>
							<tr>
								<th>Email:</th>
								<td>{{$gen->email}}</td>
							</tr>
							<tr>
								<th>Phone No:</th>
								<td>{{$gen->phone}}</td>
							</tr>
							<tr>
								<th>Facebook Link:</th>
								<td>{{$gen->fb_link}}</td>
							</tr>
							<tr>
								<th>Twitter Link:</th>
								<td>{{$gen->twitter_link}}</td>
							</tr>
							<tr>
								<th>Gplus Link:</th>
								<td>{{$gen->gplus_link}}</td>
							</tr>
							<tr>
								<th>Pinterest Link:</th>
								<td>{{$gen->pin_link}}</td>
							</tr>
							<tr>
								<th>Footer Copyright:</th>
								<td>{{$gen->footer_copyright}}</td>
							</tr>
							<tr>
								<th>Blog Post Per Page:</th>
								<td>{{$gen->bg_post_per_page}}</td>
							</tr>
							<tr>
								<th>Gallery Image Per Page:</th>
								<td>{{$gen->gal_img_per_page}}</td>
							</tr>
							<tr>
								<th>Category Per Page:</th>
								<td>{{$gen->cat_per_page}}</td>
							</tr>
							<tr>
								<th>Campaign Per Page:</th>
								<td>{{$gen->cam_per_page}}</td>
							</tr>
							<tr>
								<th>Currency:</th>
								<td>{{$gen->currency}}</td>
							</tr>
							<tr>
								<th>Logo:</th>
								<td><img src="{{URL::to($gen->logo)}}" class="thumb" width="100"></td>
							</tr>
							<tr>
								<th>Favicon:</th>
								<td><img src="{{URL::to($gen->favicon)}}" class="thumb" style="border:1px solid #CCCCCC;" width="24"></td>
							</tr>
							<tr>
								<th>Home Banner:</th>
								<td><img src="{{URL::to($gen->home_ban)}}" class="thumb" style="border:1px solid #CCCCCC;" width="100"></td>
							</tr>
							<tr>
								<th>Latest Donation Background Image:</th>
								<td><img src="{{URL::to($gen->lt_dn_bg_img)}}" class="thumb" style="border:1px solid #CCCCCC;" width="100"></td>
							</tr>
							<tr>
								<th>Home Banner Heading:</th>
								<td>{{$gen->home_ban_head}}</td>
							</tr>
							<tr>
								<th>Home Banner Sub Heading:</th>
								<td>{{$gen->home_ban_sub_head}}</td>
							</tr>
							<tr>
								<th>Home Banner Button Text:</th>
								<td>{{$gen->home_ban_btn_text}}</td>
							</tr>
							<tr>
								<th>Home Banner Button URL:</th>
								<td>{{$gen->home_ban_btn_url}}</td>
							</tr>
							<tr>
								<th>Page Loading Animation:</th>
								<td>{{ $gen->pg_load_ani == 0 ? 'No':'Yes' }}</td>
							</tr><tr>
								<th>Animated Gif Image:</th>
								<td><img src="{{URL::to($gen->ani_gif_img)}}" class="thumb" width="100"></td>
							</tr>
							<tr>
								<th>Google Map API Key:</th>
								<td>{{$gen->ggl_map_api_key}}</td>
							</tr>
							<tr>
								<th>Site URL :</th>
								<td>{{$gen->site_url}}</td>
							</tr>
							<tr>
								<th>Display Home Boxes:</th>
								<td>{{ $gen->dis_home_box == 0 ? 'No':'Yes' }}</td>
							</tr>
							<tr>
								<th>Site Primary Color:</th>
								<td>{{$gen->site_pri_col}}</td>
							</tr><tr>
								<th>Auto approve campaigns:</th>
								<td>{{ $gen->auto_app_cam == 0 ? 'No':'Yes' }}</td>
							</tr>
							<tr>
								<th>Minimum amount for campaign</th>
								<td>{{$gen->min_amount_cam}}</td>
							</tr>
							<tr>
								<th>Maximum amount for campaign:</th>
								<td>{{$gen->max_amount_cam}}</td>
							</tr>
							<tr>
								<th>Minimum Amount for donation:</th>
								<td>{{$gen->min_amount_dn}}</td>
							</tr><tr>
								<th>Maximum Amount for donation:</th>
								<td>{{$gen->max_amount_dn}}</td>
							</tr><tr>
								<th>Display Goal Amount:</th>
								<td>{{ $gen->dis_gl_amount == 0 ? 'No':'Yes' }}</td>
							</tr><tr>
								<th>Display Google Translate:</th>
								<td>{{ $gen->dis_ggl_trans == 0 ? 'No':'Yes' }}</td>
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