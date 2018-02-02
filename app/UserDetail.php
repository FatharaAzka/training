<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    //
    protected $fillable = [
    	'user_id','jk','no_telp','alamat','avatar','file_cv','status',
	];

	public function users() {
		return $this->belongsTo('App\User','id');
	}
}
