<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\General_setting;
use App\HTTP\Requests;
use Illuminate\Support\Facades\DB;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $general_setting = General_setting::first()->get();
        
        return view('general_settings.index')->with('general_setting',$general_setting);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Re()sponse
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $general_setting = General_setting::find($id);

        
        return view('general_settings.edit')->with('general_setting',$general_setting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $this->validate($request,[
            'site_name' => 'required|string|max:250',
            'site_des' =>'required|string|max:1000',
            'site_keyword' => 'required|string|max:250',
            'blog_adv' => 'required|string',
            'site_address' => 'required|string|max:250',
            'email' => 'required|email|max:250',
            'phone' => 'required|string|min:7',
            'fb_link' => 'required|string|active_url',
            'twitter_link' => 'required|string',
            'gplus_link' => 'required|string',
            'pin_link' => 'required|string',
            'insta_link' => 'required|string',
            'footer_copyright' => 'required|string|max:250',
            'bg_post_per_page' => 'required|integer',
            'gal_img_per_page' => 'required|integer',
            'cat_per_page' => 'required|string|integer',
            'cam_per_page' => 'required|string|integer',
            'currency' => 'required|string',
            'logo' => 'image|mimes:jpeg,jpg,png|max:1000',
            'favicon' => 'image|mimes:jpeg,jpg,png|max:1000',
            'home_ban' => 'image|mimes:jpeg,jpg,png|max:1000',
            'lt_dn_bg_img' => 'image|mimes:jpeg,jpg,png|max:1000',
            'ani_gif_img' => 'image|mime:gif|max:1000',
            'home_ban_head' => 'required|string|max:250',
            'home_ban_sub_head' => 'required|string|max:250',
            'home_ban_btn_url' => 'required|string|max:250',
            'pg_load_ani' => 'required|string|max:250',
            'ggl_map_api_key' => 'required|string',
            'site_url' => 'required|string|max:250', 
            'dis_home_box' => 'required|integer|max:250',
            'site_pri_col' =>'required|string|max:250',
            'auto_app_cam' => 'required|integer|max:250',
            'min_amount_cam' => 'required|integer',
            'max_amount_cam' => 'required|integer',
            'min_amount_dn' => 'required|integer',
            'max_amount_dn' => 'required|integer',
            //'dis_gl_amount' => '|inte',
            //'dis_ggl_trans' => 'required|integer',

        ]);







        $general_setting=General_setting::find($id);
        $general_setting->site_name = $request->input('site_name');
        $general_setting->site_des = $request->input('site_des');
        $general_setting->site_keyword = $request->input('site_keyword');
        $general_setting->blog_adv = $request->input('blog_adv');
        $general_setting->site_address = $request->input('site_address');
        $general_setting->email = $request->input('email');
        $general_setting->phone = $request->input('phone');
        $general_setting->fb_link = $request->input('fb_link');
        $general_setting->twitter_link = $request->input('twitter_link');
        $general_setting->gplus_link = $request->input('gplus_link');
        $general_setting->pin_link = $request->input('pin_link');
        $general_setting->insta_link = $request->input('insta_link');
        $general_setting->footer_copyright = $request->input('footer_copyright');
        $general_setting->bg_post_per_page = $request->input('bg_post_per_page');
        $general_setting->gal_img_per_page = $request->input('gal_img_per_page');
        $general_setting->cat_per_page = $request->input('cat_per_page');
        $general_setting->cam_per_page = $request->input('cam_per_page');
        $general_setting->currency = $request->input('currency');
        $general_setting->home_ban_head = $request->input('home_ban_head');
        $general_setting->home_ban_sub_head = $request->input('home_ban_sub_head');
        $general_setting->home_ban_btn_text = $request->input('home_ban_btn_text');
        $general_setting->home_ban_btn_url = $request->input('home_ban_btn_url');
        $general_setting->pg_load_ani = $request->input('pg_load_ani');
        $general_setting->ggl_map_api_key = $request->input('ggl_map_api_key');
        $general_setting->site_url = $request->input('site_url');
        $general_setting->dis_home_box = $request->input('dis_home_box');
        $general_setting->site_pri_col = $request->input('site_pri_col');
        $general_setting->auto_app_cam = $request->input('auto_app_cam');
        $general_setting->min_amount_cam = $request->input('min_amount_cam');
        $general_setting->max_amount_cam = $request->input('max_amount_cam');
        $general_setting->min_amount_dn = $request->input('min_amount_dn');
        $general_setting->max_amount_dn = $request->input('max_amount_dn');      
        $general_setting->dis_gl_amount = $request->input('dis_gl_amount');
        $general_setting->dis_ggl_trans = $request->input('dis_ggl_trans');
      
        if($request->hasFile('logo')){
           $logo=$request->file('logo');
           $logo_name= time() .'.'.$logo->getClientOriginalExtension();
           $upload_path='logo/';
           $logo_fullname=$upload_path.$logo_name;
           $logo->move($upload_path,$logo_fullname);       
           $general_setting->logo = $logo_fullname;   
           $general_setting->logo = $logo_fullname;         
       }

        if ($request->hasFile('favicon')) {
        $favicon=$request->file('favicon');
        $favicon_name= time() .'.'.$favicon->getClientOriginalExtension();
        $upload_path='favicon/';
        $favicon_fullname=$upload_path.$favicon_name;
        $favicon->move($upload_path,$favicon_fullname);
        $general_setting->favicon = $favicon_fullname;    
        }
        
        if ($request->hasFile('home_ban')) {
        $home_ban=$request->file('home_ban');
        $home_ban_name= time() .'.'.$home_ban->getClientOriginalExtension();
        $upload_path='home_banner/';
        $home_ban_fullname=$upload_path.$home_ban_name;
        $home_ban->move($upload_path,$home_ban_fullname);
        $general_setting->home_ban = $home_ban_fullname;    
        }
        
        if ($request->hasFile('lt_dn_bg_img')) {
        $lt_dn_bg_img=$request->file('lt_dn_bg_img');
        $lt_dn_bg_img_name= time() .'.'.$lt_dn_bg_img->getClientOriginalExtension();
        $upload_path='latest_donation_image/';
        $lt_dn_bg_img_fullname=$upload_path.$lt_dn_bg_img_name;
        $lt_dn_bg_img->move($upload_path,$lt_dn_bg_img_fullname);
        $general_setting->lt_dn_bg_img = $lt_dn_bg_img_fullname;
        }

        if ($request->hasFile('ani_gif_img')) {
        $ani_gif_img=$request->file('ani_gif_img');
        $ani_gif_img_name= time() .'.'.$ani_gif_img->getClientOriginalExtension();
        $upload_path='animated_gif_image/';
        $ani_gif_img_fullname=$upload_path.$ani_gif_img_name;
        $ani_gif_img->move($upload_path,$ani_gif_img_fullname);
        $general_setting->ani_gif_img = $ani_gif_img_fullname;   
        }
        
    
        $general_setting->update();
        return redirect('/general_settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
     public function __construct()
    {
        $this->middleware('auth');
    }
}
