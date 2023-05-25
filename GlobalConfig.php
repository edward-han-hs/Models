<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GlobalConfig extends Model
{
    protected $table = "global_config";
    public $select = [
        'id','tax','cwd','order_out_time','mileage_fee','forty_eight_overtime_fee','twenty_four_years_ago','zero_hours_ago'
    ];
    const SELECT = ['id','tax','cwd','order_out_time','mileage_fee','forty_eight_overtime_fee','paid',
    'twenty_four_years_ago','zero_hours_ago','paid','delay_time','reserve_time','level_reset','referral_jackpot_point'];
    use HasFactory,BeasModel,SoftDeletes;
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }

    //获取全部
     public static function getConfigAll(){
        return self::select(self::SELECT)->first()?->toArray();
    }
    //获取单一值
    public  static function getValue(string $field,$where=['id'=>1]){
        return self::where($where)->value($field);
    }
}
