@extends('layouts.admin_layout')
@section('admin_content')

<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>General Settings</strong>
    </div>
    <div class="card-body card-block">
      <form action="/general_settings" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="row form-group">
          {{ csrf_field() }}
        </div>
        <div class="row form-group">
          <div class="col col-md-3"><label for="site_name" class=" form-control-label"> Site Name</label></div>
          <div class="col-12 col-md-9"><input type="text" id="site_name" name="site_name"  class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="site_des" class=" form-control-label">Site Description</label></div>
          <div class="col-12 col-md-9"><textarea name="site_des" id="site_des" rows="3" class="form-control"></textarea></div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="site_keyword" class=" form-control-label"> Site Keyword</label></div>
          <div class="col-12 col-md-9"><input type="text" id="site_keyword" name="site_keyword"  class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="blog_adv" class=" form-control-label">Blog Advertisement</label></div>
          <div class="col-12 col-md-9"><textarea name="blog_adv" id="blog_adv" rows="3" class="form-control"></textarea></div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="site_address" class=" form-control-label">Site Address</label></div>
          <div class="col-12 col-md-9"><textarea name="site_address" id="site_address" rows="2" class="form-control"></textarea></div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="email" class=" form-control-label"> Email</label></div>
          <div class="col-12 col-md-9"><input type="email" id="email" name="email"  class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="phone" class=" form-control-label"> Phone No</label></div>
          <div class="col-12 col-md-9"><input type="text" id="phone" name="phone"  class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="fb_link" class=" form-control-label"> Facebook Link</label></div>
          <div class="col-12 col-md-9"><input type="text" id="fb_link" name="fb_link"  class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="twitter_link" class=" form-control-label"> Twitter Link</label></div>
          <div class="col-12 col-md-9"><input type="text" id="twitter_link" name="twitter_link"  class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="gplus_link" class=" form-control-label"> Gplus Link</label></div>
          <div class="col-12 col-md-9"><input type="text" id="gplus_link" name="gplus_link"  class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="pin_link" class=" form-control-label"> Pinterest Link</label></div>
          <div class="col-12 col-md-9"><input type="text" id="pin_link" name="pin_link"  class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="insta_link" class=" form-control-label"> Instagram Link</label></div>
          <div class="col-12 col-md-9"><input type="text" id="insta_link" name="insta_link"  class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="footer_copyright" class=" form-control-label"> Footer Copyright</label></div>
          <div class="col-12 col-md-9"><input type="text" id="footer_copyright" name="footer_copyright"  class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="bg_post_per_page" class=" form-control-label"> Blog Post Per Page</label></div>
          <div class="col-12 col-md-9"><input type="number" id="bg_post_per_page" name="bg_post_per_page"  class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="gal_img_per_page" class=" form-control-label"> Gallery Image per Page</label></div>
          <div class="col-12 col-md-9"><input type="number" id="gal_img_per_page" name="gal_img_per_page"  class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="cat_per_page" class=" form-control-label"> Category per Page</label></div>
          <div class="col-12 col-md-9"><input type="number" id="cat_per_page" name="cat_per_page"  class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="cam_per_page" class=" form-control-label"> Campaigns per Page</label></div>
          <div class="col-12 col-md-9"><input type="number" id="cam_per_page" name="cam_per_page"  class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <div class="col col-md-3"><label for="select" class=" form-control-label"> Currency</label></div>
          <div class="col-12 col-md-9">
           <select name="currency" id="currency" class="form-control">
            <option value=""></option>
            <option value="AUD">AUD</option>
            <option value="USD">USD</option>
            <option value="CAD">CAD</option>
          </select>
        </div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="logo" class=" form-control-label"> Logo</label></div>
        <div class="col-12 col-md-9"><input type="file" id="logo" name="logo" class="form-control-file">
        </div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="favicon" class=" form-control-label"> Favicon</label></div>
        <div class="col-12 col-md-9"><input type="file" id="favicon" name="favicon" class="form-control-file">
        </div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="home_ban" class=" form-control-label"> Home Banner</label></div>
        <div class="col-12 col-md-9"><input type="file" id="home_ban" name="home_ban" class="form-control-file">
        </div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="lt_dn_bg_img" class=" form-control-label"> Latest Donations Background Image</label></div>
        <div class="col-12 col-md-9"><input type="file" id="lt_dn_bg_img" name="lt_dn_bg_img" class="form-control-file">
        </div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="home_ban_head" class=" form-control-label"> Home Banner Heading</label></div>
        <div class="col-12 col-md-9"><input type="text" id="home_ban_head" name="home_ban_head"  class="form-control">
        </div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="home_ban_sub_head" class=" form-control-label"> Home Banner Sub Heading</label></div>
        <div class="col-12 col-md-9"><input type="text" id="home_ban_sub_head" name="home_ban_sub_head" class="form-control">
        </div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="home_ban_btn_text" class=" form-control-label"> Home Banner Button Text</label></div>
        <div class="col-12 col-md-9"><input type="text" id="home_ban_btn_text" name="home_ban_btn_text"  class="form-control">
        </div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="home_ban_btn_url" class=" form-control-label"> Home Banner Button URL</label></div>
        <div class="col-12 col-md-9"><input type="text" id="home_ban_btn_url" name="home_ban_btn_url"  class="form-control">
        </div>
      </div>

      <div class="row form-group">
        <div class="col col-md-3"><label for="select" class=" form-control-label"> Page Loading Animation</label></div>
        <div class="col-12 col-md-9">
         <select name="pg_load_ani" id="pg_load_ani" class="form-control">
          <option value=""></option>
          <option value="1">On</option>
          <option value="0">Off</option>
        </select>
      </div>
    </div>

    <div class="row form-group">
      <div class="col col-md-3"><label for="ani_gif_img" class=" form-control-label"> Animated Gif Image</label></div>
      <div class="col-12 col-md-9"><input type="file" id="ani_gif_img" name="ani_gif_img" class="form-control-file">
      </div>
    </div>

    <div class="row form-group">
      <div class="col col-md-3"><label for="ggl_map_api_key" class=" form-control-label"> Google Map API Key</label></div>
      <div class="col-12 col-md-9"><input type="text" id="ggl_map_api_key" name="ggl_map_api_key"  class="form-control">
      </div>
    </div>

    <div class="row form-group">
      <div class="col col-md-3"><label for="site_url" class=" form-control-label"> Site URL </label></div>
      <div class="col-12 col-md-9"><input type="text" id="site_url" name="site_url"  class="form-control">
      </div>
    </div>

    <div class="row form-group ">
    <div class="col col-md-3"><label for="dis_home_box" class=" form-control-label"> Display Home Boxes</label></div>
    <div class="col-12 col-md-9"><input type="checkbox" id="dis_home_box" name="dis_home_box" value="1"></div>
  </div>

    <div class="row form-group">
      <div class="col col-md-3"><label for="site_pri_col" class=" form-control-label"> Site Primary Color</label></div>
      <div class="col-12 col-md-9"><input type="text" id="site_pri_col" name="site_pri_col"  class="form-control">
      </div>
    </div>

    <div class="row form-group">
      <div class="col col-md-3"><label for="select" class=" form-control-label"> Auto approve campaigns</label></div>
      <div class="col-12 col-md-9">
       <select name="auto_app_cam" id="auto_app_cam" class="form-control">
        <option value=""></option>
        <option value="1">On</option>
        <option value="0">Off</option>
      </select>
    </div>
  </div>

  <div class="row form-group">
    <div class="col col-md-3"><label for="site_pri_col" class=" form-control-label"> Site Primary Color</label></div>
    <div class="col-12 col-md-9"><input type="text" id="site_pri_col" name="site_pri_col"  class="form-control">
    </div>
  </div>

  <div class="row form-group">
    <div class="col col-md-3"><label for="min_amount_cam" class=" form-control-label"> Minimum amount for campaign</label></div>
    <div class="col-12 col-md-9"><input type="number" id="min_amount_cam" name="min_amount_cam"  class="form-control">
    </div>
  </div>

  <div class="row form-group">
    <div class="col col-md-3"><label for="max_amount_cam" class=" form-control-label"> Maximum amount for campaign</label></div>
    <div class="col-12 col-md-9"><input type="number" id="max_amount_cam" name="max_amount_cam"  class="form-control">
    </div>
  </div>

  <div class="row form-group">
    <div class="col col-md-3"><label for="min_amount_dn" class=" form-control-label"> Minimum Amount for donation</label></div>
    <div class="col-12 col-md-9"><input type="number" id="min_amount_dn" name="min_amount_dn"  class="form-control">
    </div>
  </div>

  <div class="row form-group">
    <div class="col col-md-3"><label for="max_amount_dn" class=" form-control-label"> Maximum Amount for donation</label></div>
    <div class="col-12 col-md-9"><input type="number" id="max_amount_dn" name="max_amount_dn"  class="form-control">
    </div>
  </div>

  <div class="row form-group ">
    <div class="col col-md-3"><label for="dis_gl_amount" class=" form-control-label"> Display Goal Amount</label></div>
    <div class="col-12 col-md-9"><input type="checkbox" id="dis_gl_amount" name="dis_gl_amount" value="1"></div>
  </div>

  <div class="row form-group ">
    <div class="col col-md-3"><label for="dis_ggl_trans" class=" form-control-label"> Display Google Translate</label></div>
    <div class="col-12 col-md-9"><input type="checkbox" id="dis_ggl_trans" name="dis_ggl_trans" value="1"></div>
  </div>





  <div class="card-footer">
    <button type="submit" class="btn btn-primary btn-sm">
      <i class="fa fa-dot-circle-o"></i> Submit
    </button>
  </div>
</div>



@endsection