@extends('layouts.home_layout')
@section('home_content')

    
<section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(donate_front/img/hero_bg_bw_1.jpg); height:380px; width:1349px;"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate">Campaigns </h1>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="probootstrap-section">
        <div class="container">
          <div class="row">

      @foreach ($campaigns as $campaign)
    	<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate" data-animate-effect="fadeIn">
              <div class="probootstrap-image-text-block probootstrap-cause">
                <figure>
                  <img src="{{URL::to($campaign->cam_img)}}" style="height:189px; width: 360px;" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                </figure>
                <div class="probootstrap-cause-inner">
                  <div class="progress">
                  	 @php
                      $fun = $campaign->donation->sum('don_amount');
                      $g = $campaign->goal;
                      $progress = ($fun/$g)*100;
                    @endphp
                    <div class="progress-bar progress-bar-s2" data-percent="{{round($progress)}}"></div>
                  </div>

                  <div class="row mb30">
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-raised">Raised: <span class="money">{{$campaign->donation->sum('don_amount')}} USD</span></div>
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-goal">Goal: <span class="money">{{$campaign->goal}} USD</span></div>
                  </div>
                  
                  <h2><a href="#">{{$campaign->cam_name}}</a></h2>
                   {{-- <div class="probootstrap-date"><i class="icon-calendar"></i> {{Carbon\Carbon::now()->diffForHumans($campaign->cam_date)}}
                  </div> --}}
                  <div class="probootstrap-date"><i class="icon-calendar"></i>
                   <?php 
                    $date_new = Carbon\Carbon::parse($campaign->cam_date);
                    echo $date_new->toFormattedDateString(); 
                   ?>
                  </div>
                  <div class="probootstrap-date"><i class="icon-map-pin" style="color:#F45302"></i> {{$campaign->cam_loc}}</div>  
                  <p><a href="/campaign_details/{{$campaign->id}}" class="btn btn-primary btn-black">Show Details</a></p>
                </div>
              </div>
            </div>
            
        @endforeach 
        
        

            
      </section>

      <div class="text-center">
         {{ $campaigns->links() }} 
        </div>
        

      

@endsection