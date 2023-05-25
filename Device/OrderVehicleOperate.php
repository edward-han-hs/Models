<?php

namespace App\Models\Device;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderVehicleOperate extends Model
{
    use HasFactory, SoftDeletes;
    
	protected function serializeDate(\DateTimeInterface $date) {
		return $date->format($this->dateFormat ?: 'Y-m-d H:i');
	}
}
