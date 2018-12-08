@extends('layouts.admin_layout')
@section('admin_content')

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Media Settings</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{url('/media_settings/'.$media_setting->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="row form-group">
          {{ csrf_field() }}
          {{method_field('PUT')}}
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="img_upload_size" class=" form-control-label"> Image Upload Size</label></div>
          <div class="col-12 col-md-9"><input type="number" id="img_upload_size" name="img_upload_size"  class="form-control{{ $errors->has('img_upload_size') ? ' is-invalid' : '' }}" value="{{$media_setting->img_upload_size}}">
            <span id="error_img_upload_size"></span>
             @if ($errors->has('img_upload_size'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('img_upload_size') }}</strong>
              </span>
            @endif
          </div>
        </div>
        
        <div class="row form-group ">
          <div class="col col-md-3"><label for="img_upload_type" class=" form-control-label"> Image Upload Type</label></div>
          <div class="col-12 col-md-9">

            @php
            $i = $media_setting->img_upload_type;
            $img_upload_type_edit = explode(",",$i );
            @endphp

            <input type="checkbox" id="img_upload_type" name="img_upload_type[]" <?php if (in_array("jpg", $img_upload_type_edit)) { echo "checked";} ?> value="jpg"> JPG <br>
            <input type="checkbox" id="img_upload_type" name="img_upload_type[]" <?php if (in_array("jpeg", $img_upload_type_edit)) { echo "checked";} ?> value="jpeg"> JPEG <br>
            <input type="checkbox" id="img_upload_type" name="img_upload_type[]" <?php if (in_array("png", $img_upload_type_edit)) { echo "checked";} ?> value="png"> PNG <br>
            <input type="checkbox" id="img_upload_type" name="img_upload_type[]" <?php if (in_array("gif", $img_upload_type_edit)) { echo "checked";} ?> value="gif"> GIF <br>
          <span id="error_img_upload_type"></span>
          @if ($errors->has('img_upload_type'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('img_upload_type') }}</strong>
              </span>
          @endif
          </div>
          

        </div>


        <div class="row form-group">
          <div class="col col-md-3"><label for="mp3_upload_size" class=" form-control-label"> Mp3 Upload Size</label></div>
          <div class="col-12 col-md-9"><input type="number" id="mp3_upload_size" name="mp3_upload_size"  class="form-control{{ $errors->has('mp3_upload_size') ? ' is-invalid' : '' }}" value="{{$media_setting->mp3_upload_size}}">
            <span id="error_mp3_upload_size"></span>
             @if ($errors->has('mp3_upload_size'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('mp3_upload_size') }}</strong>
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
          
          $('#img_upload_size').blur(function(){
          var error_img_upload_size = '';
          var img_upload_size = $('#img_upload_size').val();
          if(img_upload_size.length<1){
           $('#error_img_upload_size').html('<label class="text-danger"><h6><small><i>Image upload size cannot be empty</i></small></h6></label>');
           $('#img_upload_size').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_img_upload_size').html('');
             $('#img_upload_size').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

           $('#mp3_upload_size').blur(function(){
          var error_mp3_upload_size = '';
          var mp3_upload_size = $('#mp3_upload_size').val();
          if(mp3_upload_size.length<1){
           $('#error_mp3_upload_size').html('<label class="text-danger"><h6><small><i>Mp3 upload size cannot be empty</i></small></h6></label>');
           $('#mp3_upload_size').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_mp3_upload_size').html('');
             $('#mp3_upload_size').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

          
        })
      </script>







      @endsection