<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Charity &mdash; Free Bootstrap Theme, Free Responsive Bootstrap Website Template</title>
  <meta name="description" content="Free Bootstrap Theme by uicookies.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Montserrat:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('donate_front/css/styles-merged.css') }}">
  <link rel="stylesheet" href="{{ asset('donate_front/css/style.min.css') }}">
  <link rel="stylesheet" href="{{ asset('donate_front/css/custom.css') }}">

    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <nav class="navbar navbar-default probootstrap-navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{URL::to('/')}}" title="uiCookies:Enlight">Enlight</a>
        </div>

        <div id="navbar-collapse" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="{{URL::to('/')}}">Home</a></li>
            <li class="dropdown">
              <a href="" data-toggle="dropdown" class="dropdown-toggle">Pages</a>
              <ul class="dropdown-menu">                
                <li><a href="{{URL::to('/about')}}">About Us</a></li>
                <li><a href="{{URL::to('/become_volunteer')}}">Become Volunteer</a></li>
                <li><a href="{{URL::to('/contact_us')}}">Contact Us</a></li>
                <li><a href="{{URL::to('/give_donation')}}">Give Donation</a></li>
                <li><a href="{{URL::to('/give_scholarship')}}">Give Scholarship</a></li>
                <li><a href="{{URL::to('/gallery')}}">Gallery</a></li>
              </ul>
            </li>
            <li><a href="{{URL::to('/all_blogs')}}">Blogs</a></li>
            <li><a href="{{URL::to('/all_campaigns')}}">Campaigns</a></li>
            <li class="dropdown">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle">Categories</a>
              <ul class="dropdown-menu">
                @php
                $categories = App\Category::orderBy('id','desc')->take(5)->get();
                @endphp
                @foreach ($categories as $category)
                <li><a href="/campaign_by_category/{{$category->id}}">{{$category->cat_name}} [{{$category->campaign->count()}}]</a></li>
                @endforeach 
                <li><a href="{{URL::to('/all_categories')}}">View All</a></li>                 
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle">My Account</a>
              <ul class="dropdown-menu">
                @if (Auth::check())
                <li><a href="{{URL::to('/home')}}">Logout</a></li>
                <li><a href="{{URL::to('/my_comments')}}">My Comments</a></li>
                <li><a href="{{URL::to('/my_campaigns')}}">My Campaigns</a></li>
                <li><a href="{{URL::to('/my_donations')}}">My Donations</a></li>
                <li><a href="{{URL::to('/logout')}}">Logout</a></li>
                @else
                <li><a href="{{URL::to('/login')}}">Login</a></li>
                <li><a href="{{URL::to('/register')}}">Register</a></li>
                @endif
              </ul>
            </li>

            <li class="probootstra-cta-button last"><a href="{{URL::to('/create_campaign')}}" class="btn btn-primary">Create Campaign</a></li>
          </ul>
        </div>
      </div>
    </nav>

    @foreach($general as $gen)
    <section class="probootstrap-hero" style="background-image: url({{URL::to($gen->home_ban)}})"  data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
              <h1 class="probootstrap-heading probootstrap-animate">{{$gen->home_ban_head}} <span>{{$gen->home_ban_sub_head}}</span></h1>
              <p class="probootstrap-animate"><a href="#" class="btn btn-primary btn-lg">{{$gen->home_ban_btn_text}}</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="probootstrap-service-intro">
        <div class="container">
          <div class="probootstrap-service-intro-flex">
            <div class="item probootstrap-animate" data-animate-effect="fadeIn">
              <div class="icon">
                <i class="icon-wallet"></i>
              </div>
              <div class="text">
                <h2>Give Donation</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                <p><a href="{{URL::to('/give_donation')}}">Learn More</a></p>
              </div>
            </div>
            <div class="item probootstrap-animate" data-animate-effect="fadeIn">
              <div class="icon">
                <i class="icon-heart"></i>
              </div>
              <div class="text">
                <h2>Become Volunteer</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                <p><a href="{{URL::to('/become_volunteer')}}">Learn More</a></p>
              </div>
            </div>
            <div class="item probootstrap-animate" data-animate-effect="fadeIn">
              <div class="icon">
                <i class="icon-graduation-cap"></i>
              </div>
              <div class="text">
                <h2>Give Scholarship</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                <p><a href="{{URL::to('/give_scholarship')}}">Learn More</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @endforeach

    <section class="probootstrap-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
            <h2>Most Popular Campaigns</h2>
          </div>
        </div>
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
                  <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-raised">Raised: <span class="money">${{$campaign->donation->sum('don_amount')}}</span></div>
                  <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-goal">Goal: <span class="money">${{$campaign->goal}}</span></div>
                </div>

                <h2><a href="/campaign_details/{{$campaign->id}}">{{$campaign->cam_name}}</a></h2>
                <div class="probootstrap-date"><i class="icon-calendar"></i>{{Carbon\Carbon::now()->diffInDays($campaign->cam_date, false)}} Days remaining</div>  

                <p>{!! substr($campaign->cam_des,0,100) !!}.....</p>
                <p><a href="/campaign_details/{{$campaign->id}}" class="btn btn-primary btn-black">Show Details</a></p>
              </div>
            </div>
          </div>

          @endforeach



          <div class="row">
            <div class="col-md-12">
              <p>Save the future for the little children by donating. <a href="{{URL::to('/all_campaigns')}}">See all campaigns</a></p>
            </div>
          </div>
        </div>
      </section>

      @foreach($general as $gen)
      <section class="probootstrap-section probootstrap-bg probootstrap-section-dark" style="background-image: url({{URL::to($gen->lt_dn_bg_img)}})"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
              <h2>Latest Donations</h2>
            </div>
          </div>
          @endforeach
          <div class="row">
            @foreach ($donations as $donation)
            <div class="col-md-3">
              <div class="probootstrap-donors text-center probootstrap-animate">
                <figure class="media">
                  <img src="{{URL::to($donation->user->photo)}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                </figure>
                <div class="text">
                  <h3>{{$donation->don_full_name}}</h3>
                  <p class="donated">Donated <span class="money">${{$donation->don_amount}}</span></p>
                </div>
              </div>
            </div>
            @endforeach
            


          </div>
        </div>
      </section>
      
      <section class="probootstrap-section  probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate">
              <h2>What People Says</h2>
              <p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro nesciunt</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 probootstrap-animate">
              <div class="owl-carousel owl-carousel-testimony owl-carousel-fullwidth">

                @foreach ($testimonials as $test)
                <div class="item">
                  <div class="probootstrap-testimony-wrap text-center">
                    <figure>
                      <img src="{{URL::to($test->test_img)}}" alt="Free Bootstrap Template by uicookies.com">
                    </figure>
                    <blockquote class="quote">&ldquo;{{$test->test_des}}&rdquo; <cite class="author"> &mdash; <span>{{$test->name}}</span></cite></blockquote>
                  </div>
                </div>
                @endforeach


                
              </div>
            </div>
          </div>
        </div>
      </section>

      {{-- <section class="probootstrap-half">
        <div class="image">
          <div class="image-bg">
            <img src="{{URL::to('donate_front/img/annie-spratt-548190-unhhsplash.jpg')}}">
          </div>
        </div>
        <div class="text">
          <div class="probootstrap-animate">
            <h3>Sucess Stories</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur sunt excepturi dicta ex, placeat ab esse, iure harum eaque fuga asperiores distinctio amet temporibus enim illum molestiae neque ad similique possimus repellendus velit! Quaerat nihil nemo, aliquam consectetur debitis illum. Excepturi cum, quaerat minus odit dolorem recusandae, debitis reprehenderit voluptate?</p>
            <p><a href="#" class="btn btn-primary btn-lg">Read More</a></p>
          </div>
        </div>
      </section> --}}

      <section class="probootstrap-section">
        <div class="container">
          <div class="row">
            <div class="col-md-3 probootstrap-animate">
              <h3>Blogs</h3>
              <ul class="probootstrap-news">
                @foreach($blogs as $blog)
                <li>
                  <span class="probootstrap-date">{{$blog->created_at->diffForHumans()}}</span>
                  <h3><a href="/blog_details/{{$blog->id}}">{{$blog->title}}</a></h3>
                  <p>{!! substr($blog->body,0,100) !!}.....</p>
                  <p><span class="probootstrap-meta"><a href="#"><i class="icon-redo2"></i> 14</a> <a href="#"><i class="icon-bubbles2"></i> {{$blog->comment->count()}}</a></span></p>
                </li>
                @endforeach
              </ul>
              <p><a href="/all_blogs" class="btn btn-primary">View all posts</a></p>
            </div>
            <div class="col-md-6 probootstrap-animate">
              <h3>About Us</h3>
              <p><img src="{{URL::to('donate_front/img/robert-collinsxxs6464.jpg')}}" class="img-responsive"></p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem porro impedit, perferendis similique voluptatum reiciendis laudantium iusto ad, eligendi non minus nemo tempora? Non velit ab quasi at dignissimos fugiat.</p>
              <p><a href="/about" class="btn btn-primary">Learn More</a></p>
            </div>
            <div class="col-md-3 probootstrap-animate">
              <h3>Gallery</h3>
              
              <div class="owl-carousel owl-carousel-fullwidth">
                @foreach ($galleries as $gal)
                <div class="item">
                  <a href="{{URL::to($gal->gal_img)}}" class="image-popup">
                    <img src="{{URL::to($gal->gal_img)}}" class="img-responsive">
                  </a>
                </div>
                @endforeach

                
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="probootstrap-section" style="background-color: #F5F5F5;">
        <div class="container">
          <div class="row">
            <div class="col-md-4 text-center probootstrap-animate">

              <h2>{{$users->count()}}</h2>
              <h5>TOTAL MEMBERS</h5>
            </div>
            
            <div class="col-md-4 text-center probootstrap-animate">
             @php
             $cam = App\Campaign::where('cam_status',1);
             @endphp
             <h2>{{$cam->count()}}</h2>
             <h5>TOTAL CAMPAIGNS</h5>
           </div>


           <div class="col-md-4 text-center probootstrap-animate">
            @php
            $don = App\Donation::where('payment_status',1);
            @endphp

            <h2>{{$don->sum('don_amount')}} USD </h2>
            <h5>TOTAL FUNDS RAISED</h5>
          </div>

        </div>

      </div>
    </div>

  </section>

  @foreach($general as $gen)
  <footer class="probootstrap-footer probootstrap-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-4 probootstrap-animate">
          <div class="probootstrap-footer-widget">
            <h3>About Us</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro provident suscipit natus a cupiditate ab minus illum quaerat maxime inventore Ea consequatur consectetur hic provident dolor ab aliquam eveniet alias</p>
            <ul class="probootstrap-footer-social">
              <li><a href="{{$gen->twitter_link}}"><i class="icon-twitter"></i></a></li>
              <li><a href="{{$gen->fb_link}}"><i class="icon-facebook"></i></a></li>
              <li><a href="{{$gen->gplus_link}}"><i class="icon-google"></i></a></li>
              <li><a href="{{$gen->pin_link}}"><i class="icon-pinterest"></i></a></li>
              <li><a href="{{$gen->insta_link}}"><i class="icon-instagram"></i></a></li>
            </ul>
          </div>
        </div>

        <div class="col-md-4 probootstrap-animate">
          <div class="probootstrap-footer-widget">
            <h3>Contact Info</h3>
            <ul class="probootstrap-contact-info">
              <li><i class="icon-location2"></i> <span>{{$gen->site_address}}</span></li>
              <li><i class="icon-mail"></i><span>{{$gen->email}}</span></li>
              <li><i class="icon-phone2"></i><span>+{{$gen->phone}}</span></li>
            </ul>

          </div>
        </div>

        <div class="col-md-4 probootstrap-animate">
          <div class="probootstrap-footer-widget">
            <h3>Donation</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit omnis nam obcaecati placeat. Repellendus omnis in praesentium molestiae rem eligendi.</p>
          </div>
        </div>

      </div>
      <!-- END row -->

    </div>

    <div class="probootstrap-copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-8 text-left">
            <p>{{$gen->footer_copyright}}</p>
          </div>
          <div class="col-md-4 probootstrap-back-to-top">
            <p><a href="#" class="js-backtotop">Back to top <i class="icon-arrow-long-up"></i></a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  @endforeach

  <script src="{{ asset('donate_front/js/scripts.min.js') }}"></script>
  <script src="{{ asset('donate_front/js/main.min.js') }}"></script>
  <script src="{{ asset('donate_front/js/custom.js') }}"></script>

</body>
</html>