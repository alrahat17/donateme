@extends('layouts.home_layout')
@section('home_content')

<style type="text/css">
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  background-color: white;
  height: 40px;
  padding: 10px 12px;
  border-radius: 4px;
  border: 1px solid transparent;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

</style>

<section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(donate_front/img/hero_bg_bw_1.jpg); height:380px; width:1349px;"  data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
          <h1 class="probootstrap-heading probootstrap-animate">Donate form</h1>
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
          <li class="{{ Request::is('home') ? 'active' : '' }}" style="color: red;"><a href="{{URL::to('/home')}}">My Profile</a></li>
          <li class="{{ Request::is('/my_comments') ? 'active' : '' }}"><a href="{{URL::to('/my_comments')}}">My Comments</a></li>
          <li class="{{ Request::is('/my_campaigns') ? 'active' : '' }}"><a href="{{URL::to('/my_campaigns')}}">My Campaigns</a></li>
          <li class="{{ Request::is('/my_donations') ? 'active' : '' }}"><a href="{{URL::to('/my_donations')}}">My Donations</a></li>
          <li class="{{ Request::is('/my_withdrawals') ? 'active' : '' }}"><a href="{{URL::to('/my_withdrawals')}}">My Withdrawals</a></li>
          <li><a href="{{URL::to('/logout')}}">Logout</a></li>
        </ul>
      </div> 

     <script src="https://js.stripe.com/v3/"></script>

      <div class="col-md-9 well admin-content">
        <form action="{{URL::to('/charge')}}" class="form-horizontal" method="post" class="probootstrap-form" enctype="multipart/form-data" id="payment-form">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-md-4 control-label" for="card-element">Credit or debit card</label>
            <div class="col-md-6" id="card-element">
              <!-- A Stripe Element will be inserted here. -->
            </div>
            <!-- Used to display form errors. -->
    		<div class="col-md-6" id="card-errors" role="alert"></div>     
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="don_amount">Amount</label>
            <div class="col-md-2">
              <input type="number" class="form-control" id="don_amount" name="don_amount" >
            </div>
            <!-- Used to display form errors. -->
    		   
          </div>

         
          <div class="col-md-6 col-md-offset-4">
            <button>Submit</button>
          </div>
        </form>
      </div>



    </div>
  </div>
</section>

<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">

// Create a Stripe client.
var stripe = Stripe('pk_test_JumhSmjYaduTHzhC8mC8jroh');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  //changed for test purpose
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server

  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);


  // Submit the form
  form.submit();

}
</script>


@endsection