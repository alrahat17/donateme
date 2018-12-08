@extends('layouts.admin_layout')
@section('admin_content')

<div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Category</strong> Form
                      </div>
                      <div class="card-body card-block">
                        <form action="/categories" method="post" enctype="multipart/form-data" class="form-horizontal">
                          <div class="row form-group">
                            {{ csrf_field() }}
                          </div>
                         <div class="row form-group">
                            <div class="col col-md-3"><label for="cat_name" class=" form-control-label"> Category Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="cat_name" name="cat_name"  class="form-control{{ $errors->has('cat_name') ? ' is-invalid' : '' }}" value="{{ old('cat_name') }}" required autofocus>
                            <span id="error_cat_name"></span>
                            @if ($errors->has('cat_name'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cat_name') }}</strong>
                               </span>
                             @endif
                            </div>
                          </div>

                          
                                                   
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="cat_img" class=" form-control-label"> Image</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="cat_img" name="cat_img" class="form-control-file{{ $errors->has('cat_img') ? ' is-invalid' : '' }}" required autofocus>
                              <span id="error_cat_img"></span>
                              <span id="error_cat_img_type"></span>
                               @if ($errors->has('cat_img'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cat_img') }}</strong>
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
          

          $('#cat_name').blur(function(){
          var error_cat_name = '';
          var cat_name = $('#cat_name').val();
          if(cat_name.length<3){
           $('#error_cat_name').html('<label class="text-danger"><h6><small>Category Name must be atleast 3 characters long</small></h6></label>');
           $('#cat_name').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_cat_name').html('');
             $('#cat_name').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })


          $('#cat_img').blur(function(){
          var error_cat_img = '';
          var error_cat_img_type = '';
          var file_size = $('#cat_img')[0].files[0].size;
          var file = this.files[0];
          var fileType = file["type"];
          //alert(fileType);
          var validImageTypes = ["image/jpg", "image/jpeg", "image/png"];
          if ($.inArray(fileType, validImageTypes) < 0) {
              // invalid file type code goes here.
              $('#error_cat_img_type').html('<label class="text-danger"><h6><small>Invalid Type Image</small></h6></label>');
              $('#cat_img').addClass('has-error');
              $('#register').attr('disabled',false );
            }
          else{
            //alert('success');
             $('#error_cat_img_type').html('');
             $('#cat_img').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          if(file_size>1000000){
           $('#error_cat_img').html('<label class="text-danger"><h6><small>Category Image Size Exceeds</small></h6></label>');
           $('#cat_img').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_cat_img').html('');
             $('#cat_img').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

        })
      </script>





@endsection