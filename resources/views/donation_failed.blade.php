@extends('layouts.home_layout')
@section('home_content')

<section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(/donate_front/img/hero_bg_bw_1.jpg); height:380px; width:1349px;"  data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
					<h1 class="probootstrap-heading probootstrap-animate">My Donations </h1>
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
				
				<h1>Donation Failed! Something Went Wrong!</h1>
				
		
     
			</div>




		</div>
	</div>
</section>





@endsection