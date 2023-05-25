<?php

namespace App\Models\Device;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin;

class AdminVehicleOperate extends Model
{
    use HasFactory, SoftDeletes;

	protected function serializeDate(\DateTimeInterface $date) {
		return $date->format($this->dateFormat ?: 'Y-m-d H:i');
	}

    // 操作人
    public function admin()
    {
        return $this->hasOne(Admin::class, 'id', 'uid');
    }
}
