@extends('layouts.home_layout')
@section('home_content')

<section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(donate_front/img/hero_bg_bw_1.jpg); height:380px; width:1349px;"  data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
					<h1 class="probootstrap-heading probootstrap-animate">My Campaigns </h1>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="probootstrap-section">
	<div class="container">
		<div class="row">
			<div class="col-md-3 probootstrap-animate">     
				<ul class="nav nav-pills nav-stacked">
					<li class="{{ Request::is('home') ? 'active' : '' }}" style=" .nav-pills > li.active > a {background: #F45302 !important;}"><a href="{{URL::to('/home')}}">My Profile</a></li>
					<li class="{{ Request::is('my_comments') ? 'active' : '' }}"><a href="{{URL::to('/my_comments')}}">My Comments</a></li>
					<li class="{{ Request::is('my_campaigns') ? 'active' : '' }}"><a href="{{URL::to('/my_campaigns')}}">My Campaigns</a></li>
					<li class="{{ Request::is('my_donations') ? 'active' : '' }}"><a href="{{URL::to('/my_donations')}}">My Donations</a></li>
					<li class="{{ Request::is('my_withdrawals') ? 'active' : '' }}"><a href="{{URL::to('/my_withdrawals')}}">My Withdrawals</a></li>
					<li><a href="{{URL::to('/logout')}}">Logout</a></li>
				</ul>
			</div>
			<div class="col-md-9 well admin-content">
				<table id="dataTables-example" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>SNo</th>
							<th>Image</th>
							<th>Title</th>
							<th>Category</th>
							<th>Funds Raised</th>
							<th>Goal</th>
							<th>Status</th>
							<th>Actions</th>
							
						</tr>
					</thead>
						<tbody>
						@foreach ($campaigns as $key => $campaign)
							{{-- expr --}}
					
							<tr>
								<td>{{$key + 1 }}</td>								
								<td><img style="height:45px;width: 60px;" src="{{$campaign->cam_img}}" /></td>
								<td><a href="/campaign_details/{{$campaign->id}}">{{$campaign->cam_name}}</a></td>
								<td>{{$campaign->category->cat_name}}</td>
								<td>{{$campaign->funds_raised}}</td>
								<td>{{$campaign->goal}}</td>
								<td>
								@if($campaign->cam_status==0)
										<span style="color:#CB2027; font-weight:bold;">Inactive</span>
								@endif
								@if($campaign->cam_status==1)
									@if(($campaign->cam_date)>($current_date))
										<span  style="color:#0DB053; font-weight:bold;">Active</span>
									@else
										<span  style="color:#CB2027; font-weight:bold;">Finalized</span>
									@endif
								@endif
									
								</td>
								<td>
								<a class="edit" href="{{'/edit_campaign/'.$campaign->id}}">
								<i class="btn btn-info">Edit</i>
								</a>
								</td>

							</tr>
						@endforeach
								
						</tbody>	

				</table>

			</div>




		</div>
	</div>
</section>





@endsection