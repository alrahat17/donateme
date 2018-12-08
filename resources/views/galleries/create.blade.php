@extends('layouts.admin_layout')
@section('admin_content')

<div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Gallery</strong> Form
                      </div>
                      <div class="card-sub_title card-block">
                        <form action="/galleries" method="post" enctype="multipart/form-data" class="form-horizontal">
                          <div class="row form-group">
                            {{ csrf_field() }}
                          </div>
                         <div class="row form-group">
                            <div class="col col-md-3"><label for="title" class=" form-control-label"> Title</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="title" name="title"  class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" required autofocus>
                            <span id="error_title"></span>
                              @if ($errors->has('title'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                               </span>
                             @endif
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="sub_title" class=" form-control-label"> Sub Title</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="sub_title" name="sub_title"  class="form-control{{ $errors->has('sub_title') ? ' is-invalid' : '' }}" value="{{ old('sub_title') }}">
                            <span id="error_sub_title"></span>
                              @if ($errors->has('sub_title'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('sub_title') }}</strong>
                               </span>
                             @endif
                            </div>
                          </div>

                          
                                                   
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="gal_img" class=" form-control-label"> Image</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="gal_img" name="gal_img" class="form-control-file{{ $errors->has('gal_img') ? ' is-invalid' : '' }}">
                            <span id="error_gal_img"></span><span id="error_gal_img_type"></span>
                              @if ($errors->has('gal_img'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('gal_img') }}</strong>
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
          if(title.length<2){
           $('#error_title').html('<label class="text-danger"><h6><small><i>Title must be atleast 2 characters long</i></small></h6></label>');
           $('#title').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_title').html('');
             $('#title').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

          $('#sub_title').blur(function(){
          var error_sub_title = '';
          var sub_title = $('#sub_title').val();
          if(sub_title.length<2){
           $('#error_sub_title').html('<label class="text-danger"><h6><small><i>Subtitle must be atleast 2 characters long</i></small></h6></label>');
           $('#sub_title').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_sub_title').html('');
             $('#sub_title').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

          $('#gal_img').blur(function(){
          var error_gal_img = '';
          var error_gal_img_type = '';
          var file_size = $('#gal_img')[0].files[0].size;
          var file = this.files[0];
          var fileType = file["type"];
          //alert(fileType);
          var validImageTypes = ["image/jpg", "image/jpeg", "image/png"];
          if ($.inArray(fileType, validImageTypes) < 0) {
              // invalid file type code goes here.
              $('#error_gal_img_type').html('<label class="text-danger"><h6><small><i>Invalid Type gallery image</i></small></h6></label>');
              $('#gal_img').addClass('has-error');
              $('#register').attr('disabled',false );
            }
          else{
            //alert('success');
             $('#error_gal_img_type').html('');
             $('#gal_img').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          if(file_size>1000000){
           $('#error_gal_img').html('<label class="text-danger"><h6><small><i>Gallery image Size Exceeds</i><small></h6></label>');
           $('#gal_img').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_gal_img').html('');
             $('#gal_img').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

        })
      </script>

@endsection