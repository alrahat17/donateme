@extends('layouts.home_layout')
@section('home_content')



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
              <input type="text" class="form-control" id="cam_name" name="cam_name" >                 
            </div>               
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="category_id">Choose Category</label>
            <div class="col-md-6">
            <select name="category_id" id="category_id" class="form-control">
            <option value="">Select</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->cat_name}}</option>
            @endforeach
            </select>                 
            </div>               
          </div>

           <div class="form-group">
            <label class="col-md-4 control-label" for="goal">Campaign Goal - (USD)</label>
            <div class="col-md-6">
              <input type="number" class="form-control" id="goal" name="goal">
            </div>
          </div>


          <div class="form-group">
            <label class="col-md-4 control-label" for="cam_loc">Location</label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="cam_loc" name="cam_loc" >                 
            </div>               
          </div>
         

          <div class="form-group">
            <label class="col-md-4 control-label" for="cam_img">Images</label>
            <div class="col-md-6">
              <input type="file" id="cam_img" name="cam_img" class="form-control-file{{ $errors->has('cam_img') ? ' is-invalid' : '' }}">
              <h6><small><i>(Photo size must be less than 1 MB)</i></small></h6>
              <span id="error_photo"></span>
              @if ($errors->has('cam_img'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('cam_img') }}</strong>
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
             <textarea class="form-control" id="cam_des" name="cam_des" rows="12" value="{{ old('cam_des') }}"></textarea></div>               
          </div>


          <div class="col-md-6 col-md-offset-4">
            <button>Submit</button>
          </div>
        </form>
      </div>




    </div>
  </div>
</section>



@endsection
