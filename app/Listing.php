<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'skill_id', 'location_id',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function skill()
    {
        return $this->hasOne('App\Skill');
    }

    public function location()
    {
        return $this->hasOne('App\Location');
    }
}
