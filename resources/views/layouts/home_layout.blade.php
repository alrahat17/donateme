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
            <a class="navbar-brand" href="index.html" title="uiCookies:Enlight">Enlight</a>
          </div>

          <div id="navbar-collapse" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="{{URL::to('/')}}">Home</a></li>
              <li><a href="{{URL::to('/about')}}">About Us</a></li>
              <li><a href="{{URL::to('/all_blogs')}}">Blogs</a></li>
              <li><a href="{{URL::to('/all_campaigns')}}">Campaigns</a></li>
              <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Categories</a>
                <ul class="dropdown-menu">
                  @php
                    $categories = App\Category::orderBy('id','desc')->get();
                  @endphp
                   @foreach ($categories as $category)
                  <li><a href="/campaign_by_category/{{$category->id}}">{{$category->cat_name}}</a></li>
                  @endforeach 
                  <li><a href="{{URL::to('/all_categories')}}">View All</a></li>                 
               </ul>
              </li>
              <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">My Account</a>
                <ul class="dropdown-menu">
                  @if (Auth::check())
                  <li><a href="{{URL::to('/logout')}}">Logout</a></li>
                  @else
                  <li><a href="{{URL::to('/login')}}">Login</a></li>
                  <li><a href="{{URL::to('/register')}}">Register</a></li>
                  @endif
                  
                </ul>
              </li>
              
              <li class="probootstra-cta-button last"><a href="{{URL::to('/create_campaign')}}" class="btn btn-primary">Create Campaign</a></li>
              <li class="probootstra-cta-button last"><a href="{{URL::to('/create_donation')}}" class="btn btn-primary">Donate Now</a></li>
            </ul>
          </div>
        </div>
      </nav>
      
      @yield('home_content')

      <footer class="probootstrap-footer probootstrap-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-4 probootstrap-animate">
              <div class="probootstrap-footer-widget">
                <h3>About Us</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro provident suscipit natus a cupiditate ab minus illum quaerat maxime inventore Ea consequatur consectetur hic provident dolor ab aliquam eveniet alias</p>
                <ul class="probootstrap-footer-social">
                  <li><a href="#"><i class="icon-twitter"></i></a></li>
                  <li><a href="#"><i class="icon-facebook"></i></a></li>
                  <li><a href="#"><i class="icon-github"></i></a></li>
                  <li><a href="#"><i class="icon-dribbble"></i></a></li>
                  <li><a href="#"><i class="icon-linkedin"></i></a></li>
                  <li><a href="#"><i class="icon-youtube"></i></a></li>
                </ul>
              </div>
            </div>
           
            <div class="col-md-4 probootstrap-animate">
              <div class="probootstrap-footer-widget">
                <h3>Contact Info</h3>
                <ul class="probootstrap-contact-info">
                  <li><i class="icon-location2"></i> <span>198 West 21th Street, Suite 721 New York NY 10016</span></li>
                  <li><i class="icon-mail"></i><span>info@domain.com</span></li>
                  <li><i class="icon-phone2"></i><span>+123 456 7890</span></li>
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
                <p>&copy; 2017 <a href="https://uicookies.com/">Charity</a>. All Rights Reserved. Designed &amp; Developed with <i class="icon icon-heart"></i> by <a href="https://uicookies.com/">uicookies.com</a></p>
              </div>
              <div class="col-md-4 probootstrap-back-to-top">
                <p><a href="#" class="js-backtotop">Back to top <i class="icon-arrow-long-up"></i></a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>

    <script src="{{ asset('donate_front/js/scripts.min.js') }}"></script>
    <script src="{{ asset('donate_front/js/main.min.js') }}"></script>
    <script src="{{ asset('donate_front/js/custom.js') }}"></script>
    
  </body>
</html>