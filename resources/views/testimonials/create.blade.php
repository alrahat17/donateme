@extends('layouts.admin_layout')
@section('admin_content')

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Testimonial</strong> Form
    </div>
    <div class="card-test_des card-block">
      <form action="/testimonials" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="row form-group">
          {{ csrf_field() }}
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="name" class=" form-control-label"> Name</label></div>
          <div class="col-12 col-md-9"><input type="text" id="name" name="name"  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required autofocus="">
            <span id="error_name"></span>
            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="test_des" class=" form-control-label">Description</label></div>
          <div class="col-12 col-md-9"><textarea name="test_des" id="test_des" rows="3" class="form-control{{ $errors->has('test_des') ? ' is-invalid' : '' }}">{{old('test_des')}}</textarea>
            <span id="error_test_des"></span>
            @if ($errors->has('test_des'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('test_des') }}</strong>
            </span>
            @endif
          </div>
        </div>



        <div class="row form-group">
          <div class="col col-md-3"><label for="test_img" class=" form-control-label"> Image</label></div>
          <div class="col-12 col-md-9"><input type="file" id="test_img" name="test_img" class="form-control-file{{ $errors->has('test_img') ? ' is-invalid' : '' }}">
            <span id="error_test_img"></span>
            <span id="error_test_img_type"></span>
            @if ($errors->has('test_img'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('test_img') }}</strong>
            </span>
            @endif
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
          

          $('#name').blur(function(){
          var error_name = '';
          var name = $('#name').val();
          if(name.length<3){
           $('#error_name').html('<label class="text-danger"><h6><small>Name must be atleast 3 characters long</small></h6></label>');
           $('#name').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_name').html('');
             $('#name').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

          $('#test_des').blur(function(){
          var error_test_des = '';
          var test_des = $('#test_des').val();
          if(test_des.length<10){
           $('#error_test_des').html('<label class="text-danger"><h6><small>Description must be atleast 10 characters long</small></h6></label>');
           $('#test_des').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_test_des').html('');
             $('#test_des').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

          $('#test_img').blur(function(){
          var error_test_img = '';
          var error_test_img_type = '';
          var file_size = $('#test_img')[0].files[0].size;
          var file = this.files[0];
          var fileType = file["type"];
          //alert(fileType);
          var validImageTypes = ["image/jpg", "image/jpeg", "image/png"];
          if ($.inArray(fileType, validImageTypes) < 0) {
              // invalid file type code goes here.
              $('#error_test_img_type').html('<label class="text-danger"><h6><small>Invalid Type file</small></h6></label>');
              $('#test_img').addClass('has-error');
              $('#register').attr('disabled',false );
            }
          else{
            //alert('success');
             $('#error_test_img_type').html('');
             $('#test_img').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          if(file_size>1000000){
           $('#error_test_img').html('<label class="text-danger">Image Size Exceeds</label>');
           $('#test_img').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_test_img').html('');
             $('#test_img').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

        })
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

      @include('sweet::alert')





        @endsection