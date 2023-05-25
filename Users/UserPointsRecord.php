<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPointsRecord extends Model
{
    //用户积分记录表
    use SoftDeletes,BeasModel;

    protected $guarded = [];
    protected $table = 'user_points_record';
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
}





?>