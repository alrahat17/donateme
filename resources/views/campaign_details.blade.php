@extends('layouts.home_layout')
@section('home_content')

<section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url({{URL::to('donate_front/img/hero_bg_bw_1.jpg')}}); height:380px; width:1349px;"  data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
          <h1 class="probootstrap-heading probootstrap-animate">Campaign Details</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="probootstrap-section">
  <div class="container">
    <div class="row probootstrap-gutter60">

      <div class="col-md-4 col-sm-4 probootstrap-animate" data-animate-effect="fadeIn">
        <div class="probootstrap-image-text-block probootstrap-cause" style="border: 1px solid;">
          <div class="probootstrap-cause-inner">
            <div class="row mtp30" align="center">
              <figure>
                <img src="{{URL::to($campaign->user->photo)}}" class="img-responsive" style="width: 100px;height: 100px; border-radius: 50%;">           

              </figure>             
              <span><strong>Organizer :-  </strong> {{$campaign->user->name}}</span>
            </div>
            <span></span>
            <br><br>
            <div class="progress">
              @php
              $fun = $campaign->funds_raised;
              $g = $campaign->goal;
              $progress = ($fun/$g)*100;
              @endphp
              <div class="progress-bar progress-bar-s2" data-percent="{{round($progress)}}"></div>
            </div>

            <div class="row mb30">
              <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-raised">Raised: <span class="money">${{$campaign->donation->sum('don_amount')}}</span></div>
              <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-goal">Goal: <span class="money">${{$campaign->goal}}</span></div>
            </div>

            <h2><a href="#">{{$campaign->cam_name}}</a></h2>
            <div class="probootstrap-date"><i class="icon-calendar3" style="color:#F45302"></i> {{Carbon\Carbon::now()->diffInDays($campaign->cam_date, false)}} Days Remaining</div> 
            <div class="probootstrap-date"><i class="icon-map-pin" style="color:#F45302"></i> {{$campaign->cam_loc}}</div>
            @if($campaign->cam_status==1)
            <p><a href="/create_donation/{{$campaign->id}}" class="btn btn-primary btn-black">Donate Now!</a></p>
            @else($campaign->cam_status==2)
             <p><a class="btn btn-primary btn-black disabled">Campaign Ended!</a></p>
            @endif
          </div>
        </div>
      </div>




      <?php 
        $link = $campaign->video;
        $video_id = explode("/", $link);
        //echo '<pre>';print_r($video_id);die;
      ?>

      <div class="col-md-8 col-sm-8 probootstrap-animate">
        <h2>{{$campaign->cam_name}}</h2>
        <p>{!!$campaign->cam_des !!}</p>
        <div class="row">
          <div class="col-md-6">
            <p><a href="{{URL::to($campaign->cam_img)}}" class="image-popup"><img src="{{URL::to($campaign->cam_img)}}" style="height: 195px;width: 345px;  class="img-responsive"></a></p>
          </div>
          
          @if($campaign->cam_img_2)
          <div class="col-md-6">
            <p><a href="{{URL::to($campaign->cam_img_2)}}" class="image-popup"><img src="{{URL::to($campaign->cam_img_2)}}" style="height: 195px;width: 345px;" class="img-responsive"></a></p>
          </div>

        </div>
        @endif  


        @if($campaign->video)
        <iframe width="360" height="200" src="https://www.youtube.com/embed/{{$video_id[3]}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        @endif


     {{--   <p><a href="/create_donation/{{$campaign->id}}" class="btn btn-black btn-lg">Donate Now</a></p> --}}

   </div>

 </div>
</div>
</section>

<section class="probootstrap-section probootstrap-bg probootstrap-section-dark">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
        <h2>Recent Donations</h2>
        <p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro nesciunt</p>
      </div>
    </div>
    <div class="row">
     @foreach ($donation as $don)
     <div class="col-md-3">
      <div class="probootstrap-donors text-center probootstrap-animate">
        <figure class="media">
          <img src="{{URL::to($don->user->photo)}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive" style=" height: 90px; width: 70px;">
        </figure>
        <div class="text">
          <h3>{{$don->don_full_name}}</h3>
          <p class="donated">Donated <span class="money">${{$don->don_amount}}</span></p>
        </div>
      </div>
    </div>
    @endforeach




  </div>
</div>
</div>
</section>
@endsection