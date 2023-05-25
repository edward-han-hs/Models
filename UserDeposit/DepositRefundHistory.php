<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DepositRefundHistory extends Model
{
    protected $table = "deposit_refund_history";
    use SoftDeletes,BeasModel;
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i');
    }
    public static function insertHistory(array $data,int $status = 1){

        if(empty($data))return false;
        if($status){
            return  self::insert($data);
        }else{
            $timeDate =  date('Y-m-d H:i:s',time());
            if(array_key_exists('created_at',$data) ){
                $data['created_at'] = $timeDate;
            }else if(empty($data['created_at'])){
                $data['created_at'] = $timeDate;
            } 
            return  self::insertGetId($data);
        }
    }
}
