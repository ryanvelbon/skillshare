<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	public function users(){
		return $this->belongsToMany('App\User');
	}

	public function listings(){
		return $this->belongsToMany('App\Listing');
	}
}
