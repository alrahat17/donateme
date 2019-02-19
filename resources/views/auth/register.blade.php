@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                <span id="error_name"></span> 

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" name="user_name" value="{{ old('user_name') }}" required autofocus>
                                <span id="error_user_name"></span>
                                @if ($errors->has('user_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('user_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                <span id="error_email"></span>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>
                                <span id="error_phone"></span>
                                @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="user_type" type="hidden" class="form-control{{ $errors->has('user_type') ? ' is-invalid' : '' }}" name="user_type" value="customer" required autofocus>

                                @if ($errors->has('user_type'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('user_type') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo">
                                <span id="error_photo"></span>
                                <span id="error_photo_type"></span>

                                @if ($errors->has('photo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <span id="error_password"></span>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="register" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

@endsection
