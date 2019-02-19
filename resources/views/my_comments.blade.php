@extends('layouts.home_layout')
@section('home_content')

<section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(donate_front/img/hero_bg_bw_1.jpg); height:380px; width:1349px;"  data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
            <h1 class="probootstrap-heading probootstrap-animate">My Comments </h1>
        </div>
    </div>
</div>
</div>
</section>

<section class="probootstrap-section">
    <div class="container">
      <div class="row">
      <div class="col-md-3 probootstrap-animate">     
      <ul class="nav nav-pills nav-stacked">
        <li class="{{ Request::is('home') ? 'active' : '' }}" style="color: red;"><a href="{{URL::to('/home')}}">My Profile</a></li>
        <li class="{{ Request::is('my_comments') ? 'active' : '' }}"><a href="{{URL::to('/my_comments')}}">My Comments</a></li>
        <li class="{{ Request::is('my_campaigns') ? 'active' : '' }}"><a href="{{URL::to('/my_campaigns')}}">My Campaigns</a></li>
        <li class="{{ Request::is('my_donations') ? 'active' : '' }}"><a href="{{URL::to('/my_donations')}}">My Donations</a></li>
        <li class="{{ Request::is('my_withdrawals') ? 'active' : '' }}"><a href="{{URL::to('/my_withdrawals')}}">My Withdrawals</a></li>
        <li><a href="{{URL::to('/logout')}}">Logout</a></li>
      </ul>
  </div>

  <div class="col-md-9 well admin-content">
  	 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingoff">
                    <!-- Advanced Tables -->
                   
                        
                   
				<table id="dataTables-example" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>SNo</th>
							<th>Post Title</th>
							<th>Your Comment</th>
							<th>Date</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
          <tbody>
            @foreach ($comments as $key => $comment)
            <tr>
              <td>{{$key +1}}</td>
              <td>{{isset($comment->blog->title) ? $comment->blog->title : "Post removed!"}}</td>
              <td>{{$comment->message}}</td>
              <td>{{$comment->created_at}}</td>
              <td>
                @if($comment->status==1)
                    <span style="color:#0DB053; font-weight:bold;">Active</span>
                @else
                     <span style="color:#CB2027; font-weight:bold;">Pending</span>
                @endif
              </td>
              <td>
                <a class="delete_comment" href="/delete_my_comment/{{$comment->id  }}">
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button> 
                </a>               
              </td>
            </tr>
             @endforeach
          </tbody>	

				</table>

			</div>
         

    
</div>
</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

      @include('sweet::alert')



@endsection