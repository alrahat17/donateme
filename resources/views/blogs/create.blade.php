@extends('layouts.admin_layout')
@section('admin_content')

<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script>
       tinymce.init({
      selector: '#mytextarea',
      menubar: false,
      
  });
      
      
</script>

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Blog</strong>
    </div>
    <div class="card-body card-block">
      <form action="/blogs" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="row form-group">
          {{ csrf_field() }}
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="title" class=" form-control-label"> Title</label></div>
          <div class="col-12 col-md-9"><input type="text" id="title" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" required autofocus>
            <span id="error_title"></span>
            @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('title') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="body" class=" form-control-label">Body</label></div>
          <div class="col-12 col-md-9"><textarea name="body" id="mytextarea" rows="9" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" value="{{ old('body') }}" required autofocus></textarea>
            <span id="error_body"></span>
            @if ($errors->has('body'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('body') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="media" class=" form-control-label"> Add Media</label></div>
          <div class="col-12 col-md-9"><input type="file" id="media" name="media" class="form-control-file{{ $errors->has('media') ? ' is-invalid' : '' }}">
            <span id="error_media"></span><span id="error_media_type"></span>
            @if ($errors->has('media'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('media') }}</strong>
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
          

          $('#title').blur(function(){
          var error_title = '';
          var title = $('#title').val();
          if(title.length<10){
           $('#error_title').html('<label class="text-danger"><h6><small>Title must be atleast 10 characters long</small></h6></label>');
           $('#title').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_title').html('');
             $('#title').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

          $('#body').blur(function(){
          var error_body = '';
          var body = $('#body').val();
          if(body.length<100){
           $('#error_body').html('<label class="text-danger"><h6><small>Body must be atleast 100 characters long</small></h6></label>');
           $('#body').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_body').html('');
             $('#body').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

          $('#media').blur(function(){
          var error_media = '';
          var error_media_type = '';
          var file_size = $('#media')[0].files[0].size;
          var file = this.files[0];
          var fileType = file["type"];
          //alert(fileType);
          var validImageTypes = ["image/jpg", "image/jpeg", "image/png"];
          if ($.inArray(fileType, validImageTypes) < 0) {
              // invalid file type code goes here.
              $('#error_media_type').html('<label class="text-danger"><h6><small>Invalid Type media</small></h6></label>');
              $('#media').addClass('has-error');
              $('#register').attr('disabled',false );
            }
          else{
            //alert('success');
             $('#error_media_type').html('');
             $('#media').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          if(file_size>1000000){
           $('#error_media').html('<label class="text-danger">Media Size Exceeds</label>');
           $('#media').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_media').html('');
             $('#media').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

        })
      </script>



      @endsection