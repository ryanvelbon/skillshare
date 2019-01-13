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

    public function interests(){
        return $this->hasMany('App\Topic');
    }

    public $timestamps = false;
    // public $incrementing = false;
    // protected $primaryKey = 'user_id'; // actually user_id cannot be made PK because it's a FK
}