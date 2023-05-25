<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RateCard extends Model {
	use SoftDeletes,BeasModel;
	protected $table = 'rate_card';
	protected $guarded = [];

	
	protected function serializeDate(\DateTimeInterface $date) {
		return $date->format($this->dateFormat ?: 'Y-m-d H:i');
	}
}
