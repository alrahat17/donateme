@extends('layouts.home_layout')
@section('home_content')

<style>
html {
  box-sizing: border-box;
}

*,
*:before,
*:after {
  box-sizing: inherit;
}

/* The Masonry Container */
.masonry {
  margin: 1.5em auto;
  max-width: 2000px;
  column-gap: 1.5em;
}

/* The Masonry Brick */
.item {
  background: #fff;
  padding: 1em;
  margin: 0 0 1.5em;
  
}

/* Masonry on large screens */
@media only screen and (min-width: 1024px) {
  .masonry {
    column-count: 4;
  }
}

/* Masonry on medium-sized screens */
@media only screen and (max-width: 1023px) and (min-width: 768px) {
  .masonry {
    column-count: 3;
  }
}

/* Masonry on small screens */
@media only screen and (max-width: 767px) and (min-width: 540px) {
  .masonry {
    column-count: 2;
  }
}
</style>


<section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(/donate_front/img/hero_bg_bw_1.jpg); height:380px; width:1349px;"  data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
          <h1 class="probootstrap-heading probootstrap-animate">Gallery</h1>
        </div>
      </div>
    </div>
  </div>
</section>

      <div class="container">
        <div class="masonry">
          @foreach ($galleries as $gallery)
          <div class="item">
            <a href="{{URL::to($gallery->gal_img)}}" class="image-popup"><img src="{{URL::to($gallery->gal_img)}}" class="img-responsive"></a>
            </div> 
          @endforeach         
        </div>
      </div>


      <div class="text-center">
         {{ $galleries->links() }} 
        </div>
        

     



@endsection