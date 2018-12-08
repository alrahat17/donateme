@extends('layouts.home_layout')
@section('home_content')



<section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(donate_front/img/hero_bg_bw_1.jpg); height:380px; width:1349px;"  data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
          <h1 class="probootstrap-heading probootstrap-animate">Account Settings</h1>
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
        <form action="{{url('/update_profile',$user->id)}}" class="form-horizontal" method="post" class="probootstrap-form" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-md-4 control-label" for="name">Full Name</label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">                 
            </div>               
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="user_name">User Name</label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="user_name" name="user_name" value="{{$user->user_name}}">                 
            </div>               
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="email">Email</label>
            <div class="col-md-6">
              <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">                 
            </div>               
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="phone">Phone</label>
            <div class="col-md-6"><input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}"></div>             
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="photo">Photo</label>
            <div class="col-md-6">
              <input type="file" id="photo" name="photo" class="form-control-file{{ $errors->has('photo') ? ' is-invalid' : '' }}">
              <h6><small><i>(Photo size must be less than 1 MB)</i></small></h6>
              <span id="error_photo"></span>
              @if ($errors->has('photo'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('photo') }}</strong>
              </span>
              @endif
              <img style="height:90px;width: 120px;" src="{{URL::to($user->photo)}}">
            </div>               
          </div>

          <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary btn-lg" id="submit" name="submit">Update</button>
          </div>
        </form>
      </div>




    </div>
  </div>
</section>



@endsection
