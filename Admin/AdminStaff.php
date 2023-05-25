<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminStaff extends Model
{
    use SoftDeletes;
    
    protected  $guarded = [];

    // 指定表名(不知道为啥生成的表laravel去找不带S的)
    protected $table = 'admin_staffs';

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }

  	public function role()
  	{
      	return $this->belongsTo(AdminRole::class, 'role_id');
  	}

  	public function account()
  	{
      	return $this->hasOne(Admin::class, 'staff_id', 'id');
  	}
    public function admin()
    {
        return $this->hasOne(Admin::class, 'staff_id', 'id');
    }

}
