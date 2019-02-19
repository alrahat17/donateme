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
            <a class="navbar-brand" href="{{URL::to('/')}}" title="Charity">Charity</a>
          </div>

          <div id="navbar-collapse" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="{{URL::to('/')}}">Home</a></li>
              <li class="dropdown">
              <a href="" data-toggle="dropdown" class="dropdown-toggle">Pages</a>
              <ul class="dropdown-menu">                
                <li><a href="{{URL::to('/about')}}">About Us</a></li>
                <li><a href="{{URL::to('/become_volunteer')}}">Become Volunteer</a></li>
                <li><a href="">Contact Us</a></li>
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
                  <li><a href="{{URL::to('/home')}}">My Profile</a></li>
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
      
      @yield('home_content')

      @php
          $general = App\General_setting::orderBy('id','desc')->get();
      @endphp


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
                <p><a href="#" class="btn btn-primary">Donate Now</a></p>
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

        {{-- <div class="probootstrap-copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-8 text-left">
                <p>Test Message:{{$data}}</p>
              </div>
              <div class="col-md-4 probootstrap-back-to-top">
                <p><a href="#" class="js-backtotop">Back to top <i class="icon-arrow-long-up"></i></a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
 --}}
      @endforeach

    <script src="{{ asset('donate_front/js/scripts.min.js') }}"></script>
    <script src="{{ asset('donate_front/js/main.min.js') }}"></script>
    <script src="{{ asset('donate_front/js/custom.js') }}"></script>
    
  </body>
</html>