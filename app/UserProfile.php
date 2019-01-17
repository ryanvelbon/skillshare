<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
	protected $fillable = [
        'user_id', 'date_of_birth', 'craft_id', 'location_id',
    ];

    public function user()
    {
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

    public $timestamps = false;
    // public $incrementing = false;
    // protected $primaryKey = 'user_id'; // actually user_id cannot be made PK because it's a FK
}