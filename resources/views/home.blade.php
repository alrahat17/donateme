@extends('layouts.home_layout')
@section('home_content')



<section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(donate_front/img/hero_bg_bw_1.jpg); height:380px; width:1349px;"  data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
          <h1 class="probootstrap-heading probootstrap-animate">Account Settings</h1>
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
          <li class="{{ Request::is('home') ? 'active' : '' }}" ><a href="{{URL::to('/home')}}">My Profile</a></li>
          <li class="{{ Request::is('/my_comments') ? 'active' : '' }}"><a href="{{URL::to('/my_comments')}}">My Comments</a></li>
          <li class="{{ Request::is('/my_campaigns') ? 'active' : '' }}"><a href="{{URL::to('/my_campaigns')}}">My Campaigns</a></li>
          <li class="{{ Request::is('/my_donations') ? 'active' : '' }}"><a href="{{URL::to('/my_donations')}}">My Donations</a></li>
          <li class="{{ Request::is('/my_withdrawals') ? 'active' : '' }}"><a href="{{URL::to('/my_withdrawals')}}">My Withdrawals</a></li>
          <li><a href="{{URL::to('/logout')}}">Logout</a></li>
        </ul>
      </div> 

      <div class="col-md-9 well admin-content">
        <form action="{{url('/update_profile',$user->id)}}" class="form-horizontal" method="post" class="probootstrap-form" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Full Name</label>
            <div class="col-md-6">
              <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{$user->name}}">
              <span id="error_name"></span>
            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif                 
            </div>               
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="user_name">User Name</label>
            <div class="col-md-6">
              <input type="text" class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" id="user_name" name="user_name" value="{{$user->user_name}}">
              <span id="error_user_name"></span>
            @if ($errors->has('user_name'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('user_name') }}</strong>
            </span>
            @endif                 
            </div>               
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="email">Email</label>
            <div class="col-md-6">
              <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{$user->email}}"> 
              <span id="error_name"></span>
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif                
            </div>               
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="phone">Phone</label>
            <div class="col-md-6"><input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" name="phone" value="{{$user->phone}}">
              <span id="error_phone"></span>
            @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('phone') }}</strong>
            </span>
            @endif
            </div>             
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="photo">Photo</label>
            <div class="col-md-6">
              <input type="file" id="photo" name="photo" class="form-control-file{{ $errors->has('photo') ? ' is-invalid' : '' }}">
              <h6><small><i>(Photo size must be less than 1 MB)</i></small></h6>
              <span id="error_photo"></span>
              @if ($errors->has('photo'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('photo') }}</strong>
              </span>
              @endif
              <img style="height:90px;width: 120px;" src="{{URL::to($user->photo)}}">
            </div>               
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="password">Password</label>
            <div class="col-md-6">
              <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password">
              <span id="error_password"></span>
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif                 
            </div>               
          </div>

          <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary btn-sm" id="submit" name="submit">Update</button>
          </div>
        </form>
      </div>




    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery.js"></script>
      
      <script>

        $(document).ready(function(){
          
          $('#name').blur(function(){
          var error_name = '';
          var name = $('#name').val();
          if(name.length<5){
           $('#error_name').html('<label class="text-danger"><h6><small>Name must be atleast 5 characters long</small></h6></label>');
           $('#name').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_name').html('');
             $('#name').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

      
          $('#user_name').blur(function(){
          var error_user_name = '';
          var user_name = $('#user_name').val();
          if(user_name.length<3){
           $('#error_user_name').html('<label class="text-danger"><h6><small><i>User Name must be atleast 3 characters long</i></small></h6></label>');
           $('#user_name').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_user_name').html('');
             $('#user_name').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

          
         $('#email').blur(function(){
          var error_email = '';
          var email = $('#email').val();
          var _token = $('input[name="_token"]').val();
          var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          if(!filter.test(email))
          {    
           $('#error_email').html('<label class="text-danger"><h6><small><i>Invalid Email</i></small></h6></label>');
           $('#email').addClass('has-error');
           $('#register').attr('disabled', 'disabled');
         }
         else
         {
           $.ajax({
            url:"{{ route('email_available.check') }}",
            method:"POST",
            data:{email:email, _token:_token},
            success:function(result)
            {
             if(result == 'unique')
             {
              $('#error_email').html('<label class="text-success"><h6><small><i>Email Available</i></small></h6></label>');
              $('#email').removeClass('has-error');
              $('#register').attr('disabled', false);
            }
            else
            {
              $('#error_email').html('<label class="text-danger"><h6><small><i>Email already taken</i></small></label>');
              $('#email').addClass('has-error');
              $('#register').attr('disabled', 'disabled');
            }
          }
        })
         }
       });

      
          $('#phone').blur(function(){
          var error_phone = '';
          var phone = $('#phone').val();
          if(phone.length<7){
           $('#error_phone').html('<label class="text-danger"><h6><small>Phone no must be atleast 7 characters long</small></h6></label>');
           $('#phone').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_phone').html('');
             $('#phone').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

          $('#password').blur(function(){
          var error_password = '';
          var password = $('#password').val();
          if(password.length>0 && password.length<6){
           $('#error_password').html('<label class="text-danger"><h6><small><i>Password must be atleast 6 charcters long</i></small></h6></label>');
           $('#password').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_password').html('');
             $('#password').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })


         $('#photo').blur(function(){
          var error_photo = '';
          var error_photo_type = '';
          var file_size = $('#photo')[0].files[0].size;
          var file = this.files[0];
          var fileType = file["type"];
          //alert(fileType);
          var validImageTypes = ["image/jpg", "image/jpeg", "image/png"];
          if ($.inArray(fileType, validImageTypes) < 0) {
              // invalid file type code goes here.
              $('#error_photo_type').html('<label class="text-danger"><h6><small>Invalid Type Photo</small></h6></label>');
              $('#photo').addClass('has-error');
              $('#register').attr('disabled',false );
            }
          else{
            //alert('success');
             $('#error_photo_type').html('');
             $('#photo').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          if(file_size>1000000){
           $('#error_photo').html('<label class="text-danger">Photo Size Exceeds</label>');
           $('#photo').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_photo').html('');
             $('#photo').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

       });


        
    
        

     </script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.32.2/sweetalert2.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>




@endsection
