@extends('layouts.admin_layout')
@section('admin_content')

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Payment Settings</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{url('/payment_settings/'.$payment_setting->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal" id="form">
        <div class="row form-group">
          {{ csrf_field() }}
          {{method_field('PUT')}}
        </div>
        
        <div class="row form-group ">
          <div class="col col-md-3"><label for="payment_option" class="form-control-label"> Payment Options</label></div>
          <div class="col-12 col-md-9{{ $errors->has('payment_option') ? ' is-invalid' : '' }}">

            @php
              $pay=$payment_setting->payment_option;
              $payment_edit_values=explode(",",$pay );

            @endphp

            <input type="checkbox" id="payment_option" name="payment_option[]" <?php if (in_array("paypal", $payment_edit_values)) { echo "checked";} ?> value="paypal"> Paypal <br>
            <input type="checkbox" id="payment_option" name="payment_option[]" <?php if (in_array("stripe", $payment_edit_values)) { echo "checked";} ?> value="stripe"> Stripe <br>
            <input type="checkbox" id="payment_option" name="payment_option[]" <?php if (in_array("localbank", $payment_edit_values)) { echo "checked";} ?> value="localbank"> Local Bank <br>

          @if ($errors->has('payment_option'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('payment_option') }}</strong>
              </span>
          @endif     
           
          </div> 
             
        </div>
       

         <div class="row form-group ">
          <div class="col col-md-3"><label for="withdraw_option" class=" form-control-label"> Withdrawal Options</label></div>
          <div class="col-12 col-md-9{{ $errors->has('withdraw_option') ? ' is-invalid' : '' }}">
            @php
              $withdraw=$payment_setting->withdraw_option;
              $withdraw_edit_values=explode(",",$withdraw );
            @endphp
            
            <input type="checkbox" id="withdraw_option" name="withdraw_option[]" <?php if (in_array("paypal", $withdraw_edit_values)) { echo "checked";} ?> value="paypal" > Paypal <br>
            <input type="checkbox" id="withdraw_option" name="withdraw_option[]" <?php if (in_array("stripe", $withdraw_edit_values)) { echo "checked";} ?> value="stripe" > Stripe <br>
            <input type="checkbox" id="withdraw_option" name="withdraw_option[]" <?php if (in_array("localbank", $withdraw_edit_values)) { echo "checked";} ?> value="localbank"> Local Bank <br>            
          </div>
          @if ($errors->has('withdraw_option'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('withdraw_option') }}</strong>
              </span>
          @endif
          

        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="bank_payment_info" class=" form-control-label"> Bank Payment Info</label></div>
          <div class="col-12 col-md-9"><textarea name="bank_payment_info" id="bank_payment_info" rows="3" class="form-control{{ $errors->has('bank_payment_info') ? ' is-invalid' : '' }}">{{$payment_setting->bank_payment_info}}</textarea>
            <span id="error_bank_payment_info"></span>
            @if ($errors->has('bank_payment_info'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('bank_payment_info') }}</strong>
              </span>
          @endif
          </div>
          
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="paypal_id" class=" form-control-label"> Paypal Id</label></div>
          <div class="col-12 col-md-9"><input type="text" id="paypal_id" name="paypal_id"  class="form-control{{ $errors->has('paypal_id') ? ' is-invalid' : '' }}" value="{{$payment_setting->paypal_id}}">
            <span id="error_paypal_id"></span>
            @if ($errors->has('paypal_id'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('paypal_id') }}</strong>
              </span>
          @endif
          </div>
        </div>

        

        <div class="row form-group">
          <div class="col col-md-3"><label for="select" class=" form-control-label"> Paypal Site Mode</label></div>
          <div class="col-12 col-md-9">
           <select name="paypal_site_mode" id="paypal_site_mode" class="form-control{{ $errors->has('paypal_site_mode') ? ' is-invalid' : '' }}">
            <option {{ $payment_setting->paypal_site_mode == 'test' ? 'selected':'' }}  value="test">Test</option>
            <option {{ $payment_setting->paypal_site_mode == 'live' ? 'selected':'' }} value="live">Live</option>
          </select>
          <span id="error_paypal_site_mode"></span>
          @if ($errors->has('paypal_site_mode'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('paypal_site_mode') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="row form-group">
          <div class="col col-md-3"><label for="select" class=" form-control-label"> Stripe Site Mode</label></div>
          <div class="col-12 col-md-9">
           <select name="stripe_site_mode" id="stripe_site_mode" class="form-control{{ $errors->has('stripe_site_mode') ? ' is-invalid' : '' }}">
            <option {{ $payment_setting->stripe_site_mode == 'test' ? 'selected':'' }} value="test">Test</option>
            <option {{ $payment_setting->stripe_site_mode == 'live' ? 'selected':'' }} value="live">Live</option>
          </select>
          <span id="stripe_site_mode"></span>
          @if ($errors->has('stripe_site_mode'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('stripe_site_mode') }}</strong>
              </span>
          @endif
        </div>
      </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="test_pub_key" class=" form-control-label"> Test Publishable Key</label></div>
          <div class="col-12 col-md-9"><input type="text" id="test_pub_key" name="test_pub_key"  class="form-control{{ $errors->has('test_pub_key') ? ' is-invalid' : '' }}" value="{{$payment_setting->test_pub_key}}">
            <span id="error_test_pub_key"></span>
            @if ($errors->has('test_pub_key'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('test_pub_key') }}</strong>
              </span>
          @endif
          </div>
        </div>
         <div class="row form-group">
          <div class="col col-md-3"><label for="test_sec_key" class=" form-control-label"> Test Secret Key</label></div>
          <div class="col-12 col-md-9"><input type="text" id="test_sec_key" name="test_sec_key"  class="form-control{{ $errors->has('test_sec_key') ? ' is-invalid' : '' }}" value="{{$payment_setting->test_sec_key}}">
            <span id="error_test_sec_key"></span>
            @if ($errors->has('test_sec_key'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('test_sec_key') }}</strong>
              </span>
          @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="select" class=" form-control-label"> Comission Mode</label></div>
          <div class="col-12 col-md-9">
           <select name="com_mode" id="stripe_site_mode" class="form-control{{ $errors->has('com_mode') ? ' is-invalid' : '' }}">
            <option {{ $payment_setting->com_mode== 'fixed' ? 'selected':'' }} value="fixed">Fixed</option>
            <option {{ $payment_setting->com_mode == 'amount' ? 'selected':'' }} value="amount">Amount</option>
          </select>
          <span id="error_com_mode"></span>
          @if ($errors->has('com_mode'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('com_mode') }}</strong>
              </span>
          @endif
        </div>
      </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="amount" class=" form-control-label"> Amount</label></div>
          <div class="col-12 col-md-9"><input type="text" id="amount" name="amount"  class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" value="{{$payment_setting->amount}}">
            <span id="error_amount"></span>
            @if ($errors->has('amount'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('amount') }}</strong>
              </span>
          @endif
          </div>
        </div>

        
  <div class="card-footer">
    <button type="submit" class="btn btn-primary btn-sm" name="register">
      <i class="fa fa-dot-circle-o"></i> Submit
    </button>
  </div>
</div>

<script src="https://code.jquery.com/jquery.js"></script>
<script type="text/javascript">

   $(document).ready(function(){
          
          $('#bank_payment_info').blur(function(){
          var error_bank_payment_info = '';
          var bank_payment_info = $('#bank_payment_info').val();
          if(bank_payment_info.length==''){
           $('#error_bank_payment_info').html('<label class="text-danger"><h6><small><i>Bank Payment info cannot be empty</i></small></h6></label>');
           $('#bank_payment_info').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_bank_payment_info').html('');
             $('#bank_payment_info').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

           $('#paypal_id').blur(function(){
          var error_paypal_id = '';
          var paypal_id = $('#paypal_id').val();
          if(paypal_id.length==''){
           $('#error_paypal_id').html('<label class="text-danger"><h6><small><i>Paypal Id cannot be empty</i></small></h6></label>');
           $('#paypal_id').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_paypal_id').html('');
             $('#paypal_id').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })


          $('#test_pub_key').blur(function(){
          var error_test_pub_key = '';
          var test_pub_key = $('#test_pub_key').val();
          if(test_pub_key.length==''){
           $('#error_test_pub_key').html('<label class="text-danger"><h6><small><i>Test publishable key cannot be empty</i></small></h6></label>');
           $('#test_pub_key').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_test_pub_key').html('');
             $('#test_pub_key').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

          $('#test_sec_key').blur(function(){
          var error_test_sec_key = '';
          var test_sec_key = $('#test_sec_key').val();
          if(test_sec_key.length==''){
           $('#error_test_sec_key').html('<label class="text-danger"><h6><small><i>test secret key cannot be empty</i></small></h6></label>');
           $('#test_sec_key').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_test_sec_key').html('');
             $('#test_sec_key').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

          $('#amount').blur(function(){
          var error_amount = '';
          var amount = $('#amount').val();
          if(amount.length==''){
           $('#error_amount').html('<label class="text-danger"><h6><small><i>Amount cannot be empty</i></small></h6></label>');
           $('#amount').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_amount').html('');
             $('#amount').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })


          
        })
  





</script>



@endsection