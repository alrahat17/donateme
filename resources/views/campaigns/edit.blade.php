@extends('layouts.admin_layout')
@section('admin_content')

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>campaign</strong> Form
    </div>
    <div class="card-body card-block">
      <form action="{{url('/campaigns/'.$campaign->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="row form-group">
          {{ csrf_field() }}
          {{method_field('PUT')}}
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="cam_name" class=" form-control-label"> Campaign Name</label></div>
          <div class="col-12 col-md-9"><input type="text" id="cam_name" name="cam_name"  class="form-control" value="{{$campaign->cam_name}}">
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
          <div class="col-12 col-md-9"><input type="text" id="cam_loc" name="cam_loc" class="form-control" value="{{$campaign->cam_loc}}">
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
          <div class="col-12 col-md-9"><input type="file" id="cam_img" name="cam_img" class="form-control-file" >
            <span id="error_cam_img"></span>
            <span id="error_cam_img_type"></span>
            @if ($errors->has('cam_img'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('cam_img') }}</strong>
            </span>
            @endif
            <br>
            <img style="height: 90px;width: 120px;" src="{{URL::to($campaign->cam_img)}}">
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="user_id" class=" form-control-label"> User Name</label></div>
          <div class="col-12 col-md-9"><input type="number" id="user_id" name="user_id"  class="form-control" value="{{$campaign->user->name}}">
          <span id="error_user_id"></span>
          </div>
        </div>


       <div class="row form-group">
          <div class="col col-md-3"><label for="category_id" class=" form-control-label"> Category</label></div>
          <div class="col-12 col-md-9">
            <select name="category_id" id="category_id" class="form-control">
            <?php

            foreach ($categories as $category) {
            ?>
            <option value="{{$category->id}}"<?php if($category->id == $campaign->category_id) echo "selected" ;?>>{{$category->cat_name}}</option>
            <?php
            }

            ?>
          </select>
        </div>
      </div>



        <div class="row form-group">
          <div class="col col-md-3"><label for="funds_raised" class=" form-control-label"> Funds Raised</label></div>
          <div class="col-12 col-md-9"><input type="number" id="funds_raised" name="funds_raised"  class="form-control" value="{{$campaign->funds_raised}}">
            <span id="error_funds_raised"></span>
            @if ($errors->has('funds_raised'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('funds_raised') }}</strong>
            </span>
            @endif
          </div>
        </div>


        <div class="row form-group">
          <div class="col col-md-3"><label for="goal" class=" form-control-label"> Goal</label></div>
          <div class="col-12 col-md-9"><input type="number" id="goal" name="goal"  class="form-control" value="{{$campaign->goal}}">
             <span id="error_goal"></span>
            @if ($errors->has('goal'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('goal') }}</strong>
            </span>
            @endif
          </div>
        </div>

      

        <div class="row form-group">
          <div class="col col-md-3"><label for="select" class=" form-control-label"> Status</label></div>
          <div class="col-12 col-md-9">
           <select name="cam_status" id="cam_status" class="form-control">
            <option {{$campaign->cam_status == 'Active' ? 'selected':''}} value="Active">Active</option>
            <option {{$campaign->cam_status == 'Finalized' ? 'selected':''}} value="Finalized">Finalized</option>          
          </select>
        </div>
      </div>


      <div class="row form-group">
          <div class="col col-md-3"><label for="select" class=" form-control-label"> Approve Campaign?</label></div>
          <div class="col-12 col-md-9">
           <select name="approve_cam" id="approve_cam" class="form-control">
            <option {{$campaign->approve_cam == 'No' ? 'selected': ''}} value="No">No</option>
            <option {{$campaign->approve_cam == 'Yes' ? 'selected': ''}} value="Yes">Yes</option>          
          </select>
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

          $('#funds_raised').blur(function(){
          var error_funds_raised = '';
          var funds_raised = $('#funds_raised').val();
          if(funds_raised.length==''){
           $('#error_funds_raised').html('<label class="text-danger"><h6><small>Funds raised cannot be empty</small></h6></label>');
           $('#funds_raised').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_funds_raised').html('');
             $('#funds_raised').removeClass('has-error');
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


         

        })
      </script>





    @endsection