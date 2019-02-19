@extends('layouts.home_layout')
@section('home_content')

<section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(donate_front/img/hero_bg_bw_1.jpg); height:380px; width:1349px;"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate">Categories <span>Together we can make a difference</span></h1>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="probootstrap-section">
        <div class="container">
          <div class="row probootstrap-gutter10">
        @foreach ($categories as $category)
        	<div class="col-md-3 col-sm-4 col-xs-6 gal-item probootstrap-animate">
              <a href="/campaign_by_category/{{$category->id}}"><img style="height:160px;width:285px;" src="{{URL::to($category->cat_img)}}"  class="img-responsive" >{{$category->cat_name}}({{$category->campaign->count()}})</a>
            </div>
        @endforeach

            

          </div>
        </div>

        
      </section>

      <div class="text-center">
          {{ $categories->links() }}
        </div>

      


@endsection