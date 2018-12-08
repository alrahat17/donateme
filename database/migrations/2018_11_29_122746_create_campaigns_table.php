<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cam_name');
            $table->string('cam_loc');
            $table->string('cam_img');
            $table->text('cam_des')->nullable();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('funds_raised')->default(0);
            $table->integer('goal');
            $table->string('cam_status')->default(1);
            $table->integer('approve_cam')->default(0);
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
        Schema::dropIfExists('campaigns');
    }
}
