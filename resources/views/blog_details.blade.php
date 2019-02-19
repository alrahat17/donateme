@extends('layouts.home_layout')
@section('home_content')

<section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(/donate_front/img/hero_bg_bw_1.jpg); height:380px; width:1349px;"  data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
          <h1 class="probootstrap-heading probootstrap-animate">Blog Details</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="probootstrap-section">
  <div class="container">
    <div class="row probootstrap-gutter60">
      <div class="col-md-8 col-sm-8 probootstrap-animate">
        <h2>{{$blog->title}}</h2>
        <p>{!!$blog->body !!}</p>
        <div class="row">
          <div class="col-md-6">
            <p><a href="donate_front/img/img_sq_6.jpg" class="image-popup"><img src="{{URL::to($blog->media)}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></a></p>
          </div>
        </div>

        {{-- <p><a href="/create_donation/{{$campaign->id}}" class="btn btn-black btn-lg">Donate Now</a></p> --}}

      </div>

    </div>
  </div>
</section>

<section class="probootstrap-section probootstrap-bg probootstrap-section-dark">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
        <h2>Tell us your thoughts</h2>
        @if(Auth::check())
        <form action="/save_comment/{{$blog->id}}" class="form-horizontal" method="post">
          {{ csrf_field() }}

          <div class="form-group text-center center">
            <div>              
             <textarea class="form-control" style="display: block;margin-left: auto;margin-right: auto;" id="message" name="message" rows="3" value="{{ old('message') }}"></textarea>
           </div>               
          </div>
          
          <div>
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
          </div>

        </form>
        @else
        <p class="lead">You Have to log in to comment here</p>
        @endif
      </div>
    </div>
    <div class="row">




    </div>
  </div>
</div>
</section>
@endsection