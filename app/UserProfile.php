<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
	protected $fillable = [
        'user_id', 'date_of_birth', 'city',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public $timestamps = false;
}