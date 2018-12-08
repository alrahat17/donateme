@extends('layouts.admin_layout')
@section('admin_content')

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>General Settings</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{url('/general_settings/'.$general_setting->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal" id="genForm">
        <div class="row form-group">
          {{ csrf_field() }}
          {{method_field('PUT')}}
        </div>
        
        <div class="row form-group">
          <div class="col col-md-3"><label for="site_name" class=" form-control-label"> Site Name <span>*</span></label></div>
          <div class="col-12 col-md-9"><input type="text" id="site_name" name="site_name"  class="form-control{{ $errors->has('site_name') ? ' is-invalid' : '' }}" value="{{$general_setting->site_name}}" minlength="5">
             @if ($errors->has('site_name'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('site_name') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="site_des" class=" form-control-label">Site Description <span>*</span></label></div>
          <div class="col-12 col-md-9"><textarea name="site_des" id="site_des" rows="3" class="form-control{{ $errors->has('site_des') ? ' is-invalid' : '' }}" minlength="10">{{$general_setting->site_des}}</textarea>
             @if ($errors->has('site_des'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('site_des') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="site_keyword" class=" form-control-label"> Site Keyword <span>*</span></label></div>
          <div class="col-12 col-md-9"><input type="text" id="site_keyword" name="site_keyword"  class="form-control{{ $errors->has('site_keyword') ? ' is-invalid' : '' }}" value="{{$general_setting->site_keyword}}" minlength="3">
             @if ($errors->has('site_keyword'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('site_keyword') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="blog_adv" class=" form-control-label">Blog Advertisement <span>*</span></label></div>
          <div class="col-12 col-md-9"><textarea name="blog_adv" id="blog_adv" rows="3" class="form-control{{ $errors->has('blog_adv') ? ' is-invalid' : '' }}" minlength="5">{{$general_setting->blog_adv}}</textarea>
           @if($errors->has('blog_adv'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('blog_adv') }}</strong>
              </span>
            @endif</div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="site_address" class=" form-control-label">Site Address <span>*</span></label></div>
          <div class="col-12 col-md-9"><textarea name="site_address" id="site_address" rows="2" class="form-control{{ $errors->has('site_address') ? ' is-invalid' : '' }}" minlength="5">{{$general_setting->site_address}}</textarea>
            @if ($errors->has('site_address'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('site_address') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="email" class=" form-control-label"> Email <span>*</span></label></div>
          <div class="col-12 col-md-9"><input type="email" id="email" name="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{$general_setting->email}}" required autofocus>
          @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif 
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="phone" class=" form-control-label"> Phone No <span>*</span></label></div>
          <div class="col-12 col-md-9"><input type="text" id="phone" name="phone"  class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{$general_setting->phone}}" minlength="7">
            @if ($errors->has('phone'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('phone') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="fb_link" class=" form-control-label"> Facebook Link</label></div>
          <div class="col-12 col-md-9"><input type="text" id="fb_link" name="fb_link"  class="form-control{{ $errors->has('fb_link') ? ' is-invalid' : '' }}" value="{{$general_setting->fb_link}}">
            @if ($errors->has('fb_link'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('fb_link') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="twitter_link" class=" form-control-label"> Twitter Link</label></div>
          <div class="col-12 col-md-9"><input type="text" id="twitter_link" name="twitter_link"  class="form-control{{ $errors->has('twitter_link') ? ' is-invalid' : '' }}" value="{{$general_setting->twitter_link}}">
            @if ($errors->has('twitter_link'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('twitter_link') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="gplus_link" class=" form-control-label"> Gplus Link</label></div>
          <div class="col-12 col-md-9"><input type="text" id="gplus_link" name="gplus_link"  class="form-control{{ $errors->has('gplus_link') ? ' is-invalid' : '' }}" value="{{$general_setting->gplus_link}}">
            @if ($errors->has('gplus_link'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('gplus_link') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="pin_link" class=" form-control-label"> Pinterest Link</label></div>
          <div class="col-12 col-md-9"><input type="text" id="pin_link" name="pin_link"  class="form-control{{ $errors->has('pin_link') ? ' is-invalid' : '' }}" value="{{$general_setting->pin_link}}">
            @if ($errors->has('pin_link'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('pin_link') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="insta_link" class=" form-control-label"> Instagram Link</label></div>
          <div class="col-12 col-md-9"><input type="text" id="insta_link" name="insta_link"  class="form-control{{ $errors->has('insta_link') ? ' is-invalid' : '' }}" value="{{$general_setting->insta_link}}">
            @if ($errors->has('insta_link'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('insta_link') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="footer_copyright" class=" form-control-label"> Footer Copyright <span>*</span></label></div>
          <div class="col-12 col-md-9"><input type="text" id="footer_copyright" name="footer_copyright"  class="form-control{{ $errors->has('footer_copyright') ? ' is-invalid' : '' }}" value="{{$general_setting->footer_copyright}}">
            @if ($errors->has('footer_copyright'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('footer_copyright') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="bg_post_per_page" class=" form-control-label"> Blog Post Per Page <span>*</span></label></div>
          <div class="col-12 col-md-9"><input type="number" id="bg_post_per_page" name="bg_post_per_page"  class="form-control{{ $errors->has('bg_post_per_page') ? ' is-invalid' : '' }}" value="{{$general_setting->bg_post_per_page}}">
            @if ($errors->has('bg_post_per_page'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('bg_post_per_page') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="gal_img_per_page" class=" form-control-label"> Gallery Image per Page <span>*</span></label></div>
          <div class="col-12 col-md-9"><input type="number" id="gal_img_per_page" name="gal_img_per_page"  class="form-control{{ $errors->has('cat_name') ? ' is-invalid' : '' }}" value="{{$general_setting->gal_img_per_page}}">
            @if ($errors->has('gal_img_per_page'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('gal_img_per_page') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="cat_per_page" class=" form-control-label"> Category per Page <span>*</span></label></div>
          <div class="col-12 col-md-9"><input type="number" id="cat_per_page" name="cat_per_page"  class="form-control{{ $errors->has('cat_per_page') ? ' is-invalid' : '' }}" value="{{$general_setting->cat_per_page}}">
            @if ($errors->has('cat_per_page'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('cat_per_page') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="cam_per_page" class=" form-control-label"> Campaigns per Page <span>*</span></label></div>
          <div class="col-12 col-md-9"><input type="number" id="cam_per_page" name="cam_per_page"  class="form-control{{ $errors->has('cam_per_page') ? ' is-invalid' : '' }}" value="{{$general_setting->cam_per_page}}">
            @if ($errors->has('cam_per_page'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('cam_per_page') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="select" class=" form-control-label"> Currency <span>*</span></label></div>
          <div class="col-12 col-md-9">
           <select name="currency" id="currency" class="form-control{{ $errors->has('currency') ? ' is-invalid' : '' }}">
            <option {{ $general_setting->currency == 'AUD' ? 'selected':'' }} value="AUD">AUD</option>
            <option {{ $general_setting->currency == 'USD' ? 'selected':'' }} value="USD">USD</option>
            <option {{ $general_setting->currency == 'CAD' ? 'selected':'' }} value="CAD">CAD</option>
          </select>
          @if ($errors->has('currency'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('currency') }}</strong>
              </span>
            @endif
        </div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="logo" class=" form-control-label"> Logo <span>*</span></label></div>
        <div class="col-12 col-md-9"><input type="file" id="logo" name="logo" class="form-control-file{{ $errors->has('logo') ? ' is-invalid' : '' }}">
          
          <h6><small>[Logo size must not be more than 1 MB</small></h6>
          @if ($errors->has('logo'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('logo') }}</strong>
              </span>
            @endif
            <br>
          <img src="{{URL::to($general_setting->logo)}}" class="thumb" width="100">
        </div>

      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="favicon" class=" form-control-label"> Favicon <span>*</span></label></div>
        <div class="col-12 col-md-9"><input type="file" id="favicon" name="favicon" class="form-control-file{{ $errors->has('favicon') ? ' is-invalid' : '' }}">
          <h6><small>[Favicon size must not be more than 1 MB]</small></h6>
          @if ($errors->has('favicon'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('favicon') }}</strong>
              </span>
            @endif
            <br>
          <img src="{{URL::to($general_setting->favicon)}}" class="thumb" style="border:1px solid #CCCCCC;" width="72">
        </div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="home_ban" class=" form-control-label"> Home Banner <span>*</span></label></div>
        <div class="col-12 col-md-9"><input type="file" id="home_ban" name="home_ban" class="form-control-file{{ $errors->has('home_ban') ? ' is-invalid' : '' }}">
          <h6><small>[Home Banner size must not be more than 1 MB]</small></h6>
          @if ($errors->has('home_ban'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('home_ban') }}</strong>
              </span>
            @endif
            <br>
        <img src="{{URL::to($general_setting->home_ban)}}" class="thumb" style="border:1px solid #CCCCCC;" width="150">
        </div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="lt_dn_bg_img" class=" form-control-label"> Latest Donations Background Image <span>*</span></label></div>
        <div class="col-12 col-md-9"><input type="file" id="lt_dn_bg_img" name="lt_dn_bg_img" class="form-control-file{{ $errors->has('lt_dn_bg_img') ? ' is-invalid' : '' }}">
          <h6><small>[Image size must not be more than 1 MB]</small></h6>
          @if ($errors->has('lt_dn_bg_img'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('lt_dn_bg_img') }}</strong>
              </span>
            @endif
            <br>
        <img src="{{URL::to($general_setting->lt_dn_bg_img)}}" class="thumb" style="border:1px solid #CCCCCC;" width="150">
        </div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="home_ban_head" class=" form-control-label"> Home Banner Heading</label></div>
        <div class="col-12 col-md-9"><input type="text" id="home_ban_head" name="home_ban_head"  class="form-control{{ $errors->has('home_ban_head') ? ' is-invalid' : '' }}" value="{{$general_setting->home_ban_head}}">
          @if ($errors->has('home_ban_head'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('home_ban_head') }}</strong>
              </span>
            @endif
        </div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="home_ban_sub_head" class=" form-control-label"> Home Banner Sub Heading</label></div>
        <div class="col-12 col-md-9"><input type="text" id="home_ban_sub_head" name="home_ban_sub_head" class="form-control{{ $errors->has('home_ban_sub_head') ? ' is-invalid' : '' }}" value="{{$general_setting->home_ban_sub_head}}">
          @if ($errors->has('home_ban_sub_head'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('home_ban_sub_head') }}</strong>
              </span>
            @endif
        </div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="home_ban_btn_text" class=" form-control-label"> Home Banner Button Text</label></div>
        <div class="col-12 col-md-9"><input type="text" id="home_ban_btn_text" name="home_ban_btn_text"  class="form-control{{ $errors->has('home_ban_btn_text') ? ' is-invalid' : '' }}" value="{{$general_setting->home_ban_btn_text}}">
          @if ($errors->has('home_ban_btn_text'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('home_ban_btn_text') }}</strong>
              </span>
            @endif
        </div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="home_ban_btn_url" class=" form-control-label"> Home Banner Button URL</label></div>
        <div class="col-12 col-md-9"><input type="text" id="home_ban_btn_url" name="home_ban_btn_url"  class="form-control{{ $errors->has('home_ban_btn_url') ? ' is-invalid' : '' }}" value="{{$general_setting->home_ban_btn_url}}">
          @if ($errors->has('home_ban_btn_url'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('home_ban_btn_url') }}</strong>
              </span>
            @endif
        </div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="select" class=" form-control-label"> Page Loading Animation</label></div>
        <div class="col-12 col-md-9">
         <select name="pg_load_ani" id="pg_load_ani" class="form-control{{ $errors->has('pg_load_ani') ? ' is-invalid' : '' }}">
          <option {{ $general_setting->pg_load_ani == 0 ? 'selected':'' }} value="0">Off</option>
          <option {{ $general_setting->pg_load_ani == 1 ? 'selected':'' }} value="1">On</option>
            
        </select>
        @if ($errors->has('pg_load_ani'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('pg_load_ani') }}</strong>
              </span>
            @endif
      </div>
    </div>

    <div class="row form-group">
      <div class="col col-md-3"><label for="ani_gif_img" class=" form-control-label"> Animated Gif Image</label></div>
      <div class="col-12 col-md-9"><input type="file" id="ani_gif_img" name="ani_gif_img" class="form-control-file{{ $errors->has('ani_gif_img') ? ' is-invalid' : '' }}">
        <h6><small>[Gif only.Size must not be more than 1 MB]</small></h6>
        @if($errors->has('ani_gif_img'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('ani_gif_img') }}</strong>
              </span>
        @endif
        <br>
      <img src="{{URL::to($general_setting->ani_gif_img)}}" class="thumb" width="100">
      </div>
    </div>

    <div class="row form-group">
      <div class="col col-md-3"><label for="ggl_map_api_key" class=" form-control-label"> Google Map API Key <span>*</span></label></div>
      <div class="col-12 col-md-9"><input type="text" id="ggl_map_api_key" name="ggl_map_api_key"  class="form-control{{ $errors->has('ggl_map_api_key') ? ' is-invalid' : '' }}" value="{{$general_setting->ggl_map_api_key}}">
         @if($errors->has('ggl_map_api_key'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('ggl_map_api_key') }}</strong>
              </span>
        @endif
      </div>
    </div>

    <div class="row form-group">
      <div class="col col-md-3"><label for="site_url" class=" form-control-label"> Site URL <span>*</span></label></div>
      <div class="col-12 col-md-9"><input type="text" id="site_url" name="site_url"  class="form-control{{ $errors->has('site_url') ? ' is-invalid' : '' }}" value="{{$general_setting->site_url}}">
        <h6><small>( ex : http://www.yoursite.com/ )</small></h6>

        @if($errors->has('site_url'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('site_url') }}</strong>
              </span>
        @endif
      </div>
    </div>

    <div class="row form-group ">
    <div class="col col-md-3"><label for="dis_home_box" class=" form-control-label"> Display Home Boxes <span>*</span></label></div>
    <div class="col-12 col-md-9">
      <input type="hidden" id="dis_home_box" name="dis_home_box" value="0" >
      <input type="checkbox" id="dis_home_box" name="dis_home_box" {{ $general_setting->dis_home_box == 1 ? 'checked':'' }} value="1">

    </div>
  </div>

    <div class="row form-group">
      <div class="col col-md-3"><label for="site_pri_col" class=" form-control-label"> Site Primary Color</label></div>
      <div class="col-12 col-md-9"><input type="text" id="site_pri_col" name="site_pri_col"  class="form-control{{ $errors->has('site_pri_col') ? ' is-invalid' : '' }}" value="{{$general_setting->site_pri_col}}">
        <h6><small>(ex : #000000)</small></h6>
         @if($errors->has('site_pri_col'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('site_pri_col') }}</strong>
              </span>
        @endif
      </div>
    </div>

    <div class="row form-group">
      <div class="col col-md-3"><label for="select" class="form-control-label"> Auto approve campaigns</label></div>
      <div class="col-12 col-md-9">
       <select name="auto_app_cam" id="auto_app_cam" class="form-control{{ $errors->has('auto_app_cam') ? ' is-invalid' : '' }}">
        <option {{ $general_setting->auto_app_cam == 0 ? 'selected':'' }} value="0">Off</option>
        <option {{ $general_setting->auto_app_cam == 1 ? 'selected':'' }} value="1">On</option>            
      </select>
       @if($errors->has('auto_app_cam'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('auto_app_cam') }}</strong>
              </span>
        @endif
    </div>
  </div>

  <div class="row form-group">
    <div class="col col-md-3"><label for="min_amount_cam" class=" form-control-label"> Minimum amount for campaign</label></div>
    <div class="col-12 col-md-9"><input type="number" id="min_amount_cam" name="min_amount_cam"  class="form-control{{ $errors->has('min_amount_cam') ? ' is-invalid' : '' }}" value="{{$general_setting->min_amount_cam}}">
       @if($errors->has('min_amount_cam'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('min_amount_cam') }}</strong>
              </span>
        @endif
    </div>
  </div>

  <div class="row form-group">
    <div class="col col-md-3"><label for="max_amount_cam" class=" form-control-label"> Maximum amount for campaign</label></div>
    <div class="col-12 col-md-9"><input type="number" id="max_amount_cam" name="max_amount_cam"  class="form-control{{ $errors->has('max_amount_cam') ? ' is-invalid' : '' }}" value="{{$general_setting->max_amount_cam}}">
       @if($errors->has('max_amount_cam'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('max_amount_cam') }}</strong>
              </span>
        @endif
    </div>
  </div>

  <div class="row form-group">
    <div class="col col-md-3"><label for="min_amount_dn" class=" form-control-label"> Minimum Amount for donation</label></div>
    <div class="col-12 col-md-9"><input type="number" id="min_amount_dn" name="min_amount_dn"  class="form-control{{ $errors->has('min_amount_dn') ? ' is-invalid' : '' }}" value="{{$general_setting->min_amount_dn}}">
       @if($errors->has('min_amount_dn'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('min_amount_dn') }}</strong>
              </span>
        @endif
    </div>
  </div>

  <div class="row form-group">
    <div class="col col-md-3"><label for="max_amount_dn" class=" form-control-label"> Maximum Amount for donation</label></div>
    <div class="col-12 col-md-9"><input type="number" id="max_amount_dn" name="max_amount_dn"  class="form-control{{ $errors->has('max_amount_dn') ? ' is-invalid' : '' }}" value="{{$general_setting->max_amount_dn}}">
       @if($errors->has('max_amount_dn'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('max_amount_dn') }}</strong>
              </span>
      @endif
    </div>
  </div>

  <div class="row form-group ">
    <div class="col col-md-3"><label for="dis_gl_amount" class=" form-control-label"> Display Goal Amount</label></div>
    <div class="col-12 col-md-9">
      <input type="hidden" id="dis_gl_amount" name="dis_gl_amount" value="0" >
      <input type="checkbox" id="dis_gl_amount" name="dis_gl_amount" {{ $general_setting->dis_gl_amount == 1 ? 'checked':'' }} value="1">
    </div>
  </div>

  <div class="row form-group ">
    <div class="col col-md-3"><label for="dis_ggl_trans" class=" form-control-label"> Display Google Translate</label></div>
    <div class="col-12 col-md-9">
      <input type="hidden" id="dis_ggl_trans" name="dis_ggl_trans" value="0" >
      <input type="checkbox" id="dis_ggl_trans" name="dis_ggl_trans" {{ $general_setting->dis_ggl_trans == 1 ? 'checked':'0' }} value="1">     
    </div>
  </div>





  <div class="card-footer">
    <button type="submit" class="btn btn-primary btn-sm">
      <i class="fa fa-dot-circle-o"></i> Submit
    </button>
  </div>
</div>


<script src="https://code.jquery.com/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/additional-methods.min.js"></script>
<script type="text/javascript">
  $("#genForm").validate({
    rules:{
      favicon:{
         accept:"jpg,png,jpeg",
      }
      
    }
  });        
</script>



@endsection