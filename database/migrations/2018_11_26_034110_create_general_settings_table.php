<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name');
            $table->text('site_des');
            $table->string('site_keyword');
            $table->text('blog_adv');
            $table->text('site_address');
            $table->string('email');
            $table->string('phone');
            $table->string('fb_link');
            $table->string('twitter_link');
            $table->string('gplus_link');
            $table->string('pin_link');
            $table->string('insta_link');
            $table->string('footer_copyright');
            $table->integer('bg_post_per_page');
            $table->integer('gal_img_per_page');
            $table->integer('cat_per_page');
            $table->integer('cam_per_page');
            $table->string('currency');
            $table->string('logo');
            $table->string('favicon');
            $table->string('home_ban');
            $table->string('lt_dn_bg_img');
            $table->string('home_ban_head');
            $table->string('home_ban_sub_head');
            $table->string('home_ban_btn_text');
            $table->string('home_ban_btn_url');
            $table->string('pg_load_ani');
            $table->string('ani_gif_img');
            $table->string('ggl_map_api_key');
            $table->string('site_url');
            $table->integer('dis_home_box');
            $table->string('site_pri_col');
            $table->integer('auto_app_cam');
            $table->integer('min_amount_cam');
            $table->integer('max_amount_cam');
            $table->integer('min_amount_dn');
            $table->integer('max_amount_dn');
            $table->integer('dis_gl_amount');
            $table->integer('dis_ggl_trans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_settings');
    }
}
