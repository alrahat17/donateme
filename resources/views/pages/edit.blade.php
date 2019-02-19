@extends('layouts.admin_layout')
@section('admin_content')

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Edit Page</strong> Form
    </div>
    <div class="card-body card-block">
      <form action="{{url('/pages/'.$page->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="row form-group">
          {{ csrf_field() }}
          {{method_field('PUT')}}
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="heading" class=" form-control-label"> Heading</label></div>
          <div class="col-12 col-md-9"><input type="text" id="heading" name="heading"  class="form-control{{ $errors->has('heading') ? ' is-invalid' : '' }}" value="{{$page->heading}}">
            <span id="error_heading"></span>
             @if ($errors->has('heading'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('heading') }}</strong>
                 </span>
             @endif
          </div>
        </div>

        

        <div class="row form-group">
          <div class="col col-md-3"><label for="select" class=" form-control-label"> Status</label></div>
          <div class="col-12 col-md-9">
           <select name="cam_status" id="home_box" class="form-control">
            <option {{$page->home_box == 'Yes' ? 'selected':''}} value="Yes">Yes</option>
            <option {{$page->home_box == 'No' ? 'selected':''}} value="No">No</option>          
          </select>
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
          

          $('#heading').blur(function(){
            var error_heading = '';
            var heading = $('#heading').val();
            if(heading.length<2){
             $('#error_heading').html('<label class="text-danger"><h6><small><i>heading must be atleast 2 characters long</i></small></h6></label>');
             $('#heading').addClass('has-error');
             $('#register').attr('disabled',false );
           }
           else{
             $('#error_heading').html('');
             $('#heading').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
           }
         })


        })
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

      @include('sweet::alert')








    @endsection