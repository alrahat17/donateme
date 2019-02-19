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
      <strong> Create Campaign</strong> 
    </div>
    <div class="card-funds_raised card-block">
      <form action="/campaigns" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="row form-group">
          {{ csrf_field() }}
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="cam_name" class=" form-control-label"> Campaign Name</label></div>
          <div class="col-12 col-md-9"><input type="text" id="cam_name" name="cam_name"  class="form-control{{ $errors->has('cam_name') ? ' is-invalid' : '' }}" value="{{ old('cam_name') }}" required autofocus>
            <span id="error_cam_name"></span>
            @if ($errors->has('cam_name'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('cam_name') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="cam_loc" class=" form-control-label"> Location</label></div>
          <div class="col-12 col-md-9"><input type="text" id="cam_loc" name="cam_loc" class="form-control{{ $errors->has('cam_loc') ? ' is-invalid' : '' }}" value="{{ old('cam_loc') }}" required autofocus>
            <span id="error_cam_loc"></span>
            @if ($errors->has('cam_loc'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('cam_loc') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="cam_img" class=" form-control-label"> Campaign Image</label></div>
          <div class="col-12 col-md-9"><input type="file" id="cam_img" name="cam_img" class="form-control-file{{ $errors->has('cam_img') ? ' is-invalid' : '' }}">
            <span id="error_cam_img"></span>
            <span id="error_cam_img_type"></span>
            @if ($errors->has('cam_img'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('cam_img') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="cam_img_2" class=" form-control-label"> Other Image (Optional)</label></div>
          <div class="col-12 col-md-9"><input type="file" id="cam_img_2" name="cam_img" class="form-control-file{{ $errors->has('cam_img_2') ? ' is-invalid' : '' }}">
            <span id="error_cam_img_2"></span>
            <span id="error_cam_img_type_2"></span>
            @if ($errors->has('cam_img_2'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('cam_img_2') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="video" class=" form-control-label"> Video</label></div>
          <div class="col-12 col-md-9"><input type="url" id="video" name="video" class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}">
            <span id="error_video"></span>
            @if ($errors->has('video'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('video') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="cam_des" class=" form-control-label">About The Campaign</label></div>
          <div class="col-12 col-md-9"><textarea class="form-control{{ $errors->has('cam_des') ? ' is-invalid' : '' }}" id="mytextarea" name="cam_des" rows="12" value="{{ old('cam_des') }}">{{old('cam_des')}}</textarea>
            <span id="error_cam_des"></span>
            </div>
            @if ($errors->has('cam_des'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('cam_des') }}</strong>
            </span>
            @endif
          </div>
        </div>

       <div class="row form-group">
          <div class="col col-md-3"><label for="category_id" class=" form-control-label"> Category</label></div>
          <div class="col-12 col-md-9">
            <select name="category_id" id="category_id" class="form-control">
            
            
            @foreach ($categories as $category) 
          
           <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected="selected" @endif>{{ $category->cat_name }}</option>
            
            @endforeach
          
          </select>
        </div>
      </div>


        <div class="row form-group">
          <div class="col col-md-3"><label for="goal" class=" form-control-label"> Goal</label></div>
          <div class="col-12 col-md-3"><input type="number" id="goal" name="goal"  class="form-control{{ $errors->has('goal') ? ' is-invalid' : '' }}" value="{{ old('goal') }}" required autofocus>
            <span id="error_goal"></span>
            @if ($errors->has('goal'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('goal') }}</strong>
            </span>
            @endif
          </div>
        </div>


        <div class="row form-group">
          <div class="col col-md-3"><label for="cam_date" class=" form-control-label"> Date</label></div>
          <div class="col-12 col-md-9"><input type="date" id="cam_date" name="cam_date"  class="form-control{{ $errors->has('cam_date') ? ' is-invalid' : '' }}" value="{{ old('cam_date') }}" required autofocus>
            <span id="error_cam_date"></span>
            @if ($errors->has('cam_date'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('cam_date') }}</strong>
            </span>
            @endif
          </div>
        </div>

     
      <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">
          <i class="fa fa-dot-circle-o"></i> Submit
        </button>
      </div>
    </div>

     <script src="https://code.jquery.com/jquery.js"></script>

      <script type="text/javascript">
        $(document).ready(function(){
          

          $('#cam_name').blur(function(){
          var error_cam_name = '';
          var cam_name = $('#cam_name').val();
          if(cam_name.length==''){
           $('#error_cam_name').html('<label class="text-danger"><h6><small><i>Campaign name cannot be empty</i></small></h6></label>');
           $('#cam_name').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_cam_name').html('');
             $('#cam_name').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

           $('#cam_loc').blur(function(){
          var error_cam_loc = '';
          var cam_loc = $('#cam_loc').val();
          if(cam_loc.length==''){
           $('#error_cam_loc').html('<label class="text-danger"><h6><small><i>Campaign location cannot be empty</i></small></h6></label>');
           $('#cam_loc').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_cam_loc').html('');
             $('#cam_loc').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })


          $('#goal').blur(function(){
          var error_goal = '';
          var goal = $('#goal').val();
          if(goal.length==''){
           $('#error_goal').html('<label class="text-danger"><h6><small><i>Goal cannot be empty</i></small></h6></label>');
           $('#goal').addClass('has-error');
           $('#register').attr('disablt be empty</i>ed',false );
          }
          else{
             $('#error_goal').html('');
             $('#goal').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

          $('#cam_date').blur(function(){
          var error_cam_date = '';
          var cam_date = $('#cam_date').val();
          if(cam_date.length==''){
           $('#error_cam_date').html('<label class="text-danger"><h6><small><i>Campaign Date cannot be empty</i></small></h6></label>');
           $('#cam_date').addClass('has-error');
           $('#register').attr('disablt be empty</i>ed',false );
          }
          else{
             $('#error_cam_date').html('');
             $('#goal').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })


          $('#cam_img').blur(function(){
          var error_cam_img = '';
          var error_cam_img_type = '';
          var file_size = $('#cam_img')[0].files[0].size;
          var file = this.files[0];
          var fileType = file["type"];
          //alert(fileType);
          var validImageTypes = ["image/jpg", "image/jpeg", "image/png"];
          if ($.inArray(fileType, validImageTypes) < 0) {
              // invalid file type code goes here.
              $('#error_cam_img_type').html('<label class="text-danger"><h6><small><i>Invalid Type cam_img</i></small></h6></label>');
              $('#cam_img').addClass('has-error');
              $('#register').attr('disabled',false );
            }
          else{
            //alert('success');
             $('#error_cam_img_type').html('');
             $('#cam_img').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          if(file_size>1000000){
           $('#error_cam_img').html('<label class="text-danger"><h6><small><i>Image Size Exceeds</i></small></h6></label>');
           $('#cam_img').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_cam_img').html('');
             $('#cam_img').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

          $('#cam_img_2').blur(function(){
          var error_cam_img_2 = '';
          var error_cam_img_type_2 = '';
          var file_size = $('#cam_img_2')[0].files[0].size;
          var file = this.files[0];
          var fileType = file["type"];
          //alert(fileType);
          var validImageTypes = ["image/jpg", "image/jpeg", "image/png"];
          if ($.inArray(fileType, validImageTypes) < 0) {
              // invalid file type code goes here.
              $('#error_cam_img_type_2').html('<label class="text-danger"><h6><small><i>Invalid Type image</i></small></h6></label>');
              $('#cam_img_2').addClass('has-error');
              $('#register').attr('disabled',false );
            }
          else{
            //alert('success');
             $('#error_cam_img_type_2').html('');
             $('#cam_img_2').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          if(file_size>1000000){
           $('#error_cam_img_2').html('<label class="text-danger"><h6><small><i>Image Size Exceeds</i></small></h6></label>');
           $('#cam_img_2').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_cam_img_2').html('');
             $('#cam_img_2').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

          $('#cam_des').blur(function(){
          var error_cam_des = '';
          var cam_des = $('#cam_des').val();
          if(cam_des.length==''){
           $('#error_cam_des').html('<label class="text-danger"><h6><small><i>Campaign Description cannot be empty</i></small></h6></label>');
           $('#cam_des').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_cam_des').html('');
             $('#cam_des').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

        })
      </script>




    @endsection