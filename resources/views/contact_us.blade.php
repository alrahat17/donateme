@extends('layouts.home_layout')
@section('home_content')
@include('sweet::alert')

<style>
      /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
      #map {
        height:380px; 
        width:1349px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>


    <section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(/donate_front/img/hero_bg_bw_1.jpg); height:380px; width:1349px;"  data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
              <h1 class="probootstrap-heading probootstrap-animate">Contact Us </h1>
            </div>
          </div>
        </div>
      </div>
    </section>

<div id="map"></div>


 @foreach($general as $gen)
 

 @php
   $location = $gen->site_address;
   $google_map_key = $gen->ggl_map_api_key;
 @endphp
  






  <section class="probootstrap-section">
    <div class="container">
      <div class="row">
        <div class="col-md-5 probootstrap-animate">
          <form action="{{url('/save_contact_message')}}" method="post" class="probootstrap-form">
            @csrf
            <div class="form-group">
              <label for="name">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="eg. John Doe">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="eg. info@uicookies.com">
            </div>
            <div class="form-group">
              <label for="phone">Phone No</label>
              <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group">
              <label for="message">Note</label>
              <textarea cols="30" rows="10" class="form-control" id="message" name="message" placeholder="eg. This donation is for the children who needs food."></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit" value="Send">
            </div>
          </form>
        </div>

        <div class="col-md-6 col-md-push-1 probootstrap-animate">


          <h4>Our Office</h4>
         
          <ul class="probootstrap-contact-info">
            <li><i class="icon-pin"></i> <span>{{$gen->site_address}}</span></li>
            <li><i class="icon-email"></i><span>{{$gen->email}}</span></li>
            <li><i class="icon-phone"></i><span>+{{$gen->phone}}</span></li>
          </ul>
          @endforeach

        </div>

      </div>
    </div>
  </section>

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9x8mCn5-P8XUl59uGqwmmcU6Alt1qza8&callback=initMap"
    async defer></script>
  

   <script type="text/javascript">

    var map;
        function initMap() {

          var location = "<?php echo $location; ?>";
          var google_map_key = "<?php echo $google_map_key; ?>"

      axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
        params:{
          address:location,
          key:google_map_key,
        }
      })
      .then(function(response){
        // Log full response
        console.log(response);

        // Geometry
        var lat = response.data.results[0].geometry.location.lat;
        var lng = response.data.results[0].geometry.location.lng;

        var geometryOutput = new google.maps.Map(document.getElementById('map'), {
            center: {lat: lat, lng: lng},
            zoom: 8
          });

        // Output to app
        document.getElementById('geometry').innerHTML = geometryOutput;
       
      })
      .catch(function(error){
        console.log(error);
      });


     }

  </script>   
    

   
  @endsection