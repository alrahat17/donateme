@extends('layouts.home_layout')
@section('home_content')

<section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(donate_front/img/hero_bg_bw_1.jpg); height:380px; width:1349px;"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate">About <span>Together we can make a difference</span></h1>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="probootstrap-section">
        <div class="container">
          <div class="row mb40">
            <div class="col-md-6 col-md-push-6 probootstrap-animate">
              <p><img src="donate_front/img/anna-kolosyuk-551398-unsplaeesh.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></p>
            </div>
            <div class="col-md-5 col-md-pull-6 probootstrap-animate">
              <h2>Our Story</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur sunt excepturi dicta ex, placeat ab esse, iure harum eaque fuga asperiores distinctio amet temporibus enim illum molestiae neque ad similique possimus repellendus velit! Quaerat nihil nemo, aliquam consectetur debitis illum. Excepturi cum, quaerat minus odit dolorem recusandae, debitis reprehenderit voluptate?</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum suscipit placeat amet vel esse soluta dolorum nesciunt dolores, possimus sint.</p>
            </div>
            
          </div>

          <div class="row">
            <div class="col-md-6 probootstrap-animate">
              <p><img src="donate_front/img/annie-spratt-548190-unhhsplash.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></p>
            </div>
            <div class="col-md-5 col-md-push-1 probootstrap-animate">
              <h2>Our Mission</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur sunt excepturi dicta ex, placeat ab esse, iure harum eaque fuga asperiores distinctio amet temporibus enim illum molestiae neque ad similique possimus repellendus velit! Quaerat nihil nemo, aliquam consectetur debitis illum. Excepturi cum, quaerat minus odit dolorem recusandae, debitis reprehenderit voluptate?</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum suscipit placeat amet vel esse soluta dolorum nesciunt dolores, possimus sint.</p>
            </div>
            
          </div>

        </div>
      </section>

      <section class="probootstrap-section probootstrap-border-top">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
              <h2>Leadership</h2>
              <p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro nesciunt</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6 probootstrap-animate">
              <a href="#" class="probootstrap-team">
                <img src="donate_front/img/person_1.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                <div class="probootstrap-team-info">
                  <h3>Jeremy Slater <span class="position">Partner/CEO</span></h3>
                </div>
              </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 probootstrap-animate">
              <a href="#" class="probootstrap-team">
                <img src="donate_front/img/person_2.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                <div class="probootstrap-team-info">
                  <h3>James Butterly <span class="position">Partner/CTO</span></h3>
                </div>
              </a>
            </div>
            
            <div class="clearfix visible-sm-block visible-xs-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-6 probootstrap-animate">
              <a href="#" class="probootstrap-team">
                <img src="donate_front/img/person_3.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                <div class="probootstrap-team-info">
                  <h3>Matthew Smith <span class="position">Organizer</span></h3>
                </div>
              </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 probootstrap-animate">
              <a href="#" class="probootstrap-team">
                <img src="donate_front/img/person_4.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                <div class="probootstrap-team-info">
                  <h3>Ivan Dubovtsev <span class="position">Organizer</span></h3>
                  
                </div>
              </a>
            </div>

            <div class="clearfix visible-sm-block visible-xs-block"></div>
          </div>
        </div>
      </section>

      <section class="probootstrap-half">
        <div class="image">
          <div class="image-bg">
            <img src="{{URL::to('donate_front/img/myles-tan-84040-unsrrplash.jpg')}}" alt="Free Bootstrap Template by uicookies.com">
          </div>
        </div>
        <div class="text">
          <div class="probootstrap-animate">
            <h3>Sucess Stories</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur sunt excepturi dicta ex, placeat ab esse, iure harum eaque fuga asperiores distinctio amet temporibus enim illum molestiae neque ad similique possimus repellendus velit! Quaerat nihil nemo, aliquam consectetur debitis illum. Excepturi cum, quaerat minus odit dolorem recusandae, debitis reprehenderit voluptate?</p>
            <p><a href="#" class="btn btn-primary btn-lg">Read More</a></p>
          </div>
        </div>
      </section>




@endsection