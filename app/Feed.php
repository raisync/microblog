<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $fillable = ['feed', 'user_id'];

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
