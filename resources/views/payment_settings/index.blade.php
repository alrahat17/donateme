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
							@foreach($payment_setting as $payment)
							<div align="right">
							<a class="edit" href="{{'/payment_settings/'.$payment->id.'/edit' }}">
							<button class="btn btn-primary">Edit Payment Settings</i></button>
							</a>
							</div>
							<tr>
								<th>Payment Options:</th>
								<td>{{strtoupper($payment->payment_option)}}</td>
							</tr>
							<tr>
								<th>Withdraw Options:</th>
								<td>{{strtoupper($payment->withdraw_option)}}</td>
							</tr>
							<tr>
								<th>Bank Payment Info:</th>
								<td>{{$payment->bank_payment_info}}</td>
							</tr>
							<tr>
								<th>Paypal Id:</th>
								<td>{{$payment->paypal_id}}</td>
							</tr>
							<tr>
								<th>Paypal site mode:</th>
								<td>{{$payment->paypal_site_mode}}</td>
							</tr>
							<tr>
								<th>Stripe site mode:</th>
								<td>{{$payment->stripe_site_mode}}</td>
							</tr>
							<tr>
								<th>Test Publishable key:</th>
								<td>{{$payment->test_pub_key}}</td>
							</tr>
							<tr>
								<th>Test Secret Key:</th>
								<td>{{$payment->test_sec_key}}</td>
							</tr>
							<tr>
								<th>Comission Mode:</th>
								<td>{{$payment->com_mode}}</td>
							</tr>
							<tr>
								<th>Amount:</th>
								<td>{{$payment->amount}}</td>
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