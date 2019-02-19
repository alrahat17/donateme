@extends('layouts.home_layout')
@section('home_content')

<section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(donate_front/img/hero_bg_bw_1.jpg); height:380px; width:1349px;"  data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
					<h1 class="probootstrap-heading probootstrap-animate">My Withdrawals </h1>
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
			<form action="" class="form-horizontal" method="post" class="probootstrap-form" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-md-4 control-label" for="withdraw_payment_type">Select Payment Method</label>
            <div class="col-md-6">
            <select name="payment_type" id="withdraw_payment_type" class="form-control">
            <option value="">Select</option>
            <option value="paypal">Paypal</option>
            <option value="stripe">Stripe</option>
            <option value="localbank" selected>Local Bank</option>
              </select>                 
            </div>               
          </div>
          <div class="form-group" id="withdraw_localbank">
            <label class="col-md-4 control-label" for="bank_details">Your Bank Details</label>
            <div class="col-md-6">              
             <textarea class="form-control" id="bank_details" name="bank_details" rows="3"></textarea>                
            </div>               
          </div>

          <div class="form-group" id="withdraw_paypal_id" style="display:none;" >
            <label class="col-md-4 control-label" for="paypal_id">Your Paypal Id</label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="paypal_id" name="paypal_id">                 
            </div>
            </div> 

            <div class="form-group" id="withdraw_stripe_id" style="display:none;" >
            <label class="col-md-4 control-label" for="stripe_id">Your Stripe Id</label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="stripe_id" name="stripe_id">
             </div>                 
            </div>          
        
          
          

          <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary" id="submit" name="submit">Update</button>
          </div>
        </form>
				

			</div>




		</div>
	</div>
</section>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery.js"></script>
<script type="text/javascript">

$(function() {
    
    $('#withdraw_payment_type').change(function(){
        if($('#withdraw_payment_type').val() == 'paypal') 
		{
            $('#withdraw_paypal_id').show(); 
			$('#withdraw_stripe_id').hide();
			$('#withdraw_localbank').hide(); 
        }
		else if($('#withdraw_payment_type').val() == 'stripe') 
		{
            $('#withdraw_stripe_id').show(); 
			$('#withdraw_paypal_id').hide();
			$('#withdraw_localbank').hide(); 
        } 
		else if($('#withdraw_payment_type').val() == 'localbank') 
		{
            $('#withdraw_stripe_id').hide(); 
			$('#withdraw_paypal_id').hide();
			$('#withdraw_localbank').show(); 
        } 
		 
		else 
		{
            $('#withdraw_paypal_id').hide();
			$('#withdraw_stripe_id').hide();
			$('#withdraw_localbank').hide(); 
        } 
    });
});		
	
</script>





@endsection