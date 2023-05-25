<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model {
	use SoftDeletes,BeasModel;
	protected $table = 'device';
	protected $guarded = [];

	protected function serializeDate(\DateTimeInterface $date) {
		return $date->format($this->dateFormat ?: 'Y-m-d H:i');
	}
	public function vehicle(){
		return $this->belongsTo(Vehicles::class,'id','device_id');
	}
}
