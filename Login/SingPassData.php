<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;;

class SingPassData extends Model
{
    protected $table = "user_singpass_data";

    use SoftDeletes,BeasModel;
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
    /**
     * 获取用户下的 singpass数据
     */
    public static function getOne($uuid){
       $data =  self::where('uuid',$uuid)->select(['id','singpass','status'])->frist()?->toArray();
       if(!empty($data)){
            $data['singpass'] = json_decode($data['singpass'] ,true);
       }
       return $data;
    }
}
