<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'craft_id', 'location_id',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function craft()
    {
        return $this->hasOne('App\Craft');
    }

    public function location()
    {
        return $this->hasOne('App\Location');
    }

    public function topics(){
        return $this->belongsToMany('App\Topic');
    }

    public function skills(){
        return $this->belongsToMany('App\Skill');
    }
}
