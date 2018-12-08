<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{	
	// protected $primaryKey = 'cat_id';
    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function donation(){
    	return $this->hasMany('App\Donation');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
