@extends('layouts.home_layout')
@section('home_content')


<section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(donate_front/img/hero_bg_bw_1.jpg); height:380px; width:1349px;"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate">Blogs <span>Together we can make a difference</span></h1>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="probootstrap-section">
        <div class="container">

        	<?php 
        	$i = 0;
        	foreach($blogs as $blog):
        	$i++;
        	

        
    		// one layout type
    		if($i%2 == 0):
    		?>
        	<div class="row mb40">
            <div class="col-md-6 col-md-push-6 probootstrap-animate">
              <p><img src="{{$blog->media}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></p>
            </div>
            <div class="col-md-5 col-md-pull-6 news-entry probootstrap-animate">
              <h2 class="mb0"><a href="#">{{$blog->title}}</a></h2>
              <p class="probootstrap-news-date">{{$blog->created_at}} by Admin</p>
              <p>{!! substr($blog->body,0,100) !!}.....</p>
              <p><span class="probootstrap-meta-share"><a href="#"><i class="icon-redo2"></i> 14</a> <a href="#"><i class="icon-bubbles2"></i> 7</a></span> <a href="/blog_details/{{$blog->id}}" class="btn btn-black">Read More...</a></p>
            </div>
          </div>
        	
        	
        	
       
        
          <?php
    		// another layout type
    		else:
    			?>
        

          <div class="row mb40">
            <div class="col-md-6 probootstrap-animate">
              <p><img src="{{$blog->media}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></p>
            </div>
            <div class="col-md-5 col-md-push-1  news-entry probootstrap-animate">
              <h2 class="mb0"><a href="#">{{$blog->title}}</a></h2>
              <p class="probootstrap-news-date">{{$blog->created_at}} by Admin</p>
              <p>{{substr($blog->body,0,100)}}.....</p>
              <p><span class="probootstrap-meta-share"><a href="#"><i class="icon-redo2"></i> 14</a> <a href="#"><i class="icon-bubbles2"></i> 7</a></span> <a href="/blog_details/{{$blog->id}}" class="btn btn-black">Read More...</a></p>
            </div>
          </div>

          <?php
          endif;
          ?>

        @endforeach		
        </div>


    <div class="text-center">
      {{ $blogs->links() }} 
    </div>
    


      </section>

      

@endsection