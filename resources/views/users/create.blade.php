@extends('layouts.admin_layout')
@section('admin_content')

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Add User</strong> Form
    </div>
    <div class="card-body card-block">
      <form action="{{url('/users')}}" method="post" enctype="multipart/form-data" class="form-horizontal" id="userForm">
        <div class="row form-group">
          {{ csrf_field() }}
          
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="name" class=" form-control-label"> Name</label><span class="asterik" style="color: red;"> * </span></div>
          <div class="col-12 col-md-9"><input type="text" id="name" name="name"  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required autofocus>
          <span id="error_name"></span> 
            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="user_name" class=" form-control-label"> User Name</label><span class="asterik" style="color: red;"> * </span></div>
          <div class="col-12 col-md-9"><input type="text" id="user_name" name="user_name"  class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" value="{{ old('user_name') }}" required autofocus>
            <span id="error_user_name"></span>
            @if ($errors->has('user_name'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('user_name') }}</strong>
            </span>
            @endif 

          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="email" class=" form-control-label"> Email</label><span class="asterik" style="color: red;"> * </span></div>
          <div class="col-12 col-md-9"><input type="email" id="email" name="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
            <span id="error_email"></span>
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="phone" class=" form-control-label"> Phone</label><span class="asterik" style="color: red;"> * </span></div>
          <div class="col-12 col-md-9"><input type="number" id="phone" name="phone"  class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" required autofocus>
            <span id="error_phone"></span>
            @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('phone') }}</strong>
            </span>
            @endif
          </div>
        </div>


        <div class="row form-group">
          <div class="col col-md-3"><label for="select" class=" form-control-label"> User Type</label><span class="asterik" style="color: red;"> * </span></div>

          <div class="col-12 col-md-9">
            <select name="user_type" id="user_type" class="form-control{{ $errors->has('user_type') ? ' is-invalid' : '' }}" required="">
              <option value="customer"@if(old('user_type') == 'customer') {{ 'selected' }} @endif>Customer</option> 
              <option value="admin"@if(old('user_type') == 'admin') {{ 'selected' }} @endif>Admin</option>  
            </select>
            @if ($errors->has('user_type'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('user_type') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="photo" class=" form-control-label"> Photo</label></div>
          <div class="col-12 col-md-9"><input type="file" id="photo" name="photo" class="form-control-file{{ $errors->has('photo') ? ' is-invalid' : '' }}" >
            <h6><small>(Photo size must be less than 1 MB)</small></h6>
            <span id="error_photo"></span>
            <span id="error_photo_type"></span>
            @if ($errors->has('photo'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('photo') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="password" class=" form-control-label"> Password</label><span class="asterik" style="color: red;"> * </span></div>
          <div class="col-12 col-md-9"><input type="password" id="password" name="password"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required autofocus>
            <h6><small>(Password must be atleast 6 characters)</small></h6>
            <span id="error_password"></span>
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>
        </div>



        <div class="row form-group">
          <div class="col col-md-3"><label for="password-confirm" class=" form-control-label"> Confirm Password</label><span class="asterik" style="color: red;"> * </span></div>
          <div class="col-12 col-md-9"><input type="password" id="password-confirm" name="password_confirmation"  class="form-control" required>
          </div>
        </div>



        <div class="card-footer">
          <button type="submit" name="register" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Submit
          </button>
        </div>
      </div>
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
          if(password.length<6){
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
          if(file_size>2097152){
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



     @endsection