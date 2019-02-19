@extends('layouts.home_layout')
@section('home_content')
<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script>
       tinymce.init({
      selector: '#mytextarea',
      menubar: false,
      
  });
      
      
</script>



<section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(donate_front/img/hero_bg_bw_1.jpg); height:380px; width:1349px;"  data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
          <h1 class="probootstrap-heading probootstrap-animate">Create Campaign</h1>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="probootstrap-section">
  <div class="container">
    <div class="row">
      <div class="col-md-3 probootstrap-animate">     
        <ul class="nav nav-pills nav-stacked">
          <li class="{{ Request::is('home') ? 'active' : '' }}" style="color: red;"><a href="{{URL::to('/home')}}">My Profile</a></li>
          <li class="{{ Request::is('/my_comments') ? 'active' : '' }}"><a href="{{URL::to('/my_comments')}}">My Comments</a></li>
          <li class="{{ Request::is('/my_campaigns') ? 'active' : '' }}"><a href="{{URL::to('/my_campaigns')}}">My Campaigns</a></li>
          <li class="{{ Request::is('/my_donations') ? 'active' : '' }}"><a href="{{URL::to('/my_donations')}}">My Donations</a></li>
          <li class="{{ Request::is('/my_withdrawals') ? 'active' : '' }}"><a href="{{URL::to('/my_withdrawals')}}">My Withdrawals</a></li>
          <li><a href="{{URL::to('/logout')}}">Logout</a></li>
        </ul>
      </div> 

      <div class="col-md-9 well admin-content">
        <form action="{{url('/save_campaign')}}" class="form-horizontal" method="post" class="probootstrap-form" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-md-4 control-label" for="cam_name">Campaign Title</label>
            <div class="col-md-6">
              <input type="text" class="form-control{{ $errors->has('cam_name') ? ' is-invalid' : '' }}" id="cam_name" name="cam_name" value="{{old('cam_name')}}" required> 
              <span id="error_cam_name"></span>
              @if ($errors->has('cam_name'))
              <span class="invalid-feedback" role="alert">
               <strong>{{ $errors->first('cam_name') }}</strong>
               </span>
            @endif                
            </div>               
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="category_id">Choose Category</label>
            <div class="col-md-6">
            <select name="category_id" id="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" required>
            <option value="">Select</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected="selected" @endif>{{ $category->cat_name }}</option>
            @endforeach
            </select>
            <span id="error_category_id"></span>
            @if ($errors->has('category_id'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('category_id') }}</strong>
            </span>
            @endif                 
            </div>               
          </div>

           <div class="form-group">
            <label class="col-md-4 control-label" for="goal">Campaign Goal - (USD)</label>
            <div class="col-md-6">
              <input type="number" class="form-control{{ $errors->has('goal') ? ' is-invalid' : '' }}" id="goal" name="goal" value="{{old('goal')}}" required>
              <span id="error_goal"></span>
            @if ($errors->has('goal'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('goal') }}</strong>
            </span>
            @endif
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="cam_date">Campaign Date</label>
            <div class="col-md-6">
              <input type="date" class="form-control{{ $errors->has('cam_date') ? ' is-invalid' : '' }}" id="cam_date" name="cam_date" value="{{old('cam_date')}}" required="">
              <span id="error_cam_date"></span>
            @if ($errors->has('cam_date'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('cam_date') }}</strong>
            </span>
            @endif
            </div>
          </div>


          <div class="form-group">
            <label class="col-md-4 control-label" for="cam_loc">Location</label>
            <div class="col-md-6">
              <input type="text" class="form-control{{ $errors->has('cam_loc') ? ' is-invalid' : '' }}" id="cam_loc" name="cam_loc" value="{{old('cam_loc')}}" required="" >
              <span id="error_cam_loc"></span>
            @if ($errors->has('cam_loc'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('cam_loc') }}</strong>
            </span>
            @endif                 
            </div>               
          </div>
         

          <div class="form-group">
            <label class="col-md-4 control-label" for="cam_img">Image</label>
            <div class="col-md-6">
              <input type="file" id="cam_img" name="cam_img" class="form-control-file{{ $errors->has('cam_img') ? ' is-invalid' : '' }}">
              <h6><small><i>(Photo size must be less than 1 MB)</i></small></h6>
              <span id="error_cam_img"></span>
              <span id="error_cam_img_type"></span>
              @if ($errors->has('cam_img'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('cam_img') }}</strong>
              </span>
              @endif             
            </div>               
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="cam_img_2">Other Image (Optional)</label>
            <div class="col-md-6">
              <input type="file" id="cam_img_2" name="cam_img_2" class="form-control-file{{ $errors->has('cam_img_2') ? ' is-invalid' : '' }}">
              <h6><small><i>(Photo size must be less than 1 MB)</i></small></h6>
              <span id="error_cam_img_2"></span>
              <span id="error_cam_img_type_2"></span>
              @if ($errors->has('cam_img_2'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('cam_img_2') }}</strong>
              </span>
              @endif             
            </div>               
          </div>


          <div class="form-group">
            <label class="col-md-4 control-label" for="video">Youtube Video Link(Optional)</label>
            <div class="col-md-6">
              <input type="url" id="video" name="video" class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}" value="{{old('video')}}">
              <h6><small><i>(Right click on video, select 'Copy Video URL', paste the link here)</i></small></h6>
              @if ($errors->has('video')) 
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('video') }}</strong>
              </span>
              @endif             
            </div>               
          </div>

         

          <div class="form-group">
            <div class="col-md-6">
              <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{Auth::user()->id}}" >                 
            </div>               
          </div>



          <div class="form-group">
            <label class="col-md-4 control-label" for="cam_des">About the Campaign     
            </label>
            <div class="col-md-6">              
             <textarea class="form-control{{ $errors->has('cam_des') ? ' is-invalid' : '' }}" id="mytextarea" name="cam_des" rows="12" value="{{ old('cam_des') }}" required=""></textarea>
             <span id="error_cam_des"></span>
            @if ($errors->has('cam_des'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('cam_des') }}</strong>
            </span>
            @endif
           </div>               
          </div>

          


          <div class="col-md-6 col-md-offset-4">
            <button type="submit" name="register">Submit</button>
          </div>
        </form>
      </div>




    </div>
  </div>
</section>

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

           $('#category_id').blur(function(){
          var error_category_id = '';
          var category_id = $('#category_id').val();
          if(category_id.length==''){
           $('#error_category_id').html('<label class="text-danger"><h6><small><i>Category name cannot be empty</i></small></h6></label>');
           $('#category_id').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_category_id').html('');
             $('#category_id').removeClass('has-error');
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
             $('#error_goal').html('');
             $('#cam_date').removeClass('has-error');
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
              $('#error_cam_img_type').html('<label class="text-danger"><h6><small><i>Invalid Type Image</i></small></h6></label>');
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
           $('#register').attr('disablt be empty</i>ed',false );
          }
          else{
             $('#error_cam_des').html('');
             $('#cam_des').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

        })
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

      @include('sweet::alert')






@endsection
